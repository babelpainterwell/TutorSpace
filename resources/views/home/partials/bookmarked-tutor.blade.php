<div class="bookmarked-user @if(isset($hidden) && $hidden) hidden @endif" @if(isset($hidden) && $hidden) data-to-hide="true" @endif" data-user-id="{{ $user->id }}">
    <img src="{{ Storage::url($user->profile_pic_url) }}" alt="bookmarked user">
    <div class="bookmarked-user__content">
        <a class="user-name fc-black-2" href="{{ route('view.profile', $user) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
        <div class="buttons">
            <a class="btn btn-outline-primary" href="{{ $user->getChattingRoute() }}">Message</a>
            <a class="btn btn-primary" href="{{ route('view.profile', $user->id) . '?request=true' }}">Request</a>
        </div>
    </div>
</div>
