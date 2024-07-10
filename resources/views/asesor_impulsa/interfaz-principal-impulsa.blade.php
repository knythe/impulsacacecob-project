<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema ImpulsaCacecob">
    <meta name="author" content="anthopzk">

    <title> Home - Academia Impulsa</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-impulsa.png')}}">

    <!-- Custom fonts for this template-->
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset ('css/template.css')}}" rel="stylesheet">
  

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-navigation-menu-asesor-impulsa></x-navigation-menu-asesor-impulsa>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
           
                


                <!-- Topbar -->
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <x-navigation-header></x-navigation-header>

                    <div class="welcome-container">
                        <div class="welcome-image">
                            <img src="{{ asset('img/fondo-asesor.jpg') }}" alt="Logo Impulsa">
                        </div>
                        <div class="welcome-content">
                            <h1 class="text-primary-impulsa">Bienvenidos a Academia Impulsa</h1>
                            <p>Bienvenido al sistema de Academia Impulsa. Por favor, elija una opción para continuar.</p>
                            <div class="welcome-buttons">
                                
                                <a href="{{route ('ciclos.create')}}" class="btn btn-primary-impulsa">Buscar</a>
                            </div>
                        </div>
                    </div>

                
                <!-- /.container-fluid -->

            
            <!-- End of Main Content -->

            <!-- Footer -->
            <x-navigation-footer></x-navigation-footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('assets/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset ('assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset ('assets/demo/chart-pie-demo.js')}}"></script>

</body>

</html>