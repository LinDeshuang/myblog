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
             $(function(){
              $("#oldPwd").focus(function(){
                $("#tip").html('');
              })
             });
               function update(){
                                 var name = $("#user").val();
                                 var oldPwd = $("#oldPwd").val();
                                 var newPwd = $("#newPwd").val();
                                 $.ajax({
                                   url : "<?php echo U('Admin/Adm/updateUserInfo');?>",
                                   data : {
                                            'name' : name,
                                            'oldPwd' : oldPwd,
                                            'newPwd' : newPwd
                                          },
                                   type : 'post',
                                   success : function(data){ 
                                                            if(data[0]==0){
                                                              $('#tip').html('密码错误！').css({color:'red'});
                                                            }else if(data[0]==1){
                                                              alert('修改失败！'+data[1]);
                                                            }else{
                                                              alert('修改成功！');
                                                            }

                                                           }
                                       });
                                 return false;

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
   <h3 class="panel-title">当前位置：<span class="glyphicon glyphicon-home"></span><a href="<?php echo U('Admin/Adm/index');?>">首页</a>>登录信息修改</h3>
  </div>
  <div class="panel-body">
    <form role="form" onsubmit="return update();">
       <div class="form-group">
         <label for="user">用户名：</label>
         <input class="form-control" type="text"  id="user" name="user" placeholder="请输入名称，长度不得超过30个字符" required="required">
       </div>
       <div class="form-group">
         <label for="oldPwd">旧密码：</label>
         <input class="form-control" type="password" id="oldPwd" name="oldPwd" placeholder="请输入旧密码，长度不得超过30个字符" required="required"><span id="tip"></span>
       </div>
       <div class="form-group">
         <label for="newPwd">新密码：</label>
         <input class="form-control" type="password" id="newPwd" name="newPwd" placeholder="请输入新密码，长度不得超过30个字符">
       </div>
       <input type="submit" value="提交" class="btn btn-info" >
       <input type="reset" value="清空" class="btn btn-warning">
    </form>
    </div>
   </div>
  </div>

<footer class="foot">POWERED BY DAYSON</footer>
        <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
       <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
</body>
</html>