<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
   <head>
          <title><?php echo C('TITEL');?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link rel="stylesheet" type="text/css" href="/myblog/Public/bootstrap/css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="/myblog/Public/css/index.css"/>
 
      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="/myblog/Public/js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="/myblog/Public/js/verifyChange.js"></script>  
    <script type="text/javascript">
                        function Sub(){
          var nickname = $('#nickname').val();
          var mail = $('#mail').val();
          var content = $('#content').val();
          var verify = $('#verify').val();
          $.ajax({
                  url : "<?php echo U('Home/Comment/comment');?>",
                  data : {
                          'nickname' : nickname,
                          'mail' : mail,
                          'content' : content,
                          'verify' : verify
                         },
                  type : 'post',
                  success : function(data){
                                    if (data[0] == 2) {
                                    alert('提交失败，验证码错误！');  
                                                    }else if(data[0] == 1){
                                                              alert('留言成功！');
                                                                  window.location.href = "<?php echo U('Home/Comment/index');?>";
                                                          }else {
                                                               alert(data[1]);
                                                  }
                                              }
                                       });
          return false;
         }
      </script>
   </head>
   <body>
   <div class="header">
<div class="container"> 	
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
        <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>" ><?php echo C('HOME');?></a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    学习分享 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                   <?php if(is_array($cate_name)): $i = 0; $__LIST__ = $cate_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Cate/index',array('cateName'=>$v['name']));?>"><?php echo ($v['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>                   
                </ul>
            </li>
            <li><a href="<?php echo U('Home/Dairy/index');?>">随笔</a></li>
            <li><a href="<?php echo U('Home/Comment/index');?>">留言</a></li>
            <li><a href="<?php echo U('Home/About/index');?>">关于</a></li>
        </ul>
    </div>
    </div>
</nav>
</div>
</div>
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="bannerx">
      <div class="text-center">
       <p class="h1">This is a blog base on Thinkphp</p>
       <p class="h3">Date:<?php echo ($time); ?></p>
      </div>
     </div>
    </div>
   </div>

<div class="container">
  <div class="row">
   <div class="col-xs-12 col-sm-8 col-md-8">

  </div>
  <div class="col-xs-12 col-sm-4 col-md-4">
   <div class="info ">   
          <div class="panel panel-default">
         <div class="panel-heading">
             <p class="h4"> <span class=" glyphicon glyphicon-tags">&nbsp</span>文章标签</p>
         </div>
         <div class="panel-body">
         <?php if(is_array($cate_name)): $i = 0; $__LIST__ = $cate_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><span class="label label-info"><?php echo ($vo["name"]); ?></span></a><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
             
         </div>
     </div>
     <div class="panel panel-default">
         <div class="panel-heading">
             <p class="h4"> <span class=" glyphicon glyphicon-fire">&nbsp</span>最热文章</p>
         </div>
         <div class="panel-body">
          <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="h5 text-muted text-danger"><a href="<?php echo U('Home/Article/index',array('id'=>$vo['id']));?>">[<?php echo ($vo["category"]); ?>]<?php echo ($vo["title"]); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </div>
     </div>
     </div>
   </div>
  </div>
 </div>  
</div>

   
  <div class="row comment">
	<div class="col-xs-12 col-sm-12 col-md-12">
	 <div class="well">
	  <div class="row">
	   <div class="col-xs-12 col-sm-12 col-md-6">	
		 <form class="form-horizontal" role="form" onsubmit="return Sub();">
		  <div class="form-group">
		    <label for="nickname" class="col-sm-2 control-label">名字:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入名字" required="required">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mail" class="col-sm-2 control-label">邮箱:</label>
		    <div class="col-sm-10">
		      <input type="mail" class="form-control" id="mail" name="mail" placeholder="请输邮箱">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="content" class="col-sm-2 control-label">留言:</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" name="content" id="content" required="required" rows="3" cols="10"></textarea>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="verify" class="col-sm-2 control-label">输入验证码:</label>
		    <div class="col-sm-10">
		     <div class="row">
		      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		        <input type="text" class="form-control" id="verify" name="verify" placeholder="请输入验证码" required="required">
		      </div>
		      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		        <img src="<?php echo U('Home/Index/verifyShow',array());?>" width="100px" height="40px" title="点击刷新" id="verifyImg">
		      </div>
		     </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="submit" class="btn btn-warning" value="提交">
		    </div>
		  </div>
		 </form>
		</div>
	  </div>
     </div>
	</div>
</div>
  <div class="footer ">
 <footer>POWERED BY DAYSON</footer>
</div>
       <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
       <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
   </body>
</html>