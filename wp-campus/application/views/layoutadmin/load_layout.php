<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $empresa->EMPRC_RazonSocial;?></title>
        <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="<?php echo base_url();?>js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/scripts.js"></script>
        <!--script src="< ?php echo base_url();?>js/Chart.min.js" crossorigin="anonymous"></script-->
        <!--script src="< ?php echo base_url();?>assets/demo/chart-area-demo.js"></script-->
        <!--script src="< ?php echo base_url();?>assets/demo/chart-bar-demo.js"></script-->
        <script src="<?php echo base_url();?>js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>assets/demo/datatables-demo.js"></script>        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><?php echo $empresa->EMPRC_RazonSocial;?></a>
                <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                        <i class="fas fa-bars"></i>
                </button>
                <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Mis datos</a>
                        <!--a class="dropdown-item" href="#">Activity Log</a-->
                        <!--div class="dropdown-divider"></div-->
                        <a class="dropdown-item" href="<?php echo base_url();?>inicio/salir">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <?php echo $menuizq;?>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo strtoupper($_SESSION["login"]);?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main><?php echo $content;?></main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
