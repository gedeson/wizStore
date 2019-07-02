@extends('layouts.default')

@section('content')

<h1>Novo utilizador</h1>

<hr>

{{ Form::open(array('url' => 'register  ', 'class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    <label for="nome" class="col-lg-2 control-label">Nome</label>
    <div class="col-lg-6">
        {{ Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Nome')) }}
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-lg-2 control-label">E-mail</label>
    <div class="col-lg-6">
        {{ Form::email('email', $user->email, array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
    </div>
</div>

<div class="form-group">
    <label for="senha" class="col-lg-2 control-label">Senha</label>
    <div class="col-lg-6">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Senha')) }}
    </div>
</div>

<div class="form-group">
    <label for="country" class="col-lg-2 control-label">País</label>
    <div class="col-lg-6">
        {{ Form::select('country', Config::get('constants.COUNTRY'), $user->country, array('class' => 'form-control', 'placeholder' => 'country')) }}
    </div>
</div>
@if (!Auth::guest())
    <div class="form-group">
        <label for="perfil" class="col-lg-2 control-label">Perfil</label>
        <div class="col-lg-6">
            {{ Form::select('role', Config::get('constants.ROLE'), $user->role, array('class' => 'form-control', 'placeholder' => 'perfil')) }}
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10 right-align">
        <button type="submit" class="btn-floating btn-large blue tooltipped" title="Atualizar"><i class="material-icons">check</i></button>
        <a class="btn-floating btn-large waves-effect waves-light red" href="{{ url('user') }}"><i class="material-icons">close</i></a>
    </div>
</div>

{{ Form::close() }}

@stop
