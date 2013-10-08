<?php
/* @var $this PromoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Promociones',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Promociones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
