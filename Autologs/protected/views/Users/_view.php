<?php
/* @var $this AccountController */
/* @var $data Account */
?>

<div class="view">
<?php echo CHtml::link("Lets go", array('view', 'id'=>$data->userid)); ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailaddress')); ?>:</b>
	<?php echo CHtml::encode($data->emailaddress); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />
        <b><?php echo CHtml::encode($data->getAttributeLabel('phonenumber')); ?>:</b>
	<?php echo CHtml::encode($data->phonenumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('userpassword')); ?>:</b>
	<?php echo CHtml::encode($data->userpassword);  ?>
	<br />-->


</div>