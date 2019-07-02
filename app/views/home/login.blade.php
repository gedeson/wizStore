@extends('layouts.default')
@section('content')
    <h4>ENTRAR NA SUA CONTA</h4>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            {{ Form::open(array(
                'url' => 'login',
                'class'  => 'well'
            )) }}

            <div class="input-field col s12">
                {{ Form::text('email', '', array('id'=>'email', 'class' => 'validate')) }}
                <label for="email">E-mail</label>
            </div>

            <div class="input-field col s12">
                {{ Form::password('password', '', array('id'=>'password', 'class' => 'validate')) }}
                <label for="password">Palavra-chave</label>
            </div>
            
            @if (Session::has('flash_error'))
                <div class="alert alert-danger">E-mail ou senha inválidos.</div>
            @endif
            
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 right-align">
                    <button type="submit"  class="btn btn-floating btn-large blue pulse"><i class="material-icons">done_all</i></button>
                </div>
            </div>

            

            {{ Form::close() }}
        </div>
    </div>
@stop