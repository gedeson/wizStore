@extends('layouts.default')
@section('pagina_titulo', 'HOME')

@section('content')
    <h3>T-shirts</h3>
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

    <div class="row">
    {{ Form::open(array('url' => 'search  ', 'class' => 'col s12', 'role' => 'form')) }}
        
            <div class="row">
                <div class="input-field col s6">
                        {{ Form::select('type', Config::get('constants.DESIGN'), '', array('class' => 'form-control')) }}
                </div>
                <div class="input-field col s5">
                    {{ Form::select('color', Config::get('constants.COLOR'), '', array('class' => 'form-control')) }}
                </div>

                <button class="btn-floating btn-large blue tooltipped" type="submit" title="Adicionar" data-position="top"
                        data-delay="50" data-tooltip="Procurar T-shirt?">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </div>
    {{ Form::close() }}

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col s12 m6 l4">
                    <div class="card medium">
                        <div class="card-image">
                            <img src="/assets/images/{{ $product->image }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4 truncate"
                                  title="{{ $product->title }}">{{ $product->title }}</span>
                            <p>Euros {{ number_format(2, 2, ',', '.') }}</p>
                        </div>
                        <div class="card-action">
                            <a class="blue-text" href="{{ route('detail', $product->id) }}">Veja mais informações</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection