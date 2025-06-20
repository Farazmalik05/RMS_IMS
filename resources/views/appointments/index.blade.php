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

//Add Appointment
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
<script src="{{ asset('js/calendar.global.js') }}"></script>

<script>
    $(document).ready(function() {
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