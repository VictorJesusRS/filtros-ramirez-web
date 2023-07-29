@extends('layouts.container')

@section('title', 'Crear Marca')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Crear Marca</h1>
        <p class="mb-4">Formulario para la creación de nuevas Marcas.</p>

        <!-- contenido -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="width: 60%; margin: auto;">
                        
        @if(empty($marca))
    

                <form method="POST" action="{{ route('marcas.store') }}" name="crear" id="crear" id="crear"  enctype="multipart/form-data">
        @else

            @if($action == 'edit')

                     <form method="POST" action="{{ route('marcas.update', ['marca' => $marca->id]) }}" name="crear" id="crear" id="crear"  enctype="multipart/form-data">
        
                @method('PUT')
                       
            @endif

        @endif
             @csrf
           
                        
                           
                           @if(isset($marca))

                           <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre de la marca')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="$marca->nombre" required autofocus placeholder="" id="nombre"/>
                            </div>

                           @else
                            <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre de la marca')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
                            </div>
                            @endif


        @if($action == 'edit')

            <div class="form-group">
                <label for="current_img">Imagen Actual:</label> 

                <a href="/images/marcas/{{ $marca->id }}/{{ $marca->id }}.jpg">
                 <img class="w-100" src="/images/marcas/{{ $marca->id }}/{{ $marca->id }}.jpg" alt="" style="width:250px; height:250px;">   
                </a>
                
            </div>

             <div>
                                 <x-label for="imagen" class="label-form"  :value="__('Imagen:')" />
                                 <p>
                                     Formato aceptado: .jpg
                                 </p>
                                 @if(isset($producto))

                                 <p style="color:red">
                                     La imágen anterior será eliminada.
                                 </p>

                                 @endif
                                     
                                
                                 <input type="file" id="imagen"name="imagen" accept=".jpg" >
                            </div>
            @else


                            <div class="mt-3">
                                 <x-label for="imagen" class="label-form"  :value="__('Imagen nueva:')" />
                                 <p>
                                     Formato aceptado: .jpg
                                 </p>
                                
                                 <input type="file" name="imagen" accept=".jpg"  >
                            </div>
            
            @endif

                            <x-button class="buttom-submit">
                                {{ __('Guardar') }}
                            </x-button>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
     <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style type="text/css">
                   form label {
                    font-weight: 900 !important;
                   }
               </style>
               
@if(isset($marca))

    <script type="text/javascript">
    /*   $(function(){

            function update(id)
            {

                var nombre = $('#nombre').val();

                $.ajax({
                    url: '/marcas/'+id,
                    method: 'PUT',
                    data:{
                        'nombre': nombre
                    },
                    success: function(response){
                      //  console.log(response)
                       window.location.replace('/dash-marcas');
                    }
                });
            }

            $('#crear').on('submit', function(e){
                e.preventDefault();
                update({{ $marca->id }});

            });
        });*/
    </script>

@endif

@endsection