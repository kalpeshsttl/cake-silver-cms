<nav aria-label="breadcrumb">
	<?=$this->Html->getCrumbList(
		[
			'firstClass' => false,
			'lastClass' => 'active',
			'class' => 'breadcrumb rounded-0 py-2 m-0 bg-light',
			'escape' => false
		],
		[
			'text' => '<i class="fa fa-home"></i>',
			'url' => ['controller' => 'Dashboard', 'action' => 'index'],
			//'title' => __('Dashboard')
		]
	);
	?>
</nav>
