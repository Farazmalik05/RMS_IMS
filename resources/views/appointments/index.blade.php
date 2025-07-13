@extends('layouts.app');

@section('styles')
<style>
    .fc .fc-daygrid-day.fc-day-today {
        background-color: var(--dashui-primary);
    }
    .fc .fc-daygrid-day.fc-day-today>div>div>a {
        color: var(--dashui-white);
    }
</style>
@endsection()

@section('content')
<!-- Heading -->
<div class="row">
    <div class="col-12">
        @include('layouts.flash-message')
    </div>
    <div class="col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 ">{{ __('Appointments') }}</h3>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Appointment -->
<div class="modal fade gd-example-modal-lg" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Add an appointment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body" id="appointmentlist_modalbody">
                <form action="">
                    <div class="row">
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="customer_name" id="customer_name" disabled="disabled" class="form-control" value="" placeholder="{{ __('Enter customer name') }}">
                            <input type="hidden" id="customer_id" name="customer_id" value="">
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="phoneno">{{ __('Phone#') }} <span class="text-danger">*</span></label>
                            <input type="tel" name="phoneno" id="phoneno" class="form-control @error('phoneno') is-invalid @enderror" value="" maxlength="10" placeholder="{{ __('Enter customer phone #') }}">
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="rego">{{ __('Rego#') }} <span class="text-danger">*</span></label>
                            <input type="text" name="rego" id="rego" class="form-control" value="" placeholder="{{ __('Enter vehicle registration #') }}" />
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="make">{{ __('Make') }}<span class="text-danger">*</span></label>
                            <input type="text" name="make" id="make" disabled="disabled" class="form-control" value=""  placeholder="{{ __('Enter vehicle make') }}" />
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="model">{{ __('Model') }}<span class="text-danger">*</span></label>
                            <input type="text" name="model" id="model" disabled="disabled" class="form-control" value=""  placeholder="{{ __('Enter vehicle model') }}" />
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="transmission">{{ __('Transmission') }} <span class="text-danger">*</span></label>
                            <select name="transmission" disabled="disabled" id="transmission" class="form-select">
                                    <option value="A">{{ __('Automatic') }}</option>
                                    <option value="M">{{ __('Manual') }}</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="vin_no">{{ __('Vin#') }}<span class="text-danger">*</span></label>
                            <input type="text" name="vin_no" id="vin_no" disabled="disabled" class="form-control" value=""  placeholder="{{ __('Enter vehicle vin #') }}" />
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="vin_no">{{ __('Year') }}<span class="text-danger">*</span></label>
                            <select name="year" id="year" class="form-select" disabled="disabled">
                                @php    
                                    $last= 1980;
                                    $now = date('Y');
                                @endphp
                                @for($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="appointment_type">{{ __('Appointment Type') }} <span class="text-danger">*</span></label>
                            <select name="appointment_type" id="appointment_type" class="form-select">
                                    <option value="S">{{ __('Service') }}</option>
                                    <option value="R">{{ __('Repairs') }}</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="appointment_date">{{ __('Date') }}<span class="text-danger">*</span></label>
                            <input type="text" name="appointment_date" id="appointment_date" class="form-control flatpickr" />
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="start_time">{{ __('Start Time') }}<span class="text-danger">*</span></label>
                            <select name="start_time" id="start_time" class="form-select">
                                @php
                                    $start = "00:00";
                                    $end = "23:30";

                                    $tStart = strtotime($start);
                                    $tEnd = strtotime($end);
                                    $tNow = $tStart;
                                @endphp
                                @php 
                                    while($tNow <= $tEnd) {
                                @endphp
                                    <option value="{{ date('H:i',$tNow) }}">{{ date("H:i",$tNow) }}</option>
                                @php 
                                    $tNow = strtotime('+30 minutes',$tNow); } 
                                @endphp
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-4">
                            <label class="form-label" for="end_time">{{ __('End Time') }}<span class="text-danger">*</span></label>
                            <select name="end_time" id="end_time" class="form-select">
                                @php
                                    $start = "00:00";
                                    $end = "23:30";

                                    $tStart = strtotime($start);
                                    $tEnd = strtotime($end);
                                    $tNow = $tStart;
                                @endphp
                                @php 
                                    while($tNow <= $tEnd) {
                                @endphp
                                    <option value="{{ date('H:i',$tNow) }}">{{ date("H:i",$tNow) }}</option>
                                @php 
                                    $tNow = strtotime('+30 minutes',$tNow); } 
                                @endphp
                            </select>
                        </div>
                        <div class="mb-3 col-md-12 col-12">
                            <label class="form-label" for="appointment_description">{{ __('Description') }}</label>
                            <textarea name="appointment_description" id="appointment_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="message">
                            @include('layouts.flash-message')
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/calendar.global.js') }}"></script>

<script>
    $(document).ready(function() {
        const dateflatpickr = flatpickr('.flatpickr', {
            dateFormat: "d-m-Y",
        });

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        // events_source: 'event.php',
        editable: true,
        selectable: true,
        businessHours: false,
        dayMaxEvents: true, // allow "more" link when too many events
        select: function(arg) {
            $('#appointmentModal').modal('show');

            dateflatpickr.setDate(new Date(arg.start));
            

            // if (title) {
            // calendar.addEvent({
            //     title: title,
            //     start: arg.start,
            //     end: arg.end,
            //     allDay: arg.allDay
            // })
            // }
            calendar.unselect()
        },
        events: [
            {
            title: 'All Day Event',
            start: '2025-01-01'
            },
            {
            title: 'Long Event',
            start: '2025-01-07',
            end: '2025-01-10'
            },
            {
            groupId: 999,
            title: 'Repeating Event',
            start: '2025-01-09T16:00:00'
            },
            {
            groupId: 999,
            title: 'Repeating Event',
            start: '2025-01-16T16:00:00'
            },
            {
            title: 'Conference',
            start: '2025-01-11',
            end: '2025-01-13'
            },
            {
            title: 'Meeting',
            start: '2025-01-12T10:30:00',
            end: '2025-01-12T12:30:00'
            },
            {
            title: 'Lunch',
            start: '2025-01-12T12:00:00'
            },
            {
            title: 'Meeting',
            start: '2025-01-12T14:30:00'
            },
            {
            title: 'Happy Hour',
            start: '2025-01-12T17:30:00'
            },
            {
            title: 'Dinner',
            start: '2025-01-12T20:00:00'
            },
            {
            title: 'Birthday Party',
            start: '2025-01-13T07:00:00'
            },
            {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2025-01-28'
            }
        ]
        });

        calendar.render();
    });
</script>
@endsection