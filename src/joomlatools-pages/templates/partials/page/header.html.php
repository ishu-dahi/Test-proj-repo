<header>
	<nav class="navbar navbar-default">
		<div class="text-right bb-gray py-5 font-300">
			<div class="container text-black small-font">
				<div class="px-5 d-inline">
<!--
					<img src="images/laptop.png" alt="" class="pr-5 valign-unset">
-->
					<div class="text-black d-inline-block">
						<?= partial('template:partials/navigation/top-links', []); ?>
					</div>
				</div>

				<div class="px-5 d-inline-block">
					<?= partial('template:partials/navigation/language-switcher', []); ?>
				</div>
			</div>
		</div>

		<div class="container text-black py-10 logo-cover">
			<div class="row">
				<div class="col-sm-7 px-xs-0">
					<div class="d-flex">
						<?= partial('template:partials/logos/logo',['text_class'=>'',]); ?>
					</div>
				</div>

				<div class="col-sm-5 text-right pl-30 hidden-xs-down">
					<?= partial('template:partials/logos/logo-right',['text_class'=>'',]); ?>
				</div>
			</div>

			<div class="navbar-header bg-gray-shade-1">
			</div>
		</div>
		<!-- /.container-fluid -->

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="navbar-collapse main-menu px-xs-0 js-mainMenuOpen" id="bs-example-navbar-collapse-1">
			<div class="container text-black relative">
				<?= partial('template:partials/navigation/mainmenu', []); ?>
				<a href="javascript:;" class="hamburger-menu js-menu">
					<span class="hamburger-item"></span>
					<span class="hamburger-item"></span>
					<span class="hamburger-item"></span>
				</a> 
				<div class="pull-right pl-30 pages-bhashadaan-btn"> 
					<ktml:modules position="pages-bhashadaan-btn">
				</div> 
			</div>

		</div><!-- /.navbar-collapse -->
	</nav>
</header>

<div class="clearfix"></div>
