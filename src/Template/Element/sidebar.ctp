<?php
$controller = $this->request->params['controller'];
$action     = $this->request->params['action'];
?>
<nav>
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<li class="nav-item">
				<?=$this->Html->link(
				    '<i class="fa fa-tachometer-alt"></i> ' . __('Dashboard'),
				    ['controller' => 'Dashboard', 'action' => 'index'],
				    ['class' => 'nav-link ' . ((preg_match('/Dashboard/', $controller)) ? 'active' : ''), 'escape' => false]
				);?>
			</li>
			<li class="nav-item">
				<?=$this->Html->link(
				    '<i class="far fa-newspaper"></i> ' . __('Articles'),
				    ['controller' => 'Articles', 'action' => 'index'],
				    ['class' => 'nav-link ' . ((preg_match('/Articles/', $controller)) ? 'active' : ''), 'escape' => false]
				);?>
				<ul class="nav flex-column pl-3">
					<li class="nav-item">
						<?=$this->Html->link(
						    '<i class="far fa-edit"></i> ' . __('Add New Article'),
						    ['controller' => 'Articles', 'action' => 'add'],
						    ['class' => 'nav-link ' . ((preg_match('/Articles/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false]
						);?>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<?=$this->Html->link(
				    '<i class="fas fa-bars"></i> ' . __('Menus'),
				    ['controller' => 'MenuRegions', 'action' => 'index'],
				    ['class' => 'nav-link ' . ((preg_match('/MenuRegions|Menus/', $controller)) ? 'active' : ''), 'escape' => false]
				);?>
				<?php /*<ul class="nav flex-column pl-3">
					<li class="nav-item">
						<?=$this->Html->link(
						    '<i class="fas fa-plus"></i> ' . __('Create New Menu Location'),
						    ['controller' => 'MenuRegions', 'action' => 'add'],
						    ['class' => 'nav-link ' . ((preg_match('/MenuRegions/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false]
						);?>
					</li>
					<li class="nav-item">
						<?=$this->Html->link(
						    '<i class="fas fa-plus"></i> ' . __('Add New Menu'),
						    ['controller' => 'Menus', 'action' => 'add'],
						    ['class' => 'nav-link ' . ((preg_match('/Menus/', $controller) && preg_match('/add/', $action)) ? 'active' : ''), 'escape' => false]
						);?>
					</li>
				</ul>*/ ?>
			</li>
		</ul>
	</div>
</nav>