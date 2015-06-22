<!--<h2>Main Menu</h2><hr>-->
<?#=login_status()?>
<ul id="verticalmenu" class="glossymenu">
	<li><?=anchor('home', 'Home')?></li>
</ul>
<?php foreach ($menu_group as $row) : ?>
<h2 style="margin-left: 10px;"><?=$row->NAMA_GROUP?></h2>
	<?=show_sub_menu($row->ID)?>
<?php endforeach; ?>

