@extends('layouts.app')
@section('title', 'Reset Password - Tutor')

@section('body-class')
bg-grey-light body-login
@endsection

@section('content')
<div class="container login">
    <div class="login--left login--left-tutor">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="hidden" value="1" name="is_tutor">
            <h2 class="login__heading">Reset Password</h2>
            <p class="login__notice">
                @csrf
                No worries! Enter your email and we'll send instructions to reset your password.
            </p>
            <div class="p-relative">
                <input type="email" class="form-control login-form-input login-form-input-normal" placeholder="Email" value="{{ old('email') }}" name="email"
                    required>
                <svg class="input-icon">
                    <use xlink:href="{{asset('assets/sprite.svg#icon-mail')}}"></use>
                </svg>
                @if($errors->any())
                <span class="fs-1-4 ws-no-wrap p-absolute top-100 right-0 fc-red">
                    {{ $errors->first() }}
                </span>
                @endif
                @if (session('status'))
                    <div class="fs-1-4 ws-no-wrap p-absolute top-100 right-0 text-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="text-center">
                <button class="btn btn-tutor btn-send btn-animation-y">Send</button>
            </div>

            <p class="text-center fs-2">
                <span class="fc-grey">Back to </span><a href="{{ route('login.index.tutor') }}"
                    class="btn-link-tutor">Log in</a>
            </p>

            <p class="text-left fs-2">
                <span class="fc-grey">Questions? Email us at</span>
                <a href="mailto:tutorspaceusc@gmail.com" class="btn-link-tutor">tutorspaceusc@gmail.com</a>
            </p>

        </form>
    </div>

    <div class="login--right login--right-tutor">
        <svg class="btn-close" width="1em" height="1em" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
            data-back-href="{{ route('index') }}">
            {{-- for empty --}}
            <path class="btn-close-empty" fill-rule="evenodd"
                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path class="btn-close-empty" fill-rule="evenodd"
                d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
            <path class="btn-close-empty" fill-rule="evenodd"
                d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />

            {{-- for fill --}}
            <path class="btn-close-fill" fill-rule="evenodd"
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z" />
        </svg>
        <svg class="svg-reset-password-right-tutor" width="361" height="479" viewBox="0 0 361 479" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M272.479 133.169C272.647 131.538 273.28 130.256 274.381 129.323C275.526 128.355 276.993 127.962 278.784 128.145C280.575 128.329 281.912 129.009 282.797 130.185C283.726 131.325 284.107 132.711 283.94 134.343C283.772 135.974 283.117 137.274 281.972 138.243C280.871 139.175 279.426 139.55 277.635 139.367C275.844 139.183 274.485 138.521 273.556 137.381C272.671 136.205 272.312 134.801 272.479 133.169ZM275.25 125.552C274.61 125.124 274.039 124.423 273.536 123.446C273.036 122.43 272.852 121.285 272.983 120.012C273.109 118.778 273.521 117.896 274.219 117.364C274.96 116.797 275.984 116.419 277.29 116.231L282.062 115.574C284.104 115.26 285.197 114.407 285.34 113.015C285.417 112.259 285.106 111.563 284.407 110.929C283.748 110.298 282.523 109.891 280.733 109.708C279.101 109.541 277.547 109.603 276.069 109.894C274.596 110.145 273.393 110.504 272.461 110.972C271.837 110.385 271.324 109.709 270.919 108.944C270.519 108.139 270.372 107.22 270.478 106.185C270.584 105.15 270.974 104.286 271.649 103.591C272.327 102.856 273.208 102.303 274.291 101.931C275.419 101.524 276.711 101.274 278.168 101.182C279.665 101.094 281.288 101.14 283.039 101.319C287.735 101.8 291.168 103.217 293.34 105.571C295.555 107.889 296.49 110.739 296.143 114.121C295.491 120.488 290.577 124.106 281.401 124.975L275.25 125.552Z" fill="#CCD4DB"/>
            <path d="M86.1476 34.3998C86.6406 33.9614 87.1139 33.6142 87.5676 33.3582C88.0412 33.0616 88.5355 32.8256 89.0504 32.6501C89.7774 32.4024 90.4042 32.3072 90.9308 32.3644C91.4574 32.4216 91.9089 32.6058 92.2854 32.917C92.6819 33.1876 93.0133 33.5649 93.2796 34.0489C93.5459 34.5329 93.7823 35.0777 93.9887 35.6835C94.8246 38.137 94.9984 40.6809 94.5099 43.3153L99.154 45.4854C99.4856 46.6571 99.4118 47.7302 98.9325 48.7049C98.4532 49.6795 97.7138 50.3372 96.7143 50.6777C95.5027 51.0906 94.1253 50.9176 92.582 50.1587L91.4401 49.635C90.5981 50.8347 89.5275 51.9094 88.2284 52.8592C86.9699 53.8289 85.4622 54.6131 83.7054 55.2117C81.9183 55.8206 80.2606 56.1149 78.7324 56.0947C77.2146 56.1048 75.8468 55.8609 74.6292 55.363C73.4115 54.8651 72.3746 54.1535 71.5184 53.2282C70.6519 52.2726 69.9968 51.1436 69.553 49.8411C69.1711 48.7204 68.9971 47.664 69.031 46.6721C69.0649 45.6802 69.2409 44.7581 69.5591 43.906C69.8773 43.0538 70.2921 42.287 70.8037 41.6056C71.305 40.8939 71.8523 40.2679 72.4458 39.7277C71.5923 39.2071 70.8899 38.5844 70.3386 37.8594C69.8177 37.1242 69.4333 36.3931 69.1856 35.6661C68.8657 34.7271 68.7633 33.7816 68.8784 32.8296C68.9935 31.8776 69.3113 30.9749 69.8319 30.1214C70.3524 29.2679 71.0709 28.4991 71.9872 27.815C72.9338 27.1206 74.0735 26.5463 75.4063 26.0922C77.3145 25.442 78.7811 25.3311 79.8061 25.7594C80.8207 26.1575 81.5086 26.8865 81.8698 27.9467C82.0452 28.4616 82.1095 28.9975 82.0626 29.5544C82.046 30.101 81.9079 30.6382 81.6483 31.1662C81.2635 31.1282 80.8284 31.1413 80.3431 31.2052C79.8881 31.2588 79.4183 31.3682 78.9336 31.5333C78.1461 31.8017 77.5361 32.1447 77.1038 32.5625C76.6714 32.9803 76.5636 33.5072 76.7803 34.1433C76.9351 34.5976 77.292 35 77.8509 35.3505C78.3995 35.6707 79.0596 36.0205 79.8312 36.3999L87.5665 40.0523C87.4909 39.3343 87.3286 38.5106 87.0795 37.5813C86.8608 36.6416 86.5502 35.5811 86.1476 34.3998ZM76.6523 46.8644C77.0135 47.9245 77.6663 48.6994 78.6107 49.189C79.575 49.6379 80.7539 49.625 82.1472 49.1503C82.753 48.9439 83.3633 48.6514 83.9781 48.2729C84.5825 47.8641 85.1206 47.3596 85.5922 46.7594L77.7795 42.8799C77.166 43.4608 76.7605 44.1061 76.5628 44.8157C76.3954 45.5151 76.4252 46.198 76.6523 46.8644Z" fill="#CCD4DB"/>
            <path d="M45.6232 200.065C47.2004 199.774 48.6685 199.742 50.0277 199.969C51.4161 200.137 52.3275 200.714 52.762 201.7C53.0028 202.407 53.0745 203.196 52.977 204.067C52.8794 204.938 52.679 205.869 52.3757 206.86L40.7607 247.868C39.2719 248.128 37.9438 248.137 36.7763 247.894C35.638 247.592 34.8516 246.948 34.417 245.962C34.1762 245.255 33.9871 244.555 33.8497 243.862C33.7414 243.111 33.8239 242.195 34.0971 241.116L45.6232 200.065ZM36.8224 214.822C37.9512 218.135 37.8378 221.058 36.4821 223.59C35.1265 226.123 32.8805 227.923 29.7443 228.992C26.5638 230.076 23.6636 230.028 21.0437 228.85C18.468 227.657 16.6157 225.404 15.4868 222.091C14.3731 218.823 14.4719 215.929 15.7834 213.412C17.139 210.879 19.4071 209.071 22.5875 207.988C25.7238 206.919 28.6019 206.974 31.2218 208.152C33.8418 209.33 35.7086 211.553 36.8224 214.822ZM23.5042 219.36C23.9558 220.685 24.5374 221.596 25.249 222.093C25.9898 222.531 26.7357 222.622 27.4866 222.366C28.2376 222.11 28.7506 221.59 29.0258 220.806C29.3301 219.963 29.2565 218.879 28.805 217.554C28.3685 216.273 27.7799 215.413 27.0391 214.975C26.3425 214.522 25.6187 214.424 24.8677 214.68C24.1168 214.936 23.5817 215.463 23.2623 216.262C22.9871 217.046 23.0678 218.079 23.5042 219.36ZM71.516 225.704C72.6448 229.017 72.5314 231.94 71.1758 234.472C69.8201 237.005 67.5742 238.805 64.4379 239.874C61.2574 240.958 58.3573 240.911 55.7373 239.733C53.1616 238.54 51.3093 236.287 50.1805 232.974C49.0667 229.705 49.1656 226.812 50.477 224.294C51.8327 221.762 54.1007 219.953 57.2812 218.87C60.4175 217.801 63.2955 217.856 65.9155 219.034C68.5354 220.212 70.4022 222.435 71.516 225.704ZM58.1979 230.242C58.6494 231.567 59.231 232.478 59.9427 232.975C60.6835 233.413 61.4293 233.504 62.1803 233.248C62.9312 232.992 63.4443 232.472 63.7194 231.688C64.0238 230.845 63.9502 229.761 63.4986 228.436C63.0621 227.155 62.4735 226.295 61.7327 225.857C61.0361 225.405 60.3123 225.306 59.5614 225.562C58.8105 225.818 58.2753 226.345 57.9559 227.144C57.6808 227.928 57.7614 228.961 58.1979 230.242Z" fill="#CCD4DB"/>
            <path d="M23.7191 87.5373C24.3221 87.3303 25.0059 87.1533 25.7705 87.0062C26.5671 86.8584 27.2853 86.7765 27.9251 86.7606C28.6608 86.7424 29.3666 86.8049 30.0424 86.9481C30.7493 87.0586 31.3791 87.283 31.9317 87.6214C32.4835 87.9278 32.9264 88.3649 33.2606 88.9328C33.5949 89.5007 33.7727 90.2165 33.7941 91.0802L34.1112 103.844L38.3819 103.738C38.5826 104.085 38.786 104.544 38.9923 105.115C39.1985 105.687 39.3096 106.292 39.3255 106.932C39.3557 108.147 39.1052 109.018 38.5741 109.543C38.043 110.069 37.3616 110.342 36.5298 110.362L34.2745 110.418L34.4152 116.081C34.0649 116.153 33.539 116.246 32.8376 116.36C32.137 116.505 31.4668 116.586 30.827 116.602C30.1232 116.619 29.4986 116.603 28.9532 116.552C28.4078 116.502 27.9404 116.369 27.5509 116.155C27.1927 115.908 26.912 115.563 26.7089 115.12C26.5059 114.677 26.3948 114.071 26.3757 113.303L26.309 110.616L14.2647 110.915C13.5194 110.55 12.8657 110.006 12.3036 109.284C11.7726 108.528 11.4937 107.607 11.4667 106.519C11.4516 105.912 11.5149 105.238 11.6565 104.498C11.7982 103.758 12.0542 103.112 12.4246 102.558L23.7191 87.5373ZM26.3534 95.0102L26.2095 95.0138L20.0516 104.194L26.5775 104.031L26.3534 95.0102Z" fill="#CCD4DB" fill-opacity="0.6"/>
            <path d="M157.99 89.2914C156.185 88.9353 154.564 88.4729 153.127 87.9041C151.729 87.343 150.555 86.6833 149.603 85.9249C148.652 85.1665 147.96 84.3368 147.526 83.4358C147.1 82.4956 146.991 81.4957 147.2 80.4361C147.417 79.3373 147.912 78.4769 148.687 77.8551C149.462 77.2333 150.285 76.784 151.155 76.5071C152.091 77.548 153.125 78.5062 154.257 79.3817C155.397 80.2181 156.928 80.8259 158.851 81.2051C160.696 81.5689 162.092 81.4161 163.039 80.7468C163.987 80.0774 164.576 79.1541 164.809 77.9768C165.033 76.8387 164.866 75.8272 164.306 74.9423C163.786 74.065 162.682 73.46 160.995 73.1272C159.935 72.9182 159.029 72.8618 158.276 72.958C157.523 73.0541 156.653 73.229 155.665 73.4827C153.758 73.025 152.328 72.2129 151.376 71.0466C150.47 69.8488 150.215 68.2492 150.61 66.2477C150.633 66.13 150.66 65.9926 150.691 65.8357C150.73 65.6395 150.823 65.2705 150.97 64.7288L153.442 55.9205C153.892 54.2562 154.685 53.0264 155.82 52.2311C156.956 51.4357 158.367 51.2045 160.055 51.5373L177.008 54.8809C177.158 55.359 177.282 55.9745 177.378 56.7273C177.474 57.4801 177.445 58.249 177.29 59.0339C176.996 60.5251 176.453 61.5189 175.662 62.0153C174.871 62.5116 173.966 62.6591 172.945 62.4579L161.643 60.2288L160.14 65.681C160.924 65.6318 161.704 65.6023 162.481 65.5924C163.297 65.5902 164.293 65.7052 165.471 65.9374C167.511 66.3399 169.215 67.0021 170.583 67.9241C171.958 68.8069 173.012 69.8709 173.745 71.1163C174.517 72.3694 174.98 73.7449 175.133 75.2428C175.325 76.7485 175.262 78.3058 174.945 79.9148C174.628 81.5238 174.047 83.0198 173.204 84.4027C172.36 85.7856 171.238 86.93 169.836 87.8359C168.442 88.7025 166.757 89.2875 164.781 89.5909C162.844 89.902 160.581 89.8022 157.99 89.2914Z" fill="#CCD4DB"/>
            <path d="M124.315 180.375C123.75 180.397 123.228 180.384 122.751 180.335C122.309 180.33 121.869 180.305 121.432 180.26C119.76 180.089 118.56 179.645 117.829 178.926C117.098 178.208 116.806 177.133 116.953 175.7C117.047 174.785 117.272 173.763 117.629 172.633L117.816 171.989L112.444 171.439L109.99 178.908C109.425 178.93 108.903 178.917 108.426 178.868C107.984 178.863 107.544 178.838 107.107 178.793C105.435 178.622 104.234 178.178 103.504 177.459C102.773 176.741 102.481 175.666 102.628 174.233C102.722 173.318 102.947 172.296 103.304 171.166L103.49 170.522L99.0139 170.064C98.8598 169.605 98.6959 169.046 98.5224 168.385C98.3529 167.684 98.3028 166.995 98.3721 166.319C98.5147 164.926 98.9349 163.964 99.6327 163.432C100.374 162.865 101.223 162.63 102.178 162.728L105.938 163.113L107.869 157.219L102.019 156.62C101.865 156.162 101.701 155.602 101.528 154.941C101.358 154.24 101.308 153.551 101.377 152.875C101.52 151.482 101.94 150.52 102.638 149.988C103.38 149.421 104.228 149.186 105.183 149.284L110.316 149.81L112.836 142.287C113.401 142.265 113.922 142.278 114.4 142.327C114.877 142.376 115.335 142.422 115.773 142.467C117.444 142.638 118.645 143.083 119.375 143.801C120.15 144.484 120.464 145.541 120.317 146.974C120.272 147.411 120.182 147.905 120.045 148.454C119.908 149.003 119.752 149.55 119.575 150.094L119.329 150.733L124.641 151.277L127.161 143.754C127.726 143.732 128.247 143.745 128.725 143.794C129.202 143.843 129.66 143.89 130.098 143.934C131.769 144.105 132.97 144.55 133.7 145.268C134.475 145.951 134.789 147.008 134.642 148.441C134.597 148.878 134.507 149.372 134.37 149.921C134.233 150.47 134.077 151.017 133.9 151.561L133.654 152.2L138.131 152.658C138.368 153.085 138.552 153.646 138.682 154.343C138.851 155.044 138.899 155.753 138.826 156.469C138.683 157.862 138.243 158.822 137.506 159.349C136.808 159.881 136.001 160.1 135.086 160.006L131.207 159.609L129.276 165.503L135.125 166.102C135.363 166.528 135.547 167.09 135.677 167.787C135.846 168.488 135.894 169.196 135.821 169.913C135.678 171.305 135.238 172.265 134.5 172.793C133.803 173.325 132.996 173.544 132.081 173.45L126.769 172.906L124.315 180.375ZM114.951 164.036L120.263 164.58L122.194 158.686L116.881 158.142L114.951 164.036Z" fill="#CCD4DB"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M213.986 162.569C208.171 166.074 202.457 167.768 199.775 167.076C193.05 165.343 192.432 140.74 197.635 131.04C202.839 121.341 229.591 117.113 230.939 136.331C231.407 143.001 228.606 148.953 224.468 153.81L231.888 188.392H210.336L213.986 162.569Z" fill="#B28B67"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M226.125 158.137C228.83 146.103 236.536 137.899 235.359 132.521C234.182 127.142 229.085 125.831 229.085 125.831C229.085 125.831 226.449 115.167 212.082 116.76C197.715 118.352 188.946 124.318 192.733 137.447C196.214 137.447 200.416 136.188 206.227 138.345C208.993 139.372 210.183 144.712 210.183 144.712H212.809C212.809 144.712 216.632 138.375 220.348 140.054C224.064 141.734 222.037 148.215 222.037 148.215L223.331 158.137H226.125Z" fill="#191847"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M277.948 301.957H208.677L199.6 413.36H302.717L277.948 301.957Z" fill="#C5CFD6"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M277.948 301.957H256.644L243.892 413.36H302.717L277.948 301.957Z" fill="black" fill-opacity="0.1"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M170.617 324.025C178.401 340.567 190.565 380.721 190.565 380.721L180.238 385.448C180.238 385.448 154.036 343.238 138.023 314.385C138.77 320.881 139.529 328.194 140.234 335.882C141.902 354.093 140.235 393.438 139.337 404.804C138.773 411.947 129.086 410.45 128.182 404.785C128.029 403.826 127.405 400.457 126.473 395.431C121.907 370.786 109.954 306.284 109.933 290.49C109.925 284.136 122.315 278.427 129.701 282.869C134.774 277.445 144.376 274.319 149.892 283.278C153.399 288.974 161.731 305.144 170.617 324.025Z" fill="#B28B67"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M189.826 365.855L154.383 281.73C145.893 268.045 122.087 284.514 124.982 292.452C131.556 310.472 164.989 368.81 166.947 374.179L189.826 365.855Z" fill="#2F3676"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M189.008 375.973C189.705 375.031 191.047 374.806 191.939 375.564C193.393 376.799 195.372 378.608 196.103 379.879C197.316 381.983 198.943 386.426 198.943 386.426C196.506 387.835 155.145 411.762 155.145 411.762C155.145 411.762 150.179 407.094 153.597 404.515C157.016 401.937 159.239 400.166 159.239 400.166L174.294 379.383C174.625 378.927 175.267 378.834 175.713 379.178L178.771 381.536C178.771 381.536 183.093 381.159 185.222 379.927C186.464 379.209 187.969 377.376 189.008 375.973Z" fill="#191847"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M138.911 399.331C139.987 398.864 141.262 399.341 141.657 400.444C142.3 402.243 143.11 404.8 143.11 406.267C143.11 408.697 142.302 413.359 142.302 413.359C139.488 413.359 91.7281 413.359 91.7281 413.359C91.7281 413.359 89.7568 406.829 94.0041 406.308C98.2514 405.788 101.061 405.368 101.061 405.368L124.469 394.912C124.984 394.682 125.587 394.923 125.801 395.445L127.272 399.019C127.272 399.019 131.204 400.857 133.662 400.857C135.095 400.857 137.312 400.025 138.911 399.331Z" fill="#191847"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M107.449 296.955C107.449 320.823 118.762 376.498 118.769 381.753L143.11 381.772C143.11 381.772 137.766 307.255 139.32 306.452C140.874 305.649 203.029 312.67 221.67 312.67C248.551 312.67 259.671 295.685 260.573 264.223H207.323C196.481 265.385 139.928 276.814 118.925 280.743C109.933 282.425 107.449 290.38 107.449 296.955Z" fill="#2F3676"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M144.283 285.486L166.026 257.415L176.424 270.691L152.396 289.788C147.279 301.04 144.048 306.045 142.704 304.803C141.571 303.756 141.832 302.397 142.072 301.145C142.26 300.17 142.434 299.26 141.928 298.613C140.771 297.136 135.641 298.796 130.84 300.579C126.04 302.362 126.845 299.772 127.719 298.357C131.871 293.927 137.392 289.637 144.283 285.486ZM297.775 300.26C294.428 295.349 278.325 245.161 278.325 245.161L259.752 247.846C259.752 247.846 284.758 300.889 286.606 304.09C289.008 308.248 286.881 315.078 285.439 319.71C285.216 320.426 285.009 321.09 284.838 321.684C287.865 322.555 289.017 320.826 290.231 319.002C291.603 316.942 293.055 314.762 297.377 316.076C299.048 316.584 300.652 317.236 302.22 317.874C307.634 320.075 312.609 322.097 318.324 317.364C319.23 316.614 319.993 314.161 317.114 312.732C309.942 309.173 299.412 302.661 297.775 300.26Z" fill="#B28B67"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M214.574 174.746L206.7 174.51C198.101 209.383 179.203 242.628 150.006 274.244L179.182 300.971C206.768 257.92 221.53 215.428 214.574 174.746Z" fill="#191847"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M261.652 266.495L193.179 276.119C193.179 276.119 208.858 215.02 203.184 174.652L223.407 168.677C243.303 192.456 252.396 223.898 261.652 266.495Z" fill="#DDE3E9"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M296.893 291.414C277.552 208.134 223.861 168.612 223.861 168.612L223.847 168.629C223.843 168.625 223.84 168.62 223.836 168.616L222.488 168.806C220.08 169.229 215.158 170.141 215.158 170.141L212.168 185.08C215.036 211.23 217.669 291.329 217.669 291.329L262.489 285.03C262.921 288.659 263.268 292.351 263.518 296.104L296.893 291.414Z" fill="#2F3676"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M262.53 285.381C260.674 269.575 257.194 254.978 252.977 241.918C253.988 257.976 254.121 277.45 250.044 287.136L262.53 285.381Z" fill="black" fill-opacity="0.1"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M248.746 259.257L225.169 252.097L226.613 262.368L248.746 259.257Z" fill="white" fill-opacity="0.2"/>
        </svg>
    </div>
</div>

{{-- bg shapes for tutors --}}
@include('auth.partials.bg_shapes_tutor')

@endsection


