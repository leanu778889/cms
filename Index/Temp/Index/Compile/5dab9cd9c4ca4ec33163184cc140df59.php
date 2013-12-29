<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><div id="footer">
	<div class='bgbar'></div>
	<div class='bottom'>
		<div class='pos'>
			<div class='footerNav'>
					<?php
			$db = M('navigation');
			$data = $db->where(array('site'=>3))->select();
		?><?php foreach($data as $v):?>
				<?php if($v['opennew']){?>
				<a  target="_blank" href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a>
				<?php  }else{ ?>
				<a  href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a>
				<?php }?>
			<?php endforeach;?>
			</div>
			<div class='copyright'>
				© Copyright 2011-2013 www.houdunwang <?php echo $header['copy'];?>
			</div>
		</div>
	</div>
</div>