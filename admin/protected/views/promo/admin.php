<?php
/* @var $this PromoController */
/* @var $model Promo */

$this->breadcrumbs=array(
	'Promociones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('promo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Promociones</h1>
<?php /*
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php */ ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'promo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'titular',
		'destacado',
		'descripcion',
		array(
			'name' => 'visible',
			'value' => '$data->visible == 1 ? "Si" : "No"'
		),
		array(
			'name' => 'es_destacado',
			'value' => '$data->es_destacado == 1 ? "Si" : "No"'
		),
		array(          
            'name'=>'fecha_inicio',
            'value'=>'date("d/m/Y", strtotime($data->fecha_inicio))',
        ),
		array(            
            'name'=>'fecha_final',
            'value'=>'date("d/m/Y", strtotime($data->fecha_final))',
        ),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
