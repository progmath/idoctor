<!-- <option value="" class="label">English :</option>
                            <option value="1">English</option>
                            <option value="2">French</option>
                            <option value="3">German</option>-->

<option value="" class="label"><?=$this->language['code'];?> :</option>
<?php foreach ($this->languages as $k => $v): ?>
    <?php if($k != $this->language['code']):?>
        <option value="<?=$k;?>"><?=$k;?></option>
    <?php endif;?>
<?php endforeach;?>
