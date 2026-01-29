<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">Home</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="dropdown user user-menu">
                    <a href="#" class=" dropdown-toggle nav-link" data-toggle="dropdown">

                        <?php
                        $ci = &get_instance();
                        $user_id = $ci->session->userdata('userid');

                        $default_image = 'dist/img/user2-160x160.jpg';
                        $image_src = base_url($default_image); // Default dulu

                        if (!empty($user_id)) {
                            $ci->load->model('user_m');
                            $user = $ci->user_m->get_by_id($user_id);

                            if ($user && !empty($user->image)) {
                                $image_path = FCPATH . 'uploads/users/' . $user->image;
                                if (file_exists($image_path)) {
                                    $image_src = base_url('uploads/users/' . $user->image);
                                }
                            }
                        }
                        ?>

                        <img src="<?= $image_src ?>" class="user-image img-circle elevation-2" alt="User Image"
                            style="width: 160; height: 160; object-fit: cover;">
                        <span class="info"><?= $this->fungsi->user_login()->name ?> </span><i class="fas fa-caret-down">
                        </i>
                    </a>
                    <ul class="dropdown-menu bg-gray">
                        <!-- User image -->
                        <li class="user-header">
                            <div class="image">
                                <?php
                                $ci = &get_instance();
                                $user_id = $ci->session->userdata('userid');

                                // Force load dari database
                                $ci->load->model('user_m');
                                $user = $ci->user_m->get_by_id($user_id);

                                $default_image = 'dist/img/user2-160x160.jpg';

                                if ($user && !empty($user->image)) {
                                    $image_src = base_url('uploads/users/' . $user->image);
                                } else {
                                    $image_src = base_url($default_image);
                                }
                                ?>
                                <img src="<?= $image_src ?>" class="img-circle elevation-2" alt="User Image"
                                    style="max-width: 80px; max-height: 80px; width: auto; height: auto; object-fit: cover;">
                            </div>

                            <p>
                                <?= $this->fungsi->user_login()->name ?>
                                <small><?= $this->fungsi->user_login()->address ?></small>
                                <small><?= $this->fungsi->user_login()->username ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-right">
                                <a href="<?= site_url('auth/logout') ?>" type="button"
                                    class="btn btn-block btn-warning btn-sm">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>

        <!-- /.navbar -->


        </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard') ?>" class="brand-link">
                <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    <h4>rsip</h4>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php
                        $ci = &get_instance();
                        $user_id = $ci->session->userdata('userid');

                        // Force load dari database
                        $ci->load->model('user_m');
                        $user = $ci->user_m->get_by_id($user_id);

                        $default_image = 'dist/img/user2-160x160.jpg';

                        if ($user && !empty($user->image)) {
                            $image_src = base_url('uploads/users/' . $user->image);
                        } else {
                            $image_src = base_url($default_image);
                        }
                        ?>

                        <img src="<?= $image_src ?>" class="img-circle elevation-2" alt="User Image"
                            style="width: 160; height: 160; object-fit: cover;">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->fungsi->user_login()->name ?></a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Master</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-server"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-id-card nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>
                                    Laporan
                                    <span class="right badge badge-info">1</span>
                                </p>
                            </a>
                        </li>
                        <!-- ============= Pembatasan hak akses user ======================== -->
                        <!-- ============= Pembatasan hak akses user ======================== -->
                        <?php if ($this->session->userdata('level') == 1) { ?>
                        <li class="nav-header"><span class="right badge badge-warning">SUPER ADMIN</span></li>
                        <li class="nav-item">
                            <a href="<?= base_url('users') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Users
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- ============= Pembatasan hak akses user ======================== -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">