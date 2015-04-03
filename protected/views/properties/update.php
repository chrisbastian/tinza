<?php
/* @var $this InstitucionController */
/* @var $model INSTITUCION */
?>

<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
			<?php $this->renderPartial('_form', array('model'=>$model,'model_identification'=>$model_identification,'model_licenses'=>$model_licenses,'model_extra_properties'=>$model_extra_properties)); ?>
		</div>
	</div>
</div>
