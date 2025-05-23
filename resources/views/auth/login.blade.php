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
        <div class="card-body p-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username -->                
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email address here" required>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password"  placeholder="**************" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Checkbox -->
                <div class="d-lg-flex justify-content-between align-items-center mb-4">
                    <div class="form-check custom-checkbox">
                        <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="rememberme">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <!-- Button -->
                <div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">{{ __('Sign in') }}</button>
                    </div>

                    <div class="d-md-flex justify-content-between mt-4">
                        <div class="mb-2 mb-md-0">
                            <?php //<a href="{{ route('register') }}" class="fs-5">{{ __('Create An Account') }} </a> ?>
                        </div>
                        <div>
                            @if (Route::has('password.request'))
                                <a class="text-inherit fs-5" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
