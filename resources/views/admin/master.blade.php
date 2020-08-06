<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Section Titulo-->
    <title>@yield('tittle') - Admin</title>

    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="routeName" content="{{Route::currentRouteName()}}">
	<link href="{{asset('/static/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('/static/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('/static/css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{asset('/static/css/styles.css')}}" rel="stylesheet">
	<script src="{{asset('https://kit.fontawesome.com/ad4a5737a5.js')}}" crossorigin="anonymous"></script>
	<!--Custom Font-->
	<link href="{{asset('https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap')}}" rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')}}" rel="stylesheet">
	<script src="{{asset('/static/js/admin.js')}}"></script>
	<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css')}}" />
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>La </span>Jacarina</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle count-info" data-toggle="dropdown" title="Facebook">
								<i class="fa fa-facebook"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle count-info" data-toggle="dropdown" title="Instagram">
								<i class="fa fa-instagram"></i></a>
						</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
                <!--Section imagen-->
				<img src={{asset("/static/imagenes/usuario.png")}} class="img-responsive" alt="">
            </div>
            
			<div class="profile-usertitle">    
                    <!--Section nombre/mail-->
                <div class="profile-usertitle-name">{{Auth::user()->name}} {{Auth::user()->lastname}}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<!--Section Dashboard-->
			@if(kvfj(Auth::user()->permissions, 'dashboard'))
			<li class=""><a href="{{url('/admin')}}"><em class="fa fa-dashboard">&nbsp;</em> Inicio </a></li>
			@endif
            <!--Section PAGES-->
            <li class="parent "><a data-toggle="collapse" href="">
				<em class="fas fa-file">&nbsp;</em> Páginas <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <!--Section EACH PAGE-->
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="{{url('/admin/inicio')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Inicio
					</a></li>
					<li><a class="" href="{{url('/admin/quienesSomos')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> ¿Quiénes Somos?
					</a></li>
					<li><a class="" href="{{url('/admin/ayuda')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> ¿Cómo Ayudar?
					</a></li>
					<li><a class="" href="{{url('/admin/tienda')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Tienda
                    </a></li>
					<li><a class="" href="{{url('/admin/contacto')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Contáctanos
					</a></li>
				</ul>
            </li>
            
            <!--Section Content-->
            
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fas fa-edit">&nbsp;</em> Gestión de Contenido <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">

					@if(kvfj(Auth::user()->permissions, 'publications'))
					<li><a class="" href="{{url('/admin/publications')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Noticias  <!--Section PUBLICATIONS-->
					</a></li>
					@endif

					<li ><a href="">
						<i class="fa fa-arrow-right"></i><span> Tienda</span></a> <!--Section STORE-->
						<ul >

							@if(kvfj(Auth::user()->permissions, 'products'))
							<li><a href="{{url('/admin/products/all')}}"><i class="fa fa-circle-o"></i> Artículos</a></li> <!--Section PRODUCTS-->
							@endif

							@if(kvfj(Auth::user()->permissions, 'categories'))
							<li><a href="{{url('/admin/categories')}}"><i class="fa fa-circle-o"></i> Categorías</a></li> <!--Section CATEGORIES-->
							@endif
							
							<li><a href="{{url('/admin/sells')}}"><i class="fa fa-circle-o"></i> Ventas</a></li> <!--Section SELLS-->
						
						</ul>
                    </li>
                    
                    <!--Section ANIMALS-->

					<li><a class="" >
						<span class="fa fa-arrow-right">&nbsp;</span> Refugio
						</a>
						<ul >

							@if(kvfj(Auth::user()->permissions, 'animals'))
							<li><a href="{{url('/admin/animals')}}"><i class="fa fa-circle-o"></i> Perros</a></li> <!--Section Animals-->
							@endif

						</ul>
					</li>
				</ul>
			</li>
            
					<!--Section USERS-->
			@if(kvfj(Auth::user()->permissions, 'users'))
			<li><a href="{{url('/admin/users/all')}}" class="lk-userList lk-userEdit"><em class="fas fa-user-edit">&nbsp;</em> Gestión de Usuarios </a></li>
			@endif

			<!--Section FORMS-->
			<li class="parent"><a data-toggle="collapse" href="#sub-item-3">
				<em class="far fa-file">&nbsp;</em> Solicitudes <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">

					@if(kvfj(Auth::user()->permissions, 'adopt'))
					<li><a class="" href="{{url('/admin/adoptions/all')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Adopciones
					</a></li>
					@endif

					@if(kvfj(Auth::user()->permissions, 'godparent'))
					<li><a class="" href="{{url('/admin/godparents/all')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Padrinos
					</a></li>
					@endif

					@if(kvfj(Auth::user()->permissions, 'volunteer'))
					<li><a class="" href="{{url('/admin/volunteers/all')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Voluntarios
					</a></li>
					@endif

					@if(kvfj(Auth::user()->permissions, 'collaborator'))
					<li><a class="" href="{{url('/admin/collaborators/all')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Patrocinadores
					</a></li>
					@endif

					@if(kvfj(Auth::user()->permissions, 'home'))
					<li><a class="" href="{{url('/admin/homes/all')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Hogar Temporal
					</a></li>
					@endif
				</ul>
			</li>
            
                    <!--Section ADMINISTRACION Y PERMISOS-->
            <li><a href="{{url('/admin/account')}}"><em class="fas fa-cog">&nbsp;</em> Cuenta </a></li>
            
                    <!--Section LOGOUT-->
            <li><a href="{{url('/logout')}}"><em class="fa fa-power-off">&nbsp;</em> Salir </a></li>
		</ul>
	</div><!--/.sidebar-->
		
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color:#efeef1;">
        
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="" >
					<em class="fa fa-home" style="color: #828860; font-size: 16px;"></em>
                </a></li>
                <!--Section ubicacion-->
                <li  >
                <a href="{{url('/admin')}}" class="nav-link" style="color: #828860; font-size: 18px;">Inicio</a>
                </li>
                @yield('breadcrumb')
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </ol>  
        </div><!--/.row-->

        <!--Contenido-->
        @yield('contenido')
        <!--Fin Contenido-->

		
	</div><!--row-->
	<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
	<script src="{{asset('/static/libs/ckeditor.js')}}"></script>
	<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js')}}"></script>
	<script src="{{asset('https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js')}}"></script>
	<script src="{{asset('/static/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('/static/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/static/js/chart.min.js')}}"></script>
	<script src="{{asset('/static/js/chart-data.js')}}"></script>
	<script src="{{asset('/static/js/easypiechart.js')}}"></script>
	<script src="{{asset('/static/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('/static/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('/static/js/custom.js')}}"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>