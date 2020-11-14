<h4 class="heading">Message</h4>
<form class="search-bar-container" method="GET" action="#">
    <input type="text" class="search-bar form-control form-control-lg" placeholder="Search...">
    <svg>
        <use xlink:href="{{asset('assets/sprite.svg#icon-magnifying-glass')}}"></use>
    </svg>
</form>
<ul class="msgs">
    @foreach (App\User::all() as $chatroom)
        @include('chatting.side-bar-chatting-msg', [
            'unRead' => true,
            'time' => "5:38pm",
            'user' => $chatroom
        ])
    @endforeach
</ul>
