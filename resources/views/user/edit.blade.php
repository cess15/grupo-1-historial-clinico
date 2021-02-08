@extends('layouts.app')
@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content-header')
<div class="row mb-2">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('perfil')}}"
                    class="{{ Request::path() === 'perfil' ? 'breadcrumb-item active' : 'breadcrumb-item' }}">Mi
                    perfil</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('perfil.edit')}}"
                    class="{{ Request::path() === 'perfil/editar' ? 'breadcrumb-item active' : 'breadcrumb-item' }}">Actualizar
                    Datos
                </a>
            </li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<div class="container">
    @if(session('msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Excelente</h5>
        <ul>
            <li>{{ session("msg") }}</li>
        </ul>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i>Error</h5>
        <ul>
            @foreach ($errors->all() as $error)
            @if($error == 'validation.ecuador')
            <li>La cédula no es válida</li>
            @else
            <li> {{ $error }} </li>
            @endif
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Mis Datos</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="user_profile">
                        <div class="user-pro-img">
                            <img src="{{ Auth::user()->url_imagen_perfil }}" id="img_loader" class="img_profile"
                                width="180px" height="180px" alt="foto_perfil">
                            <div class="add-dp">
                                <label for="file_picture_user"><i class="fa fa-camera"></i></label>
                                <input type="file" id="file_picture_user" name="imagen_perfil" />
                                <input hidden id="id" value="{{ Auth::user()->id }}" name="id" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::model($user, ['route' => ['perfil.update', $user->id], 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('nombres', 'Nombres(*)') }}
                        {{ Form::text('nombres', null, ['placeholder'=>'Ingrese nombres', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('apellidos', 'Apellidos(*)') }}
                        {{ Form::text('apellidos', null, ['placeholder'=>'Ingrese apellidos', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('cedula', 'Cédula(*)') }}
                        {{ Form::text('cedula', null, ['placeholder'=>'Ingrese cédula', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('email', 'Correo electrónico(*)') }}
                        {{ Form::text('email', null, ['placeholder'=>'Ingrese correo electrónico', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('telefono', 'Número celular(*)') }}
                        {{ Form::text('telefono', null, ['placeholder'=>'Ingrese número celular', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('genero', 'Gémero(*)') }}
                        <select name="genero" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="Masculino" {{ Auth::user()->genero==='Masculino' ? 'selected' : ''}}>
                                Masculino</option>
                            <option value="Femenino" {{ Auth::user()->genero==='Femenino' ? 'selected' : ''}}>
                                Femenino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('usuario', 'Nombre de usuario(*)') }}
                        {{ Form::text('usuario', null, ['placeholder'=>'Ingrese nombre de usuario', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Guardar datos</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Cambiar contraseña</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($user, ['route' => ['perfil.credentials', $user->id], 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('newpassword', 'Nueva contraseña(*)') }}
                        <input name="newpassword" type="password" class="form-control" placeholder="Contraseña" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('repassword', 'Repita contraseña(*)') }}
                        <input name="repassword" class="form-control" type="password" required
                            autocomplete="newpassword" placeholder="Repita contraseña">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('password', 'Contraseña actual(*)') }}
                        <input name="password" type="password" class="form-control" is-invalid
                            placeholder="Contraseña actual" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="text-danger"><em>Nota: <span class="text-dark">Para cambiar la contraseña es necesario
                                verificar su contraseña actual</span></em></p>
                    <button type="submit" class="btn btn-primary">Guardar datos</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/profile.js') }}"></script>
@endpush