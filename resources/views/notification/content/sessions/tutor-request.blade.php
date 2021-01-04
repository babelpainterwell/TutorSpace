<div class="notification__content__header font-weight-bold">
    Session Cancelled (08/02/2020 Thursday)
</div>
<div class="notification__content__info">

    <div class="notification__content__info__wrapper">
        <div class="notification__content__info__header bg-primary">
            <img src="{{ Storage::url(Auth::user()->profile_pic_url) }}" alt="user photo" class="user-image">
        </div>

        <div class="container content">
            <p class="pt-3 fs-2-4 text-center fw-500">Neno Enim</p>

            <div class="d-flex justify-content-between mt-4">
                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Date:</div>
                    <div class="fc-black-2 fs-1-6" id="session-date">
                        08/02/2020 Thursday
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Time:</div>
                    <div class="fc-black-2 fs-1-6" id="session-time">
                        3:30pm - 5:00pm
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Course:</div>
                    <div class="fc-black-2 fs-1-6">
                        Computer Science
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Type:</div>
                    <div class="fc-black-2 fs-1-6">
                        In Person
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Price:</div>
                    <div class="fs-1-6 color-primary">
                        $ 25
                    </div>
                </div>
            </div>

            <div id="calendar" class="my-5 calendar"></div>

            <p class="fc-black-2 fs-1-6"><span class="font-weight-bold">Cancelation Policy: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

            <p class="fc-black-2 fs-1-6 mt-2"><span class="font-weight-bold">Refund Policy: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

            <div class="button-container">
                <button class="btn btn-outline-primary">Decline</button>
                <button class="btn btn-primary">Accept</button>
            </div>
        </div>
    </div>
</div>

@section('js')
@include('home.partials.calendar-tutor', ['user' => Auth::user()])
<script>
    let options = Object.assign({}, calendarOptions);
    options.selectAllow = false;
    options.eventClick = null;
    options.headerToolbar = null;
    options.height = 'auto';

    // todo: modify this
    options.slotMinTime = "08:30:00";
    options.slotMaxTime = "11:30:00";

    let e = new FullCalendar.Calendar($('#calendar')[0], options);

    $('#calendar').hide();

    e.render();
    setTimeout(() => {
        $('#calendar').show();
        e.destroy();
        e.render();
        e.gotoDate('2020-10-25'); // todo: change this

    }, 500);
</script>

@endsection
