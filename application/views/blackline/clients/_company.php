<?php   
$attributes = array('class' => '', 'id' => '_company');
echo form_open_multipart($form_action, $attributes); 
?>
<div class="modal-content">  
<div class="modal-inner"> 
<?php if(isset($company)){ ?>
<input id="id" type="hidden" name="id" value="<?=$company->id;?>" />
<?php } ?>
<?php if(isset($view)){ ?>
<input id="view" type="hidden" name="view" value="true" />
<?php } ?>
<p>
        <label for="reference"><?=$this->lang->line('application_reference_id');?> *</label>
        <input id="reference" type="text" name="reference" class="required span5"  value="<?php if(isset($company)){echo $company->reference;} else{ echo $core_settings->company_reference; } ?>"   readonly="readonly"  />
</p>
<?php if(isset($company)){ ?>
<p>
        <label for="contact"><?=$this->lang->line('application_primary_contact');?></label>
        <?php $options = array();
                $options['0'] = '-';
                foreach ($company->clients as $value):  
                $options[$value->id] = $value->firstname.' '.$value->lastname;
                endforeach;
        if(isset($company->client->id)){ $client = $company->client->id; }else{$client = "0";} 
        echo form_dropdown('client_id', $options, $client, 'style="width:100%"');?>
</p>       
<?php } ?>
<p>
        <label for="name"><?=$this->lang->line('application_company');?> <?=$this->lang->line('application_name');?> *</label>
        <input id="name" type="text" name="name" class="required span5" value="<?php if(isset($company)){echo $company->name;} ?>"  />
</p>
<p>
        <label for="vat">P.IVA *</label>
        <input id="vat" type="text" name="vat" class="required span5" value="<?php if(isset($company)){echo $company->vat;} ?>"  />
</p>
<p>
        <label for="website"><?=$this->lang->line('application_website');?> *</label>
        <input id="website" type="text" name="website" class="required span5" value="<?php if(isset($company)){echo $company->website;} ?>" />
</p>
<p>
        <label for="phone"><?=$this->lang->line('application_phone');?></label>
        <input id="phone" type="text" name="phone" class="span5" value="<?php if(isset($company)){echo $company->phone;}?>" />
</p>
<p>
        <label for="mobile"><?=$this->lang->line('application_mobile');?></label>
        <input id="mobile" type="text" name="mobile" class="span5" value="<?php if(isset($company)){echo $company->mobile;}?>" />
</p>
<p>
        <label for="address"><?=$this->lang->line('application_address');?></label>
        <input id="address" type="text" name="address" class="span5" value="<?php if(isset($company)){echo $company->address;}?>" />
</p>
<p>
        <label for="zipcode"><?=$this->lang->line('application_zip_code');?></label>
        <input id="zipcode" type="text" name="zipcode" class="span5" value="<?php if(isset($company)){echo $company->zipcode;}?>" />
</p>
<p>
        <label for="city"><?=$this->lang->line('application_city');?></label>
        <input id="city" type="text" name="city" class="span5" value="<?php if(isset($company)){echo $company->city;}?>" />
</p>
<p>
        <label for="country"><?=$this->lang->line('application_country');?></label>
        <input id="country" type="text" name="country" class="span5" value="<?php if(isset($company)){echo $company->country;}?>" />
</p>
</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>
<?php echo form_close(); ?>