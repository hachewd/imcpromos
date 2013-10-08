<?php
/* @var $this PromoController */
/* @var $model Promo */

$this->breadcrumbs=array(
	'Promociones'=>array('index'),
	$model->titular=>array('view','id'=>$model->id_promocion),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Ver', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Listar', 'url'=>array('view', 'id'=>$model->id_promocion)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Actualizar Promoción <?php echo $model->titular; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>