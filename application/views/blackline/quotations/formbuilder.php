
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/vendor.css" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/formbuilder.css" />
  <style>
  * {
    box-sizing: border-box;
  }

  .fb-main {
    min-height: 600px;
  }

  input[type=text] {
    height: 26px;
    margin-bottom: 3px;
  }

  select {
    margin-bottom: 5px;
    font-size: 40px;
  }
  .save{
    margin-top:13px;
  }
  </style>
<form id="saveform" action="<?=base_url()?>quotations/build<?php if(isset($quotation)){echo "/".$quotation->id;} ?>" method="post">
      <input type="text" class="required input-large span11" name="name" style="margin-top: 17px;" placeholder="Type form title here" id="form-title" value="<?php if(isset($quotation)){echo $quotation->name;} ?>"></input>
			<textarea id="formcontent" class="hidden" name="formcontent"></textarea>
      <input type="submit" class="btn btn-primary span1 save" value="Save">
</form>
  <div class='fb-main2'></div>

  <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/formbuilder-vendor.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/formbuilder.js"></script>

  <?php
  if(isset($quotation)){ 
    $json = json_decode($quotation->formcontent, true);
    $formcontent = json_encode($json["fields"]); 
}
  ?>

  <script>
    $(function(){
      fb = new Formbuilder({
        selector: '.fb-main2',
        bootstrapData: <?php if(isset($formcontent)){echo $formcontent; }else {echo "[]";} ?>
          
      });

      fb.on('save', function(payload){
        console.log(payload);
        $("#formcontent").text(payload);
      });

    });
  </script>  

