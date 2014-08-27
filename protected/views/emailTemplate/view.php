<?php
/* @var $this EmailTemplateController */
/* @var $model EmailTemplate */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	$model->email_title,
);

$this->menu=array(
	array('label'=>'Create EmailTemplate', 'url'=>array('create')),
	array('label'=>'Update EmailTemplate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'List EmailTemplate', 'url'=>array('admin')),
);
?>

<div class="inner">
<h2>
	Email Template Details
</h2>
    <div class="content contentRightPad contentForm">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="middle" class="admin">
                    <div class="adminContent">
	                    <table id="yw0" class="detail-view">
		                    <tbody>
								<tr class="even"><th>Email Template Title</th><td><?php echo $model->email_title; ?></td></tr>
								<tr class="odd"><th>Email Template Subject</th><td><?php echo $model->email_template_subject; ?></td></tr>
								<tr class="even"><th>Email Template Body</th><td><?php echo $model->email_template_body; ?></td></tr>
								<tr class="odd"><th>Email Template Key</th><td><?php echo $model->email_template_key; ?></td></tr>
								<tr class="even"><th>Email Template Creation Date</th><td>
									<?php echo date_format(date_create($model->email_template_create_date), 'F d, Y'); ?>
								</td></tr>
								<tr class="odd"><th>Is EMail Template Active ? </th>
									<td>
										<?php
											if ($model->email_template_is_active == 1) {
												echo "Yes";
											} else { 
												echo 'No';
											} 
										?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>   <!-- End: Administration Table -->
                </td>
            </tr>
        </table>
    </div>
</div>
		                    
