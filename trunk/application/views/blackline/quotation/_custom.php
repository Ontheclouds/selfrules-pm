<div id="mainfull">
<?php 
$attributes = array('class' => '', 'id' => '_quotation');
echo form_open($form_action, $attributes); 
?>
<div class="top"><?=$quotation->name;?>      
</div>
		
<div class="row">
		<?=$fields;?>
	<div class="bottom">
		<input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('quotation_save');?>"/>
	</div>
<input type="hidden" id="tfields" name="tfields" value=""/>
<?php echo form_close(); ?>
</div>

<script type="text/javascript">

var xResultString = '';

$('.control-label').each(function(){
  xResultString += $.trim($(this).html()+"||");
 })
$('#tfields').val(xResultString);
</script>