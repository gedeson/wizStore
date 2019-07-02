<header>
    <nav>
        <div class="nav-wrapper light-blue row">
            <a href="{{ route('home') }}" class="brand-logo col offset-l1">Loja virtual</a>
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/cart') }}">Carrinho</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Entrar</a></li>
                    <li><a href="{{ url('/register') }}">Cadastre-se</a></li>
                @else
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown-user">
                            Olá {{ Auth::user()->name }}!<i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <ul id="dropdown-user" class="dropdown-content">
                            @if(Auth::user()->role == array_search('Administrador', Config::get('constants.ROLE')))
                                <li>
                                    <a href="{{ url('report') }}">Relatórios</a>
                                </li>
                                <li>
                                    <a href="{{ url('user') }}">Utilizadores</a>
                                </li>
                                <li>
                                    <a href="{{ url('product') }}">Produtos</a>
                                </li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('logout') }}">
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>