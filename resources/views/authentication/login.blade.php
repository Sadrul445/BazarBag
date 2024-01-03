@extends('authentication.master')
@push('css')
@endpush
@includeIf('authentication.partials.css')
@section('title', 'Login | Ministore')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <a href="{{ url('/') }}" class="d-inline-block"><img
                                src="{{ asset('assets/ui/frontend/img/ministore-re.png') }}" alt="" width="50%"></a>
                        {{-- <h2 class="my-3">Login</h2> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">

                                    <div class="d-flex flex-column align-items-center">
                                        <a href="http://">
                                            <img src="https://via.placeholder.com/50" alt="Social Media Logo">
                                        </a>
                                        <div class="social-login mt-3">
                                            <span class="social-label">Or login with</span>
                                            <ul class="socials list-unstyled d-flex">
                                                <li class="mx-2"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li class="mx-2"><a href="#"><i class="fa fa-github"></i></a></li>
                                                <li class="mx-2"><a href="#"><i class="fa fa-google"></i></a></li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('register') }}" class="">Create an account</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter your email" name="email" :value="old('email')" required
                                            autofocus autocomplete="username">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="password"><i class="fa fa-password"></i>Password:</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter your password" name="password" required
                                            autocomplete="current-password">
                                    </div>
                                    <br>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Login</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="my-3">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
