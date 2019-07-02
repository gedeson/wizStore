@extends('layouts.default')

@section('pagina_titulo', $detail->title )

@section('content')

    <div class="container">
        <div class="row">
            <h3>{{ $detail->title }}</h3>
            <div class="divider"></div>
            <div class="section col s12 m6 l4">
                <div class="card small">
                    <img class="col s12 m12 l12 materialboxed" data-caption="{{ $detail->title }}" src="/assets/images/{{ $detail->image }}" alt="{{ $detail->nome }}" title="{{ $detail->nome }}">
                </div>
            </div>
            <div class="section col s12 m6 l6">
                <h4 class="left col l6"> {{ number_format($detail->amount, 2, ',', '.') }} €</h4>
                {{ Form::open(array('url' => 'cart/add', 'class' => 'form-horizontal', 'role' => 'form')) }}
                    <input type="hidden" name="id" value="{{ $detail->id }}">
                    <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>
                {{ Form::close() }}
            </div>
            <div class="section col s12 m6 l6">
                Modelo: {{  Config::get('constants.DESIGN.'.$detail->type)}} <br>
                Cor   : {{  Config::get('constants.COLOR.'.$detail->color)}} <br>
                Tamanho   : {{  Config::get('constants.SIZE.'.$detail->size)}} <br>
            </div>
        </div>
    </div>
@stop