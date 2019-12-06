<?php
    foreach($list as $k=>$v){
    ?>
        <a onclick="a(<?=$v['name']?>)" style="color: black">
            <i class="active dm-icon fa fa-<?=$v['name']?> fa-3x"></i>
        </a>
<?php
    }
?>

