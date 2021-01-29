@extends('layouts.app')
@section('title', 'Invite to be Tutor')

@section('links-in-head')

@endsection

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

<div class="container-fluid invite">
    <div class="invite__header-bg bg-primary"></div>

    <div class="p-relative invite-content">
        <div class="content-container">
            <h2 class="heading">Earn $5 for tutors you invite.</h2>
            <p class="content">Invite a friend to become a tutor at TutorSpace. You both get $5 bonus. (They have to achieve A or A- in the course they want to teach)</p>
            <form id="invite-form" class="input-container" method="POST" action="{{ route('invite-to-be-tutor--email') }}">
                @csrf
                <input type="email" placeholder="Add your friend's email" name="email" required>
                <button class="btn" type="button" id="btn-submit">Send Invitation</button>
            </form>
        </div>
        <div class="svg-container">
            <svg width="325" height="374" viewBox="0 0 325 374" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path d="M115.669 244.581L107.696 225.683L100.855 209.469L95.2611 196.203C94.2635 193.848 92.3726 191.985 90.003 191.022C87.6333 190.059 84.9784 190.075 82.6203 191.065L6.57624 223.139C4.22687 224.141 2.36866 226.03 1.4062 228.396C0.443735 230.761 0.454966 233.411 1.43746 235.768L21.853 284.146C22.3448 285.313 23.0617 286.371 23.9628 287.261C24.8639 288.151 25.9315 288.854 27.1047 289.331C28.2778 289.809 29.5335 290.05 30.7999 290.042C32.0664 290.034 33.3189 289.776 34.4857 289.284L110.53 257.219C112.885 256.222 114.749 254.331 115.712 251.962C116.676 249.593 116.66 246.939 115.669 244.581ZM109.695 255.245L33.6594 287.31C31.8263 288.083 29.7612 288.097 27.9177 287.349C26.0742 286.601 24.603 285.152 23.8272 283.32L3.4117 234.942C2.773 233.429 2.65397 231.747 3.07323 230.16C3.2499 229.449 3.53405 228.769 3.91593 228.144C4.73159 226.79 5.95499 225.729 7.41082 225.113L83.4545 193.048C85.0024 192.394 86.7256 192.28 88.346 192.726C89.0505 192.914 89.7219 193.209 90.3369 193.601C91.651 194.413 92.6792 195.614 93.2782 197.037L99.1278 210.906V210.914L105.465 225.922L113.694 245.416C114.467 247.249 114.48 249.315 113.73 251.158C112.98 253.001 111.529 254.471 109.695 255.245Z" fill="#CCCCCC"/>
                <path d="M57.9622 239.913C55.9317 240.774 53.6857 240.99 51.5281 240.532L2.11816 229.954L2.56727 227.858L51.9773 238.437C53.6824 238.795 55.4558 238.631 57.0664 237.967C58.6769 237.303 60.0499 236.169 61.0063 234.713L89.084 191.598L90.8806 192.768L62.8028 235.882C61.6276 237.678 59.9418 239.082 57.9622 239.913Z" fill="#CCCCCC"/>
                <path d="M57.8523 252.751C64.9558 252.751 70.7143 246.994 70.7143 239.893C70.7143 232.791 64.9558 227.034 57.8523 227.034C50.7488 227.034 44.9902 232.791 44.9902 239.893C44.9902 246.994 50.7488 252.751 57.8523 252.751Z" fill="#6C63FF"/>
                <path d="M115.67 244.581L107.697 225.683L100.855 209.469L95.2621 196.203C94.2645 193.848 92.3736 191.985 90.004 191.022C87.6343 190.059 84.9794 190.075 82.6213 191.065L6.57722 223.139C4.22785 224.141 2.36963 226.03 1.40717 228.396C0.444712 230.761 0.455943 233.411 1.43844 235.768L21.854 284.146C22.3458 285.313 23.0627 286.371 23.9638 287.261C24.8649 288.151 25.9325 288.854 27.1057 289.331C28.2788 289.809 29.5344 290.05 30.8009 290.042C32.0674 290.034 33.3198 289.776 34.4867 289.284L110.531 257.219C112.886 256.222 114.75 254.331 115.713 251.962C116.677 249.593 116.661 246.939 115.67 244.581ZM109.696 255.245L33.6604 287.31C31.8272 288.083 29.7622 288.097 27.9187 287.349C26.0751 286.601 24.604 285.152 23.8282 283.32L3.41268 234.942C2.77398 233.429 2.65495 231.747 3.07421 230.16C3.25087 229.449 3.53502 228.769 3.91691 228.144C4.73256 226.79 5.95597 225.729 7.41179 225.113L83.4555 193.048C85.0034 192.394 86.7266 192.28 88.347 192.726C89.0515 192.914 89.7229 193.209 90.3378 193.601C91.652 194.413 92.6802 195.614 93.2792 197.037L99.1288 210.906V210.914L105.466 225.922L113.695 245.416C114.468 247.249 114.481 249.315 113.731 251.158C112.981 253.001 111.53 254.471 109.696 255.245Z" fill="#F3F3F3"/>
                <path d="M309.801 126.085L313.874 116.069L317.367 107.475L320.227 100.446C320.733 99.1963 320.723 97.797 320.198 96.5547C319.674 95.3125 318.679 94.3287 317.43 93.8191L277.131 77.4294C275.881 76.9272 274.485 76.9389 273.244 77.4618C272.004 77.9848 271.02 78.9766 270.508 80.2214L260.085 105.864C259.833 106.482 259.706 107.144 259.71 107.811C259.715 108.479 259.85 109.139 260.11 109.754C260.369 110.369 260.747 110.927 261.222 111.396C261.697 111.865 262.26 112.236 262.879 112.487L303.175 128.88C304.425 129.386 305.824 129.376 307.066 128.852C308.309 128.329 309.292 127.333 309.801 126.085ZM303.6 127.833L263.307 111.444C262.335 111.048 261.56 110.284 261.152 109.318C260.744 108.352 260.735 107.263 261.129 106.292L271.552 80.6494C271.877 79.8475 272.46 79.1762 273.208 78.7407C273.539 78.5416 273.898 78.3942 274.273 78.3036C275.082 78.1029 275.934 78.1634 276.706 78.4763L317.002 94.869C317.823 95.2021 318.508 95.8022 318.946 96.5722C319.138 96.905 319.278 97.2653 319.361 97.6406C319.549 98.4329 319.484 99.2639 319.177 100.018L316.188 107.367L316.185 107.37L312.953 115.327L308.754 125.66C308.359 126.631 307.594 127.406 306.627 127.814C305.661 128.221 304.572 128.228 303.6 127.833Z" fill="#CCCCCC"/>
                <path d="M57.9632 239.913C55.9327 240.774 53.6866 240.99 51.5291 240.532L2.11914 229.954L2.56825 227.858L51.9783 238.437C53.6834 238.795 55.4568 238.631 57.0673 237.967C58.6779 237.303 60.0509 236.169 61.0073 234.713L89.085 191.598L90.8816 192.768L62.8038 235.882C61.6286 237.678 59.9428 239.082 57.9632 239.913Z" fill="#F3F3F3"/>
                <path d="M290.031 102.835C288.953 102.399 288.036 101.643 287.402 100.668L272.928 78.3079L273.876 77.6943L288.35 100.055C288.852 100.824 289.575 101.424 290.422 101.776C291.27 102.129 292.205 102.218 293.104 102.032L319.64 96.4269L319.874 97.5326L293.338 103.137C292.23 103.369 291.079 103.264 290.031 102.835Z" fill="#CCCCCC"/>
                <path d="M69.7143 239.893C69.7143 246.442 64.4037 251.751 57.8523 251.751C51.3008 251.751 45.9902 246.442 45.9902 239.893C45.9902 233.344 51.3008 228.034 57.8523 228.034C64.4037 228.034 69.7143 233.344 69.7143 239.893Z" fill="#6C63FF" stroke="#F1F1F1" stroke-width="2"/>
                <path d="M294.439 107.227C291.987 109.679 288.012 109.679 285.559 107.226C283.106 104.774 283.106 100.798 285.558 98.3462C288.009 95.8945 291.985 95.8949 294.438 98.3475C296.89 100.8 296.891 104.776 294.439 107.227Z" fill="#6C63FF" stroke="#E7E7E7"/>
                <path d="M199.554 114.438C199.554 114.438 182.82 103.873 166.967 116.199L156.398 226.26C156.398 226.26 196.031 257.077 205.719 228.021L199.554 114.438Z" fill="#6C63FF"/>
                <path d="M203.639 364.596H213.769L217.142 325.679L203.638 325.537L203.639 364.596Z" fill="#FFB8B8"/>
                <path d="M233.304 373.999L201.469 374L201.469 361.704L221.003 361.703C224.266 361.703 227.394 362.998 229.701 365.304C232.008 367.61 233.304 370.737 233.304 373.999Z" fill="#2F2E41"/>
                <path d="M167.028 364.596H156.898L152.079 325.537H167.029L167.028 364.596Z" fill="#FFB8B8"/>
                <path d="M149.663 361.703H169.198V373.999H137.363C137.363 370.738 138.659 367.61 140.966 365.304C143.272 362.998 146.401 361.703 149.663 361.703Z" fill="#2F2E41"/>
                <path d="M225.535 226.7L216.728 357.893L203.077 357.453L185.022 252.235L168.289 356.132L152.436 357.012L148.032 221.418C148.032 221.418 214.967 206.449 225.535 226.7Z" fill="#2F2E41"/>
                <path d="M183.977 103.302C195.184 103.302 204.27 94.2187 204.27 83.0144C204.27 71.8102 195.184 62.7273 183.977 62.7273C172.77 62.7273 163.685 71.8102 163.685 83.0144C163.685 94.2187 172.77 103.302 183.977 103.302Z" fill="#FFB8B8"/>
                <path d="M196.471 110.476L201.756 113.998C201.756 113.998 223.774 113.998 225.535 127.206C227.297 140.413 232.141 230.663 226.856 230.663C221.572 230.663 220.691 223.619 220.691 223.619C220.691 223.619 217.168 224.499 210.123 231.543C203.077 238.587 198.673 238.587 196.031 228.021C193.389 217.455 175.775 136.451 192.508 121.482L196.471 110.476Z" fill="#2F2E41"/>
                <path d="M170.931 110.476L165.646 113.998C165.646 113.998 143.628 113.998 141.867 127.206C140.106 140.413 135.262 230.663 140.546 230.663C145.83 230.663 146.711 223.619 146.711 223.619C146.711 223.619 150.234 224.499 157.28 231.543C164.325 238.587 168.729 238.587 171.371 228.021C174.013 217.455 191.628 136.451 174.894 121.482L170.931 110.476Z" fill="#2F2E41"/>
                <path d="M200.441 95.3844C201.949 93.7951 202.951 91.7932 203.318 89.6333C203.685 87.4735 203.401 85.2533 202.502 83.2551C201.604 81.257 200.131 79.5712 198.271 78.4123C196.412 77.2533 194.249 76.6736 192.059 76.7468C189.253 76.8405 186.609 77.9886 183.931 78.8311C179.872 80.2114 175.542 80.6012 171.302 79.968C167.037 79.3059 163.188 77.0339 160.548 73.6197C158.037 70.17 157.254 65.3851 159.028 61.5048C161.076 57.0251 165.859 54.5568 170.358 52.5512C172.173 51.643 174.111 51.0063 176.111 50.6617C177.113 50.4953 178.138 50.5376 179.123 50.7857C180.107 51.0339 181.03 51.4826 181.833 52.1038C183.098 53.1911 183.839 54.8253 185.215 55.7676C186.764 56.8282 188.776 56.8004 190.644 56.9873C194.852 57.4084 198.831 59.1002 202.054 61.8377C205.276 64.5751 207.589 68.2286 208.684 72.312C209.779 76.3955 209.604 80.7154 208.183 84.6972C206.762 88.6791 204.163 92.1341 200.73 94.6028L200.441 95.3844Z" fill="#2F2E41"/>
                <path d="M96.92 218.837C96.6452 217.569 96.6519 216.256 96.9395 214.992C97.2271 213.727 97.7887 212.54 98.5846 211.516C99.3805 210.491 100.391 209.653 101.546 209.062C102.701 208.47 103.971 208.139 105.268 208.091L118.75 189.106L127.44 197.955L114.573 217.267C114.509 219.45 113.646 221.534 112.148 223.123C110.65 224.713 108.62 225.697 106.444 225.891C104.268 226.084 102.097 225.473 100.341 224.173C98.586 222.873 97.3686 220.974 96.92 218.837Z" fill="#FFB8B8"/>
                <path d="M216.418 236.168C215.469 235.283 214.726 234.201 214.24 232.998C213.754 231.795 213.538 230.501 213.607 229.205C213.676 227.91 214.029 226.645 214.639 225.501C215.25 224.356 216.104 223.36 217.142 222.581L217.381 199.299L229.568 201.61L230.021 224.809C231.214 226.639 231.694 228.842 231.371 231.002C231.047 233.162 229.943 235.129 228.266 236.529C226.589 237.929 224.457 238.665 222.273 238.599C220.09 238.532 218.007 237.667 216.418 236.168Z" fill="#FFB8B8"/>
                <path d="M148.417 181.178L144.949 125.885L143.966 122.021C143.966 122.021 108.909 167.09 108.827 200.994C108.827 200.994 126.001 209.359 128.643 203.196C129.681 200.775 133.226 197.186 148.417 181.178Z" fill="#2F2E41"/>
                <path d="M222.453 125.885L225.622 127.892C225.622 127.892 236.971 177.827 233.902 211.292C233.902 211.292 215.848 219.657 213.205 213.493C210.563 207.33 222.453 125.885 222.453 125.885Z" fill="#2F2E41"/>
                <path d="M324.173 373.948H9.38871C9.16958 373.948 8.95945 373.861 8.8045 373.706C8.64956 373.551 8.5625 373.341 8.5625 373.122C8.5625 372.903 8.64956 372.692 8.8045 372.538C8.95945 372.383 9.16958 372.296 9.38871 372.296H324.173C324.393 372.296 324.603 372.383 324.758 372.538C324.913 372.692 325 372.903 325 373.122C325 373.341 324.913 373.551 324.758 373.706C324.603 373.861 324.393 373.948 324.173 373.948Z" fill="#3F3D56"/>
                </g>
                <path d="M110.299 29.1449L106.396 19.6198L103.048 11.4477L100.31 4.76191C99.8217 3.575 98.8548 2.61941 97.6215 2.10472C96.3882 1.59002 94.989 1.5582 93.7309 2.01624L53.157 16.8452C51.9033 17.3089 50.8943 18.2216 50.3499 19.3846C49.8054 20.5475 49.7695 21.8665 50.2499 23.0543L60.2428 47.4374C60.4835 48.0255 60.8446 48.563 61.3053 49.0193C61.766 49.4756 62.3174 49.8416 62.928 50.0966C63.5386 50.3516 64.1964 50.4904 64.8638 50.5052C65.5312 50.5201 66.1952 50.4106 66.8178 50.183L107.392 35.3582C108.648 34.8969 109.66 33.9838 110.205 32.8191C110.75 31.6543 110.784 30.333 110.299 29.1449ZM106.983 34.3632L66.4136 49.1881C65.4355 49.5455 64.3472 49.5217 63.3877 49.1219C62.4282 48.7221 61.6759 47.979 61.2961 47.0558L51.3032 22.6727C50.9905 21.9101 50.9544 21.0713 51.2004 20.2873C51.3047 19.9362 51.4651 19.6022 51.6762 19.2968C52.1274 18.6351 52.7887 18.1252 53.5655 17.8402L94.1391 3.01535C94.965 2.71287 95.8748 2.68209 96.7215 2.92798C97.0897 3.03226 97.4389 3.18925 97.7567 3.39345C98.4363 3.81697 98.9591 4.43014 99.2522 5.14753L102.115 12.1373L102.115 12.1414L105.217 19.7058L109.245 29.5306C109.623 30.4548 109.598 31.483 109.173 32.3892C108.749 33.2954 107.961 34.0054 106.983 34.3632Z" fill="#CCCCCC"/>
                <path d="M79.9667 25.9606C78.8833 26.3588 77.6964 26.4329 76.5668 26.1731L50.6999 20.1707L50.9697 19.1346L76.8366 25.137C77.7293 25.3406 78.6663 25.2855 79.5254 24.9788C80.3845 24.6721 81.1259 24.1282 81.6528 23.4178L97.1277 2.37788L98.0558 2.98687L82.5809 24.0267C81.9333 24.9032 81.0229 25.5767 79.9667 25.9606Z" fill="#CCCCCC"/>
                <path d="M86.186 26.1265C86.0835 29.3585 83.2157 31.9479 79.7217 31.8489C76.2276 31.75 73.5291 29.0031 73.6317 25.771C73.7342 22.539 76.602 19.9496 80.0961 20.0486C83.5902 20.1475 86.2886 22.8944 86.186 26.1265Z" fill="#6C63FF" stroke="#E7E7E7"/>
                <defs>
                <clipPath id="clip0">
                <rect width="325" height="324" fill="white" transform="translate(0 50)"/>
                </clipPath>
                </defs>
            </svg>
        </div>
    </div>

    <div class="invite__footer d-flex flex-column justify-content-center align-items-center">
        <h4 class="color-primary font-weight-bold mb-3">Still have a question?</h4>
        <p class="fc-grey fs-1-4 mb-5">We are here to help. Send us an email and we will reply within 24 hours.</p>
        <a class="btn text-white fs-1-8 invite__footer__button btn-primary btn-animation-y" href="mailto:tutorspacehelp@gmail.com">Contact Us</a>
    </div>
</div>

@endsection



@section('js')
<script>
@auth
$('#btn-submit').click(function() {
    $('form').submit();
});
@else
$('#invite-form').submit(function() {
    $('.overlay-student').show();
    return false;
})
$('#btn-submit').click(function() {
    $('.overlay-student').show();
});
@endauth
</script>
@include('partials.nav-auth-js')
@endsection


