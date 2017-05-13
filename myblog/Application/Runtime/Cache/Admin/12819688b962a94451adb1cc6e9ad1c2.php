<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
      <script type="text/javascript">
      	function add(){
      		var title = $('#title').val();
      		var content = $('#content').val();
      		        confirm_=confirm('确认添加？');
        if(confirm_){
          $.ajax({
            url : "<?php echo U('Admin/AddDiary/Add');?>",
            data : {
              'title' : title,
              'content' : content
            },
            type : 'post',
            success : function(data){
                    if(data[0]==1){
                      alert('添加成功！');
                    }else {
                      alert('添加失败！'+data[1]);
                    }
            }
           });
        }
        return false;
      	}
         function Delete(id){
        confirm_=confirm('确认删除？');
        if(confirm_){
          $.ajax({
            url : "<?php echo U('Admin/AddDiary/Delete');?>",
            data : {
              'id' : id
            },
            type : 'post',
            success : function(data){
                    if(data[0]==1){
                      alert('删除成功！');
                      window.location.href = "<?php echo U('Admin/AddDiary/index');?>";
                    }else {
                      alert('删除失败！');
                    }
            }
           });
        }
       }
      </script>
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
     当前位置：<span class="glyphicon glyphicon-home"></span><a href="<?php echo U('Admin/Adm/index');?>">首页</a>>添加随笔
     </h3>
    </div>
   <div class="panel-body">

     <form role="form" onsubmit="return add();">
       <div class="form-group">
         <label for="title">随笔标题</label>
         <input type="text" class="form-control" id="title" name="title" placeholder="请输入随笔标题" required="required">
       </div>
       <div class="form-group">
         <label for="content">随笔内容</label>
         <input type="text" class="form-control" id="content" name="content" placeholder="请输入内容" required="required">
       </div>
       <input type="submit" value="提交" class="btn btn-info" >
       <input type="reset" value="重置" class="btn btn-warning" >
     </form>
    </div>
   </div>
      <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">
     当前位置：<span class="glyphicon glyphicon-home"></span><a href="<?php echo U('Admin/Adm/index');?>">首页</a>>管理随笔
     </h3>
    </div>
    <div class="panel-body">
     <table class="table table-hover table-condense text-center">
       <tr><td>ID</td><td>随笔标题</td><td>随笔内容</td><td>随笔时间</td><td>管理</td></tr>
       <?php if(is_array($diary)): $i = 0; $__LIST__ = $diary;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
           <td><?php echo ($vo["id"]); ?></td>
           <td><?php echo ($vo["title"]); ?></td>
           <td><?php echo mb_substr($vo['content'],0,20,'utf-8');?></td>
           <td><?php echo ($vo["create_time"]); ?></td>
           <td><a class="btn btn-danger" href="javascript:Delete(<?php echo ($vo["id"]); ?>);">删除</a>&nbsp
           <a class="btn btn-warning" href="<?php echo U('Admin/UpdateDiary/index',array('did'=>$vo['id']));?>">查看/修改</a></td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
     </table>
    </div>
   </div>
   <div class="page">
     <?php echo ($page); ?>
   </div>
  </div>

 
 <footer class="foot">POWERED BY DAYSON</footer>
</body>
 <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
 <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
</html>