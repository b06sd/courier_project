@extends('layouts.auth_template')

@section('content')
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input id="email" type="email" class="form-control input-lg" name="email"
                                               value="{{ old('email') }}" required autofocus placeholder="Email">

                                               @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password"
                                               required>

                                               @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                                Me
                                            </label>
                                        <label class="pull-right">
                                                <a href="{{ route('password.request') }}">Forgotten Password?</a>
                                            </label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    {{-- <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- All Jquery -->
          <script src="{{ asset('temp/js/lib/jquery/jquery.min.js') }}"></script>
          <!-- Bootstrap tether Core JavaScript -->
          <script src="{{ asset('temp/js/lib/bootstrap/js/popper.min.js') }}"></script>
          <script src="{{ asset('temp/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
          <!-- slimscrollbar scrollbar JavaScript -->
          <script src="{{ asset('temp/js/jquery.slimscroll.js') }}"></script>
          <!--Menu sidebar -->
          <script src="{{ asset('temp/js/sidebarmenu.js') }}"></script>
          <!--stickey kit -->
          <script src="{{ asset('temp/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
          <!--Custom JavaScript -->

          <script src="{{ asset('temp/js/custom.min.js') }}"></script>
</body>
@endsection
