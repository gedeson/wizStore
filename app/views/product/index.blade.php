@extends('layouts.default')

@section('content')
    <h1>
        Produto
        <small>
            @if ($products->count() === 1)
                Um produto publicado
            @elseif ($products->count() > 1)
                {{ $products->count() }} produto
            @else
                Nenhum produto.
            @endif
        </small>
    </h1>
    <div class="row">
        <a class="btn-floating btn-large blue tooltipped" href="{{ url('product/new') }}" title="Adicionar" data-position="top" data-delay="50" data-tooltip="Adicionar T-shirt?">
            <i class="material-icons">add</i>
        </a>
    </div>
    <hr>    
    
    {{-- Check if product exists --}}
    @if($products->count())
        {{-- Printing our product --}}
        @foreach ($products as $product)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="input-field col s4">
                        @if($product->image)
                            <img src="/assets/images/{{$product->image}}" />
                        @endif
                    </div>
                    <div class="input-field col s4">
                        <h4>{{{ $product->title }}} </h4>
                    </div>
                    <div class="input-field col s4">
                        <a class="btn-floating btn-large waves-effect waves-light" href="{{ url('product/update', $product->id) }}">
                            <i class="material-icons">edit</i></a>
                        <a class="btn-floating btn-large waves-effect waves-light red" href="{{ url('product/delete', $product->id) }}">
                            <i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h2>Nenhum produto encontrado.</h2>
    @endif
@stop