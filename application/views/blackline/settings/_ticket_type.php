<?php   
$attributes = array('class' => '', 'id' => 'ticket_type');
echo form_open_multipart($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner"> 
<p>
        <label for="name"><?=$this->lang->line('application_name');?></label>
        <input id="name" name="name" class="required span5" value="<?php if(isset($type->name)){echo $type->name;} ?>" />
</p>
<p>
        <label for="description"><?=$this->lang->line('application_description');?></label>
        <input id="description" name="description" class="required span5" value="<?php if(isset($type->description)){echo $type->description;} ?>" />
</p>

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>