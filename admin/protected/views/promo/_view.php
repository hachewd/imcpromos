<?php
/* @var $this PromoController */
/* @var $data Promo */
?>

<div class="view"<?php echo $data->es_destacado == 1 ? 'style="background:#EFEFEF;"' : ''; ?>>

	<div class="items">

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_destacado')); ?>:</b>
	<?php echo CHtml::encode($data->es_destacado == 1 ? 'Si' : 'No'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titular')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->titular), array('view', 'id'=>$data->id_promocion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destacado')); ?>:</b>
	<?php echo CHtml::encode($data->destacado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($data->visible == 1 ? 'Si' : 'No'); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode(date('d/m/Y',strtotime($data->fecha_inicio))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_final')); ?>:</b>
	<?php echo CHtml::encode(date('d/m/Y',strtotime($data->fecha_final))); ?>
	<br />


	
    </div>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo CHtml::encode($data->imagen); ?>" />
    
	<br />

	

</div>