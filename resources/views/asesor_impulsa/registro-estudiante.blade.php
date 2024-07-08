<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTRAR VENTA - Academia Impulsa</title>
    <link rel="website icon" type="png" href="{{asset('img/logo-impulsa.png')}}">
    <!-- ALERTA-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--END ALERTA-->
    <!-- Bstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/template.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a class="text-primary-impulsa">Registrar Apoderado</a></li>
                        <li class="breadcrumb-item"><a class="text-primary-impulsa">Registrar Estudiante</a></li>
                        <li class="breadcrumb-item">Registrar Comprobante</li>
                        <li class="breadcrumb-item">Registrar Venta</li>
                    </ol>

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form id="create_estudiante" action="{{ route('estudiantes.store') }}" method="post">
                                        @csrf
                                        <!-- DATOS ESTUDIANTE -->
                                        <h1 class="h4 text-gray-900 mb-1 text-center">DATOS DEL ESTUDIANTE</h1>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-11 mb-3 mb-sm-0">
                                                <label for="apoderado_id">Nombres del apoderado:</label>
                                                <input type="text" class="form-control" id="apoderadoss" name="apoderadoss" placeholder="Ingrese nombres del apoderado" value="{{ $nombre_completo_apoderado }}" readonly>
                                                <input type="hidden" id="apoderado_id" name="apoderado_id" value="{{ $apoderado_id }}">
                                            </div>

                                            <!-- botón editar apoderado -->
                                            <div class="form-group col-sm-1 mb-3 mb-sm-0" role="group" aria-label="Basic mixed styles example">
                                                <hr>
                                                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#editModal-{{$ultimo_apoderado->id}}" title="Editar"><i class="fas fa-edit"></i></button>
                                            </div>
                                            <!---->
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                                <label for="nombres">Nombres del estudiante:</label>
                                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres del estudiante" oninput="soloLetras(this)" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="apellidos">Apellidos del estudiante:</label>
                                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos del estudiante" oninput="soloLetras(this)" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-4 mb-3 mb-sm-0">
                                                <label for="dni">Documento de identidad del estudiante:</label>
                                                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese numero de DNI" maxlength="8" oninput="soloNumeros(this)" required>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="telefono">Telefono del estudiante:</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese numero de celular" maxlength="9" oninput="soloNumeros(this)" required>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="email">Email del estudiante:</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese email del estudiante" oninput="soloLetrasNumeros(this)">
                                                <label for="email" class="center-text-label">*completar en caso sea necesario*</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-3">
                                                <label for="sede">Sede:</label>
                                                <select class="form-control" id="sede" name="sede" required>
                                                    <option value="" class="text-center">- Seleccionar -</option>
                                                    <option value="Piura" class="text-center">Piura</option>
                                                    <option value="Paita" class="text-center">Paita</option>
                                                    <option value="Sechura" class="text-center">Sechura</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-9">
                                                <label for="direccion">Direccion del estudiante:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese direccion del estudiante" oninput="soloLetrasNumerosCaracteres(this)" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-sm-4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <button type="submit" class="btn btn-primary-impulsa-estudiante btn-ciclos w-100" title="Siguiente">Siguiente</button>
                                            </div>
                                        </div>
                                        <!-- END DATOS ESTUDIANTE -->
                                    </form>
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
    <!--Edit Modal -->
    <div class="modal fade" id="editModal-{{$ultimo_apoderado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos del apoderado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header and Body -->
                <div class="modal-body">

                    <form class="edit_apoderado" action="{{ route('apoderados.update', $ultimo_apoderado->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- Form fields -->
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="nombres">Nombres del apoderado:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres del apoderado" value="{{$ultimo_apoderado->nombres}}" oninput="soloLetras(this)" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="apellidos">Apellidos del apoderado:</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos del apoderado" value="{{$ultimo_apoderado->apellidos}}" oninput="soloLetras(this)" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                                    <label for="parentesco">Parentesco con el estudiante:</label>
                                    <select class="form-control" id="parentesco" name="parentesco" required>
                                        @php
                                        $parentescos = [
                                        "Hermano(a)" => "Hermano(a)",
                                        "Primo(a)" => "Primo(a)",
                                        "Tio(a)" => "Tio(a)",
                                        "Abuelo(a)" => "Abuelo(a)",
                                        "Papá" => "Papá",
                                        "Mamá" => "Mamá",
                                        "Cuñado(a)" => "Cuñado(a)",
                                        "Recomendado(a)" => "Recomendado(a)"
                                        ];
                                        @endphp

                                        @foreach ($parentescos as $value => $label)
                                        <option value="{{ $value }}" class="text-center" @if($ultimo_apoderado->parentesco == $value) selected @endif>{{ $label }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="telefono">Telefono del apoderado:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese numero de celular" maxlength="15" oninput="soloNumeros(this)" value="{{$ultimo_apoderado->telefono}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-6">
                                    <label for="telefono_secundario">Telefono sescundario del apoderado:</label>
                                    <input type="text" class="form-control" id="telefono_secundario" name="telefono_secundario" placeholder="Ingrese numero de celular secundario" maxlength="15" oninput="soloNumeros(this)" value="{{$ultimo_apoderado->telefono_secundario}}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Correo electronico:</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese email del apoderado" oninput="soloLetrasNumeros(this)" value="{{$ultimo_apoderado->email}}">
                                    <label for="email" class="center-text-label">*completar en caso sea necesario*</label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-ciclos" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary-impulsa btn-ciclos">Confirmar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset ('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset ('assets/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset ('js/scripts.js')}}"></script>
    <script src="{{asset ('js/estudiantes.js')}}"></script>
    <script src="{{asset ('js/apoderados.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset ('assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset ('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('assets/demo/datatables-demo.js')}}"></script>
</body>

</html>