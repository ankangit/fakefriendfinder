<div class="content form">
	<div class="content contentRightPad contentForm">
	        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	            <tr>
	                <td align="left" valign="middle" class="admin">
	                    <div class="adminContent">
	                    <table id="yw0" class="detail-view">
		                    <tbody>
								<?php 
								$form=$this->beginWidget('CActiveForm', array(
									'id'=>'email-template-form',
									'enableAjaxValidation'=>false,
								)); 
								?>
									<tr class="even">
										<td colspan="2">
											<b>Fields with <span class="required">*</span> are required.</b>
											<?php echo $form->errorSummary($model); ?></td>
										<td>&nbsp;</td>
									</tr>
									<tr class="odd">
										<th>
											<?php echo $form->labelEx($model,'email_title'); ?>
										</th>
										<td>
											<?php echo $form->textField($model,'email_title',array('size'=>60,'maxlength'=>255)); ?>
										</td>
										<td>
											<?php echo $form->error($model,'email_title'); ?>
										</td>
									</tr>
									<tr class="odd">
										<th>
											<?php echo $form->labelEx($model,'email_template_subject'); ?>
										</th>
										<td>
											<?php echo $form->textField($model,'email_template_subject',array('size'=>60,'maxlength'=>255)); ?>
										</td>
										<td>
											<?php echo $form->error($model,'email_template_subject'); ?>
										</td>
									</tr>
									<tr class="even">
										<th>
											<?php echo $form->labelEx($model,'email_template_key'); ?>
										</th>
										<td>
											<?php if (isset($update)) { ?>
											<?php echo $form->textField($model,'email_template_key',array('size'=>60,'maxlength'=>255, 'readonly'=>'readonly')); ?>
											<?php } else {?>
											<?php echo $form->textField($model,'email_template_key',array('size'=>60,'maxlength'=>255)); ?>
											<?php }?>
										</td>
										<td>
											<?php echo $form->error($model,'email_template_key'); ?>
										</td>
									</tr>
									<tr class="odd">
										<th>
											<?php echo $form->labelEx($model,'email_template_is_active'); ?>
										</th>
										<td> 
											<?php echo CHtml::activeRadioButtonList($model,'email_template_is_active',array(1=>'yes', 0=>'no')); ?>
										</td>
										<td>
											<?php echo $form->error($model,'email_template_is_active'); ?>
										</td>
									</tr>
									<tr class="even">
										<td colspan="2">
										<?php echo $form->labelEx($model,'email_template_body'); ?>
											<?php 
												$this->widget('application.extensions.TheCKEditor.TheCKEditorWidget',array(
												    'model'=>$model,                
												    'attribute'=>'email_template_body',         
												    'height'=>'400px',
												    'width'=>'800px',
												    'toolbarSet'=>'Basic',          
												    'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
												    'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
													'config' => array('toolbar'=>array(
															array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
															array( 'Image', 'Link', 'Unlink', 'Anchor' ),
													),)
												) ); 
											?>
										</td>
										<td>
											<?php echo $form->error($model,'email_template_body'); ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>   <!-- End: Administration Table -->
	                </td>
	            </tr>
	        </table>
			<div class="row buttons">
				<?php 
				echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
					'class' => 'submitButton'
				)); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>