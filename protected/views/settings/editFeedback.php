<?php
$this->breadcrumbs=array(
	'Settings',
);
?>

<div class="settings">
<h2 class="listing-title"><?php echo Yii::t('main', 'Feedback settings'); ?></h2>

<div class="left_side">
	<div class="b_panel">
		<ul class="b_styles">
			<li class="b_azure<?php echo ($iColor==1)?" active":""?>">
				<ul class="b_positions">
					<li class="b_first"></li>
					<li class="b_second"></li>
					<li class="b_third"></li>
					<li class="b_fourth"></li>
				</ul>
			</li>
			<li class="b_blue<?php echo ($iColor==2)?" active":""?>">
				<ul class="b_positions">
					<li class="b_first"></li>
					<li class="b_second"></li>
					<li class="b_third"></li>
					<li class="b_fourth"></li>
				</ul>
			</li>
			<li class="b_gray<?php echo ($iColor==3)?" active":""?>">
				<ul class="b_positions">
					<li class="b_first"></li>
					<li class="b_second"></li>
					<li class="b_third"></li>
					<li class="b_fourth"></li>
				</ul>
			</li>
			<li class="b_green<?php echo ($iColor==4)?" active":""?>">
				<ul class="b_positions">
					<li class="b_first"></li>
					<li class="b_second"></li>
					<li class="b_third"></li>
					<li class="b_fourth"></li>
				</ul>
			</li>
		</ul>
	</div>
</div>

<div class="right_side">
	<ul class="b_options">
		<li class="b_position">
			<label>Position:</label>
			<ul>
				<li class="p_left<?php   echo ($iPosition==1)?" active":""?>" value="1">Left</li>
				<li class="p_bottom<?php echo ($iPosition==2)?" active":""?>" value="2">Bottom</li>
				<li class="p_right<?php  echo ($iPosition==3)?" active":""?>" value="3">Right</li>
			</ul>
		</li>
		
		<li class="b_style">
			<label>Style:</label>
			<ul>
				<li class="s_first<?php  echo ($iStyle==1)?" active":""?>" value="1">1</li>
				<li class="s_second<?php echo ($iStyle==2)?" active":""?>" value="2">2</li>
				<li class="s_third<?php  echo ($iStyle==3)?" active":""?>" value="3">3</li>
				<li class="s_fourth<?php echo ($iStyle==4)?" active":""?>" value="4">4</li>
			</ul>
		</li>
		
		<li class="b_color">
			<label>Color:</label>
			<ul>
				<li class="c_azure" value="1"><div<?php echo ($iColor==1)?" class='active'":""?>></div></li>
				<li class="c_blue"  value="2"><div<?php echo ($iColor==2)?" class='active'":""?>></div></li>
				<li class="c_gray"  value="3"><div<?php echo ($iColor==3)?" class='active'":""?>></div></li>
				<li class="c_green" value="4"><div<?php echo ($iColor==4)?" class='active'":""?>></div></li>
			</ul>
		</li>
	</ul>
	<?php echo CHtml::hiddenField('hf_position', $iPosition); ?>
	<?php echo CHtml::hiddenField('hf_style',    $iStyle); ?>
	<?php echo CHtml::hiddenField('hf_color',    $iColor); ?>
</div>

<?php echo CHtml::link('Save', '#',
                        array(
                            'id'=>'save_feedback',
                            'class'=>'bkButtonBlueSmall normal'
                        )
       )
?>

<div class="clear"></div>

<?php
Yii::app()->clientScript->registerScript('feedback_style_update', "
jQuery('.settings a#save_feedback').live('click',function() {
	$(this).text('Saving...');
	jQuery.ajax({
		'type': 'POST',
		'url' : '" . CController::createUrl('Settings/EditFeedback') . "',
		'data': {    YII_CSRF_TOKEN : '" . Yii::app()->request->csrfToken . "',
					 hf_position: $('#hf_position').val(),
					 hf_style: $('#hf_style').val(),
					 hf_color: $('#hf_color').val()
				},
		'cache': false,
		'success': function(data){
			$(this).text('Save');
			obj = jQuery.parseJSON(data);
			if(obj.status == '200'){
				location.reload();
			}
		}
	});
});
", CClientScript::POS_END);
?>

</div>