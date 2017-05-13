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
           <script type="text/javascript">
       function Delete(id){
        confirm_=confirm('确认删除？');
        if(confirm_){
          $.ajax({
            url : "<?php echo U('Admin/CommManage/deleteComm');?>",
            data : {
              'id' : id
            },
            type : 'post',
            success : function(data){
                    if(data[0]==1){
                      alert('删除成功！');
                      window.location.href = "<?php echo U('Admin/CommManage/index');?>";
                    }else {
                      alert('删除失败！');
                    }
            }
           });
        }
       }
              function UpdateStatue(id,statue){
        confirm_=confirm('确认修改？');
        if(confirm_){
          $.ajax({
            url : "<?php echo U('Admin/CommManage/UpdateStatue');?>",
            data : {
              'id' : id,
              'statue' : statue
            },
            type : 'post',
            success : function(data){
                    if(data[0]==1){
                      alert('修改成功！');
                      window.location.href = "<?php echo U('Admin/CommManage/index');?>";
                    }else {
                      alert('修改失败！');
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
   <h3 class="panel-title">当前位置：<span class="glyphicon glyphicon-home"></span><a href="<?php echo U('Admin/Adm/index');?>">首页</a>>评论管理</h3>
  </div>
  <div class="panel-body">
    <table class="table table-hover text-center table-condensed">
    	<tr><td>ID</td><td>昵称</td><td>邮箱</td><td>留言</td><td>时间</td><td>回复</td><td>状态</td><td>管理</td></tr>
    	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["nickname"]); ?></td>
        <td><?php echo ($vo["mail"]); ?></td>
        <td><?php echo mb_substr($vo['content'],0,10,'utf-8');?>...</td>
        <td><?php echo ($vo["com_time"]); ?></td>
        <td><?php echo mb_substr($vo['answer'],0,10,'utf-8');?>...</td>
        <td><?php echo ($vo["statue"]); ?></td>
        <td><a class="btn btn-danger" id="<?php echo ($vo["id"]); ?>" href="javascript:Delete(<?php echo ($vo["id"]); ?>);">删除</a>
        <a class="btn btn-info" id="<?php echo ($vo["id"]); ?>" href="javascript:UpdateStatue(<?php echo ($vo["id"]); ?>,<?php echo ($vo["statue"]); ?>);">修改状态</a>
        <a class="btn btn-info" id="<?php echo ($vo["id"]); ?>" href="<?php echo U('Admin/AnswerComm/index',array('cid'=>$vo['id']));?>">查看/回复</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    </div>
   </div>
   <div><?php echo ($page); ?></div>
  </div>

 <footer class="foot">POWERED BY DAYSON</footer>
       <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
       <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
</body>
</html>