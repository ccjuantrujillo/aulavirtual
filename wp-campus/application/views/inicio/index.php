<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ingreso al campus</title>
        <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url();?>js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>js/scripts.js"></script>        
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Ingreso al campus</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url();?>inicio/ingresar" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="Empresa">Empresa: </label>
                                                <?php echo $selempresa;?>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                                <input class="form-control py-4" name="usuario" id="usuario" type="text" placeholder="Ingrese su usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="clave" id="clave" type="password" placeholder="Ingrese su password"/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="hidden" name="rol" id="rol" value="6">
                                                <input class="btn btn-primary" type="submit" name="Ingresar" value="Ingresar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
