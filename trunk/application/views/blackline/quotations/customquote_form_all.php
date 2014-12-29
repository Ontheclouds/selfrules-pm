<div id="main">
	<div id="options">
			<a href="<?=base_url()?>quotations" class="btn"><i class="icon-arrow-left"></i> <?=$this->lang->line('application_custom_quotations');?></a>
			<a href="<?=base_url()?>quotations/formbuilder" class="btn"><?=$this->lang->line('application_create_quotation');?></a>
			
			<div class="btn-group margintop5 pull-right nav-tabs" data-toggle="buttons-radio">
				<?php foreach ($submenu as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "filter"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
	        </script> 

		</div>
		<div class="visible-phone"><br/></div>
		<div class="table_head"><h6><i class="icon-list-alt"></i> <?=$this->lang->line('application_custom_quotation_forms');?></h6></div>
		<table class="data" id="quotation_form" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th width="20px" class="hidden-phone"><?=$this->lang->line('application_quotation_id');?></th>
			<th><?=$this->lang->line('application_name');?></th>
			<th><?=$this->lang->line('application_status');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php foreach ($quotations as $value):?>

		<tr id="<?=$value->id;?>" >
			<td class="hidden-phone"><?=$value->id;?></td>
			<td><?=$value->name;?></td>
			<td><? if($value->inactive == "1"){ echo '<span class="label label-error">'.$this->lang->line('application_inactive').'</span>'; }else{echo '<span class="label label-success">'.$this->lang->line('application_active').'</span>'; } ?></td>
			<td class="option btn-group">
				<a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>quotations/formdelete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
				<a href="<?=base_url()?>quotation/qid/<?=$value->id;?>" class="btn btn-mini" target="_blank"><i class="icon-eye-open"></i></a>
			</td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>