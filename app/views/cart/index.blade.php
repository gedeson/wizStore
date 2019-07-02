@extends('layouts.default')
@section('pagina_titulo', 'Carrinho' )

@section('content')

    <div class="container">
        <div class="row">
            <h3>Produtos no carrinho</h3>
            <hr/>
            @if (Session::has('message-success'))
                <div class="card-panel green">
                    <strong>{{ Session::get('message-success') }}</strong>
                </div>
            @endif
            @if (Session::has('message-failure'))
                <div class="card-panel red">
                    <strong>{{ Session::get('message-failure') }}</strong>
                </div>
            @endif
            @forelse ($solicitations as $solicitation)
                <h5 class="col l6 s12 m6"> Pedido: {{ $solicitation->id }} </h5>
                <h6 class="col l6 s12 m6"> Criado em: {{ $solicitation->created_at->format('d/m/Y H:i') }} </h6>
                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($solicitation->getSolicitationProduct as $solicitationProduct)
                        <tr>
                            <td>
                                <img width="100" height="100" src="/assets/images/{{ $solicitationProduct->purchase->image }}">
                            </td>
                            <td class="center-align">
                                <div class="center-align">
                                    <a class="col l4 m4 s4" href="#" onclick="">
                                        <i class="material-icons small">remove_circle_outline</i>
                                    </a>
                                    <span class="col l4 m4 s4"> {{ $solicitationProduct->qtd }} </span>
                                    <a class="col l4 m4 s4" href="#" onclick="">
                                        <i class="material-icons small">add_circle_outline</i>
                                    </a>
                                </div>
                                <a href="#" onclick="" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar product do carrinho?">Retirar product</a>
                            </td>
                            <td> {{ $solicitationProduct->purchase->title }} </td>
                            <td>{{ number_format($solicitationProduct->price, 2, ',', '.') }} €</td>
                            <td>{{ number_format($solicitationProduct->price, 2, ',', '.') }} €</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <strong class="col offset-l6 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                    <span class="col l2 m2 s2">{{ number_format($solicitationProduct->total, 2, ',', '.') }} €</span>
                </div>
                <div class="row">
                    <a class="btn-large tooltipped col l4 s4 m4 offset-l2 offset-s2 offset-m2" data-position="top" data-delay="50" data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('home') }}">Continuar comprando</a>
                    {{ Form::open(array('url' => '/cart/finish', 'class' => 'form-horizontal', 'role' => 'form')) }}
                        <input type="hidden" name="solicitation_id" value="{{ $solicitation->id }}">
                        <button type="submit" class="btn-large blue col offset-l1 offset-s1 offset-m1 l5 s5 m5 tooltipped" data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                            Concluir compra
                        </button>
                    {{ Form::close() }}
                </div>
            @empty
                <h5>Não há nenhum pedido no carrinho</h5>
            @endforelse
        </div>
    </div>
@stop