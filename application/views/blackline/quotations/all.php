<div id="main">
	<div id="options">
			<a href="<?=base_url()?>quotation" class="btn" target="_blank"><?=$this->lang->line('application_view_quotation_form');?></a>
			<div class="btn-group margintop5 pull-right nav-tabs" data-toggle="buttons-radio">
				<?php foreach ($submenu as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] == "filter"){echo $last_uri;} ?>').button('toggle'); });
	        </script> 

		</div>
		<div class="visible-phone"><br/></div>
		<div class="table_head"><h6><i class="icon-list-alt"></i> <?=$this->lang->line('application_quotations');?></h6></div>
		<table class="data" id="quotations" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th width="20px" class="hidden-phone"><?=$this->lang->line('application_quotation_id');?></th>
			<th><?=$this->lang->line('application_status');?></th>
			<th><?=$this->lang->line('application_issue_date');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_company');?> / <?=$this->lang->line('application_name');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_worker');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php foreach ($quotations as $value):?>

		<tr id="<?=$value->id;?>" >
			<td class="hidden-phone"><?=$value->id;?></td>
			<td><span class="label <?php if($value->status == "New"){echo "label-important";}elseif($value->status == "Accepted"){ echo "label-success";}elseif($value->status == "Reviewed"){ echo "label-warning";} ?>"><?=$this->lang->line('application_'.$value->status);?></span></td>
			<td><span class="label"><?php $unix = human_to_unix($value->date); echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format.' '.$core_settings->date_time_format, $unix); ?></span></td>
			<td class="hidden-phone"><span class="label label-info"><?php if(!empty($value->company)){echo $value->company;}else{echo $value->fullname;}?></span></td>
			<td class="hidden-phone"><span class="label <?php if(isset($value->user->firstname)){echo 'label-info">'.$value->user->firstname.' '.$value->user->lastname;}else{echo '">'.$this->lang->line('application_not_assigned');}?></span></td>
			<td class="option btn-group">
				<a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>quotations/delete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
				<a href="<?=base_url()?>quotations/update/<?=$value->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
			</td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
	 	<hr>


	 	<div id="options">
			<a href="<?=base_url()?>quotations/quoteforms" class="btn"><?=$this->lang->line('application_custom_quotation_forms');?></a>
			<div class="btn-group margintop5 pull-right nav-tabs2" data-toggle="buttons-radio">

				<?php 
				$val_id = "";
				foreach ($submenu2 as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>2" href="<?=site_url($value);?>#custom_quotations_requests_filter"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs2 #<?php $last_uri2 = end(explode("/", uri_string())); if($val_id[count($val_id)-2] == "customfilter"){echo $last_uri2;} ?>2').button('toggle'); });
	        </script> 

		</div>
		<div class="visible-phone"><br/></div>
		<div class="table_head"><h6><i class="icon-list-alt"></i> <?=$this->lang->line('application_custom_quotations');?></h6></div>
		<table class="data" id="custom_quotations_requests" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th width="20px" class="hidden-phone"><?=$this->lang->line('application_quotation_id');?></th>
			<th><?=$this->lang->line('application_status');?></th>
			<th><?=$this->lang->line('application_quotation');?></th>
			<th><?=$this->lang->line('application_issue_date');?></th>
			<th><?=$this->lang->line('application_worker');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php foreach ($custom_quotations as $value):?>

		<tr id="<?=$value->id;?>" >
			<td class="hidden-phone"><?=$value->id;?></td>
			<td><span class="label <?php if($value->status == "New"){echo "label-important";}elseif($value->status == "Accepted"){ echo "label-success";}elseif($value->status == "Reviewed"){ echo "label-warning";} ?>"><?=$this->lang->line('application_'.$value->status);?></span></td>
			<td class="hidden-phone"><?php  if(isset($value->customquote->name)){echo $value->customquote->name;}else{echo "-";}?></td>
			<td><span class="label"><?php $unix = human_to_unix($value->date); echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format.' '.$core_settings->date_time_format, $unix); ?></span></td>
			<td><span class="label"><?php if(isset($value->user->firstname)){echo $value->user->firstname; echo " ".$value->user->lastname;}else{echo "-";}?></span></td>
			<td class="option btn-group">
				<a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>quotations/cdelete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
				<a href="<?=base_url()?>quotations/cupdate/<?=$value->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
			</td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>