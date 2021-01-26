@forelse (isset($users) ? $users : [] as $user)
<div class="search-result bg-white-dark-5">
    <div class="d-flex align-items-center mb-3">
        <img src="{{ Storage::url($user->profile_pic_url) }}" alt="user photo" class="user-photo mr-3">
        <a class="user-name mr-3" href="{{ route('view.profile', $user) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
        @if ($user->is_tutor_verified)
        @include('partials.svg-tutor-verified')
        @endif
        <span class="user-level mr-auto">
            {{ $user->tutorLevel->tutor_level }} Tutor
        </span>
        @can('bookmark-tutor', $user)
        <svg class="svg-bookmark" data-user-id="{{ $user->id }}">
            @if(!Auth::check() || Auth::user()->bookmarkedUsers()->where('id', $user->id)->doesntExist()))
            <use class="" xlink:href="{{asset('assets/sprite.svg#icon-bookmark-empty')}}"></use>
            <use class="hidden bookmarked" xlink:href="{{asset('assets/sprite.svg#icon-bookmark-fill')}}"></use>
            @else
            <use class="hidden" xlink:href="{{asset('assets/sprite.svg#icon-bookmark-empty')}}"></use>
            <use class="bookmarked" xlink:href="{{asset('assets/sprite.svg#icon-bookmark-fill')}}"></use>
            @endif
        </svg>
        @endcan

    </div>

    <p class="user-major mb-1">{{ $user->firstMajor->major }}</p>

    <p class="user-hourly-rate mb-1">
        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
            <path d="M7.45096 2.88771C7.29378 2.88771 7.14013 2.93432 7.00944 3.02164C6.87875 3.10896 6.77689 3.23308 6.71674 3.3783C6.65659 3.52351 6.64086 3.6833 6.67152 3.83746C6.70218 3.99162 6.77787 4.13323 6.88902 4.24437C7.00016 4.35551 7.14176 4.4312 7.29592 4.46186C7.45008 4.49253 7.60987 4.47679 7.75509 4.41664C7.9003 4.35649 8.02442 4.25463 8.11174 4.12394C8.19907 3.99325 8.24568 3.8396 8.24568 3.68242C8.24626 3.5779 8.2261 3.47429 8.18636 3.37761C8.14663 3.28093 8.08811 3.19309 8.0142 3.11918C7.94029 3.04527 7.85245 2.98675 7.75577 2.94702C7.65909 2.90729 7.55549 2.88713 7.45096 2.88771Z" fill="#8A8A8A"/>
            <path d="M8.97164 0.931764H5.85828C5.69598 0.931413 5.53522 0.963266 5.38531 1.02548C5.23541 1.08769 5.09933 1.17902 4.98497 1.29419L1.43933 4.83983C1.32367 4.95397 1.23185 5.08995 1.16917 5.23986C1.10649 5.38978 1.07422 5.55065 1.07422 5.71314C1.07422 5.87564 1.10649 6.03651 1.16917 6.18642C1.23185 6.33634 1.32367 6.47232 1.43933 6.58646L4.54832 9.69545C4.66215 9.81163 4.79803 9.90393 4.94799 9.96694C5.09795 10.03 5.25897 10.0624 5.42163 10.0624C5.58429 10.0624 5.74531 10.03 5.89527 9.96694C6.04523 9.90393 6.1811 9.81163 6.29494 9.69545L9.84058 6.1498C9.95971 6.03727 10.0551 5.90202 10.1211 5.75202C10.1871 5.60203 10.2224 5.44034 10.2248 5.27649V2.16313C10.2243 1.99974 10.1913 1.83808 10.1279 1.68751C10.0644 1.53694 9.97174 1.40045 9.8552 1.28593C9.73865 1.17142 9.60055 1.08115 9.44889 1.02036C9.29723 0.959566 9.13502 0.929454 8.97164 0.931764ZM7.45208 4.9097C7.20835 4.9097 6.9701 4.83737 6.76751 4.70187C6.56492 4.56637 6.4071 4.3738 6.31403 4.14854C6.22096 3.92328 6.19683 3.67547 6.2447 3.43649C6.29256 3.19751 6.41028 2.97811 6.58292 2.80607C6.75557 2.63404 6.97539 2.51711 7.21454 2.47009C7.45369 2.42307 7.70141 2.44808 7.92634 2.54195C8.15126 2.63582 8.34327 2.79433 8.47805 2.9974C8.61283 3.20047 8.68431 3.43897 8.68345 3.6827C8.68345 3.8442 8.65157 4.00411 8.58963 4.15326C8.52769 4.30241 8.43692 4.43787 8.32252 4.55186C8.20812 4.66586 8.07234 4.75615 7.92297 4.81755C7.7736 4.87896 7.61358 4.91027 7.45208 4.9097Z" fill="#8A8A8A"/>
            </g>
            <defs>
            <clipPath id="clip0">
            <rect width="10.9164" height="10.9164" fill="white" transform="translate(0.179688 0.0371094)"/>
            </clipPath>
            </defs>
        </svg>
        <span>${{ $user->hourly_rate }} per hour</span>
    </p>

    <p class="user-intro mb-2">
        '{{ $user->getIntroduction() }}'
    </p>

    <div class="user-courses mb-4">
        <span class="heading">
            Courses:
        </span>
        @foreach ($user->courses as $course)
        @if (App\VerifiedCourse::where('course_id', $course->id)->where('user_id',
        Auth::id())->exists())
        <svg class="p-absolute verify" width="1em" height="1em" viewBox="0 0 512 512"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M256 0C114.836 0 0 114.836 0 256C0 397.164 114.836 512 256 512C397.164 512 512 397.164 512 256C512 114.836 397.164 0 256 0Z"
                fill="#FFCE00" />
            <path
                d="M385.75 201.75L247.082 340.414C242.922 344.574 237.461 346.668 232 346.668C226.539 346.668 221.078 344.574 216.918 340.414L147.586 271.082C139.242 262.742 139.242 249.258 147.586 240.918C155.926 232.574 169.406 232.574 177.75 240.918L232 295.168L355.586 171.586C363.926 163.242 377.406 163.242 385.75 171.586C394.09 179.926 394.09 193.406 385.75 201.75V201.75Z"
                fill="#FAFAFA" />
        </svg>
        @endif
        <span class="course" style="background-color: {{ $course->color }}; color: white;">
            {{ $course->course }}
        </span>
        @endforeach
    </div>

    <div class="user-rating">
        @php
            $starRating = $user->getAvgRating();
        @endphp
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $starRating)
            <svg class="full">
                <use xlink:href="assets/sprite.svg#icon-star-full"></use>
            </svg>
            @else
            <svg class="empty">
                <use xlink:href="assets/sprite.svg#icon-star-empty"></use>
            </svg>
            @endif
        @endfor

        <div class="flex-100"></div>

        <span class="rating">
            {{ $starRating }}
        </span>
        <a class="review-cnt" href="{{ route('view.profile', $user) }}">
            ({{ $user->about_reviews_count }} {{ $user->about_reviews_count == 0 ? 'review' : 'reviews' }})
        </a>

        <a class="btn btn-lg btn-chat btn-animation-y-sm" href="{{ $user->getChattingRoute() }}">
            Chat
        </a>

        @if (!Auth::check() || !Auth::user()->is_tutor)
        <a class="btn btn-lg btn-request btn-animation-y-sm" @auth href="{{ route('view.profile', $user->id) . '?request=true' }}" @endauth>
            Request a Session
        </a>
        @else
        <a class="btn btn-lg btn-view btn-animation-y-sm" href="{{ route('view.profile', $user->id) }}">
            View Profile
        </a>
        @endif


    </div>
</div>
@empty
<h5 class="text-center">
    <svg style="height: 30rem" width="510" height="340" viewBox="0 0 510 340" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="510" height="340" fill="url(#pattern0)"/>
        <defs>
        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
        <use xlink:href="#image30" transform="scale(0.000730994 0.00109649)"/>
        </pattern>
        <image id="image30" width="1368" height="912" xlink:href="data:image/png;base64,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"/>
        </defs>
    </svg>

    <h4 class="fc-black-2 text-center">No Results Found</h4>
    <p class="text-center fs-1-6 fc-grey">
        @if (old("nav-search-content"))
        We couldn't find any results for <span class="font-italic">{{ old("nav-search-content") }}</span>.
        @else
        We couldn't find any results.
        @endif
        Please try another keyword or filter.
    </p>
</h5>

@endforelse
