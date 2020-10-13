<div class="container modal-book-session">
    <svg class="d-block mx-auto my-3" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M25.8333 40H4.16667C1.86833 40 0 38.13 0 35.8333V9.16667C0 6.87 1.86833 5 4.16667 5H7.5C7.96 5 8.33333 5.37333 8.33333 5.83333C8.33333 6.29333 7.96 6.66667 7.5 6.66667H4.16667C2.78833 6.66667 1.66667 7.78833 1.66667 9.16667V35.8333C1.66667 37.2117 2.78833 38.3333 4.16667 38.3333H25.8333C27.2117 38.3333 28.3333 37.2117 28.3333 35.8333V9.16667C28.3333 7.78833 27.2117 6.66667 25.8333 6.66667H22.5C22.04 6.66667 21.6667 6.29333 21.6667 5.83333C21.6667 5.37333 22.04 5 22.5 5H25.8333C28.1317 5 30 6.87 30 9.16667V35.8333C30 38.13 28.1317 40 25.8333 40Z" fill="#1F7AFF"/>
        <path d="M20.8337 10H9.16699C7.78866 10 6.66699 8.87833 6.66699 7.5V4.16667C6.66699 3.70667 7.04033 3.33333 7.50033 3.33333H10.917C11.3037 1.43333 12.9887 0 15.0003 0C17.012 0 18.697 1.43333 19.0837 3.33333H22.5003C22.9603 3.33333 23.3337 3.70667 23.3337 4.16667V7.5C23.3337 8.87833 22.212 10 20.8337 10ZM8.33366 5V7.5C8.33366 7.96 8.70866 8.33333 9.16699 8.33333H20.8337C21.292 8.33333 21.667 7.96 21.667 7.5V5H18.3337C17.8737 5 17.5003 4.62667 17.5003 4.16667C17.5003 2.78833 16.3787 1.66667 15.0003 1.66667C13.622 1.66667 12.5003 2.78833 12.5003 4.16667C12.5003 4.62667 12.127 5 11.667 5H8.33366Z" fill="#1F7AFF"/>
        <path d="M36.6664 35C36.3514 35 36.063 34.8217 35.9213 34.54L33.773 30.2433C33.4847 29.6667 33.333 29.0233 33.333 28.38V13.3333C33.333 11.495 34.828 10 36.6664 10C38.5047 10 39.9997 11.495 39.9997 13.3333V28.38C39.9997 29.0233 39.848 29.6667 39.5597 30.2433L37.4114 34.54C37.2697 34.8217 36.9814 35 36.6664 35ZM36.6664 11.6667C35.7463 11.6667 34.9997 12.415 34.9997 13.3333V28.38C34.9997 28.765 35.0913 29.1533 35.263 29.4983L36.6664 32.3033L38.0697 29.4983C38.2414 29.1533 38.333 28.765 38.333 28.38V13.3333C38.333 12.415 37.5864 11.6667 36.6664 11.6667ZM38.8147 29.87H38.8314H38.8147Z" fill="#1F7AFF"/>
        <path d="M24.1667 16.6667H5.83333C5.37333 16.6667 5 16.2933 5 15.8333C5 15.3733 5.37333 15 5.83333 15H24.1667C24.6267 15 25 15.3733 25 15.8333C25 16.2933 24.6267 16.6667 24.1667 16.6667Z" fill="#1F7AFF"/>
        <path d="M24.1667 21.6667H5.83333C5.37333 21.6667 5 21.2933 5 20.8333C5 20.3733 5.37333 20 5.83333 20H24.1667C24.6267 20 25 20.3733 25 20.8333C25 21.2933 24.6267 21.6667 24.1667 21.6667Z" fill="#1F7AFF"/>
        <path d="M24.1667 26.6667H5.83333C5.37333 26.6667 5 26.2933 5 25.8333C5 25.3733 5.37333 25 5.83333 25H24.1667C24.6267 25 25 25.3733 25 25.8333C25 26.2933 24.6267 26.6667 24.1667 26.6667Z" fill="#1F7AFF"/>
        <path d="M24.1667 31.6667H5.83333C5.37333 31.6667 5 31.2933 5 30.8333C5 30.3733 5.37333 30 5.83333 30H24.1667C24.6267 30 25 30.3733 25 30.8333C25 31.2933 24.6267 31.6667 24.1667 31.6667Z" fill="#1F7AFF"/>
    </svg>

    <h4 class="w-100 text-center mb-5">Book your Tutor Session</h4>
    <div>
        <img src="{{ Storage::url(Auth::user()->profile_pic_url) }}" alt="profile-img" id="profile-image">
        <span class="font-weight-bold ml-4 fc-black-2">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
    </div>
    <p class="fc-grey fs-1-2 mt-5">Drag on the calender to choose the time for your session.</p>
    <div class="row">
        <div class="col-9 pl-0">
            <div id="calendar" class="w-100"></div>
            <div class="calendar-note">
                <span class="available-time">Available Time</span>
                <span class="online">Online</span>
                <span class="in-person">In Person</span>
                <span class="note">Note: All time in the calender are based on PST.</span>
            </div>
        </div>
    </div>
    <div id="calendar" class="w-100 py-5 my-5"></div>
    <div class="d-flex justify-content-between calendar-details">
        <div class="d-flex flex-column mt-3">
            <p class="fc-grey fs-1-2">Date:</p>
            <p class="fc-black-2 fs-1-4">08/02/2020 Thursday</p>
        </div>
        <div class="d-flex flex-column mt-3">
            <p class="fc-grey fs-1-2">Time:</p>
            <p class="fc-black-2 fs-1-4">3:30pm - 5:00pm</p>
        </div>
        <div class="d-flex flex-column mt-3">
            <p class="fc-grey fs-1-2">Tutor Hourly Rate:</p>
            <p class="fc-black-2 fs-1-4">$ 16 per hour</p>
        </div>
    </div>

    <p class="mt-5 fc-red">Warning: Your selected time is not in thte tutor’s available time. <br/>The Tutor may cancel your request if he/she is not available during that time.</p>
    
</div>