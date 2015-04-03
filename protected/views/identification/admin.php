<?php
/* @var $this IdentificationController */
/* @var $model Identification */

$this->breadcrumbs=array(
	'Identifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Identification', 'url'=>array('index')),
	array('label'=>'Create Identification', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#identification-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Identifications</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'identification-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'created_at',
		'updated_at',
		'id_propertie',
		'id_use_ground',
		'soil_date_expedition',
		/*
		'soil_date_expiration',
		'document_identification',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
