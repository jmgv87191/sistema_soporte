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
                        <form action="{{ route('admin.ajustes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                                    value="{{old('nombre',$ajuste->nombre ?? '' )}}" placeholder="Ej. Nombre del sistema" required>
                                                
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
                                                placeholder="Descripcion del negocio" required
                                                >{{old('descripcion', $ajuste->descripcion ?? '' )}}</textarea>
                                                
                                            </div>
                                            @error('descripcion')
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
                                                    value="{{old('sucursal',$ajuste->sucursal)}}" placeholder="Ej. Sucursal centro" required>
                                                
                                            </div>
                                            @error('sucursal')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telefonos">Teléfonos <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="telefonos" id="telefonos"
                                                    value="{{old('telefonos',$ajuste->telefonos)}}" placeholder="Ej. +52 612 121122" required>
                                                
                                            </div>
                                            @error('telefonos')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="direccion">dirección <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-home"></i>
                                                    </span>
                                                </div>
                                                <textarea class="form-control" name="direccion" id="direccion"  cols="30" rows="1"
                                                placeholder="Dirección completa" required
                                                >{{old('direccion', $ajuste->direccion ?? '' )}}</textarea>
                                                
                                            </div>
                                            @error('direccion')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="divisa">Moneda <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>

                                                <select name="divisa" class="form-control" id="divisa" required>
                                                    <option value="" disabled selected>-- Seleccione una opción --</option>
                                                    @foreach( $divisas as $divisa )
                                                        <option value="{{ $divisa['code'] }}" 
                                                            {{ old('divisa',$ajuste->divisa) == $divisa['code'] ? 'selected' : '' }}>
                                                            {{ $divisa['name'] }} - {{ $divisa['code'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            @error('divisa')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Correo Electrónico <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="email" class="form-control" name="correo" id="correo"
                                                    value="{{old('correo',$ajuste->correo)}}" placeholder="Ej. juan@ejemplo.com" required>
                                                
                                            </div>
                                            @error('correo')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pagina_web">Pagina web <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-globe"></i>
                                                    </span>
                                                </div>
                                                <input type="url" class="form-control" name="pagina_web" id="pagina_web"
                                                    value="{{old('pagina_web',$ajuste->pagina_web)}}" placeholder="Ej. http://tuPagina.com" required>
                                                
                                            </div>
                                            @error('pagina_web')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    
                                </div>
                                </div>

                                <div class="col-md-3">
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo">Logo principal <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-image"></i>
                                                    </span>
                                                </div>
                                                <input type="file" class="form-control" name="logo" id="logo"
                                                    accept="image/*" onchange="mostrarImagen(event)" required>
                                                
                                            </div>

                                            <center>
                                                <img id='preview1' src="{{ asset('storage/logos'.$ajuste->logo) }}"
                                                style="max-width: 100px; margin-top:10px">
                                            </center>



                                            @error('logo')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>

                                <script>
                                    const mostrarImagen = e =>
                                    document.getElementById('preview1').src = URL.createObjectURL(e.target.files[0]);
                                </script>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo_auto">Logo para auto <b>(*)</b> </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        <i class="fas fa-car"></i>
                                                    </span>
                                                </div>
                                                <input type="file" class="form-control" name="logo_auto" id="logo_auto"
                                                    accept="image/*" onchange="mostrarImagen2(event)" required>
                                                
                                            </div>


                                            <center>
                                                <img id='preview2' src=""
                                                style="max-width: 100px; margin-top:10px">
                                            </center>

                                            @error('logo_auto')
                                                <small class="text-danger">* {{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>


                                <script>
                                    const mostrarImagen2 = e =>
                                    document.getElementById('preview2').src = URL.createObjectURL(e.target.files[0]);
                                </script>

                                </div>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">(*) Campos obligatorios</p>
                                    <button type="submit" class="btn btn-primary float-right" > <i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </form>
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