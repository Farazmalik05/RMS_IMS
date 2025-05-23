@extends('layouts.app')

@section('content')
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 ">{{ __('Edit Customers') }}</h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', $customer) }}" method="Post">
            @csrf
            @method('PUT')
                <div class="card">                
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @include('customers.formgroup')
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">{{ __('Save') }}</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-dark">{{ __('Back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection