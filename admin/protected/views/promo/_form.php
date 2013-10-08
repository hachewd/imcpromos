<?php
/* @var $this PromoController */
/* @var $model Promo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'promo-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'es_destacado'); ?>
		<?php echo $form->checkBox($model,'es_destacado',  array('checked'=>$model->es_destacado == 1)); ?>
		<?php echo $form->error($model,'es_destacado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titular'); ?>
		<?php echo $form->textField($model,'titular',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'titular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destacado'); ?>
		<?php echo $form->textField($model,'destacado',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'destacado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->fileField($model,'imagen'); ?>
		<?php echo $form->error($model,'imagen'); ?>
        <?php
		
		if ($model->imagen!='') {
			echo '<img src="'.str_replace("admin","",Yii::app()->request->baseUrl).'images/'.$model->imagen.'" style="width:35px;">';
			echo '<input type="hidden" name="nombre_imagen" value="'.$model->imagen.'">';
		}
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->checkBox($model,'visible',  array('checked'=>$model->visible == 1)); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Promo[fecha_inicio]',
				'model' => $model,
				'value'=>Yii::app()->dateFormatter->format("d/M/y",strtotime($model->fecha_inicio)),

				// additional javascript options for the date picker plugin
				'options'=>array(
					'dateFormat'=>'dd/mm/yy',
					'altFormat'=>'yy-mm-dd',
					'altField'=>'#fecha_correcta'
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
			)); ?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
        <input type="hidden" name="fecha_correcta" value="<?php echo date('Y-m-d', strtotime($model->attributes['fecha_inicio'])); ?>" />
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_final'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Promo[fecha_final]',
				'model'=>$model,
				'value'=>Yii::app()->dateFormatter->format("d/M/y",strtotime($model->fecha_final)),
				// additional javascript options for the date picker plugin
				'options'=>array(
					'dateFormat'=>'dd/mm/yy',
					'altFormat'=>'yy-mm-dd',
					'altField'=>'#fecha_correcta2'
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
			)); ?>
		<?php echo $form->error($model,'fecha_final'); ?>
        <input type="hidden" name="fecha_correcta2" value="<?php echo date('Y-m-d', strtotime($model->attributes['fecha_final'])); ?>" />
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->