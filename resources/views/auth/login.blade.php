@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; background: linear-gradient(135deg, #6e8efb, #a777e3);">
        <div class="col-md-5">
            <div class="card shadow border-0 rounded-4" style="overflow: hidden;">
                <div class="card-header text-white text-center bg-gradient" style="background: #6e8efb;">
                    <h4 class="mb-0">{{ __('Login') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-3 position-relative">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gradient text-white shadow-sm rounded-pill">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a href="{{ route('password.request') }}" class="text-decoration-none text-muted">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .btn-gradient {
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #a777e3, #6e8efb);
        transform: scale(1.05);
    }

    .input-group-text {
        border-right: 0;
    }

    .form-control {
        border-left: 0;
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(110, 142, 251, 0.5);
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }
</style>
