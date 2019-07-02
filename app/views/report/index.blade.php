@extends('layouts.default')

@section('content')
    <h1>
        Relatórios 
    </h1>

    <div class="collection">
        <a href="{{ url('/report/design') }}" class="collection-item">T-shirt modelo</a>
        <a href="{{ url('/report/color') }}" class="collection-item">T-shirt Cor</a>
        <a href="{{ url('/report/size') }}" class="collection-item">T-shirt tamanho</a>
        <a href="{{ url('/report/design-and-country') }}" class="collection-item">T-shirt Modelo e País</a>
        <a href="{{ url('/report/color-and-country') }}" class="collection-item">T-shirt Cor e País</a>
        <a href="{{ url('/report/size-and-country') }}" class="collection-item">T-shirt Tamanho e País</a>
        <a href="{{ url('/report/top-sale') }}" class="collection-item">Top Venda</a>
        <a href="{{ url('/report/top-size') }}" class="collection-item">Top Tamanho</a>
        <a href="{{ url('/report/top-color') }}" class="collection-item">Top Cor</a>
        <a href="{{ url('/report/top-user') }}" class="collection-item">Top Cliente</a>
        <a href="{{ url('/report/top-country') }}" class="collection-item">Top País</a>
    </div>
@stop