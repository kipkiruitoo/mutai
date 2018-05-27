<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


<body >
<!-- Header -->
<div class="logo-w3layouts">
		<div class="header-top-w3ls">
			<p class="left-p"><span class="fa fa-location-arrow" aria-hidden="true"></span>63 Kenyatta Road, Kericho</p>
			<p class="right-p"><span class="fa fa-phone" aria-hidden="true"></span>+254 (771) 427 283</p>
			<div class="clearfix"></div>
		</div>
		<div class="header-mid">
			<div class="container">
				<h1><a href="index.html"><span>Mutai </span> Food<span> Serv</span>ices</a></h1>
				<!-- <div class="w3ls_search">
					<div class="cd-main-header">
						<ul class="cd-header-buttons">
							<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
						</ul> -->
						<!-- cd-header-buttons -->
					<!-- </div>
					<div id="cd-search" class="cd-search">
						<form action="#" method="post">
							<input name="Search" type="search" placeholder="Click enter after typing...">
						</form>
					</div>
				</div> -->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif -->

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}
<!-- //footer -->
	<!-- copyright -->
	<div class="wthree_copy_right">
		<div class="container">
			<p>© 2018 Mutai Food Services. All rights reserved | Coded by <a href="itsdavis.me">Davis Too</a></p>

		</div>
    </div>
    <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
@include('partials.javascripts')
<script src="../js/main.js"></script>
<script type="../text/javascript" src="js/move-top.js"></script>
	<script type="../text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
    </script>
    
</body>
</html>