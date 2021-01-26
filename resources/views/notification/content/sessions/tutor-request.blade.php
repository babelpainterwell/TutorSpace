@php
$tz = App\CustomClass\TimeFormatter::getTZ();
$startDateTime = $tutorRequest->session_time_start->setTimeZone($tz);
$endDateTime = $tutorRequest->session_time_end->setTimeZone($tz);
$diffInDays = $endDateTime->diff($startDateTime)->days;

$hourlyRate = $tutorRequest->hourly_rate;
$sessionDurationInHour = round(abs($tutorRequest->session_time_start->diffInSeconds($tutorRequest->session_time_end)) / 3600, 2);
$price = $sessionDurationInHour * $hourlyRate;
@endphp

<div class="notification__content__header font-weight-bold">
    New Tutoring Session Request ({{ $tutorRequest->session_time_start->setTimeZone($tz)->format('m/d/y D') }})
</div>
<div class="notification__content__info">

    <div class="notification__content__info__wrapper">
        <div class="notification__content__info__header bg-primary">
            <img src="{{ Storage::url($tutorRequest->student->profile_pic_url) }}" alt="user photo" class="user-image">
        </div>

        <div class="container content">
            <p class="pt-3 fs-2-4 text-center fw-500">{{ $tutorRequest->student->first_name . ' ' . $tutorRequest->student->last_name }}</p>

            <h6 class="mt-3 color-primary">Session Details</h6>

            <div class="d-flex justify-content-between mt-2">
                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Date:</div>
                    <p class="fc-black-2 fs-1-5 fw-500">{{ $tutorRequest->session_time_start->setTimeZone($tz)->format('m/d/y D') }}</p>
                </div>
                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Time:</div>
                    <p class="fc-black-2 fs-1-5 fw-500">
                        {{ $tutorRequest->session_time_start->setTimeZone($tz)->format('H:i') }}
                        -
                        {{ $tutorRequest->session_time_end->setTimeZone($tz)->format('H:i') }}
                        @if ($diffInDays != 0)
                            (+{{$diffInDays}} day)
                        @endif
                    </p>
                </div>
                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Course:</div>
                    <p class="fc-black-2 fs-1-5 fw-500">{{ $tutorRequest->course->course }}</p>
                </div>

                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Type:</div>
                    <p class="fc-black-2 fs-1-5 fw-500">{{ $tutorRequest->is_in_person ? 'In Person' : 'Online' }}</p>
                </div>

                <div class="d-flex flex-column">
                    <div class="fc-grey fs-1-4">Price:</div>
                    <p class="color-primary fs-1-5 fw-500">
                        ${{ $price }}
                    </p>
                </div>
            </div>

            <div id="calendar" class="my-4 calendar"></div>

            <p class="fc-black-2 fs-1-6"><span class="font-weight-bold">Cancelation Policy: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

            <p class="fc-black-2 fs-1-6 mt-2"><span class="font-weight-bold">Refund Policy: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

            <div class="button-container">
                @if ($tutorRequest->status == 'declined')
                <button class="btn btn-outline-primary disabled">Declined</button>
                @elseif($tutorRequest->status == 'accepted')
                <button class="btn btn-primary disabled">Accepted</button>
                @elseif($tutorRequest->status == 'pending')
                <button class="btn btn-outline-primary" id="btn-decline">Decline</button>
                <button class="btn btn-primary" id="btn-accept">Accept</button>
                @endif
            </div>
        </div>
    </div>
</div>


@include('home.partials.calendar-tutor')
<script>
    let options = JSON.parse(JSON.stringify(calendarOptions));
    options.selectAllow = false;
    options.eventClick = null;
    options.headerToolbar = null;
    options.height = 200;
    options.displayEventTime = false;

    options.slotMinTime = "{{ App\CustomClass\TimeFormatter::getTimeForCalendarWithHours($tutorRequest->session_time_start, -2) }}";
    options.slotMaxTime = "{{ App\CustomClass\TimeFormatter::getTimeForCalendarWithHours($tutorRequest->session_time_end, 2) }}";

    options.events.push({
        title: 'Current Tutor Request',
        classNames: ['tutor-request'],
        start: "{{ $tutorRequest->session_time_start->setTimeZone($tz) }}",
        end: "{{ $tutorRequest->session_time_end->setTimeZone($tz) }}",
        description: "",
        type: "tutor-request",
    });

    let e = new FullCalendar.Calendar($('#calendar')[0], options);


    $('#calendar').hide();

    e.render();
    setTimeout(() => {
        $('#calendar').show();
        e.destroy();
        e.render();
        e.gotoDate("{{ App\CustomClass\TimeFormatter::getDate($tutorRequest->session_time_start->setTimeZone($tz)) }}");
    }, 500);

    $('#btn-accept').click(function() {
        JsLoadingOverlay.show(jsLoadingOverlayOptions);
        $.ajax({
            type: 'POST',
            url: "{{ route('tutor-request.accept', $tutorRequest) }}",
            success: function success(data) {
                let { successMsg, errorMsg } = data;
                if(successMsg) {
                    toastr.success(successMsg);
                    $('.button-container').html('<button class="btn btn-primary disabled">Accepted</button>');
                }
                else if(errorMsg) toastr.error(errorMsg);
            },
            error: (error) => {
                console.log(error);
                toastr.error("Something went wrong when accepting the tutor request.");
            },
            complete: () => {
                JsLoadingOverlay.hide();
            }
        });
    });

    $('#btn-decline').click(function() {
        JsLoadingOverlay.show(jsLoadingOverlayOptions);
        $.ajax({
            type: 'DELETE',
            url: "{{ route('tutor-request.decline', $tutorRequest) }}",
            success: function success(data) {
                let { successMsg, errorMsg } = data;
                if(successMsg) {
                    toastr.success(successMsg);
                    $('.button-container').html('<button class="btn btn-outline-primary disabled">Declined</button>');
                }
                else if(errorMsg) toastr.error(errorMsg);
            },
            error: (error) => {
                console.log(error);
                toastr.error("Something went wrong when declining the tutor request.");
            },
            complete: () => {
                JsLoadingOverlay.hide();
            }
        });
    });


</script>
