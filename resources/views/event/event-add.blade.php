<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,shrink-to-fit=no"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('img/admin/favicon-dugout.png')}}"
    />
    <link rel="stylesheet" href="{{ asset('css/admin/pace.css')}}" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Event | The Dugout Oasis Admin Panel</title>
    <!-- CSS -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600%7CRoboto:400"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('vendors/material-icons/material-icons.css')}}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('vendors/mono-social-icons/monosocialiconsfont.css')}}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('vendors/feather-icons/feather.css')}}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.4/footable.bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css" rel="stylesheet" type="text/css">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      type="text/css"
    />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- DS-styles -->
    <link href="{{ asset('css/admin/style-ds.css')}}" rel="stylesheet" type="text/css" />

    <!-- My style sheet -->
    <link rel="stylesheet" href="{{ asset('css/admin/styles-custom.css')}}" />
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script
      data-pace-options='{ "ajax": false, "selectors": [ "img" ]}'
      src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"
    ></script>
  </head>

  <body class="sidebar-dark sidebar-expand navbar-brand-dark header-light">
    <div id="loading-pace" class="pace pace-inactive">
      <div
        class="pace-progress"
        data-progress-text="100%"
        data-progress="99"
        style="transform: translate3d(100%, 0px, 0px)"
      >
        <div class="pace-progress-inner"></div>
      </div>
      <div class="pace-activity"></div>
    </div>

    <!-- Custom loading !-->
    <!-- <div id="overlay" class="">
        <img id="loading" src=""> <span id="loading-text"></span>
    </div> -->
    <input id="baseURL" type="hidden" value="http://xcitemedia.tv" />
    <input
      type="hidden"
      name="_token"
      value="tGnjwKvz0npHCb76IqzaP6r3g47HISn6rrwSEBj4"
    />

    <div id="wrapper" class="wrapper">
      <!-- HEADER & TOP NAVIGATION -->
      <nav class="navbar">
        <!-- Logo Area -->
        <div class="navbar-header">
          <a href="{{ route('dashboard')}}" class="navbar-brand">
            <img
              class="logo-expand ds-logo"
              alt=""
              src="{{ asset('img/admin/dugout-logo-white_new.png')}}"
            />
            <img
              class="logo-collapse ds-logo"
              alt=""
              src="{{ asset('img/admin/dugout-logo-white_new.png')}}"
            />
            <!-- <p>BonVue</p> -->
          </a>
        </div>
        <!-- /.navbar-header -->
        <!-- Left Menu & Sidebar Toggle -->
        <ul class="nav navbar-nav">
          <li class="sidebar-toggle dropdown">
            <a href="javascript:void(0)" class="ripple"
              ><i class="feather feather-menu list-icon fs-20"></i
            ></a>
          </li>
        </ul>
        <!-- /.navbar-left -->
        <!-- Search Form -->
        <!-- <form class="navbar-search d-none d-sm-block" role="search">
          <i class="feather feather-search list-icon"></i>
          <input type="search" class="search-query" placeholder="Search anything...">
          <a href="javascript:void(0);" class="remove-focus">
            <i class="feather feather-x"></i>
          </a>
        </form> -->
        <!-- /.navbar-search -->
        <div class="spacer"></div>
        <!-- Right Menu -->
        <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-right -->
        <!-- User Image with Dropdown -->
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a
              href="javascript:void(0);"
              class="dropdown-toggle dropdown-toggle-user ripple"
              data-toggle="dropdown"
            >
              <span class="avatar thumb-xs2">
                <img
                  src="{{ asset('img/admin/ds-img/userasset-4.png')}}"
                  class="rounded-circle"
                  alt=""
                />
                <i class="feather feather-chevron-down list-icon"></i>
              </span>
            </a>
            <div
              class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY"
            >
              <div class="card">
                <header class="card-header d-flex mb-0">
                  <a href="javascript:void(0);" class="col-md-4 text-center"
                    ><i class="feather feather-user-plus align-middle"></i>
                  </a>
                  <a href="javascript:void(0);" class="col-md-4 text-center"
                    ><i class="feather feather-settings align-middle"></i>
                  </a>
                  <a href="javascript:void(0);" class="col-md-4 text-center"
                    ><i class="feather feather-power align-middle"></i
                  ></a>
                </header>
                <ul class="list-unstyled card-body">
                  <li class="log-out-hover">
                    <form method="POST" class="hidden" id="log-outForm" action="{{ route('logout') }}">
                      @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('log-outForm').submit();">
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
          </li>
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-nav -->
      </nav>
      <!-- /.navbar -->
      <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside
          class="site-sidebar scrollbar-enabled"
          data-suppress-scroll-x="true"
        >
          <!-- User Details -->
          <div class="side-user d-none">
            <div class="col-sm-12 text-center p-0 clearfix">
              <div class="d-inline-block pos-relative mr-b-10">
                <figure class="thumb-sm mr-b-0 user--online">
                  <img
                    src="http://xcitemedia.tv/admin-wiseowl/assets/demo/users/user1.jpg"
                    class="rounded-circle"
                    alt=""
                  />
                </figure>
                <a href="#" class="side-user-link"
                  ><i class="feather feather-settings list-icon"></i
                ></a>
              </div>
              <!-- /.d-inline-block -->
              <div class="lh-14 mr-t-5">
                <a href="#" class="hide-menu mt-3 mb-0 side-user-heading fw-500"
                  >Scott Adams</a
                >
                <br /><small class="hide-menu">Developer</small>
              </div>
            </div>
            <!-- /.col-sm-12 -->
          </div>
          <!-- /.side-user -->
          <!-- Sidebar Menu -->
          <nav class="sidebar-nav">
            <ul class="nav in side-menu">
              <li class="menu-item-has-children">
                <a href="{{ route('dashboard')}}" id="dashboard"
                  > <i class="list-icon feather feather-bar-chart-2 dugout-accent-color"></i>
                  <span class="hide-menu">Dashboard</span></a
                >
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-users dugout-accent-color"></i>
                  <span class="hide-menu">User </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('users.index')}}">User List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-file-text dugout-accent-color"></i>
                  <span class="hide-menu small-line">Reservation </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('reservations.index')}}">Reservation List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-list dugout-accent-color"></i>
                  <span class="hide-menu small-line">Menu </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('menus.index')}}">Menu List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-calendar dugout-accent-color"></i>
                  <span class="hide-menu small-line">Events </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('events.index')}}">Events List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-percent dugout-accent-color"></i>
                  <span class="hide-menu small-line">Promotions </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('promotions.index')}}">Promotions List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-image dugout-accent-color"></i>
                  <span class="hide-menu small-line">Gallery </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('gallerys.index')}}">Gallery List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-at-sign dugout-accent-color"></i>
                  <span class="hide-menu small-line">Subscribers </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('subscribers.index')}}">Subscribers List</a></li>
                </ul>
              </li>
            </ul>
            <!-- /.side-menu -->
          </nav>
          <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->

        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix">
          <div class="row page-title clearfix">
            <div class="page-title-left">
              <h6 class="page-title-heading mr-0 mr-r-5">
                The Dugout Oasis Admin Panel
              </h6>
              <p
                class="page-title-description mr-0 d-none d-md-inline-block"
              ></p>
            </div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('dashboard')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Event</li>
              </ol>
            </div>
            <!-- /.page-title-right -->
          </div>

          <!-- =================================== -->
          <!-- DataTable with filter ============ -->
          <!-- =================================== -->

          <div class="widget-list">
            <div class="row">
              <!-- /.widget-holder -->
              <div class="col-md-12 widget-holder">
                <div class="widget-bg">
                  <form class="widget-heading clearfix has-validation-callback" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grey-outline w-100 m-w-100"> 
                      <!-- <div class="col-lg-12">
                        <div class="form-group">
                          <label for="event-name">Event Name:</label>
                          <input class="form-control" id="event-name" type="text">
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label class="col-md-2 text-center text-md-left" for="event-name">Event Name:</label>
                        <div class="col-md-10">
                          <input class="form-control" id="event-name" type="text" name="event_name" value="{{ old('event_name') }}">
                        </div>
                        @error('event_name')
                          {{ $message }}
                        @enderror
                      </div>
                      <!-- <div class="col-lg-12">
                        <div class="form-group">
                          <label for="l38">Event Description:</label>
                          <textarea class="form-control" id="l38" rows="5"></textarea>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label class="col-md-2 text-center text-md-left" for="event-description">Event Description:</label>
                        <div class="col-md-10">
                          <textarea class="form-control" id="event-description" rows="10" name="description">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                          {{ $message }}
                        @enderror                        
                      </div>
                      <div class="form-group row align-items-start">
                        <!-- Label on the left -->
                        <label for="l39" class="col-md-2 col-form-label text-md-left">Event Photo:</label>
                        <!-- Image + controls on the right -->
                        <div class="col-md-10">
                          <div class="d-flex flex-column align-items-center align-items-md-start">
                            <!-- Image preview -->
                            <img 
                              id="image-preview"
                              src="{{ asset('img/admin/dugout-placeholder.png') }}"
                              alt="placeholder" 
                              class="img-thumbnail mb-3" 
                              style="width: 300px; height: auto;"
                              name="photo_path"
                            >

                            <!-- File input -->
                            <input id="input-image" type="file" class="form-control mb-2" style="max-width: 300px;"  name="photo_path" accept="image/*">
                            @error('photo_path')
                              {{ $message }}
                            @enderror
                            <!-- Warnings -->
                            <p class="text-danger small mb-1">*Please input an image with minimum dimensions of width 520px and height 360px.</p>
                            <p class="text-danger small mb-0">*Please ensure that the image is no larger than 1MB.</p>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row input-has-value">
                        <label class="col-md-2 form-control-label text-center text-md-left">Event Date:</label>
                        <div class="input-group col-md-10 input-has-value">
                          <input type="text" class="form-control datepicker" placeholder="Pick a Date" data-plugin-options='{"autoclose": true, "format": "dd/mm/yyyy"}' required name="event_date" value="{{ old('event_date') }}">
                          <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                        </div>
                        @error('event_date')
                          {{ $message }}
                        @enderror                          
                      </div>
                      <div class="form-group row input-has-value">
                        <label for="sampleClockPicker1" class="col-md-2 form-control-label text-center text-md-left">Event Time:</label>
                        <div class="input-group col-md-10 clockpicker">
                          <input type="text" class="form-control" data-masked-input="99:99" id="sampleClockPicker1" required name="event_time" value="{{ old('event_time') }}">
                          <span class="input-group-addon"><span class="material-icons list-icon">watch_later</span></span>
                        </div>
                        @error('event_time')
                          {{ $message }}
                        @enderror                        
                      </div>
                      <!-- <div class="col-lg-12">
                        <div class="form-group">
                          <label for="sampleClockPicker1" class="form-control-label">Reservation Time:</label>
                          <div class="input-group clockpicker">
                            <input type="text" class="form-control" data-masked-input="99:99" id="sampleClockPicker1">
                            <span class="input-group-addon"><span class="material-icons list-icon">watch_later</span></span>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label for="event-location" class="col-md-2 text-center text-md-left">Event Location:</label>
                        <div class="col-md-10">
                          <input class="form-control text-black" id="event-location"
                          type="text" value="Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia" disabled>                                 
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-2"> 
                            </div>
                        <div class="col-md-10 btn-list text-center text-md-left">
                            <button class="btn btn-success btn-edit" type="submit">Add Event</button>
                            <a class="btn btn-danger btn-edit" href="{{ route('events.index')}}">Go Back</a>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- /.widget-heading -->
                </div>
                <!-- /.widget-bg -->
              </div>
              <!-- /.widget-holder -->
            </div>
            <!-- /.row -->
          </div>

          <!-- Page Title Area -->
          <!-- /.page-title -->

          <div id="adduser-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Add Reservation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="form-material" _lpchecked="1">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="l30" type="text" style="cursor: auto;">
                          <label for="l30">RESERVATION NAME</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group input-has-value">
                          <label class="form-control-label">Reservation Date</label>
                          <div class="input-group input-has-value">
                            <input type="text" class="form-control datepicker" placeholder="Pick Up Date"> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                          </div>
                          <!-- /.input-group -->
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group input-has-value">
                          <label for="sampleClockPicker1" class="form-control-label">Reservation Time</label>
                          <div class="input-group clockpicker">
                            <input type="text" class="form-control" data-masked-input="99:99" id="sampleClockPicker1"> <span class="input-group-addon"><span class="material-icons list-icon">watch_later</span></span>
                          </div>
                          <!-- /.input-group -->
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="l30" type="text" style="cursor: auto;">
                          <label for="l31">NUMBER OF PEOPLE</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="l30" type="text" style="cursor: auto;">
                          <label for="l31">PHONE NUMBER</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="l30" type="text" style="cursor: auto;">
                          <label for="l31">EMAIL</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="modal-footer">
                  <div class="form-actions d-flex align-items-end">
                    <button class="btn btn-primary btn-oval btn-submit ml-auto mr-2" type="button">Submit</button>
                    <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog --> <!--Deleet one div here-->

          <!-- add user ends here -->
          <!-- Edit user Modal -->
          <div id="edituser-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Edit Reservation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="form-material" _lpchecked="1">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="l30" type="text" style="cursor: auto;">
                            <label for="l30">RESERVATION NAME</label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group input-has-value">
                            <label class="form-control-label">Reservation Date</label>
                            <div class="input-group input-has-value">
                              <input type="text" class="form-control datepicker" placeholder="Pick Up Date"> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                            </div>
                            <!-- /.input-group -->
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group input-has-value">
                            <label for="sampleClockPicker1" class="form-control-label">Reservation Time</label>
                            <div class="input-group clockpicker">
                              <input type="text" class="form-control" data-masked-input="99:99" id="sampleClockPicker1"> <span class="input-group-addon"><span class="material-icons list-icon">watch_later</span></span>
                            </div>
                            <!-- /.input-group -->
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="l30" type="text" style="cursor: auto;">
                            <label for="l31">NUMBER OF PEOPLE</label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="l30" type="text" style="cursor: auto;">
                            <label for="l31">PHONE NUMBER</label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="l30" type="text" style="cursor: auto;">
                            <label for="l31">EMAIL</label>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-actions d-flex align-items-end">
                      <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="button">Save</button>
                      <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Edit ends here -->
          <!-- Deactivate Modal -->
          <div id="deactivate-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Confirm Deactivate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <p class="text-center w-100">Are you sure you want to change the Reservation status?</p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="form-actions d-flex align-items-end">
                        <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="button">Confirm</button>
                        <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Deactivate here -->
          <!-- Delete Modal -->
          <div id="delete-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Delete Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </div>
                    <div class="modal-body">
                      <p class="text-center w-100">Are you sure you want to delete the following Reservation?</p>
                      <div class="userdetail d-flex justify-content-between">
                        <p>ID:</p>
                        <p class="text-black">1</p>
                      </div>
                      <div class="userdetail d-flex justify-content-between">
                        <p>Reservation Name:</p>
                        <p class="text-black">Dennise</p>
                      </div>
                      <div class="userdetail d-flex justify-content-between">
                        <p>Reservation Date:</p>
                        <p class="text-black">13 March, Tuesday</p>
                      </div>
                      <div class="userdetail d-flex justify-content-between">
                        <p>Reservation Time:</p>
                        <p class="text-black">05:00 PM</p>
                      </div>
                      <div class="userdetail d-flex justify-content-between">
                        <p>Number of People:</p>
                        <p class="text-black">4</p>
                      </div>
                      <div class="userdetail d-flex justify-content-between">
                        <p>Phone Number:</p>
                        <p class="text-black">0000000000</p>
                      </div>
                      <div class="userdetail d-flex justify-content-between">
                        <p>Email:</p>
                        <p class="text-black">example@email.com</p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="form-actions d-flex align-items-end">
                        <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="button">Confirm</button>
                        <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Delete here -->
          <!-- Edit Password Modal -->
          <div id="editpassword-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Edit Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="form-material" _lpchecked="1">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" placeholder="New Password" type="password" style="cursor: auto;">
                          <label for="l31">NEW PASSWORD</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" placeholder="Confirm password" type="password" style="cursor: auto;">
                          <label for="l31">CONFIRM PASSWORD</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-actions d-flex align-items-end">
                      <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="button">Submit</button>
                      <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Edit Password ends here -->
          <!-- View User Modal -->
          <div id="userdetails-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Reservation Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="userdetail d-flex justify-content-between">
                    <p>ID:</p>
                    <p class="text-black">1</p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Reservation Name:</p>
                    <p class="text-black">Dennise</p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Reservation Date:</p>
                    <p class="text-black">13 March, Tuesday</p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Reservation Time:</p>
                    <p class="text-black">05:00 PM</p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Number of People:</p>
                    <p class="text-black">4</p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Phone Number:</p>
                    <p class="text-black">0000000000</p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Email:</p>
                    <p class="text-black">example@email.com</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions d-flex align-items-end">
                    <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Close</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
          <!-- View user modal ends here -->

          <!-- /.chat-panel -->
        </main>
      </div>

      <!-- /.content-wrapper -->
      <!-- FOOTER -->
      <footer class="footer">
        <span class="heading-font-family"
          >Copyright @ 2018. All rights reserved DS-Admin by Digital
          Symphony</span
        >
      </footer>
    </div>
    <!--/ #wrapper -->

    <div
      id="updatePassword"
      class="modal modal-primary fade bs-modal-lg-primary"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel2"
      aria-hidden="true"
      style="display: none"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header text-inverse">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-hidden="true"
            >
              ×
            </button>
            <h5 class="modal-title" id="myLargeModalLabel2">Change Password</h5>
          </div>
          <form id="updatePasswordForm" method="post">
            <input
              type="hidden"
              name="_token"
              value="tGnjwKvz0npHCb76IqzaP6r3g47HISn6rrwSEBj4"
            />
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Current Password</label> &nbsp;
                    <input
                      class="form-control updatePasswordInput"
                      id="currentPassword"
                      name="currentPassword"
                      placeholder="Current Password"
                      type="password"
                      maxlength="30"
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>New Password</label> &nbsp;
                    <input
                      class="form-control updatePasswordInput"
                      id="newPassword"
                      name="newPassword"
                      placeholder="New Password"
                      type="password"
                      maxlength="30"
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Confirm New Password</label> &nbsp;
                    <input
                      class="form-control updatePasswordInput"
                      id="newPassword_confirmation"
                      name="newPassword_confirmation"
                      placeholder="Confirm New Password"
                      type="password"
                      maxlength="30"
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 text-center">
                  <div
                    class="error alert alert-icon alert-danger border-danger alert-dismissible fade"
                    role="alert"
                  >
                    <i class="material-icons list-icon">not_interested</i>
                    <strong class="error-bold"></strong>
                    <span class="error-text"></span>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="modal-footer">
            <a
              href="#"
              id="updatePasswordSubmit"
              class="btn btn-info btn-rounded ripple text-left"
              >Update</a
            >
            <button
              type="button"
              class="btn btn-danger btn-rounded ripple text-left"
              data-dismiss="modal"
            >
              Cancel
            </button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
    <script src="http://xcitemedia.tv/admin-wiseowl/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.77/jquery.form-validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mithril/1.1.1/mithril.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.4/footable.min.js"></script>
    <script src="admin-wiseowl/node_modules/jquery-tabledit/jquery.tabledit.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.1/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>

    <script src="http://xcitemedia.tv/admin-wiseowl/assets/vendors/theme-widgets/widgets.js"></script>
    <script src="http://xcitemedia.tv/admin-wiseowl/assets/js/theme.js"></script>
    <script src="http://xcitemedia.tv/admin-wiseowl/assets/js/custom.js"></script>
    <script src="{{ asset('js/admin/custom-js.js')}}"></script>
    <script
      type="text/javascript"
      src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
    ></script>
    <script>
      $("img").lazyload({
        effect: "fadeIn",
      });

      $(document).on("click", ".status-modal", function () {
        $("#id_status").val($(this).data("id"));
        $("#statusModal").modal("show");
      });

      $(".modal-footer").on("click", ".status", function () {
        (id = $("#id_status").val()),
          //alert(id);
          $.ajax({
            type: "POST",
            url: "http://xcitemedia.tv/channel/changeStatus",
            data: {
              _token: $("input[name=_token]").val(),
              id: id,
            },
            success: function (data) {
              location.reload();
            },
          });
      });

      // Edit a post
      $(document).on("click", ".edit-modal", function () {
        $(".modal-title").text("Edit Channel");
        $("#id_edit").val($(this).data("id"));
        $("#title_edit").val($(this).data("title"));
        $("#editChannelName").val($(this).data("channel-name"));
        $("#editCompanyName").val($(this).data("company-name"));
        id = $("#id_edit").val();
        $("#editModal").modal("show");
      });
      $(".modal-footer").on("click", ".edit", function () {
        $.ajax({
          type: "POST",
          url: "/channel/" + $("#id_edit").val(),
          data: new FormData($("#edit_form")[0]),
          async: true,
          processData: false,
          contentType: false,

          success: function (data) {
            //alert(JSON.stringify(data));

            $(".erroreditName").addClass("hidden");
            $(".erroreditCompanyName").addClass("hidden");

            if (data.errors) {
              setTimeout(function () {
                $("#editModal").modal("show");
                toastr.error("Validation error!", "Error Alert", {
                  timeOut: 5000,
                });
              }, 500);

              if (data.errors.name) {
                $(".erroreditName").removeClass("hidden");
                $(".erroreditName").text(data.errors.name);
              }

              if (data.errors.company_name) {
                $(".erroreditCompanyName").removeClass("hidden");
                $(".erroreditCompanyName").text(data.errors.company_name);
              }
            } else {
              toastr.success(
                "Successfully updated Channel details!",
                "Success Alert",
                {
                  timeOut: 5000,
                }
              );
              location.reload();
            }
          },
          error: function (jqXHR, exception) {
            ajax_error_handling(jqXHR, exception);
          },
        });
      });

      // delete a post
      $(document).on("click", ".delete-modal", function () {
        $(".modal-title").text("Delete");
        $("#id_delete").val($(this).data("id"));
        $("#title_delete").val($(this).data("title"));
        $("#deleteModal").modal("show");
        id = $("#id_delete").val();
      });
      $(".modal-footer").on("click", ".delete", function () {
        $.ajax({
          type: "DELETE",
          url: "/channel/" + id,
          data: {
            _token: $("input[name=_token]").val(),
          },
          success: function (data) {
            toastr.success("Successfully deleted channel!", "Success Alert", {
              timeOut: 5000,
            });
            $(".item" + data["id"]).remove();
            $(".col1").each(function (index) {
              $(this).html(index + 1);
            });
            location.reload();
          },
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        //$("#term").attr('placeholder','Search by user name, email, phone number');
        $(".search-form").keypress(function (e) {
          if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(location).attr("href", "user-list?term=" + $("#term").val());
          }
        });

        $.ajaxSetup({
          headers: {
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
          },
        });
        /*$('#table-one').Tabledit({
          url: 'update-user',
          columns: {
              identifier: [0, 'id'],
              editable: [[1, 'name'], [2, 'email'], [3, 'phone']]
          },
          onAjax: function () {
              //validation here
          },
          onSuccess: function(data, textStatus, jqXHR) {
              console.log(data);
              console.log('success');
              console.log(jqXHR);
          },
          onFail: function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR);
              console.log('erro r failed');
              console.log(errorThrown);
              ajax_error_handling(jqXHR, textStatus);
          }
      });*/
        $("#addSubmit").click(function () {
          $(".error").removeClass("show");
          $("#loading-pace").removeClass("pace-inactive");
          $("#loading-pace").addClass("pace-active");
          $.ajax({
            url: $("#baseURL").val() + "/add-user",
            type: "POST",
            data: $("#addForm").serialize(),
            success: function (status) {
              var result = JSON.parse(status);
              if (result.status) {
                //location.reload();
                $("#addModal").modal("hide");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");
                $("#addForm").find("input:text, select").val("");
                $.toast({
                  heading: "Success!",
                  text: result.message,
                  position: "top-right",
                  icon: "success",
                  hideAfter: 6000,
                  stack: false,
                });
              } else {
                $(".error-text").html(result.message);
                $(".error").addClass("show");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");
              }
            },
            error: function (jqXHR, exception) {
              ajax_error_handling(jqXHR, exception);
            },
          });
        });

        $("#editSubmit").click(function () {
          $(".error").removeClass("show");
          $("#loading-pace").removeClass("pace-inactive");
          $("#loading-pace").addClass("pace-active");
          $.ajax({
            url: $("#baseURL").val() + "/update-user",
            type: "POST",
            data: $("#editForm").serialize(),
            success: function (status) {
              var result = JSON.parse(status);
              if (result.status) {
                //location.reload();
                $("#editModal").modal("hide");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");

                $.toast({
                  heading: "Success!",
                  text: result.message,
                  position: "top-right",
                  icon: "success",
                  hideAfter: 6000,
                  stack: false,
                });
              } else {
                $(".error-text").html(result.message);
                $(".error").addClass("show");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");
              }
            },
            error: function (jqXHR, exception) {
              ajax_error_handling(jqXHR, exception);
            },
          });
        });

        $("#deleteSubmit").click(function () {
          $(".error").removeClass("show");
          $("#loading-pace").removeClass("pace-inactive");
          $("#loading-pace").addClass("pace-active");
          $.ajax({
            url: $("#baseURL").val() + "/update-user-status",
            type: "POST",
            data: $("#deleteForm").serialize(),
            success: function (status) {
              var result = JSON.parse(status);
              if (result.status) {
                //location.reload();
                $("#deleteModal").modal("hide");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");

                $.toast({
                  heading: "Success!",
                  text: result.message,
                  position: "top-right",
                  icon: "success",
                  hideAfter: 6000,
                  stack: false,
                });
              } else {
                $(".error-text").html(result.message);
                $(".error").addClass("show");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");
              }
            },
            error: function (jqXHR, exception) {
              ajax_error_handling(jqXHR, exception);
            },
          });
        });

        $("#resetSubmit").click(function () {
          $(".error").removeClass("show");
          $("#loading-pace").removeClass("pace-inactive");
          $("#loading-pace").addClass("pace-active");
          $.ajax({
            url: $("#baseURL").val() + "/reset-use-password",
            type: "POST",
            data: $("#resetForm").serialize(),
            success: function (status) {
              var result = JSON.parse(status);
              if (result.status) {
                //location.reload();
                $("#resetModal").modal("hide");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");

                $.toast({
                  heading: "Success!",
                  text: result.message,
                  position: "top-right",
                  icon: "success",
                  hideAfter: 6000,
                  stack: false,
                });
              } else {
                $(".error-text").html(result.message);
                $(".error").addClass("show");
                $("#loading-pace").removeClass("pace-active");
                $("#loading-pace").addClass("pace-inactive");
              }
            },
            error: function (jqXHR, exception) {
              ajax_error_handling(jqXHR, exception);
            },
          });
        });

        var myTable = $("#table-two").DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url:
              $("#baseURL").val() +
              "/datatable-sample?startDate=" +
              $("#startDate-sample").val() +
              "&endDate=" +
              $("#endDate-sample").val(),
            method: "POST",
          },
          columns: [
            {
              data: "user_id",
              name: "user_id",
            },
            {
              data: "name",
              name: "name",
            },
            {
              data: "email",
              name: "email",
            },
            {
              data: "created_at",
              name: "created_at",
            },
            {
              data: "updated_at",
              name: "updated_at",
            },
          ],
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input)
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    column.search($(this).val()).draw();
                  });
              });
          },
        });

        $("#endDate-sample").on("change", function () {
          if ($(this).val() != "") {
            var start = $("#startDate-sample").val();
            var end = $("#endDate-sample").val();
            myTable.ajax.url(
              "datatable-sample?startDate=" + start + "&endDate=" + end
            );
            myTable.ajax.reload();
          }
        });

        if ($("#startDate-sample").val() == "") {
          var start = moment().subtract(29, "days");
          var end = moment();
        } else {
          var start = $("#startDate-sample").val();
          var end = $("#endDate-sample").val();
        }

        function cb(start, end) {
          $("#reportrange-sample span").html(
            start.format("DD/MM/YY") + " - " + end.format("DD/MM/YY")
          );
          $("#startDate-sample")
            .val(start.format("MM/DD/YY"))
            .trigger("change");
          $("#endDate-sample").val(end.format("MM/DD/YY")).trigger("change");
        }

        $("#reportrange-sample").daterangepicker(
          {
            startDate: start,
            endDate: end,
            ranges: {
              Today: [moment(), moment()],
              Yesterday: [
                moment().subtract(1, "days"),
                moment().subtract(1, "days"),
              ],
              "Last 7 Days": [moment().subtract(6, "days"), moment()],
              "Last 30 Days": [moment().subtract(29, "days"), moment()],
              "This Month": [
                moment().startOf("month"),
                moment().endOf("month"),
              ],
              "Last Month": [
                moment().subtract(1, "month").startOf("month"),
                moment().subtract(1, "month").endOf("month"),
              ],
            },
          },
          cb
        );

        //cb(start, end);
      });

      function editPopUp(id) {
        $(".error").removeClass("show");

        $("#edit-id").val(id);
        $("#edit-old-role").val($("#role" + id).val());
        $("#edit-role").val($("#role" + id).val());
        $("#edit-phone").val($("#phone" + id).html());
        $("#edit-email").val($("#email" + id).html());
        $("#edit-name").val($("#name" + id).html());
      }

      function reactivatePopUp(id) {
        $(".error").removeClass("show");
        $("#delete-id").val(id);
        $("#delete-status").val(1);
        $("#delete-title").html("Reactivate Confirmation");
        $("#delete-text").html(
          "Are you sure to <u>reactivate</u> user <b>" +
            $("#name" + id).html() +
            "</b>?"
        );
      }

      function deactivatePopUp(id) {
        $(".error").removeClass("show");
        $("#delete-id").val(id);
        $("#delete-status").val(0);
        $("#delete-title").html("Deactivate Confirmation");
        $("#delete-text").html(
          "Are you sure to <u>deactivate</u> user <b>" +
            $("#name" + id).html() +
            "</b>?"
        );
      }
    </script>

    <script type="text/javascript">
      $("#overlay").addClass("hide");

      function ajax_error_handling(jqXHR, exception) {
        if (jqXHR.status === 0) {
          alert("Not connect.\n Verify Network.");
        } else if (jqXHR.status == 404) {
          alert("Requested page not found. [404]");
        } else if (jqXHR.status == 500) {
          alert("Internal Server Error [500].");
        } else if (exception === "parsererror") {
          alert("Requested JSON parse failed.");
        } else if (exception === "timeout") {
          alert("Time out error.");
        } else if (exception === "abort") {
          alert("Ajax request aborted.");
        } else {
          alert("Uncaught Error.\n" + jqXHR.responseText);
        }
        console.log(jqXHR);
      }

      $(".carousel").carousel({
        interval: 2000,
      });

      $("#updatePasswordSubmit").click(function () {
        $(".error").removeClass("show");
        $("#loading-pace").removeClass("pace-inactive");
        $("#loading-pace").addClass("pace-active");
        $.ajax({
          url: $("#baseURL").val() + "/change-password",
          type: "POST",
          data: $("#updatePasswordForm").serialize(),
          success: function (status) {
            var result = JSON.parse(status);
            if (result.status) {
              //location.reload();
              $("#updatePassword").modal("hide");
              $("#loading-pace").removeClass("pace-active");
              $("#loading-pace").addClass("pace-inactive");
              $("#updatePasswordInput").val("");
              $.toast({
                heading: "Success!",
                text: result.message,
                position: "top-right",
                icon: "success",
                hideAfter: 6000,
                stack: false,
              });
            } else {
              $(".error-text").html(result.message);
              $(".error").addClass("show");
              $("#loading-pace").removeClass("pace-active");
              $("#loading-pace").addClass("pace-inactive");
            }
          },
          error: function (jqXHR, exception) {
            ajax_error_handling(jqXHR, exception);
          },
        });
      });

      $(document).ready(function() {
          // This is the command that activates the datepicker plugin 
          // on all elements that have the class 'datepicker'.
          $('.datepicker').datepicker({
              // Add options here to match the template's behavior:
              format: 'dd/mm/yyyy',
              autoclose: true,
          });
      });

      $(document).ready(function() {
        // Initializes all elements with the class 'clockpicker'.
        // In your HTML, the parent div is marked with this class: <div class="input-group clockpicker">
        $('.clockpicker').clockpicker({
          placement: 'bottom',
          align: 'left',
          vibrate: true,
          twelvehour: true,
          donetext: 'Done'
        }).on('change', function() {
          const val = $(this).find('input').val();
          $(this).find('input').val(val.replace(/(AM|PM)$/i, ' $1'));
        });
      });
      
      document.getElementById('input-image').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
          };
            reader.readAsDataURL(file);     
        }
      });
    </script>
  </body>
</html>
