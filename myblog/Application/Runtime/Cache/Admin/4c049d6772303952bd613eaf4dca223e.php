<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

	 <meta charset="UTF-8">
  <title>后台管理</title>
        
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link rel="stylesheet" type="text/css" href="/myblog/Public/bootstrap/css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="/myblog/Public/css/admin.css"/>
      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="/myblog/Public/js/jquery-3.1.1.min.js"></script>
               <!-- 配置文件 -->
    <script type="text/javascript" src="/myblog/Public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/myblog/Public/ueditor/ueditor.all.js"></script>

</head>
<body>
<header>  
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo U('Admin/Adm/index');?>" ><span class="glyphicon glyphicon-star-empty"></span>后台管理</a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    菜单 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                 <li><a href="<?php echo U('Admin/Addcat/index');?>">添加分类</a></li>
                 <li><a href="<?php echo U('Admin/CatManage/index');?>">分类管理</a></li>
                 <li><a href="<?php echo U('Admin/AddArticle/index');?>">添加文章</a></li>
                 <li><a href="<?php echo U('Admin/ArtManage/index');?>">文章管理</a></li>
                 <li><a href="<?php echo U('Admin/CommManage/index');?>">评论管理</a></li>
                 <li><a href="<?php echo U('Admin/AddDiary/index');?>">添加随笔</a></li>                  
                </ul>
            </li>
            <li><a href="<?php echo U('Home/Index/index');?>" target="_blank">博客页面</a></li>
            <li><a href="">管理员：<?php echo ($name); ?></a></li>
            <li><a href="<?php echo U('Admin/Adm/logout');?>">退出</a></li>
        </ul>
    </div>
    </div>
</nav>
</header>

  <div class="container">
   <div class="panel panel-default panel-main">
    <div class="panel-heading">
     <h3 class="panel-title">
     当前位置：<span class="glyphicon glyphicon-home"></span><a href="<?php echo U('Admin/Adm/index');?>">首页</a>>文章管理>文章修改
     </h3>
    </div>
   <div class="panel-body">

     <form role="form" enctype="multipart/form-data" method="post" action="<?php echo U('Admin/UpdateArt/Update');?>">
       <div class="form-group">
         <label for="id">ID</label>
         <input type="text" class="form-control" id="id" name="id" required="required" value="<?php echo ($article_info['id']); ?>">
       </div>    
       <div class="form-group">
         <label for="title">标题</label>
         <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题" required="required" value="<?php echo ($article_info['title']); ?>">
       </div>
       <div class="form-group">
         <label for="intro">简介</label>
         <input type="text" class="form-control" id="intro" name="intro" placeholder="请输入简介" required="required" value="<?php echo ($article_info['intro']); ?>">
       </div>
        <div class="form-group">
         <label for="type">文章类型</label>
         <input type="text" class="form-control" id="type" name="type" placeholder="请输入文章类型" required="required" value="<?php echo ($article_info['type']); ?>">
       </div>
        <div class="form-group">
         <label for="author">作者</label>
         <input type="text" class="form-control" id="author" name="author" placeholder="请输入名称" required="required" value="<?php echo ($article_info['author']); ?>">
       </div>
       <div class="form-group">
         <label for="myEditor">文章内容</label>
        <div class="editor">
         <!-- 加载编辑器的容器 --> 
          <script id="container" name="content" type="text/plain">
          <?php echo htmlspecialchars_decode($article_info['content']);?>
          </script>
        </div>
       </div>
       <input type="submit" value="提交" class="btn btn-info" >
       <input type="reset" value="重置" class="btn btn-warning" >
     </form>

    </div>
   </div>
  </div>
 
 <footer class="foot">POWERED BY DAYSON</footer>
</body>

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
 <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
 <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
</html>