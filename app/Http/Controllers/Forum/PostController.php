<?php

namespace App\Http\Controllers\Forum;

use App\Post;
use App\Reply;
use App\PostType;
use App\PostDraft;
use Carbon\Carbon;
use Facades\App\Tag;
use App\Rules\WordCountGTE;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private static $POSTS_PER_PAGE = 5;

    public function __construct() {
        $this->middleware(['auth'])->except([
            'index',
            'show',
            'search',
            'indexPopular',
            'indexLatest'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum.index', [
            'posts' => Post::with(['tags', 'user'])->withCount(['usersUpvoted', 'replies', 'tags'])->paginate(self::$POSTS_PER_PAGE),
            'pageTitle' => 'Forum',
            'trendingTags' => Tag::getTrendingTags(),
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('forum.create', [
            'postDraft' => PostDraft::firstOrNew([
                'user_id' => Auth::user()->id,
            ],[
                'post_type_id' => 0
            ]),
            'trendingTags' => Tag::getTrendingTags(),
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post-type' => [
                'required',
                'exists:post_types,id'
            ],
            'post-title' => [
                'required',
                'unique:posts,title',
                new WordCountGTE(3)
            ],
            'post-content' => [
                'required',
                new WordCountGTE(5)
            ],
            'tags' => [
                'required',
                'array',
                'min:1'
            ],
            'tags.*' => [
                'exists:tags,id'
            ]
        ]);

        DB::transaction(function () use($request) {
            $post = new Post();
            $post->title = $request->input('post-title');
            $post->content = $request->input('post-content');
            $post->slug = Str::slug($request->input('post-title'));
            if(!empty($post->getThumbNail())) {
                $post->thumbNail = $post->getThumbNail()[1];
            }

            $post->post_type()->associate(PostType::find($request->input('post-type')));
            $post->user()->associate(Auth::user());

            $post->save();

            $post->tags()->attach($request->input('tags'));
        });


        $postDraft = PostDraft::where('user_id', Auth::user()->id)->first();
        if($postDraft) {
            $postDraft->delete();
        }

        return redirect()->route('posts.index')->with([
            'successMsg' => 'You successfully created a new post!'
        ]);
    }

    public function storeAsDraft(Request $request) {
        $request->validate([
            'post-type' => [
                'required',
                'exists:post_types,id'
            ],
            'post-title' => [
                'required',
                'unique:posts,title',
                new WordCountGTE(3)
            ],
            'post-content' => [
                'required',
                new WordCountGTE(5)
            ],
            'tags' => [
                'required',
                'array',
                'min:1'
            ],
            'tags.*' => [
                'exists:tags,id'
            ]
        ]);

        $postDraft = PostDraft::updateOrCreate([
            'user_id' => Auth::user()->id,
        ],[
            'title' => $request->input('post-title'),
            'content' => $request->input('post-content'),
            'post_type_id' => $request->input('post-type'),
            'tags' => implode(',', $request->input('tags'))
        ]);

        return redirect()->route('posts.create')->with([
            'successMsg' => 'Your post draft is saved successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('forum.show', [
            'trendingTags' => Tag::getTrendingTags(),
            'post' => $post
                        ->loadCount([
                            'usersUpvoted',
                            'replies'
                        ])
                        ->load([
                            'replies' => function($query) {
                                $query->withCount(['usersUpvoted', 'replies'])->orderBy('is_best_reply', 'desc');
                            },
                            'replies.replies' => function($query) {
                                $query->withCount('usersUpvoted');
                            },
                            'replies.usersUpvoted' => function($query) {
                                if(Auth::check())
                                    $query->where('user_id', Auth::user()->id);
                            },
                            'replies.user.firstMajor',

                            'replies.replies.reply.user',
                            'replies.replies.user',
                            'replies.replies.usersUpvoted' => function($query) {
                                if(Auth::check())
                                    $query->where('user_id', Auth::user()->id);
                            },
                        ]),
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json([
            'successMsg' => 'Successfully deleted the post!'
        ]);
    }

    public function markAsBestReply(Post $post, Reply $reply) {
        $this->authorize('markAsBestReply', [$post, $reply]);

        $post->markAsBestReply($reply);

        return redirect()->back()->with([
            'successMsg' => 'Marked as best reply.'
        ]);
    }

    public function showMyFollows() {
        return view('forum.my_follows', [
            'trendingTags' => Tag::getTrendingTags(),
            'posts' => Auth::user()->followedPosts()->with(['tags', 'user'])->withCount(['usersUpvoted', 'replies', 'tags'])->paginate(self::$POSTS_PER_PAGE),
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }

    public function showMyPosts() {
        return view('forum.my_posts', [
            'trendingTags' => Tag::getTrendingTags(),
            'posts' => Auth::user()->posts()->with(['tags', 'user'])->withCount(['usersUpvoted', 'replies', 'tags'])->paginate(self::$POSTS_PER_PAGE),
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }

    public function uploadPostImg(Request $request) {
        reset($_FILES);
        $temp = current($_FILES);

        if(is_uploaded_file($temp['tmp_name'])){
            // Sanitize input
            if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
                return response()->json([
                    'errorMsg' => 'Invalid File Name!'
                ]);
            }

            // Verify extension
            if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("jpg", "png", "jpeg"))){
                return response()->json([
                    'errorMsg' => 'Invalid File Extension!'
                ]);
            }

            // upload the file
            $uploadedFileName = $request->file('file')->store('/user-profile-photos');

            return response()->json([
                'location' => Storage::url($uploadedFileName)
            ]);
        } else {
            // Notify editor that the upload failed
            return response()->json([
                'errorMsg' => 'Something went wrong when uploading the image. Please check your image extension and file size.'
            ]);
        }
    }

    public function upvote(Request $request, Post $post) {
        $user = Auth::user();
        if($user->hasUpvotedPost($post)) {
            $user->upvotedPosts()->detach($post);
        }
        else {
            $user->upvotedPosts()->attach($post);
        }

        return response()->json([
            'num' => $post->usersUpvoted()->count()
        ]);
    }

    public function follow(Request $request, Post $post) {
        $this->authorize('follow', $post);

        $user = Auth::user();
        if($user->hasFollowedPost($post)) {
            $user->followedPosts()->detach($post);
            return response()->json([
                'text' => 'Follow'
            ]);
        }
        else {
            $user->followedPosts()->attach($post);
            return response()->json([
                'text' => 'Unfollow'
            ]);
        }
    }

    public function search(Request $request) {
        $request->session()->flashInput($request->all());

        if($request->input('search-by') == 'keywords') {
            $posts = Post::with([
                'tags',
                'user'
            ])->withCount([
                'usersUpvoted',
                'replies',
                'tags'
            ])
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('posts.title', 'like', "%{$request->input('keyword')}%")
            ->orWhere('users.first_name', 'like', "%{$request->input('keyword')}%")
            ->orWhere('users.last_name', 'like', "%{$request->input('keyword')}%")
            ->paginate(self::$POSTS_PER_PAGE);
        }
        else if($request->input('search-by') == 'tags') {
            $posts = Post::with([
                'tags',
                'user'
            ])->withCount([
                'usersUpvoted',
                'replies',
                'tags'
            ])
            ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
            ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
            // todo: needs to be modified (need to check all the tags in the input are of this post)
            ->whereIn('tags.id', $request->input('tags'))
            ->distinct()
            ->paginate(self::$POSTS_PER_PAGE);
        }
        else {
            $posts = Post::with([
                'tags',
                'user'
            ])->withCount([
                'usersUpvoted',
                'replies',
                'tags'
            ])
            ->paginate(self::$POSTS_PER_PAGE);
        }


        return view('forum.index', [
            'trendingTags' => Tag::getTrendingTags(),
            'posts' => $posts,
            'pageTitle' => 'Forum - Search Results',
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }


    public function indexPopular() {
        // todo: modify the formula
        return view('forum.index', [
            'trendingTags' => Tag::getTrendingTags(),
            'posts' => Post::orderBy('view_count', 'desc')
                        ->with([
                            'tags',
                            'user'
                        ])
                        ->withCount([
                            'usersUpvoted',
                            'replies',
                            'tags'
                        ])->paginate(self::$POSTS_PER_PAGE),
            'pageTitle' => 'Forum - Popular Posts',
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }

    public function indexLatest() {
        return view('forum.index', [
            'trendingTags' => Tag::getTrendingTags(),
            'posts' => Post::with([
                            'tags',
                            'user'
                        ])
                        ->withCount([
                            'usersUpvoted',
                            'replies',
                            'tags'
                        ])
                        ->whereDate('created_at', '>=', Carbon::now()->subDays(14))
                        ->orderBy('created_at', 'desc')
                        ->paginate(self::$POSTS_PER_PAGE),
            'pageTitle' => 'Forum - Latest Posts',
            'youMayHelpWithPosts' => \Facades\App\Post::getYouMayHelpWith()
        ]);
    }

}
