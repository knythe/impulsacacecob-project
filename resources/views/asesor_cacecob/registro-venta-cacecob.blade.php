<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR VENTA - CACECOB EIRL</title>
    <link rel="website icon" type="png" href="{{asset ('img/logo-cacecob.png')}}">
    <!-- ALERTA-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--END ALERTA-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

    <!-- Bstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset ('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset ('css/template.css')}}" rel="stylesheet">

    <style>
        .hidden-during-pdf {
            display: none !important;
        }

        .pdf-friendly-input {
            background-color: white !important;
            border: 1px solid #ccc !important;
            box-shadow: none !important;
            color: black !important;
        }
    </style>


    <!-- Custom styles for this page -->
    <link href="{{asset ('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<!-- -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-navigation-menu-asesor-cacecob></x-navigation-menu-asesor-cacecob>
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
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-cacecob">Registrar Cliente</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-cacecob">Registrar Comprobante</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-cacecob">Registrar Venta</a></li>
                    </ol>
                </div>

                <div class="container-impulsa" id="container-impulsa">

                    <div class="image-containerimpulsa">
                        <img src="{{ asset('img/fondo-venta-cacecob.jpg') }}" alt="Logo Impulsa">
                    </div>

                    <div class="form-container-impulsa" id="form-container-impulsa">


                        <form action="{{ route('cacecobventas.store') }}" id="create_ventacacecob" method="post">
                            @csrf
                            <!-- DATOS DE INSCRIPCION -->
                            <h1 class="h4 text-gray-900 mb-1 text-center">DETALLES DE VENTA</h1>
                            <hr>
                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="form-group col-sm-12 mb-3 mb-sm-0">
                                        <label for="evento_id">Programa de formacion:</label>
                                        <select class="form-control" style="background-color: #9F1423; color:white " id="evento_id" name="evento_id" required>
                                            @foreach($cacecob_eventos as $item)
                                            <option value="{{ $item->id }}" class="text-center" data-precio="{{ $item->costo }}">{{ $item->tipo_evento ?? ''}} - {{ $item->nombre_evento ?? ''}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="form-group col-sm-4">
                                            <label for="precio_evento">Costo del evento:</label>
                                            <input type="text" class="form-control" id="precio_evento" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="monto">Monto abondado:</label>
                                            <input type="text" class="form-control" id="monto" name="monto" value="S/. {{$ultimo_pagocacecob->comprobante->monto ?? ''}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="total">Monto adeudado:</label>
                                            <input type="text" class="form-control" id="total" name="total" readonly>
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <label for="clientecacecob_id">Datos del cliente:</label>
                                            <input type="text" class="form-control" id="" name="" value="{{$ultimo_cliente->nombres ?? ''}} {{$ultimo_cliente->apellidos ?? ''}}" readonly>
                                            <input type="hidden" id="clientecacecob_id" name="clientecacecob_id" value="{{ $cliente_id }}">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label for="">Documento de identidad:</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Ingrese codigo de operacion" value="{{$ultimo_cliente->documento_identidad ?? ''}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Email de contacto:</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Ingrese codigo de operacion" value="{{$ultimo_cliente->email ?? 'S/E'}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Telefono de contacto:</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Ingrese codigo de operacion" value="{{$ultimo_cliente->telefono ?? 'S/N'}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Codigo de operacion:</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Ingrese codigo de operacion" value="{{$ultimo_pagocacecob->comprobante->codigo_operacion ?? ''}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">Numero de comprobante:</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Ingrese codigo de operacion" value="{{$ultimo_pagocacecob->comprobante->numero_comprobante ?? ''}}" readonly>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="pagocacecob_id">Metodo de pago:</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Ingrese codigo de operacion" value="{{$ultimo_pagocacecob->comprobante->tipo_pago ?? 'S/N'}}" readonly>
                                            <input type="hidden" id="pagocacecob_id" name="pagocacecob_id" value="{{ $pago_id }}">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="">Observaciones:</label>
                                            <textarea name="" class="form-control" rows="2" id="" readonly>{{$ultimo_pagocacecob->comprobante->observaciones}}</textarea>
                                        </div>
                                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                            <label for="empleado_id">Asesor(a):</label>
                                            <select class="form-control" style="background-color: #9F1423; color:white " id="empleado_id" name="empleado_id" required>
                                                @foreach($empleados as $empleado)
                                                <option value="{{ $empleado->id }}" class="text-center">{{ $empleado->usuario->user }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                            <label for="certificado">Certificado:</label>
                                            <select class="form-control text-center" style="background-color: #9F1423; color:white " name="certificado" id="certificado">
                                                <option value="">- SELECCIONAR -</option>
                                                <option value="SIN CERTIFICADO">SIN CERTIFICADO</option>
                                                <option value="CERTIFICADO DIGITAL">CERTIFICADO DIGITAL</option>
                                                <option value="CERTIFICADO FISICO">CERTIFICADO FISICO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="form-group col-sm-4">
                                    </div>
                                    <div class="form-group col-sm-4">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <button type="submit" class="btn btn-primary-asesor-cacecob btn-ciclos w-100 hide-on-pdf" id="save-button" title="Siguiente">Registrar venta</button>
                                    </div>
                                </div>
                                <!-- END DATOS DE INSCRIPCION-->
                        </form>
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

    <!-- End Edit Modal -->
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


    <script>
        function updateTotal() {
            // Obtener el valor del precio del ciclo
            var precioEventoInput = document.getElementById('precio_evento').value;
            var precioEvento = parseFloat(precioEventoInput.replace('S/.', '').trim()) || 0;

            // Obtener el valor del monto cancelado
            var montoInput = document.getElementById('monto').value;
            var monto = parseFloat(montoInput.replace('S/.', '').trim()) || 0;

            // Calcular la suma de ambos valores
            var total = precioEvento - monto;

            // Actualizar el input del total
            document.getElementById('total').value = 'S/. ' + total.toFixed(0);
        }

        // Añadir un event listener al select para actualizar el total cuando se seleccione un ciclo
        document.getElementById('evento_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var precio = selectedOption.getAttribute('data-precio');

            var precioEvento = document.getElementById('precio_evento');

            if (precio) {
                precioEvento.value = 'S/. ' + precio;
            } else {
                precioEvento.value = 'S/. 0.00';
            }

            // Actualizar el total
            updateTotal();
        });

        // Actualizar el total al cargar la página
        window.onload = function() {
            updateTotal();
        };
    </script>







    <!-- -->
    <!-- BstrapJS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/comprobantes.js')}}"></script>
    <script src="{{asset ('js/estudiantes.js')}}"></script>
    <script src="{{asset ('js/pagos.js')}}"></script>
    <script src="{{asset ('js/cacecobclientes.js')}}"></script>
    <script src="{{asset ('js/pdf_ventas_cacecob.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>

</body>

</html>