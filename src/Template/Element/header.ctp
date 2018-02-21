<!-- header top -->
<?= $this->fetch('header-top')?>
<!-- /header top -->
<!-- header -->
<header class="sticky-top bg-dark">
	<nav class="navbar navbar-expand-md navbar-dark p-0">
		<?= $this->Html->link(
		    __('Cake Silver CMS'),
		    ['controller' => 'Dashboard', 'action' => 'index'],
		    ['class' => 'navbar-brand col-sm-4 col-md-3 col-lg-2 mr-0']
		);?>
		<button class="navbar-toggler m-1" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>
		<!-- <div class="collapse navbar-collapse mr-auto" id="top-nav">
			<ul class="navbar-nav mr-auto px-3"></ul>
			<ul class="navbar-nav px-3">
			</ul>
		</div> -->
	</nav>
</header>
<!-- /header -->
<!-- header bottom -->
<?= $this->fetch('header-bottom')?>
<!-- /header bottom -->