<div id="main">

<div class="row">
	 <div class="span3">
	 	<div class="table_head"><h6><i class="icon-tag"></i> <?=$this->lang->line('application_ticket_details');?></h6></div>
		<div class="subcont">
			<ul class="ticket-details">
				<li><span><?=$this->lang->line('application_status');?>:</span> <?=$this->lang->line('application_ticket_status_'.$ticket->status);?></li>
				<li><span><?=$this->lang->line('application_type');?>:</span> <?php if(isset($ticket->type->name)){ ?><?=$ticket->type->name;?> <?php } ?></li>
				<li><span><?=$this->lang->line('application_from');?>:</span> <?php if(isset($ticket->client->email)){ echo '<span class="tt" title="'.$ticket->client->email.'">'.$ticket->client->firstname.' '.$ticket->client->lastname.'</span>';
				$emailsender = $ticket->client->email;
				}
				else{ 
    				$explode = explode(' - ', $ticket->from); 
    				if(isset($explode[1])){ 
    				$emailsender = $explode[1];
    			    $emailname = str_replace('"', '', $explode[0]);
    			    $emailname = str_replace('<', '', $emailname);
    			    $emailname = str_replace('>', '', $emailname);
    			    $emailname = explode(' ', $emailname); 
    			    $emailname = $emailname[0];
				}else{ $explodeemail = "-"; } 
				echo '<span class="tt" title="'.addslashes($emailsender).'">'.$emailname.'</span>'; } ?></li>				<li><span><?=$this->lang->line('application_created');?>:</span> <?php echo date($core_settings->date_format.'  '.$core_settings->date_time_format, $ticket->created); ?></li>
				<li><span><?=$this->lang->line('application_owner');?>:</span> <?php if(isset($ticket->user->firstname)){ ?><?=$ticket->user->firstname;?> <?=$ticket->user->lastname;?> <?php } else{ echo "-";} ?></li>
				</ul>

			
	 </div>


	 <div class="table_head"><h6><i class="icon-user"></i> <?=$this->lang->line('application_client');?></h6></div>
		<div class="subcont">
			<ul class="ticket-details">
				<?php if(isset($ticket->client->firstname)){ ?><li><span><?=$this->lang->line('application_name');?>:</span>  <?php echo $ticket->client->firstname.' '.$ticket->client->lastname; ?> </li><?php } ?>
				<li><span><?=$this->lang->line('application_company');?>:</span> <?php if(!isset($ticket->client->company->name)){ ?> <a href="#" class="label"><?php echo $this->lang->line('application_no_client_assigned'); }else{ ?><a class="label" href="<?=base_url()?>clients/view/<?=$ticket->client->company->id;?>"><?php echo $ticket->client->company->name;} ?></a></li>
				<?php if(isset($ticket->client->email)){ ?> <li><span><?=$this->lang->line('application_email');?>:</span> <?=$ticket->client->email;?></li><?php } ?>
				<?php if(isset($ticket->client->phone)){ ?> <li><span><?=$this->lang->line('application_phone');?>:</span> <?php echo $ticket->client->phone; ?></li><?php } ?>
				<?php if(isset($ticket->client->mobile)){ ?> <li><span><?=$this->lang->line('application_mobile');?>:</span> <?php echo $ticket->client->mobile; ?></li><?php } ?>
				</ul>
	 </div>
	</div>
	 <div class="span9">
	 		 	<div class="btn-group margin15 nav-tabs">
				
	                <a class="btn btn-mini backlink" id="back" href="#"><?=$this->lang->line('application_back');?></a>
	                <a class="btn btn-mini" id="note" data-toggle="modal" href="<?=base_url()?>ctickets/article/<?=$ticket->id;?>/add"><?=$this->lang->line('application_add_note');?></a>
  					
	        </div> 
	        <div class="article-content">
					<div class="article-header"><b>#<?=$ticket->reference;?></b> - <?=$ticket->subject;?>
						
					</div>
					<div class="article">
						<?=$ticket->text;?>

						<?php if(isset($ticket->ticket_has_attachments[0])){echo '<hr>'; } ?>
						<?php foreach ($ticket->ticket_has_attachments as $ticket_attachments):  ?>
			 				<a class="label label-info" href="<?=base_url()?>ctickets/attachment/<?php echo $ticket_attachments->savename; ?>"><?php echo $ticket_attachments->filename; ?></a>
			 				<?php endforeach;?>
					
					</div>
			</div>
					  <br>

				<?php
			    $i = 0;
			    foreach ($ticket->ticket_has_articles as $value): 
			      $i = $i+1;
			  if($i == 1){ ?>
			  <hr>
			  <?php }
			  if($value->internal == "0"){
			  ?>	
			  <div class="article-content">
			 		<div class="article-header"><?=$value->subject;?>
			 			<span class="pull-right">
			 				<span class="label label-info"><?php $from_explode = explode(' - ', $value->from); echo '<span class="tt" title="'.$from_explode[1].'">'.$from_explode[0].'</span>'; ?></span> 
				 			<span class="label"><?php echo date($core_settings->date_format.' '.$core_settings->date_time_format, $value->datetime); ?></span>
				 		</span>

			         <?php /* if($value->from == $this->user->firstname." ".$this->user->lastname || $this->user->admin == "1"){ ?>
			         <a href="<?=base_url()?>projects/deletemessage/<?=$ticket->project_id;?>/<?=$ticket->id;?>/<?=$value->id;?>" rel="" class="btn btn-mini pull-right btn-danger"><i class="icon-trash icon-white"></i></a>
			 		 <?php } */ ?>
			 		</div>
			 		<div class="message-body">
			 		<?=$value->message;?>

			 		<?php if(isset($value->article_has_attachments[0])){echo "<hr>"; } ?>
			 		<?php foreach ($value->article_has_attachments as $attachments):  ?>
			 				<a class="label label-info" href="<?=base_url()?>ctickets/articleattachment/<?php echo $attachments->savename; ?>"><?php echo $attachments->filename; ?></a>
			 		<?php endforeach;?>

			 		</div>

			 	</div>
			 	<?php } ?>

			  <?php endforeach;?>

	  </div>
	</div>
</div>