<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR VENTA - Academia Impulsa</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-impulsa.png')}}">
    <!-- ALERTA-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--END ALERTA-->
    <!-- Bstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset ('css/template.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset ('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<!-- -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-navigation-menu-asesor-impulsa></x-navigation-menu-asesor-impulsa>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-navigation-header></x-navigation-header>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    ##

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form action="{{ route('comprobantes.store') }}" class="user" method="post">
                                        @csrf
                                        <!-- DATOS DE INSCRIPCION -->
                                        <h1 class="h4 text-gray-900 mb-1 text-center">DATOS DE PAGO</h1>
                                        <div class="form-group-impulsa" style="margin-bottom:4px; padding-bottom: 0px">
                                            <div class="form-group row" style="margin-bottom: 0px">
                                                <!--<div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                    <label for="apellidos">Ciclo:</label>
                                                    <select class="form-control" id="estado" name="estado" required>
                                                        @foreach($ciclos as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nombre_ciclo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>-->
                                                <div class="form-group col-sm-6">
                                                    <label for="fecha_pago">Fecha de inscripcion:</label>
                                                    <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" placeholder="Celular">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="tipo_pago">Tipo de pago:</label>
                                                    <select class="form-control" id="tipo_pago" name="tipo_pago" required>
                                                        <option value="" class="text-center">- Seleccionar -</option>
                                                        <option value="0" class="text-center">YAPE</option>
                                                        <option value="1" class="text-center">PLIN</option>
                                                        <option value="2" class="text-center">BCP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom: 0px">
                                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                                    <label for="codigo_operacion">Codigo de operacion:</label>
                                                    <input type="text" class="form-control" id="codigo_operacion" name="codigo_operacion" placeholder="Ingrese codigo de operacion">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="monto">Monto cancelado:</label>
                                                    <input type="number" class="form-control" id="monto" name="monto" placeholder="Ingrese monto cancelado">
                                                </div>
                                                <!--<div class="form-group col-sm-4">
                                                    <label for="apellidos">Asesor(a):</label>
                                                    <select class="form-control" id="estado" name="estado" required>
                                                        @foreach($usuarios as $item)
                                                        <option value="{{ $item->id }}">{{ $item->user }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>-->
                                                <div>
                                                    <button type="submit" class="btn btn-primary-impulsa-estudiante btn-ciclos" title="Eliminar">Siguiente<i class="fas fa-arrow-alt-circle-right icon-separator"></i></button>
                                                </div>
                                            </div>
                                            <hr>


                                        </div>
                                        <!-- END DATOS DE INSCRIPCION-->




                                    </form>
                                    <hr>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
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
    @if (session('success'))
    <script>
        let message = "{{session('success')}}";
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: message
        });
    </script>
    @endif


    <!-- -->
    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>