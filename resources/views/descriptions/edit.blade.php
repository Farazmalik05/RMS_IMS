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
            <h3 class="mb-0 ">{{ __('Edit Description') }}</h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('jobs.descriptions.update', [$job, $description]) }}" method="Post">
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
                            @include('descriptions.updateformgroup')
                        </div>
                        <div>
                            @if ($errors->storedescription->any())
                                <div class="alert alert-danger">
                                    <ul style="list-style-type: none; padding:0px; margin-bottom:0px">
                                        @foreach ($errors->storedescription->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">{{ __('Save description') }}</button>
                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-dark">{{ __('Back') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection