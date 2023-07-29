               @extends('layouts.container')

               @section('title', 'Vehículos')

               @section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Vehículos</h1>
                    <p class="mb-4">Lista de todos las Vehículos registradas en la tienda en línea.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <div>
                                <a href="{{ route('vehiculos.create') }}" class="add-new-button">Nuevo</a>
                            </div>
                   
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo de Modelo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo de Modelo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($vehiculos as $vehiculo)

                                        <tr>
                                            <td>{{ $vehiculo->id }}</td>
                                            <td>{{ $vehiculo->tipo_modelo }}</td>
                                            <td>{{ ucwords($vehiculo->marca->nombre) }}</td>
                                            <td>{{ ucwords($vehiculo->modelo->nombre) }}</td>
                                            <td>
                                                    <div class="data-table-actions-layout">
                                                    
                                                        <div>
                                                            <a class="btn btn-secondary btn-icon-split" href="{{ route('vehiculos.edit', [
                                                            'vehiculo' => $vehiculo->id
                                                        ]) }}">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-pen"></i>
                                                                </span> <!-- <span class="text">Modificar</span> -->
                                                            </a>
                                                        </div>
                                                   
                                                        <div>
                                                            <a class="btn btn-danger btn-icon-split" onclick="eliminar({{ $vehiculo->id }})">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <!-- <span class="text">Eliminar</span> -->
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

        @endsection

    @section('scripts')


        <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    


    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>


<link rel="stylesheet" type="text/css" href="/css/dash-categorias.css">

<script type="text/javascript">

        function eliminar(id)
        {
            $.ajax({
                url: '/vehiculos/'+id,
                method: 'DELETE',
                data:{

                },
                success: function(response){
                    console.log(response)

                    window.location.replace('/dash-vehiculos');
                }
            });
        }

</script>


    @endsection