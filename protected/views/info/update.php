<?php
$this->breadcrumbs=array(
	'Infos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Info', 'url'=>array('index')),
	array('label'=>'Create Info', 'url'=>array('create')),
	array('label'=>'View Info', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Info', 'url'=>array('admin')),
);
?>

<h1>Update Info <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>