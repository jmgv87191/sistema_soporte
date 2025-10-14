@extends('adminlte::page')


@section('content_header')

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ajustes del sistema</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ url('/home') }} ">Inicio</a></li>
                        <li class="breadcrumb-item active">Ajustes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    <hr>

@stop

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Llene los campos del formulario</h3>


                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del sistema <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-building"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    value="{{old('nombre')}}" placeholder="Ej. Nombre del sistema" required>
                                                
                                            </div>
                                            @error('nombre')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="descripcion">descripción <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-align-left"></i>
                                                    </span>
                                                </div>
                                                <textarea class="form-control" name="descripcion" id="descripcion"  cols="30" rows="1"
                                                placeholder="Descripcion del negocio" required{{old('descripcion')}}
                                                ></textarea>
                                                
                                            </div>
                                            @error('nombre')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="sucursal">Sucursal <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="sucursal" id="sucursal"
                                                    value="{{old('sucursal')}}" placeholder="Ej. Sucursal centro" required>
                                                
                                            </div>
                                            @error('nombre')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                img
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop