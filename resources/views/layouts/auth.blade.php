<!DOCTYPE html>
<html lang="en">

<head>
<title>Mutai Food Services</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta Tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--Online-fonts-->
	<link href="//fonts.googleapis.com/css?family=Catamaran:100,400,500,600,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300,400,700" rel="stylesheet">
	<!--//Online-fonts-->
    <!-- @include('partials.head') -->
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
				<div class="w3ls_search">
					<div class="cd-main-header">
						<ul class="cd-header-buttons">
							<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
						</ul>
						<!-- cd-header-buttons -->
					</div>
					<div id="cd-search" class="cd-search">
						<form action="#" method="post">
							<input name="Search" type="search" placeholder="Click enter after typing...">
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
</div>
        <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>