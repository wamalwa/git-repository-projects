<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Account', 'url'=>array('index')),
	array('label'=>'Create Account', 'url'=>array('create')),
	array('label'=>'View Account', 'url'=>array('view', 'id'=>$model->userid)),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>Update Account <?php echo $model->userid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>