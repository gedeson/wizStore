<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo or 'Wiz Store' }}</title>

    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
@include('templates.menu')

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<footer class="page-footer blue">
    <div class="footer-copyright">
        <div class="container">
            Desenvolvido para teste Wiz
        </div>
    </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
@stack('scripts')
<script type="text/javascript">
	$( document ).ready(function(){
		$(".button-collapse").sideNav();
		$('select').material_select();
	});
</script>
</body>
</html>