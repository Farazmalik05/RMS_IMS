@extends('layouts.app')

@section('styles')
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">
    .td {
        line-height: 32px!important;
    }
    .fs-14 {
        font-size: 14px;
    }
    .table-styling {
        border-bottom: 1px solid var(--dashui-table-border-color)!important;
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
            <h3 class="mb-0 ">{{ __('Quotes') }}</h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-lg-flex justify-content-between ">
                    <div class="d-grid d-lg-block">
                        <a href="{{ route('quotes.create') }}" class="btn btn-primary" id="new-customer">
                            {{ __('+ Create New Quote') }}
                        </a >
                    </div>
                </div>
                <div class="card-body">
                    @if(count($quotes) > 0)
                        <div class="table-responsive table-card">
                            <table id="quotes-list" class="table text-nowrap mb-0 fs-14 table-styling">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Quote #') }}</th>
                                        <th>{{ __('Customer Name') }}</th>
                                        <th>{{ __('Phone #') }}</th>
                                        <th>{{ __('Rego') }}</th>
                                        <th>{{ __('Vehicle') }}</th>
                                        <th>{{ __('Amount Due') }}</th>
                                        <th>{{ __('Total') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="list contact-list-container">
                                    @foreach($quotes as $key=>$quote)
                                        @php $jobs = []; @endphp
                                        @foreach($quote->jobs as $job)
                                            @php $amt = number_format((float)$job->pivot->rate, 2, '.', ''); @endphp
                                            @php $jobs[] = $job->name.": $".$amt @endphp                                            
                                        @endforeach
                                        @php $jobs = implode("\n", $jobs); @endphp
                                        <tr title="{{ $jobs }}">
                                            <td scope="row" class="td">{{ date('d-m-Y', strtotime($quote->quote_date)) }}</td>
                                            <td class="quote_no td">Quote/RMS/{{ date('Y', strtotime($quote->quote_date)) }}/{{ sprintf("%02d", $quote->quote_number) }}</td>
                                            <td class="name td">{{ $quote->vehicle->customer->name }}</td>
                                            <td class="name td">{{ $quote->vehicle->customer->phoneno }}</td>
                                            <td class="phone td">{{ $quote->vehicle->rego }}</td>
                                            <td class="rego td">{{ $quote->vehicle->make." ".$quote->vehicle->model." - ".$quote->vehicle->year }}</td>
                                            <td class="amtdue td">
                                                @if($quote->amtdue <= 0)
                                                    <span class="badge bg-success">
                                                        ${{ number_format((float)$quote->amtdue, 2, '.', '') }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        ${{ number_format((float)$quote->amtdue, 2, '.', '') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="total td">${{ number_format((float)$quote->total, 2, '.', '') }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('quotes.edit', $quote) }}" class="btn btn-ghost btn-icon btn-sm rounded-circle" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                        <div id="view" class="d-none">
                                                            <span>{{ __('View/Edit') }}</span>
                                                        </div>
                                                    </a>
                                                    <button id="mark-paid" data-id="{{ $quote->id }}" class="btn btn-ghost btn-icon btn-sm rounded-circle" title="Mark as paid">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square icon-xs"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                        <div id="view" class="d-none">
                                                            <span>{{ __('Mark as paid') }}</span>
                                                        </div>
                                                    </button>
                                                    <a href="javascript:{}" onclick="event.preventDefault();document.getElementById('delete-quote-{{ $quote->id }}').submit();" class="btn btn-ghost btn-icon btn-sm rounded-circle" title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        <div id="delete" class="d-none">
                                                            <span>{{ __('Delete') }}</span>
                                                        </div>
                                                    </a>
                                                    <form id="delete-quote-{{ $quote->id }}" action="{{ route('quotes.destroy', $quote) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mt-2 mb-2">{{ __('No records found!') }}</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#quotes-list').DataTable({
                // "ordering": false
                order: []
            });

            $(".alert").delay(3200).fadeOut(300);

            $(document).on('click', '#mark-paid', function(e){
                var quote_id = $(this).attr('data-id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('updatetype') }}",
                    data: {
                        id: quote_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#mark-paid').attr("disabled", true);
                    },
                    error: function(errors){
                        alert('An error has occured! Refresh the page and try again.');
                    },
                    success: function(response){
                        if(response.status == 200) {
                            location.reload();
                        }
                    },
                    complete: function(response){
                    }
                });
            });
        });
    </script>
@endsection()