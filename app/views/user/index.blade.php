@extends('layouts.default')

@section('content')
    <h1>Utilizadores</h1>

    <div class="row">
        <a class="btn-floating btn-large blue tooltipped" href="{{ url('register') }}" title="Adicionar" data-position="top" data-delay="50" data-tooltip="Adicionar Utilizador?">
            <i class="material-icons">add</i>
        </a>
    </div>
    <hr>
    {{-- Verifica se existem users --}}
    @if($users->count())
        {{-- Imprimindo nossos artigos --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th width="25%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ Config::get('constants.ROLE.'.$user->role) }} </td>
                    <td>
                        <div class="btn-block">
                            <a class="btn-floating btn-large waves-effect waves-light" href="{{ url('user/update', $user->id) }}">
                                <i class="material-icons">edit</i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Nenhum utilizador cadastrado.</h2>
    @endif
@stop