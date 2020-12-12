<div class="container modal-switch-account">
    <svg class="d-block mx-auto my-5 fc-theme-color svg--top" width="105" height="105" viewBox="0 0 105 105" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M52.5 0C23.5515 0 0 23.5515 0 52.5C0 81.4485 23.5515 105 52.5 105C81.4485 105 105 81.4485 105 52.5C105 23.5515 81.4488 0 52.5 0ZM52.5 95.4545C28.8149 95.4545 9.54545 76.1855 9.54545 52.5C9.54545 28.8145 28.8149 9.54545 52.5 9.54545C76.1851 9.54545 95.4545 28.8149 95.4545 52.5C95.4545 76.1851 76.1851 95.4545 52.5 95.4545Z" fill="currentColor"/>
        <path d="M52.4992 57.2163C52.4989 57.2163 52.4995 57.2163 52.4992 57.2163C45.1053 57.2163 38.1533 60.0959 32.9253 65.3242C31.0614 67.1878 31.0614 70.2099 32.9253 72.0738C33.8572 73.0058 35.0787 73.4719 36.3002 73.4719C37.5217 73.4719 38.7432 73.0058 39.6749 72.0738C43.1004 68.6483 47.6549 66.7621 52.4992 66.7621C57.3435 66.7621 61.898 68.6486 65.3235 72.0738C67.1871 73.9374 70.2092 73.9374 72.0731 72.0738C73.937 70.2102 73.937 67.1881 72.0731 65.3242C66.8447 60.0959 59.8934 57.2163 52.4992 57.2163Z" fill="currentColor"/>
        <path d="M36.6362 46.8173C37.823 45.6337 38.5007 43.9919 38.5007 42.3182C38.5007 40.6446 37.823 39.0028 36.6362 37.8188C35.4525 36.6355 33.8107 35.9546 32.1371 35.9546C30.4603 35.9546 28.8216 36.6355 27.638 37.8188C26.4543 39.0028 25.7734 40.6446 25.7734 42.3182C25.7734 43.9919 26.4543 45.6337 27.638 46.8173C28.8216 48.001 30.4634 48.6819 32.1371 48.6819C33.8107 48.6819 35.4525 48.001 36.6362 46.8173Z" fill="currentColor"/>
        <path d="M72.8636 35.9546C71.1868 35.9546 69.5482 36.6355 68.3645 37.8188C67.1777 39.0028 66.5 40.6446 66.5 42.3182C66.5 43.9919 67.1777 45.6337 68.3645 46.8173C69.5482 48.001 71.19 48.6819 72.8636 48.6819C74.5373 48.6819 76.1791 48.0006 77.3627 46.8173C78.5495 45.6337 79.2273 43.9919 79.2273 42.3182C79.2273 40.6446 78.5495 39.0028 77.3627 37.8188C76.1791 36.6355 74.5373 35.9546 72.8636 35.9546Z" fill="currentColor"/>
    </svg>
    <p class="font-weight-bold text-center fs-1-8 ws-no-wrap">Looks like you don’t have a {{ $currUser->is_tutor ? "student" : "tutor" }} account yet...</p>
    <p class="fc-grey text-center">No worries, you can become a {{ $currUser->is_tutor ? "student" : "tutor" }} in a few steps.</p>
</div>