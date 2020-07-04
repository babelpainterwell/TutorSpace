@extends('layouts.app')

@section('title', 'Forum')

@section('body-class')
bg-grey-light

@if(Auth::check() && Auth::user()->is_tutor)
bg-tutor
@else
bg-student
@endif

@endsection

@section('content')

@include('partials.nav')

<div class="container-fluid forum">
    <div class="row px-5">
        @include("forum.partials.forum-left")
        <section class="col-7 forum-content">
            <div class="forum-content__heading-img"></div>
            {{-- <img class="forum-content__heading-img" src="{{ asset('images/forum-heading-1.jpg') }}" alt="heading image"></img> --}}

            <form action="" method="POST" class="forum-content__search">
                <div action="" method="GET" class="form-search">
                    <input type="text" class="form-control form-control-lg input-search" placeholder="Computer Science...">
                    <svg class="svg-search">
                        <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                    </svg>
                </div>
                <select name="" class="forum-content__search__search-by">
                    <option value="tags">Search by Tags</option>
                    <option value="keywords">Search by Keywords</option>
                </select>
                <select name="" class="forum-content__search__sort-by">
                    <option value="popular">Popular First</option>
                    <option value="latest">Latest First</option>
                </select>
            </form>

            <div class="discussion-previews">
                <div class="discussion-preview flex-wrap">
                    <div class="discussion-preview__left">
                        <h5 class="discussion__heading fc-black-discussion">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur adipisci quasi atque non at quia? Quia tempora fugiat illo voluptas molestias officiis nemo cum neque, architecto reiciendis placeat commodi quaerat!
                        </h5>
                        <p class="discussion__heading-2 fc-black-discussion">
                            <span class="mr-3">Posted By</span>
                            <img src="{{asset('assets/images/usc.jpg')}}" alt="user photo" class="poster-img">
                            <a href="#" class="poster-name mr-3">Nemo Enim</a>
                            <span>Three days ago</span>
                        </p>
                        <p class="discussion__content fc-grey">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidem Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidem
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidem
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidemLorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidemLorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidemLorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis quidem
                        </p>
                    </div>
                    <div class="discussion-preview__right">
                        <img class="discussion-preview__right__thumbnail" src="{{asset('assets/images/usc.jpg')}}" alt="thumbnail">
                    </div>
                    <div class="discussion__bottom">
                        <div class="tags">
                            <span class="tag">Computer Science</span>
                            <span class="tag">Computer</span>
                            <span class="tag">Science</span>
                            <span class="fc-grey">and 5 more...</span>
                        </div>
                        <div class="discussion__bottom__info d-flex fc-black-discussion">
                            <div class="left-container d-flex align-items-center mt-3">
                                <svg class=" mr-1">
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                                </svg>
                                <span class="mr-5">
                                    105 people found this post useful.
                                </span>
                                <svg class=" mr-1">
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                                </svg>
                                <span class="mr-5">
                                    439
                                </span>
                                <svg class=" mr-1">
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                                </svg>
                                <span class="">
                                    97
                                </span>
                            </div>
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>

                <div class="discussion-preview flex-wrap">
                    <div class="discussion-preview__left">
                        <h5 class="discussion__heading fc-black-discussion">
                            Lorem ipsum dolor sit amet consectetur
                        </h5>
                        <p class="discussion__heading-2 fc-black-discussion">
                            <span class="mr-3">Posted By</span>
                            <img src="{{asset('assets/images/usc.jpg')}}" alt="user photo" class="poster-img">
                            <a href="#" class="poster-name mr-3">Nemo Enim</a>
                            <span>Three days ago</span>
                        </p>
                        <p class="discussion__content fc-grey">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis
                        </p>
                    </div>
                    <div class="discussion-preview__right">
                        <img class="discussion-preview__right__thumbnail" src="https://storage.googleapis.com/tutorspace-storage/user-photos/mrzsjQKvQJn5sAPQqYJtEWEO5Bdg97Kfpjse2QYL.png" alt="thumbnail">
                    </div>
                    <div class="discussion__bottom">
                        <div class="tags">
                            <span class="tag">Computer Science</span>
                            <span class="tag">Computer</span>
                            <span class="tag">Science</span>
                            {{-- <span class="fc-grey">and 5 more...</span> --}}
                        </div>
                        <div class="discussion__bottom__info d-flex fc-black-discussion">
                            <div class="left-container d-flex align-items-center mt-3">
                                <svg class=" mr-1">
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                                </svg>
                                <span class="mr-5">
                                    105 people found this post useful.
                                </span>
                                <svg class=" mr-1">
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                                </svg>
                                <span class="mr-5">
                                    439
                                </span>
                                <svg class=" mr-1">
                                    <use xlink:href="{{asset('assets/sprite.svg#icon-search')}}"></use>
                                </svg>
                                <span class="">
                                    97
                                </span>
                            </div>
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="col-3 forum-right">
            dgsdlghskdl
        </section>
    </div>
</div>








{{-- @include('partials.footer') --}}

@endsection




@section('js')
<script>

</script>
<script src="{{ asset('js/forum/index.js') }}"></script>
@endsection
