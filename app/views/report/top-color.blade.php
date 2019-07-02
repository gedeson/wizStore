@extends('layouts.default')

@section('content')
    <h1>
        Relatório Top Cor
    </h1>
    <div class="row">
        <a class="btn-floating btn-large cyan pulse" href="#" title="Imprimir" data-position="top" data-delay="50" data-tooltip="Imprimir relatório?">
            <i class="material-icons">print</i>
        </a>

        <a class="btn-floating btn-large indigo darken-4 pulse" href="{{ url('report') }}" title="Imprimir" data-position="top" data-delay="50" data-tooltip="Imprimir relatório?">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>

    <div class="right-align"><b>Total de compras: {{ $reports[0]->color_count }}</b></div>
    <hr>

    {{-- Check if report exists --}}
    @if($reports)
        {{-- Printing our report --}}
        <table class="responsive-table table-bordered">
            <thead>
            <tr>
                <th>T-shirt</th>
                <th>Qtd Vendida</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                
                <tr>
                    <td>@if($report->image)
                            <img src="/assets/images/{{$report->image}}" />
                            {{ Config::get('constants.COLOR.'.$report->color) }}
                        @endif
                    </td>
                    <td>{{ $report->color_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h2>Nenhum T-shirt vendido.</h2>
    @endif
@stop