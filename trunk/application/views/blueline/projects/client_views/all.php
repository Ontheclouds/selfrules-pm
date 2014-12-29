<!-- <div id="main">
		
		<div class="table_head"><h6><i class="icon-briefcase"></i><?=$this->lang->line('application_cprojects');?></h6></div>
		<table class="data" id="cprojects" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th class="hidden-phone" style="width:70px"><?=$this->lang->line('application_project_id');?></th>
			<th><?=$this->lang->line('application_name');?></th>
			<th><?=$this->lang->line('application_client');?></th>
			<th  class="hidden-phone"><?=$this->lang->line('application_deadline');?></th>
			<th  class="hidden-phone" width="20%"><?=$this->lang->line('application_progress');?></th>
		</thead>
		<?php foreach ($project as $value):?>

		<tr id="<?=$value->id;?>" >
			<td  class="hidden-phone" style="width:70px"><?=$value->reference;?></td>
			<td><?=$value->name;?></td>
			<td><span class="label label-info"><?php if(!isset($value->company->name)){echo $this->lang->line('application_no_client_assigned'); }else{ echo $value->company->name; }?></span></td>
			<td  class="hidden-phone"><span class="label <?php if($value->end <= date('Y-m-d') && $value->progress != 100){ echo 'label-important tt" title="'.$this->lang->line('application_overdue'); } ?>"><?php $unix = human_to_unix($value->end.' 00:00');echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format, $unix);?></span></td>
			<td  class="hidden-phone">
				<div class="progress progress-striped active progress-medium tt <?php if($value->progress== "100"){ ?>progress-success<?php } ?>" title="<?=$value->progress;?>%">
                      <div class="bar" style="width:<?=$value->progress;?>%"></div>
                </div>
            </td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>


-->





	
	
	<div class="col-sm-13  col-md-12 main">  
  
     <div class="row">
       <div class="btn-group pull-right-responsive margin-right-3">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <?php $last_uri = $this->uri->segment($this->uri->total_segments()); if($last_uri != "projects"){echo $this->lang->line('application_'.$last_uri);}else{echo $this->lang->line('application_all');} ?> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <?php foreach ($submenu as $name=>$value):?>
	                <li><a id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a></li>
	            <?php endforeach;?>
          </ul>
      </div>
    </div>  
      <div class="row">

         <div class="table-head"><?=$this->lang->line('application_projects');?></div>
         <div class="table-div">
         <table class="data table" id="cprojects" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
                <thead>
                  <tr>
                      <th class="hidden-xs"><?=$this->lang->line('application_project_id');?></th>
                      <th><?=$this->lang->line('application_name');?></th>
                      <th><?=$this->lang->line('application_client');?></th>
                      <th class="hidden-xs"><?=$this->lang->line('application_deadline');?></th>
                      <th class="hidden-xs"><?=$this->lang->line('application_progress');?></th>
                      
                  </tr></thead>
                
                <tbody>
                <?php foreach ($project as $value):
        			?>
                <tr id="<?=$value->id;?>">
                  <td><?=$value->reference;?></td>
                  <td><?=$value->name;?></td>
                  <td><a class="label label-info"><?php if(!isset($value->company->name)){echo $this->lang->line('application_no_client_assigned'); }else{ echo $value->company->name; }?></a></td>
                  <td><span class="hidden-xs label label-success <?php if($value->end <= date('Y-m-d') && $value->progress != 100){ echo 'label-important tt" title="'.$this->lang->line('application_overdue'); } ?>"><?php $unix = human_to_unix($value->end.' 00:00');echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format, $unix);?></span></td>

                  <td class="hidden-xs"><div class="progress progress-striped active progress-medium tt <?php if($value->progress== "100"){ ?>progress-success<?php } ?>" title="<?=$value->progress;?>%">
                      <div class="bar" style="width:<?=$value->progress;?>%"></div>
                </div></td>
                  
                </tr>
              
		        <?php endforeach;?>
                
               

              </tbody>
            </table>
            </div>

      </div>

	