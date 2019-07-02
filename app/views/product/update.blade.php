@extends('layouts.default')

@section('content')

<h1>Editar Produto</h1>

<hr>

{{ Form::open(array('url' => 'product/update', 'class' => 'form-horizontal', 'role' => 'form','enctype'=>"multipart/form-data")) }}


<div class="row">
    <div class="input-field col s8">
        {{ Form::text('title', $product->title, array('id'=>'title', 'class' => 'validate')) }}
        <label for="title">Título</label>
    </div>
    <div class="input-field col s4">
        {{ Form::text('amount', $product->amount, array('id'=>'amount', 'class' => 'validate')) }}
        <label for="amount">Valor</label>
    </div>
</div>


<div class="form-group">
    <label for="size" class="col-lg-2 control-label">Tamanho</label>
    <div class="col-lg-6">
        {{ Form::select('size', Config::get('constants.SIZE'), $product->size, array('class' => 'form-control', 'placeholder' => 'Tamanho')) }}
    </div>
</div>


<div class="form-group">
    <label for="color" class="col-lg-2 control-label">Cor</label>
    <div class="col-lg-6">
        {{ Form::select('color', Config::get('constants.COLOR'), $product->color, array('class' => 'form-control', 'placeholder' => 'Cor')) }}
    </div>
</div>

<div class="form-group">
    <label for="titulo" class="col-lg-2 control-label">Modelo</label>
    <div class="col-lg-6">
        {{ Form::select('type', Config::get('constants.DESIGN'), $product->type, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="input-field col s4">
        <div class="form-group">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Imagem</span>
                    <input type="file">
                    {{ Form::file('image') }}
                </div>
                <div class="file-path-wrapper">
                    {{ Form::text('image', $product->image, array('class' => 'file-path validate')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="input-field col s6">
        @if($product->image)
            <img src="/assets/images/{{$product->image}}" />
        @endif
    </div>
</div>

{{ Form::hidden('id', $product->id) }}

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10 right-align">
        <button type="submit"  class="btn-floating btn-large blue tooltipped"><i class="material-icons">refresh</i></button>
        <a class="btn-floating btn-large waves-effect waves-light red" href="{{ url('product') }}"><i class="material-icons">close</i></a>
    </div>
</div>

{{ Form::close() }}

@stop
