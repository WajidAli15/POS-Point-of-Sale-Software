<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Soda Shop </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/favicon.ico' />
  <!-- Style -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body style="background-color:#1D566E">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?= base_url() ?>assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">

            <!---- Session Query ----->
              <?php
              $user_id = $this->session->userdata('user_id');
              $userdata = $this->db->query("select * from users_table where id='$user_id'")->result()[0];
              ?>
            <!---- Session Query ----->

            <!--- Show to user id(name & infromation) for user --->
              <div class="dropdown-title"><?= $userdata->name ?></div>
              <!--- Show to user id(name & infromation) for user --->
              
              <a href="!#" class="dropdown-item has-icon" data-toggle="modal" data-target="#shopmodal"> <i class="far fa-user"></i> Shop Setting
              </a> <a href="timeline.html" class="dropdown-item has-icon" data-toggle="modal" data-target="#profilemodal"> <i class="fas fa-bolt"></i>
                Profile
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url() ?>Login/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">
              <span class="logo-name">Soda Shop</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?= base_url() ?>Dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <a href="<?= base_url() ?>Sell_dashboard" class="nav-link"><i data-feather="monitor"></i> Sell Dashboard</a>
            </li>
            <li class="dropdown">
              <!-- <a href="</?=base_url()?>Drinks"><i data-feather="monitor"></i><span>Drinks</span></a>
             <a href="</?=base_url()?>Refreshment"><i data-feather="monitor"></i><span>Refreshment</span></a>
             <a href="</?=base_url()?>fastfood"><i data-feather="monitor"></i><span>Fast Food</span></a> ----->
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Registations</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url() ?>Catagory">Catagory</a></li>
                <li><a class="nav-link" href="<?= base_url() ?>Newproducts">Products</a></li>
                <li><a class="nav-link" href="<?= base_url() ?>Expences">Expences</a></li>
                <li><a class="nav-link" href="<?= base_url() ?>Branch_user">Branch User</a></li>
                <li><a class="nav-link" href="<?= base_url() ?>Manage_supplier">Manage Supplier</a></li>
              </ul>
            </li>
           <!-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Branches Name</span></a>
              <ul class="dropdown-menu">
                --  <li><a class="nav-link" href="</?=base_url() ?>Branch">Branch</a></li> ---
                <li><a class="nav-link" href="<?= base_url() ?>Branch_user">Branch User</a></li>
                <li><a class="nav-link" href="<?= base_url() ?>Manage_supplier">Manage Supplier</a></li>
              </ul>
            </li>
              --------------------->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Sales</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url() ?>Sale">Sale</a></li>
              </ul>
            </li>

            <li class="menu-header">Soda Shop</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Auth</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url()?>Login">Login</a></li>
                <li><a href="<?= base_url() ?>Users">Register</a></li>
                <li><a href="<?= base_url() ?>Users">Users</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
</body>
      <!----- Dark mode setting ----->
      <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
          <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="p-15 border-bottom">
              <h6 class="font-medium m-b-10">Select Layout</h6>
              <div class="selectgroup layout-color w-50">
                <label class="selectgroup-item">
                  <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                  <span class="selectgroup-button">Light</span>
                </label>
                <label class="selectgroup-item">
                  <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                  <span class="selectgroup-button">Dark</span>
                </label>
              </div>
            </div>
            <div class="p-15 border-bottom">
              <h6 class="font-medium m-b-10">Sidebar Color</h6>
              <div class="selectgroup selectgroup-pills sidebar-color">
                <label class="selectgroup-item">
                  <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                  <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                </label>
                <label class="selectgroup-item">
                  <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                  <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                </label>
              </div>
            </div>
            <div class="p-15 border-bottom">
              <h6 class="font-medium m-b-10">Color Theme</h6>
              <div class="theme-setting-options">
                <ul class="choose-theme list-unstyled mb-0">
                  <li title="white" class="active">
                    <div class="white"></div>
                  </li>
                  <li title="cyan">
                    <div class="cyan"></div>
                  </li>
                  <li title="black">
                    <div class="black"></div>
                  </li>
                  <li title="purple">
                    <div class="purple"></div>
                  </li>
                  <li title="orange">
                    <div class="orange"></div>
                  </li>
                  <li title="green">
                    <div class="green"></div>
                  </li>
                  <li title="red">
                    <div class="red"></div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="p-15 border-bottom">
              <div class="theme-setting-options">
                <label class="m-b-0">
                  <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                  <span class="custom-switch-indicator"></span>
                  <span class="control-label p-l-10">Mini Sidebar</span>
                </label>
              </div>
            </div>
            <div class="p-15 border-bottom">
              <div class="theme-setting-options">
                <label class="m-b-0">
                  <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                  <span class="custom-switch-indicator"></span>
                  <span class="control-label p-l-10">Sticky Header</span>
                </label>
              </div>
            </div>
            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
              <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                <i class="fas fa-undo"></i> Restore Default
              </a>
            </div>
          </div>
        </div>
      </div>
      <!----- Dark mode setting ----->
     








      <!-- Shop Setting Modal -->
      <div class="modal fade" id="shopmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="shop_form" class="form-material">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <?php
                  $dataform=$this->db->query("select * from profile_table where id='1'")->result()[0];
                 ?>
                  <div class="col-md-12 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?= $dataform->name?>" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="<?= $dataform->phone?>" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= $dataform->address?>" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="shop_savebtn" class="btn btn-primary">Save changes</button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
      <!-- Shop Setting Modal -->


      <!-- Profile Modal -->
      <div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="profile_form" class="form-material">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <?php
                  $user_id = $this->session->userdata('user_id');
                  $dataform = $this->db->query("select * from users_table where id='$user_id'")->result()[0];
                 ?>
                 <div class="col-md-12 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= $dataform->name?>" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" email="email" placeholder="Enter Email" value="<?= $dataform->email?>" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?= $dataform->password?>" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="profile_savebtn" class="btn btn-primary">Save changes</button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
