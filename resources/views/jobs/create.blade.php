@extends('layouts.app')

@section('styles')
<style>
    .ml-2 {
        margin-left: 10px!important;
    }
</style>
@endsection

@section('content')
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 ">{{ __('Add a Job') }}</h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('jobs.store') }}" method="Post">
            @csrf
                <div class="card">                
                    <div class="card-body">
                        <div class="row">
                            @include('jobs.formgroup')
                        </div>
                        <div>
                            <!-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif -->
                            @include('layouts.flash-message')
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">{{ __('Save') }}</button>
                    <a href="{{ route('jobs.index') }}" class="btn btn-dark">{{ __('Back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection