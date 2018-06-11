<?php
$class = '';
if (!empty($params['class'])) {
    $class .= $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="flash-view alert alert-<?= h($class) ?>">
	<?= $message ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="fas fa-times"></i></span>
	</button>
</div>
