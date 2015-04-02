<?php
/* @var $this InstitucionController */
/* @var $model INSTITUCION */
?>

<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
        	<i class="fa fa-user"></i> Ingresar Usuario
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>
