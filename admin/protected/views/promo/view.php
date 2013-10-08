<?php
/* @var $this PromoController */
/* @var $model Promo */

$this->breadcrumbs=array(
	'Promociones'=>array('index'),
	$model->titular,
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id_promocion)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_promocion),'confirm'=>'¿Está seguro que desea eliminar esta promoción?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Ver Promoción "<?php echo $model->titular; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_promocion',
		'es_destacado',
		'titular',
		'destacado',
		'descripcion',
		'imagen',
		'visible',
		'fecha_inicio',
		'fecha_final',
		'usuario_creador',
		'fecha_creacion',
		
		'fecha_modificacion',
	),
)); ?>
