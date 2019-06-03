<?php

require_once '../functions.php';

xiu_get_current_user();

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>douban menus &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
  <script src="/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include 'inc/navbar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>最新电影榜单</h1>
      </div>
      <ul>
        <li id="movies"></li>
      </ul>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
    </div>
  </div>

  <?php $current_page = 'douban'; ?>
  <?php include 'inc/sidebar.php'; ?>

  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<!--   <script>
     function foo(res){
      console.log(res);
     }


  </script>
  <script src="http://api.douban.com/v2/movie/in_theaters?callback=foo"></script> -->
  <script>
    $.ajax({
      url:'http://api.douban.com/v2/movie/in_theaters',
      dataType:'jsonp',
      success:function(res){
        $(res.subjects).each(function(i,item){
          $('#movies').append(`<li><img src="${item.images.large}">${item.title}</li>`)
        })    
         console.log(res);  
      }
    })
  </script>
  <script>NProgress.done()</script>
</body>
</html>
