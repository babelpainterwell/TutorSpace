@extends('layouts.app')
@section('title', 'Help Center')

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

<div class="container-fluid help-center">
    <div class="help-center__header-bg bg-primary"></div>

    <div class="container p-relative help-center-content">
        <h2 class="help-center__header-content text-center">
            Hello, how can we help?
        </h2>

        <div class="help-center__cards">

            @include('help-center.partials.card',
                [
                    "Title" => "Sessions",
                    "id" => "section-sessions",
                    "Content" => "Requests, Schedules, Cancellations",
                    "SVG" => "M44.6428 5.35713H37.5V1.78571C37.5 1.31211 37.3119 0.857905 36.977 0.523024C36.642 0.188132 36.1879 0 35.7143 0C35.2406 0 34.7865 0.188132 34.4516 0.523024C34.1166 0.857905 33.9286 1.31211 33.9286 1.78571V5.35713H16.0714V1.78571C16.0714 1.31211 15.8833 0.857905 15.5484 0.523024C15.2135 0.188132 14.7593 0 14.2857 0C13.8121 0 13.3579 0.188132 13.0231 0.523024C12.6881 0.857905 12.5 1.31211 12.5 1.78571V5.35713H5.35714C3.93634 5.35713 2.57373 5.92155 1.56907 6.92619C0.564415 7.93086 0 9.2935 0 10.7143V44.6429C0 46.0636 0.564415 47.4263 1.56907 48.4308C2.57373 49.4355 3.93634 50 5.35714 50H44.6428C46.0637 50 47.4262 49.4355 48.4309 48.4308C49.4355 47.4263 50 46.0636 50 44.6429V10.7143C50 9.2935 49.4355 7.93086 48.4309 6.92619C47.4262 5.92155 46.0637 5.35713 44.6428 5.35713ZM44.6428 46.4285H5.35714C4.88354 46.4285 4.42934 46.2404 4.09445 45.9056C3.75957 45.5706 3.57143 45.1164 3.57143 44.6429V21.4286H37.5C37.9735 21.4286 38.4278 21.2404 38.7627 20.9055C39.0975 20.5707 39.2857 20.1164 39.2857 19.6428C39.2857 19.1693 39.0975 18.715 38.7627 18.3801C38.4278 18.0453 37.9735 17.8572 37.5 17.8572H3.57143V10.7143C3.57143 10.2406 3.75957 9.78651 4.09445 9.45158C4.42934 9.11666 4.88354 8.92861 5.35714 8.92861H12.5V12.4999C12.5 12.9736 12.6881 13.4278 13.0231 13.7626C13.3579 14.0976 13.8121 14.2857 14.2857 14.2857C14.7593 14.2857 15.2135 14.0976 15.5484 13.7626C15.8833 13.4278 16.0714 12.9736 16.0714 12.4999V8.92861H33.9286V12.4999C33.9286 12.9736 34.1166 13.4278 34.4516 13.7626C34.7865 14.0976 35.2406 14.2857 35.7143 14.2857C36.1879 14.2857 36.642 14.0976 36.977 13.7626C37.3119 13.4278 37.5 12.9736 37.5 12.4999V8.92861H44.6428C45.1164 8.92861 45.5707 9.11666 45.9055 9.45158C46.2404 9.78651 46.4286 10.2406 46.4286 10.7143V17.8572H42.8571C42.3835 17.8572 41.9294 18.0453 41.5944 18.3801C41.2595 18.715 41.0714 19.1693 41.0714 19.6428C41.0714 20.1164 41.2595 20.5707 41.5944 20.9055C41.9294 21.2404 42.3835 21.4286 42.8571 21.4286H46.4286V44.6429C46.4286 45.1164 46.2404 45.5706 45.9055 45.9056C45.5707 46.2404 45.1164 46.4285 44.6428 46.4285Z"
            ])

            @include('help-center.partials.card',
                [
                    "Title" => "Payments",
                    "id" => "section-payment",
                    "Content" => "Bank Cards, Charges, Refunds",
                    "SVG" => "M48.8438 32.3971C47.9813 32.3971 47.2812 33.1971 47.2812 34.1829V46.6831H3.53125V25.2541H20.7187C21.5812 25.2541 22.2813 24.4541 22.2813 23.4683C22.2813 22.4826 21.5812 21.6826 20.7187 21.6826H3.53125V14.5396H20.7187C21.5812 14.5396 22.2813 13.7395 22.2813 12.7538C22.2813 11.7681 21.5812 10.968 20.7187 10.968H3.53125C1.80625 10.968 0.40625 12.5681 0.40625 14.5396V46.6831C0.40625 48.6546 1.80625 50.2546 3.53125 50.2546H47.2812C49.0062 50.2546 50.4062 48.6546 50.4062 46.6831V34.1829C50.4062 33.1971 49.7063 32.3971 48.8438 32.3971Z M14.4687 32.3974H8.21873C7.35623 32.3974 6.65623 33.1974 6.65623 34.1831C6.65623 35.1689 7.35623 35.9689 8.21873 35.9689H14.4687C15.3312 35.9689 16.0312 35.1689 16.0312 34.1831C16.0312 33.1974 15.3312 32.3974 14.4687 32.3974Z M49.4593 5.75387L38.5218 0.396606C38.1249 0.207316 37.6843 0.207316 37.2874 0.396606L26.3499 5.75387C25.7781 6.03602 25.4062 6.68246 25.4062 7.39676V14.5398C25.4062 24.365 28.5843 30.108 37.1281 35.7331C37.3687 35.8903 37.6374 35.9688 37.9062 35.9688C38.1749 35.9688 38.4437 35.8903 38.6843 35.7331C47.2281 30.1223 50.4062 24.3793 50.4062 14.5398V7.39676C50.4062 6.68246 50.0343 6.03602 49.4593 5.75387ZM47.2812 14.5398C47.2812 22.7864 44.8937 27.3258 37.9062 32.1116C30.9187 27.3151 28.5312 22.7757 28.5312 14.5398V8.57536L37.9062 3.9824L47.2812 8.57536V14.5398Z M43.5727 11.3576C42.9008 10.7504 41.9195 10.8683 41.3758 11.6362L36.4633 18.6578L34.5196 15.3363C34.0352 14.5148 33.0633 14.2969 32.3539 14.8398C31.6383 15.3863 31.4414 16.497 31.9195 17.3149L35.0445 22.6721C35.3227 23.1471 35.7789 23.44 36.2789 23.4686C36.3008 23.4686 36.3258 23.4686 36.3445 23.4686C36.8164 23.4686 37.2664 23.2257 37.5664 22.7971L43.8164 13.8684C44.3539 13.0969 44.2477 11.9755 43.5727 11.3576Z"
            ])

            @include('help-center.partials.card',
                [
                    "Title" => "User Accounts",
                    "id" => "section-user-accounts",
                    "Content" => "Profiles, Switching Accounts",
                    "SVG" => "M50.7811 7.98115H47.7372V6.14668C47.7372 2.75732 44.6669 0 40.8928 0C37.1187 0 34.0484 2.75732 34.0484 6.14668V7.98105H31.0045V14.0687C28.2319 12.8591 25.122 12.1792 21.8381 12.1792C10.2273 12.1792 0.78125 20.6624 0.78125 31.0896C0.78125 41.5169 10.2272 50 21.838 50C33.4487 50 42.8948 41.5169 42.8948 31.0896C42.8948 28.71 42.4014 26.4321 41.5037 24.3329H50.7813V7.98115H50.7811ZM37.3105 6.14668C37.3105 4.37285 38.9175 2.92969 40.8927 2.92969C42.8679 2.92969 44.4748 4.37285 44.4748 6.14668V7.98105H37.3104V6.14668H37.3105ZM13.1454 45.0293V41.0617C13.1454 37.8628 16.0432 35.2604 19.6052 35.2604H24.0708C27.6327 35.2604 30.5306 37.8628 30.5306 41.0617V45.0293C27.9583 46.3281 24.993 47.0703 21.838 47.0703C18.6829 47.0703 15.7177 46.328 13.1454 45.0293V45.0293ZM21.838 32.3306C19.6447 32.3306 17.8604 30.7281 17.8604 28.7585C17.8604 26.7889 19.6447 25.1864 21.838 25.1864C24.0312 25.1864 25.8156 26.7889 25.8156 28.7585C25.8156 30.7281 24.0312 32.3306 21.838 32.3306V32.3306ZM39.6326 31.0896C39.6326 35.7725 37.3782 39.9912 33.7929 42.9167V41.0616C33.7929 37.3106 31.1453 34.1048 27.4404 32.8715C28.4631 31.7501 29.0779 30.3177 29.0779 28.7584C29.0779 25.1733 25.8301 22.2566 21.8381 22.2566C17.8461 22.2566 14.5983 25.1733 14.5983 28.7584C14.5983 30.3176 15.2131 31.7501 16.2358 32.8715C12.5309 34.1048 9.88329 37.3106 9.88329 41.0616V42.9167C6.29789 39.9912 4.04347 35.7725 4.04347 31.0896C4.04347 22.2779 12.0261 15.1089 21.8381 15.1089C25.1889 15.1089 28.3255 15.9457 31.0045 17.3979V24.3328H37.9617C39.0332 26.3862 39.6326 28.6762 39.6326 31.0896V31.0896ZM47.5189 21.4032H42.5238V14.692H39.2616V21.4032H34.2665V10.9108H47.5188V21.4032H47.5189Z"
            ])


            @include('help-center.partials.card',
                [
                    "Title" => "Forum",
                    "id" => "section-forum",
                    "Content" => "Posts, Replies, Tags",
                    "SVG" => "M45.597 10.1835H42.0255V6.33741C42.0255 4.80733 41.4611 3.33992 40.4565 2.25799C39.4518 1.17606 38.0892 0.568237 36.6684 0.568237H6.31124C4.89044 0.568237 3.52783 1.17606 2.52317 2.25799C1.51851 3.33992 0.954102 4.80733 0.954102 6.33741V39.0294C0.955861 39.409 1.06194 39.7796 1.25896 40.0945C1.45598 40.4093 1.73514 40.6543 2.06124 40.7986C2.27317 40.9062 2.50557 40.9589 2.73982 40.9524C2.97483 40.9539 3.2078 40.9054 3.42536 40.8097C3.64293 40.714 3.84082 40.573 4.00767 40.3947L9.88267 34.0486V37.1063C9.88267 38.6364 10.4471 40.1038 11.4517 41.1857C12.4564 42.2677 13.819 42.8755 15.2398 42.8755H41.2934L47.9005 50.01C48.0674 50.1882 48.2653 50.3293 48.4828 50.425C48.7004 50.5207 48.9334 50.5692 49.1684 50.5677C49.4026 50.5742 49.635 50.5215 49.847 50.4139C50.1731 50.2696 50.4522 50.0246 50.6492 49.7098C50.8463 49.3949 50.9523 49.0243 50.9541 48.6446V15.9527C50.9541 14.4226 50.3897 12.9552 49.385 11.8733C48.3804 10.7913 47.0178 10.1835 45.597 10.1835ZM4.52553 34.3948V6.33741C4.52553 5.82738 4.71367 5.33824 5.04855 4.9776C5.38344 4.61696 5.83764 4.41435 6.31124 4.41435H36.6684C37.142 4.41435 37.5962 4.61696 37.9311 4.9776C38.266 5.33824 38.4541 5.82738 38.4541 6.33741V27.491C38.4541 28.0011 38.266 28.4902 37.9311 28.8508C37.5962 29.2115 37.142 29.4141 36.6684 29.4141H9.88267C9.64766 29.4126 9.41469 29.4611 9.19713 29.5568C8.97956 29.6525 8.78167 29.7935 8.61482 29.9718L4.52553 34.3948ZM47.3827 44.0101L43.2934 39.5871C43.1265 39.4088 42.9286 39.2678 42.7111 39.1721C42.4935 39.0764 42.2605 39.0279 42.0255 39.0294H15.2398C14.7662 39.0294 14.312 38.8268 13.9771 38.4661C13.6422 38.1055 13.4541 37.6163 13.4541 37.1063V33.2602H36.6684C38.0892 33.2602 39.4518 32.6524 40.4565 31.5704C41.4611 30.4885 42.0255 29.0211 42.0255 27.491V14.0296H45.597C46.0706 14.0296 46.5248 14.2322 46.8597 14.5929C47.1945 14.9535 47.3827 15.4427 47.3827 15.9527V44.0101Z"
            ])


            @include('help-center.partials.card',
                [
                    "Title" => "Tutor Verification",
                    "id" => "section-tutor-verification",
                    "Content" => "Extra bonuses, Unique Icons",
                    "SVG" => "M36.5053 17.4309C37.2682 18.1938 37.2682 19.4305 36.5053 20.1931L23.4026 33.2962C22.6396 34.0587 21.4033 34.0587 20.6403 33.2962L14.4029 27.0584C13.64 26.2958 13.64 25.0591 14.4029 24.2966C15.1655 23.5336 16.4022 23.5336 17.1648 24.2966L22.0213 29.153L33.7431 17.4309C34.506 16.6683 35.7427 16.6683 36.5053 17.4309V17.4309ZM50.4541 25.3635C50.4541 39.1823 39.2709 50.3635 25.4541 50.3635C11.6354 50.3635 0.454102 39.1804 0.454102 25.3635C0.454102 11.5448 11.6373 0.363525 25.4541 0.363525C39.2728 0.363525 50.4541 11.5467 50.4541 25.3635ZM46.5479 25.3635C46.5479 13.7039 37.1122 4.26978 25.4541 4.26978C13.7945 4.26978 4.36035 13.7054 4.36035 25.3635C4.36035 37.0231 13.796 46.4573 25.4541 46.4573C37.1137 46.4573 46.5479 37.0216 46.5479 25.3635Z"
            ])


            @include('help-center.partials.card',
                [
                    "Title" => "Report",
                    "id" => "section-report",
                    "Content" => "Unhappiness, Abusive Behaviors",
                    "SVG" => "M25.3635 36.0229C23.9657 36.0229 22.7939 37.3046 22.7939 38.8338C22.7939 40.3629 23.9657 41.6446 25.3635 41.6446C26.71 41.6446 27.9331 40.3629 27.8714 38.9012C27.9331 37.2934 26.7716 36.0229 25.3635 36.0229Z M49.1475 45.9845C50.7612 42.9375 50.7715 39.3059 49.1681 36.2701L33.0723 5.77766C31.4792 2.70817 28.6013 0.886719 25.3739 0.886719C22.1465 0.886719 19.2686 2.71941 17.6755 5.76641L1.55916 36.2926C-0.0442543 39.3621 -0.033976 43.0162 1.58999 46.0632C3.1934 49.0765 6.06104 50.8867 9.26786 50.8867H41.4183C44.6354 50.8867 47.5236 49.054 49.1475 45.9845ZM45.6529 43.7808C44.7587 45.4673 43.1759 46.468 41.408 46.468H9.25758C7.51027 46.468 5.9377 45.4898 5.06404 43.837C4.18011 42.1617 4.16984 40.1604 5.05377 38.4739L21.1701 7.9589C22.0437 6.28362 23.606 5.29418 25.3739 5.29418C27.1315 5.29418 28.7041 6.29486 29.5777 7.97015L45.6838 38.4851C46.5471 40.1267 46.5369 42.1055 45.6529 43.7808Z M24.7269 16.2905C23.5038 16.6728 22.7432 17.8871 22.7432 19.36C22.8048 20.2482 22.8562 21.1477 22.9179 22.0359C23.0926 25.4203 23.2674 28.7371 23.4421 32.1214C23.5038 33.2682 24.3157 34.1003 25.3641 34.1003C26.4125 34.1003 27.2348 33.212 27.2862 32.0539C27.2862 31.3568 27.2862 30.716 27.3478 30.0076C27.4609 27.8376 27.5842 25.6676 27.6973 23.4976C27.759 22.0922 27.872 20.6867 27.9337 19.2813C27.9337 18.7753 27.872 18.3256 27.6973 17.8758C27.1731 16.6166 25.95 15.9757 24.7269 16.2905Z"
            ])
        </div>

        @include('help-center.partials.section')

        <div class="help-center__footer d-flex flex-column justify-content-center align-items-center">
            <h4 class="color-primary font-weight-bold mb-3">Still have a question?</h4>
            <p class="fc-grey fs-1-4 mb-5">We are here to help. Send us an email and we will reply within 24 hours.</p>
            <a class="btn text-white fs-1-8 help-center__footer__button btn-primary btn-animation-y" href="mailto:tutorspacehelp@gmail.com">Contact Us</a>
        </div>


    </div>
</div>


@section('js')
@include('partials.nav-auth-js')
<script src="{{ asset('js/help-center/index.js') }}"></script>
@endsection


@endsection
