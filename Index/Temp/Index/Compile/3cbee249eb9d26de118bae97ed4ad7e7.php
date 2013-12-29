<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><div class='sidebar'>
	<div class='item'>
		<h2>标签</h2>
		<div class='tagbox'>
					<?php
			$db = M('tag_news');
			$sql ='SELECT * FROM '.C('DB_PREFIX').'tag_news as t1 INNER JOIN '.C('DB_PREFIX').'tag as t ON t1.tag_tid=t.tid '."".' group by t1.tag_tid order by count(*) desc limit 0,'."10";
			$data = $db->query($sql);
		?><?php foreach($data as $tag):?><?php $tag["url"] = "http://localhost/cms/index.php/Index/Search/index.html/tid/$tag[tid]";?>
				<a href="<?php echo $tag['url'];?>"><?php echo $tag['tagname'];?></a>
			<?php endforeach;?>
		</div>
	</div>
	<div class='item'>
		<h2>友情链接</h2>
		<ul class='flink'>
					<?php
			$db = M('flink');
			$data = $db->select();
		?><?php foreach($data as $link):?>
				<li><a href="<?php echo $link['url'];?>"><?php echo $link['fname'];?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class='item'>
		<h2>文章归档</h2>
		<ul class='flink'>
			<?php if(is_array($archives)):?><?php  foreach($archives as $k=>$v){ ?>
				<li style="height:auto;">
					<?php echo $k;?><br/>
					<?php if(is_array($v)):?><?php  foreach($v as $m){ ?>
						<a style="padding:0px 5px;" href="<?php echo $m['url'];?>"><?php echo $m['month'];?><em>(<?php echo $m['total'];?>)</em></a>
					<?php }?><?php endif;?>
				</li>
			<?php }?><?php endif;?>
		</ul>
	</div>
</div>