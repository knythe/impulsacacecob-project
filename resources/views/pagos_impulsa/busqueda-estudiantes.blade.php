<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registros de pagos - Academia Impulsa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <x-navigation-menu-asesor-impulsa></x-navigation-menu-asesor-impulsa>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-navigation-header></x-navigation-header>

                <div class="container-fluid">
                    <div class="welcome-container">
                        <div class="welcome-image">
                            <img src="{{ asset('img/buscar-estudiante.jpg') }}" alt="Logo Impulsa">
                        </div>

                        <div class="form-section">
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <!-- Inputs -->
                                    <form action="{{ route('busquedaEstudiante') }}" method="POST" class="w-100">
                                        <div class="col-sm-12">
                                            @csrf
                                            <hr>

                                            <div class="form-group row">
                                                <h1 class="form-group col-sm-3"></h1>
                                                <h1 class="form-group col-sm-9 text-center">CONTROL DE PAGOS</h1>
                                                <div class="form-group col-sm-3">
                                                </div>
                                                <div class="form-group col-sm-9">
                                                    <label class="text-center" for="dni">Buscar estudiante:</label>
                                                    <input type="text" class="form-control text-center" id="dni" name="dni" placeholder="Ingrese DNI" maxlength="8" required>
                                                </div>
                                                <div class="form-group col-sm-3">

                                                </div>
                                                <div class="form-group col-sm-9">
                                                    <button type="submit" class="btn btn-primary-impulsa btn-ciclos btn-block">Buscar</button>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <hr>

                            @if (isset($message))
                            <div class="alert alert-info">{{ $message }}</div>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <x-navigation-footer></x-navigation-footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
</body>

</html>