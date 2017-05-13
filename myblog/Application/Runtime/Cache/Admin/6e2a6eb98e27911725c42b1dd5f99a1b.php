<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>添加文章</title>
	<meta charset="utf-8">
       <link rel="stylesheet" type="text/css" href="/myblog/Public/css/admin.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link rel="stylesheet" type="text/css" href="/myblog/Public/bootstrap/css/bootstrap.min.css"/>
 
      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
</head>
<body>
 <header>
 <div class="row">
    <div class="col-md-3 col-sm-3 col-lg-3"><h2><a href="<?php echo U('Admin/Adm/index');?>">后台管理</a></h2></div>
    <div class="col-md-3 col-sm-3 col-lg-3"><h2><a href="<?php echo U('Home/Index/index');?>">博客页面</a></h2></div>
    <div class="col-md-3 col-sm-3 col-lg-3"><h3><a href="">管理员：<?php echo ($name); ?></a></h3></div>
    <div class="col-md-3 col-sm-3 col-lg-3"><h3><a href="<?php echo U('Admin/Adm/logout');?>">退出</a></h3></div>
 </div>
</header>
<div class="row">
 <div class="container col-sm-12 col-lg-12 col-md-12 col-lg-12">
  <div class="left">
   <div class="panel panel-default">
     <div class="panel-heading">
       <h3 class="panel-title">菜单</h3>
     </div>
     <div class="panel-body">
      <ul>
        <li><h4><a href="<?php echo U('Admin/Addcat/index');?>">添加分类</a></h4></li>
        <li><h4><a href="<?php echo U('Admin/CatManage/index');?>">分类管理</a></h4></li>
        <li><h4><a href="<?php echo U('Admin/AddArticle/index');?>">添加文章</a></h4></li>
        <li><h4><a href="<?php echo U('Admin/ArtManage/index');?>">文章管理</a></h4></li>
        <li><h4><a href="<?php echo U('Admin/CommManage/index');?>">评论管理</a></h4></li>
        <li><h4><a href="<?php echo U('Admin/AddDairy/index');?>">添加随笔</a></h4></li>
       </ul>
     </div>
   </div>

  </div>
  <div class="right">
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">
     当前位置：<span class="glyphicon glyphicon-home"></span><a href="<?php echo U('Admin/Adm/index');?>">首页</a>>添加随笔
     </h3>
    </div>
   <div class="panel-body">

     <form role="form" enctype="multipart/form-data" method="post" action="<?php echo U('Admin/AddArticle/Add');?>">
       <div class="form-group">
         <label for="title">随笔标题</label>
         <input type="text" class="form-control" id="title" name="title" placeholder="请输入随笔标题" required="required">
       </div>
       <div class="form-group">
         <label for="cntent">随笔内容</label>
         <input type="text" class="form-control" id="cntent" name="cntent" placeholder="请输入简介" required="required">
       </div>
       <input type="submit" value="提交" class="btn btn-info" >
       <input type="reset" value="重置" class="btn btn-warning" >
     </form>

    </div>
   </div>
  </div>
 </div>
</div>
 
 <footer class="foot">POWERED BY DAYSON</footer>
</body>
 <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
 <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
</html>