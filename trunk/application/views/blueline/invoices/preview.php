<?php


$language = $this->input->cookie('language');
if (!isset($language))
{
  $language = $core_settings->language;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fattura Selfrules</title>
<style type="text/css">
@font-face {
    font-family: "Champagne & Limousines";
    src: url(/progetti/assets/selfrules/font/Champagne & Limousines.ttf) format("truetype");
}
body {
	font-family: "Champagne & Limousines", Verdana, Tahoma;
	background: #fff url(/progetti/assets/selfrules/img/s_bg.png) no-repeat top left;
}
.azure {
	color: #00aadb;	
}
.violet {
	color: #a0afcf;	
}
.grey {
	color: #a3aed1;	
}
.invoice_number_div {
	font-size: 28px;	
}
.invoice_data_div {
	font-size: 25px;	
}
.inviceItem {
	height:55px;
}
.discount {
	margin-bottom:8px;	
}
.firstPart {
	height: 685px;	
}
</style>

  <meta name="Author" content="<?= $core_settings->company?>"/> <br>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php /*
  <link rel="stylesheet" href="invoice.css" type="text/css" charset="utf-8" /> 
    <style type="text/css">
body{
  color: #61686d;
  font: 14px "Helvetica Neue", Helvetica, Arial, Verdana, sans-serif;
  font-weight: lighter;
  padding-bottom: 60px;
}

#page {
  background: #ffffff;
  width: 100%;
  margin: 0 auto;
  margin-top: 0px;
  display: block;
  z-index: 0;
}

.headline {
  color: #4d5357;
  font-weight: lighter;
  font-size: 48px;
  margin: 20px 0 0 0;
}

.terms {
  width: 400px;
  margin: 0 0 40px 0;
  font-size: 12px;
  color: #a1a7ac;
  line-height: 180%;
}

.terms strong {
  font-size: 16px;
}

.recipient-address {
  padding-top: 60px;
  width: 200px;
}

.company-logo {
  right: 40px;
  top: 40px;
  float:right;
  max-height:70px;
}

.company-address {
  width: 200px;
  color: #a1a7ac;
  position: absolute;
  right: 0px;
  top:70px;
  text-align: right;
}

.status {
  position: absolute;
  top: -50px;
  left: -50px;
  text-indent: -5000px;
  width: 128px;
  height: 128px;
}

.Open {
  background-image: url(<?php echo base_url(); ?>assets/blackline/img/<?=$language;?>/status-open.png);
}

.Sent {
  background-image: url(<?php echo base_url(); ?>assets/blackline/img/<?=$language;?>/status-sent.png);
}

.Paid {
  background-image: url(<?php echo base_url(); ?>assets/blackline/img/<?=$language;?>/status-paid.png);
}

.Overdue {
  background-image: url(<?php echo base_url(); ?>assets/blackline/img/<?=$language;?>/status-overdue.png);
}

hr {
  clear: both;
  border: none;
  background: none;
  border-bottom: 1px solid #d6dde2;
}

.total-due {
  float: right;
  width: 250px;
  border: 1px solid #d6dde2;
  margin: 20px 0 40px 0;
  padding: 0;
  border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;
  text-align: right;
}

.total-heading {
  background: #e7ebee;
  color: #63676b;
  text-shadow: 0 1px 1px #ffffff;
  padding: 8px 20px 0 0;
  -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0px 0px 0px 1px rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.08);
  border-bottom: 1px solid #d6dde2;
}

.total-heading p, .total-amount p {
  margin: 0; padding: 0;
}

.total-amount {
  padding: 8px 20px 8px 0;
  color: #4d5357;
  font-size: 24px;
  margin:0;
}

table.tablesorter {
  width: 100%;
  text-align: left;
  border:0;
  margin: 0px 0 0 0;
  color: #a1a7ac;
}
table.tablesorter thead tr th, table.tablesorter tfoot tr th {
  margin: 0;
}
table.tablesorter thead tr.header {
  background: #e7ebee;
  color: #4d5357;
  text-shadow: 0 1px 1px #ffffff;
  padding-left: 20px;
  -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0px 0px 0px 1px rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.08);
  border-bottom: 1px solid #d6dde2;
}
table.tablesorter thead tr.header th{
  font-size: 11px;
  height:30px;
  border-bottom: 1px solid #d8dcdf;
  text-align: left;
  padding-left:10px;
  }
.round{
   border: 1px solid #d6dde2;
  border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px;
}
table.tablesorter tbody td {
  padding: 10px;
  vertical-align: top;
  font-size: 11px;
}
table.tablesorter tbody tr.even td {
  background: #f6f8f9;
}
.custom-terms {
  padding:20px 10px;
}
.sum{
  width:50%;
  padding:5px 10px;
}
.margin{
  padding:5px 10px;
  height:20px;
}

    </style>*/ ?>

</head>

<body>
<div class="firstPart">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" align="left" valign="top"><img src="http://www.selfrules.org/wp-content/uploads/2014/08/logo-nuovo-trasparente.png" alt="Logo Seflrules" width="170" height="124"><br>
    <br>
    <br></td>
    <td width="50%" align="right" valign="top"><span class="violet">Selfrules</span> <span class="azure">di De Luca Mattia Filippo</span><br>
      <span class="azure">Via del Carmine 8/b, Spilamberto (MO)</span><br>
      <span class="violet">Cod. Fisc. e P.iva</span> <span class="azure">03445460367</span><br>
      <span class="violet">Cell:</span> <span class="azure">+39 348 7749308</span><br>
      <span class="violet">E-Mail:</span> <span class="azure">info@selfrules.org</span><br>
      <span class="violet">Web:</span> <span class="azure">http://www.selfrules.org</span><br>
      <br>
    <br></td>
  </tr>
  <tr>
    <td align="left" valign="top"><span class="violet">Cliente:</span><br>
      <span class="azure"><?=$invoice->company->name;?><br>
<?=$invoice->company->address;?><br>
<?=$invoice->company->zipcode;?> - <?=$invoice->company->city;?></span><br>
<span class="violet">P.iva</span> <span class="azure"><?=$invoice->company->vat;?></span></td>
    <td align="right" valign="top"><div class="invoice_number_div"> <span class="azure">Fattura n°:</span> <?=$invoice->reference;?></div>
    <div class="invoice_data_div">
      <span class="azure">Data:</span> <?php echo date($core_settings->date_format, human_to_unix($invoice->issue_date.' 00:00:00'));?><br>
    <span class="azure">Scadenza:</span> <?php echo date($core_settings->date_format, human_to_unix($invoice->due_date.' 00:00:00'));?></div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr class="azure">
    <td width="24%" height="51" align="center">Servizio</td>
    <td width="51%" align="center">Dettagli</td>
    <td width="7%" align="center">/Qtà Ore</td>
    <td width="18%" align="center">Importo</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="border-top:3px solid #D5D7E6;border-right:3px solid #D5D7E6;border-bottom:3px solid #D5D7E6"><?php foreach ($items as $i => $value): ?>
    <div class="inviceItem"><?php if(!empty($value->name)){echo $value->name;}else{ echo $invoice->invoice_has_items[$i]->item->name; }?>
    </div><?php endforeach; ?></td>
    <td align="left" valign="top" style="border-top:3px solid #D5D7E6;border-right:3px solid #D5D7E6;border-bottom:3px solid #D5D7E6"><?php foreach ($items as $i => $value):?>
    <div class="inviceItem"><?=$invoice->invoice_has_items[$i]->description;?></div><?php endforeach; ?></td>
    <td align="center" valign="top" style="border-top:3px solid #D5D7E6;border-right:3px solid #D5D7E6;border-bottom:3px solid #D5D7E6"><?php foreach ($items as $i => $value):?>
    <div class="inviceItem"><?=$invoice->invoice_has_items[$i]->amount;?></div><?php endforeach; ?></td>
    <td align="center" valign="top" style="border-top:3px solid #D5D7E6;border-bottom:3px solid #D5D7E6"><?php $sum = 0; foreach ($items as $i => $value):?>
    <div class="inviceItem"><?php echo sprintf("%01.2f",$invoice->invoice_has_items[$i]->value);?></div>
	<?php $sum = $sum+$invoice->invoice_has_items[$i]->amount*$invoice->invoice_has_items[$i]->value; $i++;?>
	<?php endforeach; ?></td>
    <?php if(empty($items)){ echo "<tr><td colspan='5'>".$this->lang->line('application_no_items_yet')."</td></tr>";}
    if(substr($invoice->discount, -1) == "%"){ $discount = sprintf("%01.2f", round(($sum/100)*substr($invoice->discount, 0, -1), 2)); }
    else{$discount = $invoice->discount;}
    $sum = $sum-$discount;
    $presum = $sum;
    $tax = sprintf("%01.2f", round(($sum/100)*$core_settings->tax, 2));
    $sum = sprintf("%01.2f", round($sum+$tax, 2));
    ?>
  </tr>
</table>
<br>
<br>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td>&nbsp;</td>
    <td width="13%" align="left" valign="top" style="border-top:3px solid #D5D7E6;border-left:3px solid #D5D7E6;"><?php if ($invoice->discount != 0): ?><div class="discount">Sconto</div><?php endif; ?>
    Totale
    </td>
    <td width="20%" align="right" valign="top"  style="border-top:3px solid #D5D7E6;border-right:3px solid #D5D7E6;"><?php if ($invoice->discount != 0): ?><div class="discount">- <?=$invoice->discount;?></div><?php endif; ?>
<?=$presum;?>
</td>
  </tr>
  
  <tr>
    <td width="67%">&nbsp;</td>
    <td colspan="2" align="left" valign="top" style="border-bottom:3px solid #D5D7E6;border-right:3px solid #D5D7E6;border-left:3px solid #D5D7E6;background-color:#A5D3F4;color:#fff" class="invoice_number_div">€ <?=$sum;?></td>
    </tr>
</table>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border-top: 1px dotted #2BAADF"><table width="98%" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr>
        <td width="50%" align="left" valign="top"><span class="violet">Bonifico Bancario:</span><br>
          IT76V0558401795000000045404<br>
          <span class="violet">BIC/SWIFT:</span><br>
          WEBNITMMXXX</td>
        <td width="50%" align="right" valign="top"><span class="violet">Riepilogo Rate</span><br>
<?php echo nl2br($invoice->terms); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" height="20"><hr style="color:#A8ACD1;" /></td>
        </tr>
      <tr>
        <td colspan="2" align="center" valign="top" style="font-size:13px">Prestazione svolta in regime dei minimi ex art. 1 co. 96-117. L 244/2007 come modificata da art. 27 D.L. 98/2011, non soggetta ad iva ai sensi provvedimento direttore Agenzia Entrate n. 185820/2011</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td style="background-color:#2BAADF">&nbsp;</td>
  </tr>
</table>
<?php /*
<div><img src="<?php echo base_url(); ?><?=$core_settings->invoice_logo;?>" class="company-logo" /><div>
<div id="page">
  <div class="status <?php if($invoice->due_date <= date('Y-m-d') && $invoice->status != "Paid"){ echo "Overdue"; }else{ echo $invoice->status;} ?>">
  </div>
  <div>  
  <p class="recipient-address">
  <strong><?=$invoice->company->name;?></strong><br />
<?php if(isset($invoice->company->client->firstname)){ ?> <?=$invoice->company->client->firstname;?> <?=$invoice->company->client->lastname;?> <br><?php } ?>
<?=$invoice->company->address;?><br>
<?=$invoice->company->city;?><br>
<?=$invoice->company->zipcode;?> 
</p>


   <p class="company-address">
    <?=$core_settings->company;?><br>
    <?=$core_settings->invoice_contact;?><br>
    <?=$core_settings->invoice_address;?><br>
    <?=$core_settings->invoice_city;?><br>
    <?=$core_settings->invoice_tel;?><br>
  </p> 
</div>

  <span class="headline"><?=$this->lang->line('application_invoice');?> <?=$invoice->reference;?></span>
  <p class="terms"><strong><?php echo date($core_settings->date_format, human_to_unix($invoice->issue_date.' 00:00:00'));?></strong><br/>
  <?=$this->lang->line('application_due_date');?> <?php echo date($core_settings->date_format, human_to_unix($invoice->due_date.' 00:00:00'));?></p>
  


    <div class="round"> 
    <table id="table" class="tablesorter" cellspacing="0"> 
  <thead> 
  <tr class="header"> 
    <th><?=$this->lang->line('application_item');?></th>
    <th><?=$this->lang->line('application_description');?></th>
    <th width="8%"><?=$this->lang->line('application_hrs_qty');?></th>
    <th width="12%"><?=$this->lang->line('application_unit_price');?></th>
    <th width="12%"><?=$this->lang->line('application_sub_total');?></th>
  </tr> 
  </thead> 
  <tbody> 
  <?php $i = 0; $sum = 0; $row=false; ?>
    <?php foreach ($items as $value):?>
    <tr <?php if($row){?>class="even"<?php } ?>>
      <td><?php if(!empty($value->name)){echo $value->name;}else{ echo $invoice->invoice_has_items[$i]->item->name; }?></td>
      <td><?=$invoice->invoice_has_items[$i]->description;?></td>
      <td align="center"><?=$invoice->invoice_has_items[$i]->amount;?></td>
      <td><?php echo sprintf("%01.2f",$invoice->invoice_has_items[$i]->value);?></td>
      <td><?php echo sprintf("%01.2f",$invoice->invoice_has_items[$i]->amount*$invoice->invoice_has_items[$i]->value);?></td>
    </tr>
    <?php $sum = $sum+$invoice->invoice_has_items[$i]->amount*$invoice->invoice_has_items[$i]->value; $i++; if($row){$row=false;}else{$row=true;}?>
    
    <?php endforeach;
    if(empty($items)){ echo "<tr><td colspan='5'>".$this->lang->line('application_no_items_yet')."</td></tr>";}
    if(substr($invoice->discount, -1) == "%"){ $discount = sprintf("%01.2f", round(($sum/100)*substr($invoice->discount, 0, -1), 2)); }
    else{$discount = $invoice->discount;}
    $sum = $sum-$discount;
    $presum = $sum;
    $tax = sprintf("%01.2f", round(($sum/100)*$core_settings->tax, 2));
    $sum = sprintf("%01.2f", round($sum+$tax, 2));
    ?>
    
  </tbody> 
  </table> 
    </div> 
  
  <div class="total-due">
     <?php if ($invoice->discount != 0 || $core_settings->tax != "0"){ ?>
        <table width="100%">
          <?php if ($invoice->discount != 0): ?>
        <tr >
          <td align="left" class="margin"><?=$this->lang->line('application_discount');?></td>
          <td align="right" style="padding-right:20px">- <?=$invoice->discount;?></td>
        </tr> 
        <?php endif ?>
        <tr >
          <td align="left" class="margin"><?=$this->lang->line('application_total');?></td>
          <td align="right" style="padding-right:20px"><?=$presum;?></td>
        </tr> 
       <?php if($core_settings->tax != "0"){ ?>
        <tr>
          <td align="left" class="margin"><?=$this->lang->line('application_tax');?> (<?= $core_settings->tax?>%)</td>
          <td align="right" style="padding-right:20px"><?=$tax?></td>
        </tr>
        <?php } ?>
        </table>
    <?php } ?>
    <div class="total-amount total-heading"><p><?=$invoice->currency?> <?=$sum;?></p></div>
  </div>
  <div class="custom-terms">
  <?php echo $invoice->terms; ?>
  </div>
</div>


*/ ?>
</body>
</html>
