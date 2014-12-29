<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$invoiceId = $_REQUEST['invoice_id'];

//connessione al database
$connessione= mysql_connect("localhost","selfrule_wp2","U(aRr8CrOX#~2") 
			or die("Connessione non riuscita database it " . mysql_error());
//seleziona il database
mysql_select_db("selfrule_wp2",$connessione) 
				or die("Errore nella selezione del database " . mysql_error());	
$query="SET NAMES utf8";
$result=mysql_query($query);
$query="SET CHARACTER SET utf8";
$result=mysql_query($query);
	
$close = false;
if (!empty($_POST) && isset($_POST['invoice_id'])) {
	$date = $_POST['paid_date'];
	if ($date != '') {
		$query= "UPDATE invoices SET status='Paid', paid_date = '$date' WHERE id = $invoiceId" ;
		$queryResult=mysql_query($query) or die("query sbagliata1 " . mysql_error()); 
	} else {
		$query= "UPDATE invoices SET status='Sent', paid_date = NULL WHERE id = $invoiceId" ;
		$queryResult=mysql_query($query) or die("query sbagliata2 " . mysql_error()); 
	}
	header('Location: /progetti/invoices/view/' . $invoiceId);
	$close = true;
}
?>
<script>$(document).ready(function(){ 
	$("form").validate({

		errorPlacement: function(error, element)
		{
			error.insertAfter(element).hide().slideToggle(500);
		},
		success: function(label)
		{
			$(label).remove();

		},
		sendHandler: function(form) {
			
			$(".btn-loader").val('Uploading...');
			form.submit();
		} 

	});
	$("form#_article, form#_assign, form#_assignclient, form#_assignqueue, form#_close").validate({

		errorPlacement: function(error, element)
		{
			error.insertAfter(element).hide().slideToggle(500);
		},
		success: function(label)
		{
			$(label).remove();

		},
		sendHandler: function(form) {
			
			$(".btn-loader").val('Uploading...');
			form.submit();
		} 

	});
	$( "#slider-range-min" ).slider({
		range: "min",
		value: 0,
		min: 0,
		max: 100,
		slide: function( event, ui ) {
			$( "#progress" ).val( ui.value );
			$( "#pvalue" ).html( ui.value + "%");
		}
	});

	$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
	});

	//Tooltip
  	$('.tt').tooltip();

  	//item-selector
  	$('.additem').click(function(e){
  		$('#item-selector').slideUp('fast');
  		$('#item-editor').slideDown('slow');
  	});

  	 $('input:radio').screwDefaultButtons({ 
                 checked: "url(/progetti/assets/blackline/img/radio-checked.png)",
                 unchecked: "url(/progetti/assets/blackline/img/radio.png)",
                 width:  15,
                 height:   15
              });

     $('input.cb:checkbox').screwDefaultButtons({ 
                 checked: "url(/progetti/assets/blackline/img/checkbox-checked.png)",
                 unchecked: "url(/progetti/assets/blackline/img/checkbox.png)",
                 width:  85,
                 height:   85
              });

});
$("select").select2();

//file upload
$('#fileselectbutton').click(function(e){
	$('#file').trigger('click');
});

$('#file').change(function(e){
	var val = $(this).val();

	var file = val.split(/[\\/]/);

	$('#filename').val(file[file.length-1]);
});

$('.textarea').wysihtml5({"size": 'small'});

$('.datepicker').datepicker({"format": 'yyyy-mm-dd', "autoclose": true});
$('.switch').switch();

<?php if ($close) : ?>
//$(".close").click();
//window.location.reload();
<?php endif; ?>
</script>

<script type="text/javascript" charset="utf-8">
$(prettyPrint);
</script>


 <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
            <h4>Fattura pagata</h4>
        </div>
<div class="modal-body">
 <div class="modal-content">  
  <div class="modal-inner">
        <form action="/progetti/invoice_pagata.php" method="POST">
        <label for="paid_date">Data pagamento</label>
            <input placeholder="<?php echo $_GET['status'] == 'paid' ? 'Annulla pagamento (Salva)' : '' ?>" name="paid_date" type="text" value="<?php echo $_GET['status'] == 'paid' ? '' : date('Y-m-d', time()); ?>" class="<?php echo $_GET['status'] == 'paid' ? '' : 'datepicker'; ?>">
            <input name="invoice_id"  class="required datepicker span5"  type="hidden" value="<?php echo $invoiceId ?>">
       
	
<div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="Salva"/>
        <a class="btn" data-dismiss="modal">Chiudi</a>
        </div>
         </form>
     </div>   
</div>
</div>
</div>
</div>