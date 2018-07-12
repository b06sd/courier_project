<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Apex - A Logistic and CRM Solution</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('temp/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom CSS -->

  <link href="{{ asset('temp/css/lib/calendar2/semantic.ui.min.css') }}" rel="stylesheet">
  <link href="{{ asset('temp/css/lib/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('temp/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
  <link href="{{ asset('temp/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('temp/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('temp/css/helper.css') }}" rel="stylesheet">
  <link href="{{ asset('temp/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('temp/css/custom.css') }}" rel="stylesheet">

  @yield('styles')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
  <!--[if lt IE 9]>
  <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
</head>

<body class="fix-header fix-sidebar">
  <!-- Preloader - style you can find in spinners.css -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
      <!-- header header  -->
      <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
          <!-- Logo -->
          <div class="navbar-header">
            <a class="navbar-brand" href="/home">
              <b>APEX</b>
          </div>
          <!-- End Logo -->
          <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
              <!-- This is  -->
              <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
              <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
              <!-- Messages -->
              {{--<li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>--}}
                {{--<div class="dropdown-menu animated zoomIn">--}}
                  {{--<ul class="mega-dropdown-menu row">--}}


                    {{--<li class="col-lg-3  m-b-30">--}}
                      {{--<h4 class="m-b-20">CONTACT US</h4>--}}
                      {{--<!-- Contact -->--}}
                      {{--<form>--}}
                        {{--<div class="form-group">--}}
                          {{--<input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>--}}
                          {{--<div class="form-group">--}}
                            {{--<input type="email" class="form-control" placeholder="Enter email"> </div>--}}
                            {{--<div class="form-group">--}}
                              {{--<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>--}}
                            {{--</div>--}}
                            {{--<button type="submit" class="btn btn-info">Submit</button>--}}
                          {{--</form>--}}
                        {{--</li>--}}
                        {{--<li class="col-lg-3 col-xlg-3 m-b-30">--}}
                          {{--<h4 class="m-b-20">List style</h4>--}}
                          {{--<!-- List style -->--}}
                          {{--<ul class="list-style-none">--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                          {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="col-lg-3 col-xlg-3 m-b-30">--}}
                          {{--<h4 class="m-b-20">List style</h4>--}}
                          {{--<!-- List style -->--}}
                          {{--<ul class="list-style-none">--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                          {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="col-lg-3 col-xlg-3 m-b-30">--}}
                          {{--<h4 class="m-b-20">List style</h4>--}}
                          {{--<!-- List style -->--}}
                          {{--<ul class="list-style-none">--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                            {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>--}}
                          {{--</ul>--}}
                        {{--</li>--}}
                      {{--</ul>--}}
                    {{--</div>--}}
                  {{--</li>--}}
                  <!-- End Messages -->

                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">

                  <!-- Search -->
                  <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                      <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                    </li>
                    <!-- Comment -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                        <ul>
                          <li>
                            <div class="drop-title">Notifications</div>
                          </li>
                          <li>
                            <div class="message-center">
                              <!-- Message -->
                              <a href="#">
                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                <div class="mail-contnet">
                                  <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                </div>
                              </a>
                              <!-- Message -->
                              <a href="#">
                                <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                <div class="mail-contnet">
                                  <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                </div>
                              </a>
                              <!-- Message -->
                              <a href="#">
                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                <div class="mail-contnet">
                                  <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                </div>
                              </a>
                              <!-- Message -->
                              <a href="#">
                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                <div class="mail-contnet">
                                  <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                </div>
                              </a>
                            </div>
                          </li>
                          <li>
                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <!-- End Comment -->
                    <!-- Profile -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                          <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                          {{--<li><a href="#"><i class="ti-wallet"></i> Balance</a></li>--}}
                          {{--<li><a href="#"><i class="ti-email"></i> Inbox</a></li>--}}
                          <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                          <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i>
                            Logout
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                        </li>
                      </ul>
                    </div>
                  </li>
                  @endguest
                </ul>
              </div>
            </nav>
          </div>
          <!-- End header header -->
          <!-- Left Sidebar  -->


          @include('_partials.sidebar')
          <!-- End Left Sidebar  -->
          <!-- Page wrapper  -->
          <div class="page-wrapper">


              <!-- Insert Pages Here -->

                  @yield('content')

              <!-- Insert Pages Here -->

              <!-- Container fluid  -->
              <!-- During implementation this div should be dynamic and should be role based  -->
              {{--  <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                  <div class="col-md-3">
                    <div class="card p-30">
                      <div class="media">
                        <div class="media-left meida media-middle">
                          <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2>568120</h2>
                          <p class="m-b-0">Total Revenue</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card p-30">
                      <div class="media">
                        <div class="media-left meida media-middle">
                          <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2>1178</h2>
                          <p class="m-b-0">Sales</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card p-30">
                      <div class="media">
                        <div class="media-left meida media-middle">
                          <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2>25</h2>
                          <p class="m-b-0">Stores</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card p-30">
                      <div class="media">
                        <div class="media-left meida media-middle">
                          <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2>847</h2>
                          <p class="m-b-0">Customer</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                --}}

            <!-- Add User Modal Here -->
            <div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Create User
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        {!! Form::open(array('url' => 'users')) !!}
                        <div class="form-group">
                          {!! Form::label('Name', 'Name') !!}
                          {!! Form::text('name', '', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('email', 'Email') !!}
                          {!! Form::email('email', '', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('Phone Number', 'Phone Number') !!}
                          {!! Form::text('phone', '', array('class' => 'form-control')) !!}
                        </div>
                        <div class="row form-group">
                          @foreach ($roles as $role)
                            <div class="col-sm-2">
                              {!! Form::checkbox('roles[]',  $role->id ) !!}
                              {!! Form::label($role->name, ucfirst($role->name)) !!}
                            </div>
                          @endforeach
                        </div>
                        <div class="form-group">
                          {!! Form::label('password', 'Password') !!}<br>
                          {!! Form::password('password', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('password', 'Confirm Password') !!}<br>
                          {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                        </div>
                        {!! Form::submit('Register', array('class' => 'btn btn-primary')) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End User modal -->

            <!-- Edit User Modal Here -->
            <div id="user-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit User
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        {!! Form::open(array('id' => 'edit_user_form')) !!}
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                          {!! Form::label('Name edit', 'Name') !!}
                          {!! Form::text('name', '', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('email edit', 'Email') !!}
                          {!! Form::email('email', '', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('Phone Number edit', 'Phone Number') !!}
                          {!! Form::text('phone', '', array('class' => 'form-control')) !!}
                        </div>
                        <div class="row form-group">
                          @foreach ($roles as $role)
                            <div class="col-sm-2">
                              {!! Form::checkbox('roles[]',  $role->id, '', array('class' => 'roles') ) !!}
                              {!! Form::label($role->name, ucfirst($role->name)) !!}
                            </div>
                          @endforeach
                        </div>
                        <div class="form-group">
                          {!! Form::label('password edit', 'Password') !!}<br>
                          {!! Form::password('password', array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('password edit', 'Confirm Password') !!}<br>
                          {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                        </div>
                        {!! Form::submit('Update User', array('class' => 'btn btn-primary')) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End User modal -->

            <!-- Add Permission Modal Here -->
            <div id="permission-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Create Permission
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        {{ Form::open(array('url' => 'permissions')) }}
                        <div class="form-group">
                          {{ Form::label('permission_name', 'Name') }}
                          {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div>
                        @if(!$roles->isEmpty())
                          <p>Assign Permission to Roles</p>
                          @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                          @endforeach
                        @endif
                        <br>
                        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Permission Modal -->

            <!-- Add Role Modal Here -->
            <div id="role-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Create Role
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </h4>
                  </div>
                  <div class="modal-body">
                    <div class="container">

                        {{ Form::open(array('url' => 'roles')) }}
                        <div class="form-group row">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <h5><b>Assign Permissions</b></h5>
                        <div class='form-group row'>
                          @foreach ($permissions as $permission)
                            <div class='col-sm-3'>
                              {{ Form::checkbox('permissions[]',  $permission->id) }}
                              {{ Form::label($permission->name, ucfirst($permission->name)) }}
                            </div>
                          @endforeach
                        </div>
                        <div class='form-group row'>
                          {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                        </div>
                        {{ Form::close() }}

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Role Modal -->


              <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                              <p>Some text in the modal.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </div>

                  </div>
              </div>





                <!-- End Page Content -->
              </div>
              <!-- End Container fluid  -->
              <!-- footer -->

                <footer class="footer">
                  <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <p style="text-align: center;">
                      &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">{{ config('app.name') }}</a>, made by coders
                    </p>
                  </div>
                  <div class="col-md-4"></div>
                  </div>
                </footer>

              <!-- End footer -->
            </div>
            <!-- End Page wrapper  -->
          </div>
          <!-- End Wrapper -->
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
          @yield('scripts')
        </body>

        </html>
