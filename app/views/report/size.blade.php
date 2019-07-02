@extends('layouts.default')

@section('content')
    <h1>
        Relatório T-shirt Tamanho
    </h1>
    <div class="row">
        <a class="btn-floating btn-large cyan pulse" href="#" title="Imprimir" data-position="top" data-delay="50" data-tooltip="Imprimir relatório?">
            <i class="material-icons">print</i>
        </a>
    </div>

    <div class="right-align"><b>Total de compras: {{ $allReports[0]->size_count }}</b></div>
    <hr>

    {{-- Check if report exists --}}
    @if($reports)
        {{-- Printing our report --}}
        <table class="responsive-table table-bordered">
            <thead>
            <tr>
                <th>Tamanho</th>
                <th>Preço</th>
                <th>Qtd Vendida</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ Config::get('constants.SIZE.'.$report->size) }} </td>
                    <td>{{ $report->price }}  €</td>
                    <td>{{ $report->size_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h2>Nenhum T-shirt vendido.</h2>
    @endif
@stop