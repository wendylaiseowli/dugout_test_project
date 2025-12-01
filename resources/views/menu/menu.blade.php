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
      href="{{ asset('img/admin/favicon-dugout.png') }}"
    />
    <link rel="stylesheet" href="{{ asset('css/admin/pace.css') }}" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Menu  | The Dugout Oasis Admin Panel</title>
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
    <link
      href="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      rel="stylesheet"
      type="text/css"
    />
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- DS-styles -->
    <link href="{{ asset('css/admin/style-ds.css') }}" rel="stylesheet" type="text/css" />

    <!-- My style sheet -->
    <link rel="stylesheet" href="{{ asset('css/admin/styles-custom.css') }}" />
    
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script
      data-pace-options='{ "ajax": false, "selectors": [ "img" ]}'
      src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"
    ></script>

    <!-- For PDF Export -->
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
          <a href="index.html" class="navbar-brand">
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
                  src="{{ asset('img/admin/ds-img/userasset-4.png') }}"
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

              <li class="current-page menu-item-has-children active">
                <a href="javascript:void(0);"
                  > <i class="list-icon feather feather-list dugout-accent-color"></i>
                  <span class="hide-menu small-line dugout-accent-color">Menu </span></a
                >
                <ul class="list-unstyled sub-menu">
                  <li><a href="{{ route('menus.index')}}" class="text-white">Menu List</a></li>
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
                  <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Menu </li>
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
                      <div class="input-daterange input-group flex-wrap align-items-center">
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
                        <a
                          class="btn btn-normal btn-default btn-orange-ds ripple mb-2 input-m m-btn-full"
                          href="{{ route('menus.create') }}"
                        >
                          Add Menu Item
                        </a>
                        <select class="form-control input-m sort-time-dropdown" id="sub-category-list">
                          <option value="" disabled selected>Sub Category</option>
                          @foreach($subcategory as $item)
                            <option value="{{ strtolower($item->name) }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <select class="form-control input-m sort-time-dropdown" id="main-category-list">
                          <option value="" disabled selected>Main Category</option>
                          @foreach($category as $item)
                            <option value="{{ strtolower($item->name) }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
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
                            <th data-identifier="" class="sorting_asc text-black" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" aria-sort="descending">ID</th>
                            <th class="text-black">Menu Item Name</th>
                            <th class="text-black">Menu Item Description</th>
                            <th class="text-black">Menu Price</th>
                            <th class="text-black">Menu Category</th>
                            <th class="text-black">Menu Sub-Category</th>
                            <th class="text-black">Active?</th>
                            <th class="text-black">Last Updated</th>
                            <th class="text-black">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($menus as $menu)
                            <tr data-expanded="true">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $menu->menu_item_name }}</td>
                              <td>{{ $menu->menu_item_description }}</td>
                              <td><span>RM</span>{{ $menu->price }}</td>
                              <td>{{ $menu->category_name }}</td>
                              <td>{{ $menu->subcategory_name }}</td>
                              <td style="white-space: nowrap; width: 1%">
                                <div
                                  class="tabledit-toolbar btn-toolbar"
                                  style="text-align: left"
                                >
                                  <div
                                    class="btn-group btn-group-sm"
                                    style="float: none"
                                  >
                                    @if($menu->status ==true)
                                      <button
                                        type="button"
                                        class="tabledit-edit-button btn btn-sm btn-danger btn-status"
                                        data-toggle="modal"
                                        data-target="#deactivate-modal"
                                        data-menu-id ="{{ $menu->id }}"
                                        style="float: none"
                                      >
                                        <span
                                          class="glyphicon feather-x-circle"
                                        ></span>
                                        Deactivate
                                      </button>
                                    @else
                                      <button
                                        type="button"
                                        class="tabledit-edit-button btn btn-sm btn-success btn-status"
                                        data-toggle="modal"
                                        data-target="#activate-modal"
                                        data-menu-id ="{{ $menu->id }}"
                                        style="float: none"
                                      >
                                        <span
                                          class="glyphicon feather-check-circle"
                                        ></span>
                                        Activate
                                      </button>                                    
                                    @endif
                                  </div>
                                </div>
                              </td>
                              <td>{{ $menu->updated_at->diffForHumans()}}</td>
                              <td style="white-space: nowrap; width: 1%">
                                <div
                                  class="tabledit-toolbar btn-toolbar"
                                  style="text-align: left"
                                >
                                  <div
                                    class="btn-group btn-group-sm"
                                    style="float: none"
                                  >
                                    <!-- <button
                                      type="button"
                                      class="tabledit-edit-button btn btn-sm btn-default"
                                      data-toggle="modal"
                                      data-target="#deactivate-modal"
                                      style="float: none"
                                    >
                                      <span
                                        class="glyphicon feather-x-circle"
                                      ></span>
                                      Deactivate
                                    </button> -->
                                    <button
                                      type="button"
                                      class="tabledit-delete-button btn btn-sm btn-success "
                                      data-toggle="modal"
                                      data-target="#menudetails-modal"
                                      data-menu-id ="{{ $menu->id }}"
                                      data-menu-name ="{{ $menu->menu_item_name }}"
                                      data-menu-item-description ="{{ $menu->menu_item_description }}"
                                      data-menu-price ="{{ $menu->price }}"
                                      data-menu-category ="{{ $menu->category_name }}"
                                      data-menu-subcategory ="{{ $menu->subcategory_name }}"                                      
                                      style="float: none"
                                      data-bs-toggle="tooltip" data-bs-placement="top" title="View"
                                    >
                                      <span class="glyphicon feather-eye"></span>
                                    </button>
                                    <a
                                      type="button"
                                      class="tabledit-delete-button btn btn-sm btn-info"
                                      href="{{ route('menus.edit', $menu->id) }}"
                                      style="float: none; color:white;"
                                      data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                    >
                                      <span class="fa fa-edit"></span>
                                    </a>
                                    <button
                                      type="button"
                                      class="tabledit-delete-button btn btn-sm btn-danger"
                                      data-toggle="modal"
                                      data-target="#delete-modal"
                                      data-menu-id ="{{ $menu->id }}"
                                      style="float: none"
                                      data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                    >
                                      <span class="fa fa-trash"></span>
                                    </button>
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
          <!-- /.modal-dialog -->
          <!--Delete one div here below-->
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
                <form class="form-material" method="POST" id="deactive-menu-form">
                  @csrf
                  @method('PUT')
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <p class="text-center w-100">Are you sure you want to deactive the Menu Item status?</p>
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
          <!-- Deactivate here -->
          <!-- activate Modal -->
          <div id="activate-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material" method="POST" id="active-menu-form">
                  @csrf
                  @method('PUT')
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <p class="text-center w-100">Are you sure you want to active the Menu Item status?</p>
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
          <!-- activate here -->
          <!-- Delete Modal -->
          <div id="delete-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form class="form-material" method="POST" id="delete-menu-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <div class="modal-header">
                    <h5 class="modal-title">Delete Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </div>
                  <div class="modal-body">   
                    <p class="text-center w-100">Are you sure you want to delete the menu item?</p>
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
          <!--  User Modal -->
          <div id="menudetails-modal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-large">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-header">
                  <h5 class="modal-title">Menu Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="userdetail d-flex justify-content-between">
                    <p>ID:</p>
                    <p class="text-black" id="modal-menu-id"></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Menu Item Name:</p>
                    <p class="text-black" id="modal-menu-name"></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Menu Item Description:</p>
                    <p class="text-black text-right" id="modal-menu-description"></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Price (RM):</p>
                    <p class="text-black" id="modal-menu-price"></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Category:</p>
                    <p class="text-black" id="modal-menu-category"></p>
                  </div>
                  <div class="userdetail d-flex justify-content-between">
                    <p>Sub Category:</p>
                    <p class="text-black" id="modal-menu-subcategory"></p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mithril/1.1.1/mithril.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
    <script src="{{ asset('js/admin/custom-js.js') }}"></script>
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
              // Recommended options:
              placement: 'bottom', // Positions the popup below the input
              align: 'left',       // Aligns the popup to the left
              autoclose: true,     // Closes the popup once a time is selected
              vibrate: true,        // Adds a small vibration on mobile (optional)
          });
      });

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
            if (i === 1 || i === pageCount || (i >= currentPage - 1 && i <= currentPage + 1)) {
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
            } else if (i === 2 && currentPage > 3) {
              // Ellipsis after first page
              const li = document.createElement("li");
              li.className = "page-item disabled";
              li.innerHTML = `<span class="page-link">...</span>`;
              pagination.appendChild(li);
            } else if (i === pageCount - 1 && currentPage < pageCount - 2) {
              // Ellipsis before last page
              const li = document.createElement("li");
              li.className = "page-item disabled";
              li.innerHTML = `<span class="page-link">...</span>`;
              pagination.appendChild(li);
            }
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
          pagination.appendChild(next);
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
        const filter = this.value.toLowerCase()
        const rows = document.querySelectorAll('#myTable tbody tr')
        rows.forEach(row => {
          const text = row.textContent.toLowerCase()
          row.style.display = text.includes(filter) ? '' : 'none'
        })
      })

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

      // Wait for the page to fully load
      document.addEventListener('DOMContentLoaded', function() {
        
        // Get the dropdown element
        const galleryDropdown = document.getElementById('sub-category-list');
        
        // Add event listener for when dropdown value changes
        galleryDropdown.addEventListener('change', function() {
          
          // Get the selected category value
          const selectedCategory = this.value.toLowerCase();
          
          // Get all table rows in the tbody
          const tableRows = document.querySelectorAll('#myTable tbody tr');
          
          // Loop through each row
          tableRows.forEach(function(row) {
            
            // Get the category cell (2nd column, index 1)
            const categoryCell = row.cells[5];
            
            // Get the text content and convert to lowercase
            const rowCategory = categoryCell.textContent.trim().toLowerCase();
            
            // Show or hide the row based on selection
            if (selectedCategory === '' || rowCategory === selectedCategory) {
              row.style.display = ''; // Show row
            } else {
              row.style.display = 'none'; // Hide row
            }
          });
        });
        
      });

      // Wait for the page to fully load
      document.addEventListener('DOMContentLoaded', function() {
        
        // Get the dropdown element
        const galleryDropdown = document.getElementById('main-category-list');
        
        // Add event listener for when dropdown value changes
        galleryDropdown.addEventListener('change', function() {
          
          // Get the selected category value
          const selectedCategory = this.value.toLowerCase();
          
          // Get all table rows in the tbody
          const tableRows = document.querySelectorAll('#myTable tbody tr');
          
          // Loop through each row
          tableRows.forEach(function(row) {
            
            // Get the category cell (2nd column, index 1)
            const categoryCell = row.cells[4];
            
            // Get the text content and convert to lowercase
            const rowCategory = categoryCell.textContent.trim().toLowerCase();
            
            // Show or hide the row based on selection
            if (selectedCategory === '' || rowCategory === selectedCategory) {
              row.style.display = ''; // Show row
            } else {
              row.style.display = 'none'; // Hide row
            }
          });
        });
        
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
          doc.text('Menu Export', 14, 15);
          
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
            rowData.push(cells[1].textContent.trim()); // Name
            rowData.push(cells[2].textContent.trim()); // Description
            rowData.push(cells[3].textContent.trim()); // price
            rowData.push(cells[4].textContent.trim()); // Category
            rowData.push(cells[5].textContent.trim()); // Subcategory          
            rowData.push(cells[6].textContent.trim()); // Active?
            rowData.push(cells[7].textContent.trim()); // Last Updated
            
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
          exportToCSV('menu-all.csv', data);
        });
        
        // CSV Filtered
        document.getElementById('export-csv-filtered').addEventListener('click', function(e) {
          e.preventDefault();
          const data = getTableData(false);
          exportToCSV('menu-filtered.csv', data);
        });
        
        // PDF All
        document.getElementById('export-pdf-all').addEventListener('click', function(e) {
          e.preventDefault();
          exportToPDF('menu-all.pdf', true);
        });
        
        // PDF Filtered
        document.getElementById('export-pdf-filtered').addEventListener('click', function(e) {
          e.preventDefault();
          exportToPDF('menu-filtered.pdf', false);
        });

        //Active
        $('#deactivate-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var menuId = button.data('menu-id');

            $('#deactive-menu-form').attr('action', '/menus/' + menuId + '/deactive');
        });        
        //Deactive
        $('#activate-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var menuId = button.data('menu-id');

            $('#active-menu-form').attr('action', '/menus/' + menuId + '/active');
        });
        
        //View
        $('#menudetails-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var menuId = button.data('menu-id');
          var name = button.data('menu-name');
          var description = button.data('menu-item-description');
          var price = button.data('menu-price');
          var category = button.data('menu-category');
          var subcategory = button.data('menu-subcategory');
          
          // Update modal content
          $('#modal-menu-id').text(menuId);
          $('#modal-menu-name').text(name);
          $('#modal-menu-description').text(description);
          $('#modal-menu-price').text(price);
          $('#modal-menu-category').text(category);
          $('#modal-menu-subcategory').text(subcategory);
        });

        //Delete
        $('#delete-modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var menuId = button.data('menu-id');
          
          $('#delete-menu-form').attr('action', '/menus/' + menuId);
        });
      });

      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el))

    </script>
  </body>
</html>
