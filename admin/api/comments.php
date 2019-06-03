<?php 

	require_once '../../functions.php';
	$page=empty($_GET['page'])?1:intval($_GET['page']);

	$length=30;
	$offset=($page-1)*$length;

	$sql=sprintf('select 
		comments.*,
		posts.title as post_title
		from comments
		inner join posts on posts.id=comments.post_id
		order by comments.created desc
	limit %d,%d;',$offset,$length);

	$comments = xiu_fetch_all($sql);
	$total_count=xiu_fetch_one('select count(1) as count
		from comments 
		inner join posts on posts.id=comments.post_id')['count'];
	$total_pages=ceil($total_count/$length);
	$json = json_encode(array(
		'total_pages'=>$total_pages,
		'comments'=>$comments
	));
	header('Content-Type: application/json');
	echo $json;


 ?>