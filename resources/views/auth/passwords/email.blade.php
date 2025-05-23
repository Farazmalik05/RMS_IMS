@extends('layouts.auth')

@section('content')
<div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
    <div class="mb-4" style="text-align:center;">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo/logo.jpg') }}" class="mb-2 text-inverse" alt="Image" style="max-width:100%;max-height:100px;">
        </a>
        <!-- <p class="mb-6">Please enter your user information.</p> -->
    </div>
    <!-- Card -->
    <div class="card smooth-shadow-md">
        <!-- Card body -->
        <div class="card-body p-5">
            <div class="mb-4">
                <p class="mb-6">Don't worry, we'll send you an email to reset your password.</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email input -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email" autocomplete="email" autofocus required="" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit button -->
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                </div>
                <!-- <span>Don't have an account? <a href="{{ route('register') }}">sign in</a></span> -->
            </form>
        </div>
    </div>
</div>
@endsection
