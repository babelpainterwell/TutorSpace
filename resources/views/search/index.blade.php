@extends('layouts.app')

@section('title', 'Search Results')


@section('body-class')
bg-white-dark-4

@if(Auth::check() && Auth::user()->is_tutor)
bg-tutor
@else
bg-student
@endif

@endsection

@section('content')

@include('partials.nav')

<div class="container search">
    <h4 class="ml-2">
        Search Results (12)
    </h4>
    <div class="row mt-5">
        <div class="col-lg-4">

            {{-- filter --}}
            <div class="filter fc-black bg-white-dark-5">
                <span class="filter-heading">
                    <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="15" height="15" fill="url(#pattern10)" fill-opacity="0.6"/>
                        <defs>
                        <pattern id="pattern10" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image10" transform="scale(0.00195312)"/>
                        </pattern>
                        <image id="image10" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                        </defs>
                    </svg>
                    <span class="mr-auto">Filter</span>
                    <button class="btn btn-link btn-hide">show</button>
                </span>

                <div class="flex__content">
                    <hr>
                    <div class="filter__available-time">
                        <span class="filter-heading--2">
                            Available Time
                        </span>

                        <div class="filter__inputs mt-3">
                            <div class="filter__input-container">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <input type="text" id="start-date" class="filter__input" placeholder="Start Date">
                            </div>

                            <span class="separator">to</span>

                            <div class="filter__input-container">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                                    <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <input type="text" id="end-date" class="filter__input" placeholder="End Date">
                            </div>
                        </div>

                        <div class="filter__checkboxes">
                            <div class="top-3">
                                <div class="filter__checkbox mt-3">
                                    <input type="checkbox" id="checkbox-morning" class="checkbox-range">
                                    <label for="checkbox-morning">
                                        Morning
                                    </label>
                                </div>

                                <div class="filter__checkbox mt-3">
                                    <input type="checkbox" id="checkbox-afternoon" class="checkbox-range">
                                    <label for="checkbox-afternoon">
                                        Afternoon
                                    </label>
                                </div>

                                <div class="filter__checkbox mt-3">
                                    <input type="checkbox" id="checkbox-night" class="checkbox-range">
                                    <label for="checkbox-night">
                                        Night
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="filter__checkbox mt-3">
                                    <input type="checkbox" id="checkbox-any-time">
                                    <label for="checkbox-any-time">
                                        Any time is fine for me.
                                    </label>
                                </div>

                                <div class="filter__checkbox mt-3">
                                    <input type="checkbox" id="checkbox-specify-detail-time">
                                    <label for="checkbox-specify-detail-time">
                                        I want to specify a time.
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="filter__inputs mt-3 hidden" id="select-detail-time">
                            <div class="filter__input-container">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <input type="text" id="start-time" class="filter__input" class="filter__input ui-timepicker-input" placeholder="Start Time">
                            </div>

                            <span class="separator">to</span>

                            <div class="filter__input-container">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                <input type="text" id="end-time" class="filter__input ui-timepicker-input" placeholder="End Time">
                            </div>
                        </div>
                    </div>


                    <div class="filter__price">
                        <span class="filter-heading--2">
                            Price
                        </span>

                        <input id="price-range-input" type="text"/>

                        <div class="filter__inputs mt-3">
                            <div class="filter__input-container">
                                <svg>
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-dollar')}}"></use>
                                </svg>
                                <input type="number" class="filter__input" placeholder="Minimum" id="price-low"
                                min="15" max="50">
                            </div>

                            <span class="separator">to</span>

                            <div class="filter__input-container">
                                <svg>
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-dollar')}}"></use>
                                </svg>
                                <input type="number" class="filter__input" placeholder="Maximum" id="price-high" min="15" max="50">
                            </div>
                        </div>
                    </div>

                    <div class="filter__tutor-level">
                        <span class="filter-heading--2">
                            Tutor Level
                        </span>

                        <div class="filter__checkboxes">
                            <div class="filter__checkbox mt-2">
                                <input type="checkbox" id="checkbox-beginner">
                                <label for="checkbox-beginner">
                                    Beginner
                                </label>
                            </div>

                            <div class="filter__checkbox mt-2">
                                <input type="checkbox" id="checkbox-intermediate">
                                <label for="checkbox-intermediate">
                                    Intermediate
                                </label>
                            </div>

                            <div class="filter__checkbox mt-2">
                                <input type="checkbox" id="checkbox-expert">
                                <label for="checkbox-expert">
                                    Expert
                                </label>
                            </div>

                            <div class="filter__checkbox mt-2">
                                <input type="checkbox" id="checkbox-master">
                                <label for=checkbox-master"">
                                    Master
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button class="btn btn-lg btn-submit">
                            Apply
                        </button>
                    </div>
                </div>
            </div>

        </div>

        {{-- search results --}}
        <div class="col">
            <div class="search-results">
                <div class="search-result bg-white-dark-5">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://storage.googleapis.com/tutorspace-storage/user-profile-photos/placeholder.png" alt="user photo" class="user-photo mr-3">
                        <a class="user-name mr-3" href="#">Nemo Enim</a>
                        <svg class="mr-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="12" height="12" fill="url(#pattern11)"/>
                            <defs>
                            <pattern id="pattern11" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image11" transform="scale(0.00195312)"/>
                            </pattern>
                            <image id="image11" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                        <span class="user-level mr-auto">Beginner Tutor</span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark bookmark-svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 12l5 3V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12l5-3zm-4 1.234l4-2.4 4 2.4V3a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v10.234z"/>
                        </svg>
                    </div>

                    <p class="user-major mb-1">Business Administration</p>

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
                        <span>$16 per hour</span>
                    </p>

                    <p class="user-intro mb-2">
                        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente illo ab ea aliquid provident autem ipsum consequuntur possimus ex cupiditate tenetur nesciunt harum quas accusamus, rem nostrum nulla voluptates? Ullam.'
                    </p>

                    <div class="user-courses mb-4">
                        <span class="heading">
                            Courses:
                        </span>
                        <span class="course">
                            CSCI 104
                        </span>
                        <span class="course">
                            BUAD 304
                        </span>
                        <span class="course">
                            CSCI 103
                        </span>
                        <span class="course">
                            CSCI 360
                        </span>
                        <span class="course">
                            CSCI 201
                        </span>
                        <span class="course">
                            MATH 226
                        </span>
                        <span class="course">
                            EE 109
                        </span>
                        <span class="course">
                            PHYS 151
                        </span>
                        <span class="course">
                            ECON 351
                        </span>
                    </div>

                    <div class="user-rating">
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="empty">
                            <use xlink:href="assets/sprite.svg#icon-star-empty"></use>
                        </svg>

                        <div class="flex-100"></div>

                        <span class="rating">
                            4.2
                        </span>
                        <a class="review-cnt" href="#">
                            (5 reviews)
                        </a>

                        <button class="btn btn-lg btn-chat btn-animation-y-sm">
                            Chat
                        </button>
                        <button class="btn btn-lg btn-request btn-animation-y-sm">
                            Request a Session
                        </button>

                    </div>
                </div>

                <div class="search-result bg-white-dark-5">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://storage.googleapis.com/tutorspace-storage/user-profile-photos/placeholder.png" alt="user photo" class="user-photo mr-3">
                        <a class="user-name mr-3" href="#">Nemo Enim</a>
                        <svg class="mr-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="12" height="12" fill="url(#pattern11)"/>
                            <defs>
                            <pattern id="pattern11" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image11" transform="scale(0.00195312)"/>
                            </pattern>
                            <image id="image11" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                        <span class="user-level mr-auto">Beginner Tutor</span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark bookmark-svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 12l5 3V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12l5-3zm-4 1.234l4-2.4 4 2.4V3a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v10.234z"/>
                        </svg>
                    </div>

                    <p class="user-major mb-1">Business Administration</p>

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
                        <span>$16 per hour</span>
                    </p>

                    <p class="user-intro mb-2">
                        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente illo ab ea aliquid provates? Ullam.'
                    </p>

                    <div class="user-courses mb-4">
                        <span class="heading">
                            Courses:
                        </span>
                        <span class="course">
                            CSCI 104
                        </span>
                        <span class="course">
                            BUAD 304
                        </span>
                        <span class="course">
                            CSCI 103
                        </span>

                    </div>

                    <div class="user-rating">
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="empty">
                            <use xlink:href="assets/sprite.svg#icon-star-empty"></use>
                        </svg>

                        <div class="flex-100"></div>

                        <span class="rating">
                            4.2
                        </span>
                        <a class="review-cnt" href="#">
                            (5 reviews)
                        </a>

                        <button class="btn btn-lg btn-chat btn-animation-y-sm">
                            Chat
                        </button>
                        <button class="btn btn-lg btn-request btn-animation-y-sm">
                            Request a Session
                        </button>

                    </div>
                </div>

                <div class="search-result bg-white-dark-5">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://storage.googleapis.com/tutorspace-storage/user-profile-photos/placeholder.png" alt="user photo" class="user-photo mr-3">
                        <a class="user-name mr-3" href="#">Nemo Enim</a>
                        <svg class="mr-1" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="12" height="12" fill="url(#pattern11)"/>
                            <defs>
                            <pattern id="pattern11" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image11" transform="scale(0.00195312)"/>
                            </pattern>
                            <image id="image11" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                        <span class="user-level mr-auto">Beginner Tutor</span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark bookmark-svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 12l5 3V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12l5-3zm-4 1.234l4-2.4 4 2.4V3a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v10.234z"/>
                        </svg>
                    </div>

                    <p class="user-major mb-1">Business Administration</p>

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
                        <span>$16 per hour</span>
                    </p>

                    <p class="user-intro mb-2">
                        'I dont want to share anything'
                    </p>

                    <div class="user-courses mb-4">
                        <span class="heading">
                            Courses:
                        </span>
                        <span class="course">
                            CSCI 104
                        </span>
                        <span class="course">
                            BUAD 304
                        </span>
                        <span class="course">
                            CSCI 103
                        </span>
                        <span class="course">
                            CSCI 360
                        </span>

                    </div>

                    <div class="user-rating">
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="full">
                            <use xlink:href="assets/sprite.svg#icon-star-full"></use>
                        </svg>
                        <svg class="empty">
                            <use xlink:href="assets/sprite.svg#icon-star-empty"></use>
                        </svg>

                        <div class="flex-100"></div>

                        <span class="rating">
                            4.2
                        </span>
                        <a class="review-cnt" href="#">
                            (5 reviews)
                        </a>

                        <button class="btn btn-lg btn-chat btn-animation-y-sm">
                            Chat
                        </button>
                        <button class="btn btn-lg btn-request btn-animation-y-sm">
                            Request a Session
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')

@endsection

@section('js')
@include('partials.nav-auth-js')
<script src="{{ asset('js/search/index.js') }}"></script>
@endsection
