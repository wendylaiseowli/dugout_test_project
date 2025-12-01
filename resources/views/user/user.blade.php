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
    <title>User  | The Dugout Oasis Admin Panel</title>
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

   
     <link
      href="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      rel="stylesheet"
      type="text/css"
    />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
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
                <a href="{{ route('dashboard') }}" id="dashboard"
                  > <i class="list-icon feather feather-bar-chart-2 dugout-accent-color"></i>
                  <span class="hide-menu">Dashboard</span></a
                >
              </li>

              <li class="current-page menu-item-has-children active">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-users dugout-accent-color"></i>
                  <span class="hide-menu dugout-accent-color">User </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('users.index') }}" class="text-white">User List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-file-text dugout-accent-color"></i>
                  <span class="hide-menu small-line">Reservation </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('reservations.index') }}">Reservation List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-list dugout-accent-color"></i>
                  <span class="hide-menu small-line">Menu </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('menus.index') }}">Menu List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-calendar dugout-accent-color"></i>
                  <span class="hide-menu small-line">Events </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('events.index') }}">Events List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-percent dugout-accent-color"></i>
                  <span class="hide-menu small-line">Promotions </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('promotions.index') }}">Promotions List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-image dugout-accent-color"></i>
                  <span class="hide-menu small-line">Gallery </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('gallerys.index') }}">Gallery List</a></li>
                </ul>
              </li>

              <li class="menu-item-has-children">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-at-sign dugout-accent-color"></i>
                  <span class="hide-menu small-line">Subscribers </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('subscribers.index') }}">Subscribers List</a></li>
                </ul>
              </li>
            </ul>
            <!-- /.side-menu -->
          </nav>
          <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->
      {{-- @extends('layouts.admin')

      @section('title', 'User  | The Dugout Oasis Admin Panel')

      @section('content') --}}

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
                  <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User </li>
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
                  <form class="widget-heading clearfix">
                    <div class="grey-outline w-100 m-w-100">
                      <div class="input-daterange input-group flex-wrap">
                        <input
                          class="form-control input-m"
                          id="search-input"
                          placeholder="Search Keyword"
                          type="Search"
                        />
                        <!-- <button
                          class="btn btn-normal btn-search btn-default btn-orange-ds ripple mb-2 input-m m-btn-full"
                        >
                          Search
                        </button> -->
                        @if(auth()->id() ==1)
                          <button
                            class="btn btn-normal btn-default btn-outline-orange ripple mb-2 input-m m-btn-full"
                            data-test="add-user-btn"
                            data-toggle="modal"
                            data-target="#adduser-modal"
                            onclick="preventDefault()"
                            id="adduser"
                          >
                            Add User
                          </button>
                        @endif
                        <script>
                          document
                            .getElementById("adduser")
                            .addEventListener("click", function (event) {
                              event.preventDefault();
                            });
                        </script>
                       
                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default ripple mb-2 input-m m-btn-full pull-right export-btn" type="button">Export<span class="caret"></span>
                        </button>
                        <div role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 47px, 0px); top: 0px; left: 0px; will-change: transform;"><a class="dropdown-item" href="#" id="export-csv-all">CSV (All)</a> <a class="dropdown-item" href="#" id="export-csv-filtered">CSV (Filtered)</a> <a class="dropdown-item" href="#" id="export-pdf-all">PDF (All)</a> <a class="dropdown-item" href="#" id="export-pdf-filtered">PDF (Filtered)</a>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- /.widget-heading -->
                  <div class="widget-body clearfix">
                    <div class="table-responsive">
                      <table class="table table-editable" id="myTable">
                        <!-- data-toggle="datatables" -->
                        <thead>
                          <tr>
                            <th class="text-black" >ID</th>
                            <th class="text-black">First Name</th>
                            <th class="text-black">Last Name</th>
                            <th class="text-black">Username</th>
                            <th class="text-black">Email</th>
                            <th class="text-black">Status</th>
                            <th class="text-black">Last Updated</th>
                            <th class="text-black">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr data-expanded="true">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $user->first_name }}</td>
                              <td>{{ $user->last_name }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              @if(auth()->id() ==1)
                                @if($user->status == true)
                                  <td style="white-space: nowrap; width: 1%">
                                    <div
                                      class="tabledit-toolbar btn-toolbar"
                                      style="text-align: left"
                                    >
                                      <div
                                        class="btn-group btn-group-sm"
                                        style="float: none"
                                      >
                                        <button
                                          type="button"
                                          class="tabledit-edit-button btn btn-sm btn-danger btn-status"
                                          data-test="deactivate-user-btn"
                                          data-user-id ="{{ $user->id }}"
                                          data-toggle="modal"
                                          data-target="#deactivate-modal"
                                          style="float: none"
                                        >
                                          <span
                                            class="glyphicon feather-x-circle"
                                          ></span>
                                          Deactivate
                                        </button>
                                      </div>
                                    </div>
                                  </td>
                                @else
                                  <td style="white-space: nowrap; width: 1%">
                                    <div
                                      class="tabledit-toolbar btn-toolbar"
                                      style="text-align: left"
                                    >
                                      <div
                                        class="btn-group btn-group-sm"
                                        style="float: none"
                                      >
                                        <button
                                          type="button"
                                          class="tabledit-edit-button btn btn-sm btn-success btn-status"
                                          data-test="activate-user-btn"
                                          data-user-id ="{{ $user->id }}"
                                          data-toggle="modal"
                                          data-target="#activate-modal"
                                          style="float: none"
                                        >
                                          <span
                                            class="glyphicon feather-check-circle"
                                          ></span>
                                          Activate
                                        </button>
                                      </div>
                                    </div>
                                  </td>
                                @endif
                              @else
                                <td></td>
                              @endif
                              <td>{{ $user->updated_at->diffForHumans() }}</td>
                              <td style="white-space: nowrap; width: 1%">
                                <div
                                  class="tabledit-toolbar btn-toolbar"
                                  style="text-align: left"
                                >
                                  <div
                                    class="btn-group btn-group-sm"
                                    style="float: none"
                                  >
                                    <button
                                      type="button"
                                      class="tabledit-delete-button btn btn-sm btn-success "
                                      data-toggle="modal"
                                      data-target="#userdetails-modal"
                                      data-user-id ="{{ $user->id }}"
                                      data-user-first-name="{{ $user->first_name }}"
                                      data-user-last-name="{{ $user->last_name }}"
                                      data-user-username="{{ $user->username }}"
                                      data-user-email="{{ $user->email }}"
                                      style="float: none"
                                      data-bs-toggle="tooltip" data-bs-placement="top" title="View"
                                    >
                                      <span class="glyphicon feather-eye"></span>
                                    </button>
                                    @if(auth()->id()==1 || auth()->id() == $user->id)
                                      <a
                                        type="button"
                                        class="tabledit-delete-button btn btn-sm btn-info"
                                        data-toggle="modal"
                                        data-target="#userdetails-edit-modal"
                                        data-user-id ="{{ $user->id }}"
                                        data-user-first-name="{{ $user->first_name }}"
                                        data-user-last-name="{{ $user->last_name }}"
                                        data-user-username="{{ $user->username }}"
                                        data-user-email="{{ $user->email }}"
                                        style="float: none; color:white;"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                      >
                                        <span class="fa fa-edit"></span>
                                      </a>
                                      @if($user->id != 1)
                                        <button
                                          type="button"
                                          class="tabledit-delete-button btn btn-sm btn-danger"
                                          data-toggle="modal"
                                          data-target="#delete-modal"
                                          data-user-id="{{ $user->id }}"
                                          style="float: none"
                                          data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                        >
                                          <span class="fa fa-trash"></span>
                                        </button>
                                      @endif
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div
                      class="dataTables_wrapper d-flex flex-justify m-flex-col-2"
                    >
                      <div class="sm-flex-col">
                        <div class="dataTables_info" id="tableInfo">
                          Showing 1 to 8 of 8 entries
                        </div>
                      </div>
                      <div class="dataTables_info">
                        <label class="entries-dropdown"
                          >Show
                          <select class="form-control custom-padding-entries" id="entriesSelect">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                          entries</label
                        >
                      </div>
                      <ul class="pagination dataTables_info" role="navigation" id="pagination">
                        <li
                          class="page-item disabled"
                          aria-disabled="true"
                          aria-label="« Previous"
                        >
                          <span class="page-link" aria-hidden="true">‹</span>
                        </li>
                        <li class="page-item active" aria-current="page">
                          <span class="page-link">1</span>
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="#"
                            >2</a
                          >
                        </li>
                        <li class="page-item disabled" aria-disabled="true">
                          <span class="page-link">...</span>
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="#"
                            >406</a
                          >
                        </li>
                        <li class="page-item">
                          <a
                            class="page-link"
                            href="#"
                            >407</a
                          >
                        </li>

                        <li class="page-item">
                          <a
                            class="page-link"
                            href="#"
                            rel="next"
                            aria-label="Next »"
                            >›</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.widget-body -->
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
                  <h5 class="modal-title">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="form-material" _lpchecked="1" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="first-name" type="text" style="cursor: auto;" name="first_name">
                          <label for="first-name">FIRST NAME</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="last-name" type="text" style="cursor: auto;" name="last_name">
                          <label for="last-name">LAST NAME</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="last-name" type="text" style="cursor: auto;" name="username">
                          <label for="last-name">USER NAME</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="new-pwd" type="password" style="cursor: auto;" name="password">
                          <label for="new-pwd">NEW PASSWORD</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input class="form-control" id="confirm-pwd" type="password" style="cursor: auto;">
                          <label for="confirm-pwd">CONFIRM PASSWORD</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="modal-footer">
                  <div class="form-actions d-flex align-items-end">
                    <button class="btn btn-primary btn-oval btn-submit ml-auto mr-2" type="submit">Submit</button>
                    <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>  <!-- delete one div below -->
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- add user ends here -->
          <!-- Edit user Modal -->
          <div id="edituser-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Edit User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="form-material" _lpchecked="1">
                  <div class="modal-body reservation-modal">
                    <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="first-name" type="text" style="cursor: auto;">
                            <label for="first-name">FIRST NAME</label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="last-name" type="text" style="cursor: auto;">
                            <label for="last-name">LAST NAME</label>
                          </div>
                        </div>
                      
                      <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="new-pwd" type="password" style="cursor: auto;">
                            <label for="new-pwd">NEW PASSWORD</label>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="confirm-pwd" type="password" style="cursor: auto;">
                            <label for="confirm-pwd">CONFIRM PASSWORD</label>
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
          <!-- Edit ends here -->
          <!-- Deactive Modal -->
          <div id="deactivate-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material" method="POST" id="deactive-user-form">
                  @csrf
                  @method('PUT')
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Confirm Deactivate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <p class="text-center w-100">Are you sure you would like to deactivate this user?</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-actions d-flex align-items-end">
                      <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="submit">Confirm</button>
                      <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Deactive here -->
          <!-- Active Modal -->
          <div id="activate-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material" id="active-user-form" method="POST">
                  @csrf
                  @method('PUT')
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Confirm Activate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <p class="text-center w-100">Are you sure you would like to activate this user?</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-actions d-flex align-items-end">
                      <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="submit">Confirm</button>
                      <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- Active here -->
          <!-- Delete Modal -->
          <div id="delete-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material" method="POST" id="delete-user-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <p class="text-center w-100">Are you sure you would like to delete this user?</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-actions d-flex align-items-end">
                      <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="submit">Confirm</button>
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
          <!-- View userdestials Modal -->
          <div id="userdetails-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">User Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="userdetail d-flex justify-content-between">
                    <p>ID:</p>
                    <p class="text-black"><span id="modal-user-id"></span></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>First Name:</p>
                    <p class="text-black"><span id="modal-user-first-name"></span></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Last Name:</p>
                    <p class="text-black"><span id="modal-user-last-name"></span></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Username:</p>
                    <p class="text-black"><span id="modal-user-username"></span></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Email:</p>
                    <p class="text-black"><span id="modal-user-email"></span></p>
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
          <!-- View user detials ends here -->
          <!-- Edit user detials starts here -->
          <div id="userdetails-edit-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Edit User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form method="POST" id="edit-user-form" class="form-material" _lpchecked="1">
                  @csrf
                  @method('PUT')
                  <div class="modal-body reservation-modal">
                    <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="edit-modal-user-first-name" name="first_name" type="text" style="cursor: auto;">
                            <label for="first-name">FIRST NAME</label>
                            @error('first_name')
                              {{ $message }}
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="edit-modal-user-last-name" name="last_name" type="text" style="cursor: auto;">
                            <label for="last-name">LAST NAME</label>
                            @error('last_name')
                              {{ $message }}
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="edit-modal-user-password" name="password" type="password" style="cursor: auto;">
                            <label for="new-pwd">NEW PASSWORD</label>
                            @error('password')
                              {{ $message }}
                            @enderror                     
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <input class="form-control" id="edit-modal-user-confirm-password" name="password_confirmation" type="password" style="cursor: auto;">
                            <label for="confirm-pwd">CONFIRM PASSWORD</label>
                            @error('password_confirmation')
                              {{ $message }}
                            @enderror                        
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-actions d-flex align-items-end">
                      <button class="btn btn-primary btn-oval btn-submit ml-auto  mr-2" type="submit">Submit</button>
                      <button class="btn btn-outline-default btn-oval btn-cancel btn-black" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>
          <!-- /.chat-panel -->
        </main>
      {{-- @endsection --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mithril/1.1.1/mithril.js"></script>
    <script src="http://xcitemedia.tv/admin-wiseowl/assets/vendors/theme-widgets/widgets.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.4/footable.min.js"></script>
    <script src="admin-wiseowl/node_modules/jquery-tabledit/jquery.tabledit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.1/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.4/sweetalert2.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="http://xcitemedia.tv/admin-wiseowl/assets/js/theme.js"></script>
    <script src="http://xcitemedia.tv/admin-wiseowl/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
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
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const table = document.getElementById("myTable");
        const pagination = document.getElementById("pagination");
        const info = document.getElementById("tableInfo");
        const select = document.getElementById("entriesSelect");
        const searchInput = document.getElementById("search-input");
        const searchButton = document.querySelector(".btn-search");

        let allRows = Array.from(table.querySelectorAll("tbody tr"));
        let filteredRows = [...allRows];
        let rowsPerPage = parseInt(select?.value || 10);
        let currentPage = 1;

        function displayTable(page) {
          const start = (page - 1) * rowsPerPage;
          const end = start + rowsPerPage;

          filteredRows.forEach((row, index) => {
            row.style.display = (index >= start && index < end) ? "" : "none";
          });

          updateInfo(start, end);
        }

        function updateInfo(start, end) {
          const total = filteredRows.length;
          const showingStart = total === 0 ? 0 : start + 1;
          const showingEnd = Math.min(end, total);
          if (info)
            info.textContent = `Showing ${showingStart} to ${showingEnd} of ${total} entries`;
        }

        function setupPagination() {
          const pageCount = Math.ceil(filteredRows.length / rowsPerPage);
          pagination.innerHTML = "";

          // Previous button
          const prev = document.createElement("li");
          prev.className = "page-item" + (currentPage === 1 ? " disabled" : "");
          prev.innerHTML = `<a class="page-link" href="#">‹</a>`;
          prev.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage > 1) {
              currentPage--;
              displayTable(currentPage);
              setupPagination();
            }
          });
          pagination.appendChild(prev);

          // Page numbers
          for (let i = 1; i <= pageCount; i++) {
            const li = document.createElement("li");
            li.className = "page-item" + (i === currentPage ? " active" : "");
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener("click", (e) => {
              e.preventDefault();
              currentPage = i;
              displayTable(currentPage);
              setupPagination();
            });
            pagination.appendChild(li);
          }

          // Next button
          const next = document.createElement("li");
          next.className = "page-item" + (currentPage === pageCount ? " disabled" : "");
          next.innerHTML = `<a class="page-link" href="#">›</a>`;
          next.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage < pageCount) {
              currentPage++;
              displayTable(currentPage);
              setupPagination();
            }
          });
        }

        // // 🔍 Search function
        // function searchTable() {
        //   const query = searchInput.value.toLowerCase().trim();

        //   filteredRows = allRows.filter((row) =>
        //     row.textContent.toLowerCase().includes(query)
        //   );

        //   currentPage = 1;
        //   displayTable(currentPage);
        //   setupPagination();
        // }

        // // Handle search input + button
        // searchButton?.addEventListener("click", searchTable);
        // searchInput?.addEventListener("keyup", (e) => {
        //   if (e.key === "Enter") searchTable();
        // });

        document.getElementById('search-input').addEventListener('keyup', function() {
          const filter = this.value.toLowerCase();
          filteredRows = allRows.filter(row => {
            const text = row.textContent.toLowerCase();
            const visible = text.includes(filter);
            row.style.display = visible ? '' : 'none';
            return visible;
          });

          currentPage = 1;
          displayTable(currentPage);
          setupPagination();
        });


        // Handle entries dropdown
        select?.addEventListener("change", () => {
          rowsPerPage = parseInt(select.value);
          currentPage = 1;
          displayTable(currentPage);
          setupPagination();
        });

        // Initialize
        displayTable(currentPage);
        setupPagination();
      });

      document.addEventListener('DOMContentLoaded', function() {

        // ============ CSV EXPORT FUNCTIONS ============
        
        function exportToCSV(filename, rows) {
          const csvContent = rows.map(row => row.join(',')).join('\n');
          const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
          const link = document.createElement('a');
          
          if (link.download !== undefined) {
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', filename);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
          }
        }

        function getTableData(includeAll = true) {
          const table = document.getElementById('myTable');
          const rows = [];
          
          // Add headers
          const headers = [];
          table.querySelectorAll('thead th').forEach(th => {
            const headerText = th.textContent.trim();
            if (headerText !== 'Actions') { // Skip Actions column
              headers.push(headerText);
            }
          });
          rows.push(headers);
          
          // Add data rows
          const tableRows = table.querySelectorAll('tbody tr');
          tableRows.forEach(row => {
            // Skip hidden rows if filtering
            if (!includeAll && row.style.display === 'none') {
              return;
            }
            
            const rowData = [];
            const cells = row.cells;
            
            // Skip last column (Actions)
            for (let i = 0; i < cells.length - 1; i++) {
              let cellText = cells[i].textContent.trim();
              
              // Handle image columns - just add placeholder text
              if (cells[i].querySelector('img')) {
                cellText = '[Image]';
              }
              
              // Escape quotes and wrap in quotes if contains comma
              cellText = cellText.replace(/"/g, '""');
              if (cellText.includes(',') || cellText.includes('\n')) {
                cellText = `"${cellText}"`;
              }
              
              rowData.push(cellText);
            }
            rows.push(rowData);
          });
          
          return rows;
        }

        // ============ PDF EXPORT FUNCTIONS ============
        
        function exportToPDF(filename, includeAll = true) {
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF();
          
          // Add title
          doc.setFontSize(16);
          doc.text('Users Export', 14, 15);
          
          // Get table data
          const table = document.getElementById('myTable');
          const headers = [];
          const rows = [];
          
          // Get headers (excluding Actions)
          table.querySelectorAll('thead th').forEach((th, index) => {
            const headerText = th.textContent.trim();
            if (headerText !== 'Actions' && headerText !== 'Big Photo' && headerText !== 'Thumbnail Photo') {
              headers.push(headerText);
            }
          });
          
          // Get data rows
          const tableRows = table.querySelectorAll('tbody tr');
          tableRows.forEach(row => {
            if (!includeAll && row.style.display === 'none') {
              return;
            }
            
            const rowData = [];
            const cells = row.cells;
            
            // Add data (skip Actions, Big Photo, Thumbnail Photo columns)
            rowData.push(cells[0].textContent.trim()); // ID
            rowData.push(cells[1].textContent.trim()); // Category
            rowData.push(cells[2].textContent.trim()); // Category
            rowData.push(cells[3].textContent.trim()); // Category
            rowData.push(cells[4].textContent.trim()); // Active?
            rowData.push(cells[5].textContent.trim()); // Last Updated
            rowData.push(cells[6].textContent.trim()); // Last Updated
            
            rows.push(rowData);
          });
          
          // Generate table
          doc.autoTable({
            head: [headers],
            body: rows,
            startY: 25,
            theme: 'grid',
            styles: {
              fontSize: 10,
              cellPadding: 3
            },
            headStyles: {
              fillColor: [66, 139, 202],
              textColor: 255,
              fontStyle: 'bold'
            }
          });
          
          // Save PDF
          doc.save(filename);
        }

        // ============ EVENT LISTENERS ============
        
        // CSV All
        document.getElementById('export-csv-all').addEventListener('click', function(e) {
          e.preventDefault();
          const data = getTableData(true);
          exportToCSV('users-all.csv', data);
        });
        
        // CSV Filtered
        document.getElementById('export-csv-filtered').addEventListener('click', function(e) {
          e.preventDefault();
          const data = getTableData(false);
          exportToCSV('users-filtered.csv', data);
        });
        
        // PDF All
        document.getElementById('export-pdf-all').addEventListener('click', function(e) {
          e.preventDefault();
          exportToPDF('users-all.pdf', true);
        });
        
        // PDF Filtered
        document.getElementById('export-pdf-filtered').addEventListener('click', function(e) {
          e.preventDefault();
          exportToPDF('users-filtered.pdf', false);
        });

      });

      // Modal details that has pass for each row 
      document.addEventListener('DOMContentLoaded', function() {

        //View
        $('#userdetails-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // jQuery object for the button
          var userId = button.data('user-id');
          var userFirstName = button.data('user-first-name');
          var userLastName = button.data('user-last-name');
          var userName = button.data('user-username');
          var userEmail = button.data('user-email');

          // Update modal content
          $('#modal-user-id').text(userId);
          $('#modal-user-first-name').text(userFirstName);
          $('#modal-user-last-name').text(userLastName);
          $('#modal-user-username').text(userName);
          $('#modal-user-email').text(userEmail);
        });

        //Edit
        $('#userdetails-edit-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // jQuery object for the button
          var userId = button.data('user-id');
          var userFirstName = button.data('user-first-name');
          var userLastName = button.data('user-last-name');

          // Update modal content
          $('#edit-modal-user-first-name').val(userFirstName).trigger('input');
          $('#edit-modal-user-last-name').val(userLastName).trigger('input');
          $('#edit-modal-user-password').val('');
          $('#edit-modal-user-confirm-password').val('');
          // Update form action URL dynamically
          
          $('#edit-user-form').attr('action', '/users/' + userId);
        });

        $('#edit-user-form').on('submit', function(e) {
          e.preventDefault(); // Prevent normal submit

          let form = $(this);
          let formData = form.serialize();
          let actionUrl = form.attr('action');

          $.ajax({
            url: actionUrl,
            method: 'POST',
            data: formData,
            success: function (response) {
              $('#userdetails-edit-modal').modal('hide');
              location.reload(); // Refresh table or page
            },
            error: function (xhr) {
              if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;

                // Remove old errors
                form.find('.text-danger').remove();

                // Display new errors
                $.each(errors, function (key, messages) {
                  let input = form.find('[name="'+ key +'"]');

                  // If input is inside form-group (it is)
                  let group = input.closest('.form-group');

                  // Append error
                  group.append('<span class="text-danger">' + messages[0] + '</span>');
                });
              }
            }
          });
        });

        //Delete
        $('#delete-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // jQuery object for the button
          var userId = button.data('user-id');

          // Update form action URL dynamically
          $('#delete-user-form').attr('action', '/users/' + userId);
        });

        //Active
        $('#deactivate-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // jQuery object for the button
          var userId = button.data('user-id');

          // Update form action URL dynamically
          $('#deactive-user-form').attr('action', '/users/' + userId + '/deactive');
        });        
        
        $('#activate-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // jQuery object for the button
          var userId = button.data('user-id');

          // Update form action URL dynamically
          $('#active-user-form').attr('action', '/users/' + userId + '/active');
        });
      });

      $('#editUserSubmit').on('click', function () {
        let formData = {
          first_name: $('#first-name').val(),
          last_name: $('#last-name').val(),
          new_password: $('#new-pwd').val(),
          confirm_password: $('#confirm-pwd').val(),
          _token: '{{ csrf_token() }}'
        };

        $.ajax({
          url: "/users/update",
          method: "POST",
          data: formData,
          success: function (response) {
            // Close modal on success
            $('#edituser-modal').modal('hide');

            // Optional: reload page
            location.reload();
          },
          error: function (xhr) {
            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;

              // Show errors in the modal without closing it
              $.each(errors, function (key, value) {
                alert(value[0]); // simplest way
              });
            }
          }
        });
      });

      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el))

    </script>
  </body>
</html>
