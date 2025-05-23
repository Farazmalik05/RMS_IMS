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
            <h3 class="mb-0 ">{{ __('Vehicles') }}</h3>
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
                        <a href="{{ route('vehicles.create') }}" class="btn btn-primary" id="new-customer">
                            {{ __('+ Create New Vehicle') }}
                        </a >
                    </div>
                    <div class="text-right" style="line-height:39px;">
                    @if($archived)
                        <a href="{{ route('vehicles.index') }}" class="btn btn-dark-soft btn-sm">
                            {{ __('View active vehicles') }}
                        </a>
                    @else
                        <a href="{{ route('vehicles.index', 'archive' ) }}" class="btn btn-dark-soft btn-sm">
                            {{ __('View deleted vehicles') }}
                        </a>
                    @endif
                    </div>
                </div>
                <div class="card-body">
                    @if(count($vehicles) > 0)
                        <div class="table-responsive table-card">
                            <table id="vehicles-list" class="table text-nowrap mb-0 fs-14 table-styling">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Phone#</th>
                                        <th>Rego</th>
                                        <th>Vin#</th>
                                        <th>Vehicle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list contact-list-container">
                                    @foreach($vehicles as $key=>$vehicle)
                                        <tr>
                                            <td scope="row" class="td">{{ ++$key }}</td>
                                            <td class="name td">{{ $vehicle->customer->name }}</td>
                                            <td class="phone td">{{ $vehicle->customer->phoneno }}</td>
                                            <td class="rego td">{{ $vehicle->rego }}</td>
                                            <td class="rego td">{{ $vehicle->vin_no }}</td>
                                            <td class="email_id td">{{ $vehicle->make." ".$vehicle->model." - ".$vehicle->year }}</td>
                                            <td>
                                                @if($vehicle->trashed())
                                                    <div class="d-flex align-items-center">
                                                        <form action="{{ route('vehicles.restore', $vehicle->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" onclick="return confirm('{{ __('Are you sure you want to restore?') }}')"  class="btn btn-ghost btn-icon btn-sm rounded-circle" title="{{ __('Restore') }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive icon-xs"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                                                                <div id="view" class="d-none">
                                                                    <span>{{ __('Restore') }}</span>
                                                                </div>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                            <div id="view" class="d-none">
                                                                <span>{{ __('View/Edit') }}</span>
                                                            </div>
                                                        </a>
                                                        <a href="javascript:{}" onclick="event.preventDefault();document.getElementById('delete-vehicle-{{ $vehicle->id }}').submit();" class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            <div id="delete" class="d-none">
                                                                <span>{{ __('Delete') }}</span>
                                                            </div>
                                                        </a>
                                                        <form id="delete-vehicle-{{ $vehicle->id }}" action="{{ route('vehicles.destroy', $vehicle) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                @endif
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
            $('#vehicles-list').DataTable();
            $(".alert").delay(3200).fadeOut(300);
        });
    </script>
@endsection()