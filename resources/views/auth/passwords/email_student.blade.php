@extends('layouts.app')
@section('title', 'Reset Password - Student')

@section('body-class')
bg-grey-light body-login
@endsection

@section('content')
<div class="container login">
    <div class="login--left login--left-student">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="hidden" value="0" name="is_tutor">
            <h2 class="login__heading">Reset Password</h2>
            <p class="login__notice">
                @csrf
                No worries! Enter your email and we'll send instructions to reset your password.
            </p>
            <div class="p-relative">
                <input type="email" class="form-control login-form-input login-form-input-normal @if($errors->any()) invalid @endif" placeholder="Email" value="{{ old('email') }}" name="email"
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
                <button class="btn btn-student btn-send btn-animation-y">Send</button>
            </div>

            <p class="text-center fs-2">
                <span class="fc-grey">Back to </span><a href="{{ route('login.index.student') }}"
                    class="btn-link-student">Log in</a>
            </p>

            <p class="text-left fs-2">
                <span class="fc-grey">Questions? Email us at</span>
                <a href="mailto:tutorspaceusc@gmail.com" class="btn-link-student">tutorspaceusc@gmail.com</a>
            </p>

        </form>
    </div>

    <div class="login--right login--right-student">
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
        <svg class="svg-reset-password-right-student" width="421" height="489" viewBox="0 0 421 489" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M49.6125 35.1362C50.1054 34.6978 50.5787 34.3505 51.0324 34.0945C51.5061 33.7979 52.0004 33.5619 52.5153 33.3865C53.2423 33.1388 53.869 33.0435 54.3956 33.1007C54.9222 33.158 55.3738 33.3422 55.7503 33.6534C56.1467 33.924 56.4781 34.3013 56.7444 34.7852C57.0107 35.2692 57.2471 35.8141 57.4535 36.4199C58.2895 38.8734 58.4632 41.4173 57.9748 44.0516L62.6188 46.2217C62.9504 47.3934 62.8766 48.4666 62.3974 49.4412C61.9181 50.4159 61.1787 51.0735 60.1791 51.4141C58.9675 51.8269 57.5901 51.6539 56.0469 50.8951L54.905 50.3714C54.0629 51.5711 52.9923 52.6458 51.6932 53.5955C50.4347 54.5652 48.927 55.3494 47.1702 55.948C45.3831 56.5569 43.7255 56.8513 42.1973 56.831C40.6794 56.8411 39.3117 56.5972 38.094 56.0993C36.8764 55.6014 35.8395 54.8898 34.9833 53.9645C34.1168 53.0089 33.4616 51.8799 33.0178 50.5774C32.636 49.4567 32.462 48.4004 32.4959 47.4084C32.5298 46.4165 32.7058 45.4944 33.024 44.6423C33.3421 43.7901 33.757 43.0234 34.2686 42.342C34.7698 41.6303 35.3172 41.0043 35.9106 40.464C35.0571 39.9435 34.3548 39.3207 33.8035 38.5958C33.2825 37.8605 32.8982 37.1294 32.6505 36.4024C32.3305 35.4634 32.2281 34.5179 32.3432 33.5659C32.4584 32.6139 32.7762 31.7112 33.2967 30.8577C33.8173 30.0042 34.5357 29.2354 35.452 28.5513C36.3987 27.8569 37.5384 27.2826 38.8711 26.8285C40.7794 26.1783 42.246 26.0674 43.2709 26.4957C44.2855 26.8938 44.9734 27.6229 45.3346 28.683C45.5101 29.198 45.5744 29.7339 45.5275 30.2907C45.5108 30.8373 45.3727 31.3746 45.1131 31.9025C44.7283 31.8646 44.2933 31.8776 43.808 31.9415C43.353 31.9951 42.8831 32.1045 42.3985 32.2697C41.6109 32.538 41.001 32.881 40.5686 33.2988C40.1363 33.7166 40.0284 34.2435 40.2452 34.8796C40.4 35.334 40.7568 35.7364 41.3157 36.0868C41.8643 36.407 42.5244 36.7568 43.296 37.1362L51.0313 40.7886C50.9557 40.0706 50.7934 39.247 50.5444 38.3176C50.3256 37.378 50.015 36.3175 49.6125 35.1362ZM40.1171 47.6007C40.4784 48.6608 41.1312 49.4357 42.0755 49.9253C43.0399 50.3743 44.2187 50.3614 45.612 49.8866C46.2178 49.6802 46.8281 49.3877 47.4429 49.0092C48.0474 48.6005 48.5854 48.096 49.057 47.4958L41.2443 43.6162C40.6309 44.1971 40.2253 44.8424 40.0276 45.5521C39.8603 46.2514 39.8901 46.9343 40.1171 47.6007Z" fill="#CCD4DB"/>
            <path d="M45.6232 196.066C47.2004 195.775 48.6685 195.743 50.0277 195.97C51.4161 196.138 52.3275 196.715 52.762 197.701C53.0028 198.408 53.0745 199.197 52.977 200.068C52.8794 200.939 52.679 201.87 52.3757 202.861L40.7607 243.868C39.2719 244.129 37.9438 244.138 36.7763 243.895C35.638 243.593 34.8516 242.948 34.417 241.963C34.1762 241.256 33.9871 240.556 33.8497 239.863C33.7414 239.111 33.8239 238.196 34.0971 237.117L45.6232 196.066ZM36.8224 210.823C37.9512 214.136 37.8378 217.059 36.4821 219.591C35.1265 222.124 32.8805 223.924 29.7443 224.993C26.5638 226.077 23.6636 226.029 21.0437 224.851C18.468 223.658 16.6157 221.405 15.4868 218.092C14.3731 214.824 14.4719 211.93 15.7834 209.413C17.139 206.88 19.4071 205.072 22.5875 203.989C25.7238 202.92 28.6019 202.975 31.2218 204.153C33.8418 205.331 35.7086 207.554 36.8224 210.823ZM23.5042 215.361C23.9558 216.686 24.5374 217.597 25.249 218.094C25.9898 218.532 26.7357 218.623 27.4866 218.367C28.2376 218.111 28.7506 217.591 29.0258 216.807C29.3301 215.964 29.2565 214.88 28.805 213.555C28.3685 212.274 27.7799 211.414 27.0391 210.976C26.3425 210.523 25.6187 210.425 24.8677 210.681C24.1168 210.937 23.5817 211.464 23.2623 212.263C22.9871 213.047 23.0678 214.08 23.5042 215.361ZM71.516 221.705C72.6448 225.018 72.5314 227.941 71.1758 230.473C69.8201 233.006 67.5742 234.806 64.4379 235.875C61.2574 236.959 58.3573 236.911 55.7373 235.734C53.1616 234.54 51.3093 232.287 50.1805 228.975C49.0667 225.706 49.1656 222.813 50.477 220.295C51.8327 217.763 54.1007 215.954 57.2812 214.871C60.4175 213.802 63.2955 213.857 65.9155 215.035C68.5354 216.213 70.4022 218.436 71.516 221.705ZM58.1979 226.243C58.6494 227.568 59.231 228.479 59.9427 228.976C60.6835 229.414 61.4293 229.505 62.1803 229.249C62.9312 228.993 63.4443 228.473 63.7194 227.689C64.0238 226.846 63.9502 225.762 63.4986 224.437C63.0621 223.156 62.4735 222.296 61.7327 221.858C61.0361 221.406 60.3123 221.307 59.5614 221.563C58.8105 221.819 58.2753 222.346 57.9559 223.145C57.6808 223.929 57.7614 224.962 58.1979 226.243Z" fill="#CCD4DB"/>
            <path d="M293.479 74.1692C293.647 72.5378 294.28 71.2557 295.381 70.323C296.526 69.3546 297.993 68.962 299.784 69.1454C301.575 69.3288 302.912 70.0086 303.797 71.1849C304.726 72.3254 305.107 73.7114 304.94 75.3429C304.772 76.9743 304.117 78.2743 302.972 79.2427C301.871 80.1754 300.426 80.5501 298.635 80.3667C296.844 80.1833 295.485 79.5214 294.556 78.3808C293.671 77.2046 293.312 75.8007 293.479 74.1692ZM296.25 66.5519C295.61 66.1245 295.039 65.4226 294.536 64.4462C294.036 63.4301 293.852 62.2854 293.983 61.012C294.109 59.7785 294.521 58.8959 295.219 58.3642C295.96 57.7968 296.984 57.4191 298.29 57.2312L303.062 56.5739C305.104 56.2604 306.197 55.4073 306.34 54.0145C306.417 53.2585 306.106 52.5632 305.407 51.9287C304.748 51.2983 303.523 50.8914 301.733 50.708C300.101 50.5409 298.547 50.6029 297.069 50.8939C295.596 51.1451 294.393 51.5044 293.461 51.9718C292.837 51.3853 292.324 50.7094 291.919 49.9443C291.519 49.1393 291.372 48.2195 291.478 47.185C291.584 46.1504 291.974 45.2856 292.649 44.5907C293.327 43.856 294.208 43.3029 295.291 42.9313C296.419 42.524 297.711 42.2744 299.168 42.1823C300.665 42.0944 302.288 42.14 304.039 42.3193C308.735 42.8002 312.168 44.2174 314.34 46.5708C316.555 48.8886 317.49 51.7386 317.143 55.1209C316.491 61.4876 311.577 65.1058 302.401 65.9755L296.25 66.5519Z" fill="#CCD4DB"/>
            <path d="M72.2507 117.868L67.4891 119.475C67.0013 119.167 66.5103 118.731 66.0162 118.167C65.522 117.603 65.2622 116.809 65.2368 115.785C65.1891 113.866 66.3234 112.493 68.6396 111.668L73.9686 109.711L75.7441 109.667C77.1197 109.632 78.2173 110.005 79.0369 110.785C79.8565 111.565 80.2834 112.643 80.3176 114.018L80.9386 139.019C80.5883 139.091 80.0624 139.184 79.3611 139.298C78.6924 139.443 78.0062 139.524 77.3025 139.541C76.5987 139.559 75.9577 139.526 75.3795 139.445C74.8333 139.362 74.3646 139.182 73.9736 138.904C73.5826 138.625 73.2691 138.249 73.0333 137.775C72.8286 137.267 72.7164 136.614 72.6965 135.814L72.2507 117.868Z" fill="#CCD4DB" fill-opacity="0.6"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M250.024 150.972C244.501 156.136 238.67 159.304 235.588 159.172C227.861 158.841 221.491 132.184 224.914 120.415C228.336 108.645 256.497 97.846 262.415 118.467C264.469 125.623 262.797 132.755 259.414 139.004L275.502 174.955L252.027 179.944L250.024 150.972Z" fill="#DAAE85"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M271.169 109.323C271.767 108.41 271.953 107.25 272.094 106.155C272.241 105.019 272.375 103.873 272.387 102.72C272.413 100.415 271.879 97.8836 269.947 96.5088C268.397 95.4064 266.378 95.1934 264.606 95.4304C263.426 95.5882 262.268 96.0043 261.232 96.6069C260.205 97.2048 259.407 98.1307 258.431 98.8074C257.887 96.4452 256.953 94.0507 255.32 92.282C253.749 90.5802 251.671 89.8794 249.508 90.037C247.288 90.1987 245.265 91.1562 243.556 92.6109C243.128 92.9752 242.707 93.351 242.315 93.7585C241.986 94.0998 241.654 94.4973 241.226 94.6987C240.749 94.9232 240.438 94.6862 240.034 94.3893C239.56 94.0412 239.049 93.7545 238.522 93.5162C236.19 92.4625 233.414 92.4154 231.267 93.8006C230.277 94.4388 229.378 95.3565 228.852 96.4698C228.382 97.4621 228.206 98.9155 227.434 99.7015C227.106 100.035 226.766 99.7577 226.366 99.5842C225.766 99.3234 225.181 99.019 224.576 98.7697C223.727 98.4194 222.844 98.2101 221.942 98.194C220.622 98.1703 218.898 98.6082 218.888 100.333C218.885 100.98 219.129 101.62 219.305 102.235C219.547 103.079 219.791 103.921 220.048 104.761C220.242 105.398 220.447 106.01 220.705 106.622C220.842 106.948 221.182 107.538 221.108 107.909C221.017 108.373 220.124 108.31 219.769 108.401C219.065 108.581 218.379 108.857 217.788 109.299C217.33 109.642 216.869 110.102 216.778 110.73C216.722 111.116 216.835 111.476 216.976 111.831C217.144 112.257 217.109 112.509 217.148 112.967C216.095 112.701 212.572 112.36 212.52 114.156C212.502 114.754 212.954 115.329 213.296 115.757C213.896 116.509 214.612 117.16 215.333 117.773C216.836 119.052 218.523 120.072 220.276 120.878C218.671 122.043 218.702 124.467 220.532 125.526C221.339 125.993 222.28 125.936 223.126 125.715C223.436 125.634 223.862 125.418 224.12 125.42C224.258 125.421 224.424 125.503 224.61 125.477C225.835 125.303 227.135 124.723 228.258 124.204C230.258 123.28 232.036 121.861 233.339 119.999C233.673 119.522 233.97 119.225 234.532 119.111C235.025 119.012 235.536 119.044 236.03 118.952C237.337 118.709 238.373 117.824 239.49 117.145C239.911 118.76 240.757 120.457 241.735 121.782C242.534 122.862 243.706 122.795 244.845 122.662C248.485 122.239 251.987 121.103 255.561 120.349C252.268 121.866 248.762 122.948 245.529 124.597C244.068 125.342 245.473 126.135 246.29 126.718C247.634 127.679 248.76 128.983 249.653 130.42C250.876 127.855 253.558 125.766 256.352 125.88C259.439 126.006 262.342 129.527 261.075 132.772C260.34 134.655 258.512 135.71 257.03 136.767C258.586 137.821 259.31 139.712 260.427 141.197C260.978 141.93 261.704 142.736 262.61 142.839C262.945 142.877 263.314 142.808 263.615 143.011C263.988 143.262 264.136 143.599 264.584 143.788C266.373 144.54 268.79 143.939 269.87 142.232C270.848 140.687 270.093 138.733 268.774 137.658C270.287 136.613 273.124 135.08 271.914 132.633C275.462 131.629 282.958 123.936 277.222 120.697C279.554 118.636 281.211 114.457 278.823 111.592C276.983 109.386 273.698 108.923 271.169 109.323" fill="#191847"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M292.671 250L256.041 376.227L238.811 471H221.518L238.78 250H292.671Z" fill="#DAAE85"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M309.134 250C306.578 315.574 307.586 351.34 308.158 357.298C308.73 363.256 311.978 403.156 334.108 473H316.122C286.814 405.997 276.583 366.096 273.221 357.298C269.86 348.5 259.932 312.734 245.438 250H309.134Z" fill="#DAAE85"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M293.458 250C283.929 293.435 267.449 362.768 244.018 458H218.725C216.857 360.254 224.804 295.92 238.567 250H293.458Z" fill="#1F28CF"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M309.261 250C306.758 315.574 313.245 380.177 333.341 459.021H306.355C276.993 393.018 255.948 328.734 241.566 250H309.261Z" fill="#2B44FF"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M336.671 486L335.756 471.249C335.717 470.609 335.094 470.171 334.467 470.304C325.8 472.146 313.846 468 313.846 468C301.815 476.522 284.471 480.433 278.363 481.604C277.182 481.831 276.424 483.023 276.752 484.18L278.118 489H313.846H334.687L336.671 486Z" fill="#E4E4E4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M242.671 486L241.756 471.249C241.717 470.609 241.094 470.171 240.467 470.304C231.8 472.146 219.846 468 219.846 468C207.815 476.522 190.471 480.433 184.363 481.604C183.182 481.831 182.424 483.023 182.752 484.18L184.118 489H219.846H240.687L242.671 486Z" fill="#E4E4E4"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M159.933 280.362L189.977 254.604L198.321 271.454L167.809 286.894C159.691 298.031 155.039 302.769 153.854 301.109C152.854 299.709 153.445 298.284 153.99 296.971C154.414 295.948 154.81 294.993 154.403 294.172C153.475 292.297 147.506 292.952 141.869 293.817C136.232 294.681 137.694 292.033 138.967 290.684C144.493 286.782 151.482 283.342 159.933 280.362ZM329.847 308.923C326.478 303.215 312.164 246.188 312.164 246.188L291.332 247.843C291.332 247.843 315.336 308.689 317.162 312.385C319.534 317.186 316.683 324.638 314.75 329.69C314.451 330.472 314.174 331.196 313.942 331.844C317.243 333.032 318.647 331.189 320.127 329.246C321.798 327.051 323.567 324.729 328.277 326.502C330.096 327.187 331.833 328.028 333.53 328.85C339.39 331.69 344.774 334.298 351.463 329.439C352.523 328.669 353.547 325.993 350.449 324.196C342.733 319.719 331.495 311.713 329.847 308.923Z" fill="#DAAE85"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M246.342 163.22L237.608 162.392C207.703 192.445 198.571 246.531 161.481 277.618L171.803 288.604C239.197 275.044 251.169 209.01 246.342 163.22Z" fill="#89C5CC"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M292.113 268.741C292.113 268.741 240.253 272.657 215.818 274.502C212.332 274.765 212.609 269.682 212.921 267.103C216.524 237.347 236.842 204.03 233.691 162.298L255.437 157.186C275.85 185.086 284.867 220.654 292.113 268.741Z" fill="#DDE3E9"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M302.273 289.034C306.323 297.011 310.228 303.942 313.813 309.223L330.176 307.987C327.638 250.935 302.781 208.764 282.753 183.718C286.735 183.129 290.223 181.181 292.196 176.886C299.144 161.765 295.636 153.993 286.841 152.015C282.005 150.928 277.634 152.25 272.402 153.832C268.12 155.126 263.262 156.595 257.1 157.061C257.098 157.061 257.096 157.061 257.094 157.061C256.497 157.107 255.956 157.188 255.469 157.301L248.198 158.269C248.198 158.269 226.137 260.993 241.969 293.588L302.273 289.034Z" fill="#89C5CC"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M302.273 289.034C296.958 278.568 291.392 266.305 285.969 253.615C285.4 268.084 283.735 282.698 279.734 290.736L302.273 289.034Z" fill="black" fill-opacity="0.1"/>
            <path d="M147.315 73.2011C147.153 74.0253 146.798 74.7911 146.251 75.4986C145.75 76.1745 145.207 76.6584 144.619 76.9503C143.652 76.2704 142.603 75.6966 141.473 75.2289C140.389 74.7298 139.356 74.3834 138.375 74.1899C136.02 73.7255 134.072 73.9936 132.529 74.9939C131.033 75.9628 129.841 77.5624 128.953 79.7927C129.846 79.3981 130.983 79.1126 132.363 78.9363C133.751 78.7208 135.132 78.7485 136.505 79.0194C140.116 79.7315 142.775 81.3364 144.484 83.8343C146.233 86.3399 146.724 89.5353 145.957 93.4205C145.625 95.108 145.013 96.659 144.122 98.0734C143.232 99.4878 142.082 100.668 140.672 101.613C139.271 102.519 137.617 103.151 135.712 103.509C133.853 103.835 131.767 103.77 129.451 103.314C124.82 102.4 121.476 100.13 119.419 96.5038C117.401 92.8849 116.957 88.2107 118.087 82.4811C118.73 79.2238 119.687 76.4364 120.96 74.1188C122.271 71.809 123.816 69.9731 125.593 68.6112C127.409 67.2571 129.419 66.3692 131.622 65.9475C133.826 65.5259 136.163 65.5589 138.636 66.0465C141.775 66.6657 144.084 67.5695 145.562 68.7579C147.079 69.9541 147.664 71.4352 147.315 73.2011ZM132.759 86.2308C132.013 86.0838 131.178 86.0821 130.253 86.2258C129.367 86.3772 128.614 86.6773 127.996 87.1261L127.706 88.5977C127.288 90.7169 127.421 92.3129 128.107 93.3858C128.831 94.4665 129.821 95.1306 131.077 95.3783C132.372 95.6337 133.419 95.3916 134.217 94.6521C135.055 93.9203 135.609 92.8677 135.88 91.4941C136.151 90.1206 136.01 88.9717 135.459 88.0475C134.954 87.0918 134.054 86.4862 132.759 86.2308Z" fill="#CCD4DB"/>
            <path d="M152.316 200.375C151.75 200.397 151.229 200.384 150.751 200.335C150.31 200.33 149.87 200.305 149.432 200.26C147.761 200.089 146.56 199.645 145.829 198.926C145.099 198.208 144.807 197.133 144.953 195.7C145.047 194.785 145.273 193.763 145.629 192.633L145.816 191.989L140.444 191.439L137.99 198.908C137.425 198.93 136.904 198.917 136.426 198.868C135.985 198.863 135.545 198.838 135.107 198.793C133.436 198.622 132.235 198.178 131.504 197.459C130.774 196.741 130.482 195.666 130.628 194.233C130.722 193.318 130.947 192.296 131.304 191.166L131.491 190.522L127.014 190.064C126.86 189.605 126.696 189.046 126.523 188.385C126.353 187.684 126.303 186.995 126.373 186.319C126.515 184.926 126.935 183.964 127.633 183.432C128.375 182.865 129.223 182.63 130.178 182.728L133.939 183.113L135.869 177.219L130.02 176.62C129.866 176.162 129.702 175.602 129.528 174.941C129.359 174.24 129.309 173.551 129.378 172.875C129.52 171.482 129.941 170.52 130.638 169.988C131.38 169.421 132.228 169.186 133.183 169.284L138.317 169.81L140.836 162.287C141.401 162.265 141.923 162.278 142.4 162.327C142.878 162.376 143.335 162.422 143.773 162.467C145.444 162.638 146.645 163.083 147.376 163.801C148.15 164.484 148.464 165.541 148.318 166.974C148.273 167.411 148.182 167.905 148.045 168.454C147.909 169.003 147.752 169.55 147.576 170.094L147.329 170.733L152.642 171.277L155.161 163.754C155.726 163.732 156.248 163.745 156.725 163.794C157.203 163.843 157.66 163.89 158.098 163.934C159.769 164.105 160.97 164.55 161.701 165.268C162.475 165.951 162.789 167.008 162.643 168.441C162.598 168.878 162.507 169.372 162.37 169.921C162.234 170.47 162.077 171.017 161.901 171.561L161.655 172.2L166.131 172.658C166.369 173.085 166.553 173.646 166.682 174.343C166.852 175.044 166.9 175.753 166.827 176.469C166.684 177.862 166.244 178.822 165.506 179.349C164.808 179.881 164.002 180.1 163.087 180.006L159.207 179.609L157.276 185.503L163.126 186.102C163.364 186.528 163.547 187.09 163.677 187.787C163.847 188.488 163.895 189.196 163.821 189.913C163.679 191.305 163.239 192.265 162.501 192.793C161.803 193.325 160.997 193.544 160.081 193.45L154.769 192.906L152.316 200.375ZM142.951 184.036L148.264 184.58L150.194 178.686L144.882 178.142L142.951 184.036Z" fill="#CCD4DB"/>
            </svg>

    </div>
</div>

{{-- bg shapes for students --}}
@include('auth.partials.bg_shapes_student')

@endsection
