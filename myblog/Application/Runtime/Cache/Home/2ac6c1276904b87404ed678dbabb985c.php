<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
   <head>
          
      <title><?php echo C('TITEL');?></title>
      <meta charset="UTF-8">
      <meta name=”description” content="Dayson的个人博客，一个崇尚实干的程序猿">
      <meta name="keywords" content="dayson's blog,Dayson的博客" />
      <meta name="author" content="Dayson">
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <link rel="shortcut icon" href="favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link rel="stylesheet" type="text/css" href="/myblog/Public/bootstrap/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="/myblog/Public/css/index.css"/>
 
      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="/myblog/Public/js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="/myblog/Public/js/verifyChange.js"></script>  
    <script type="text/javascript" src="/myblog/Public/js/article.js"></script>
    <script type="text/javascript" src="/myblog/Public/js/other.js"></script>
     <script type="text/javascript">
                        function Sub(){
          var nickname = $('#nickname').val();
          var mail = $('#mail').val();
          var content = $('#content').val();
          var verify = $('#verify').val();
          $.ajax({
                  url : "<?php echo U('Home/Index/comment');?>",
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
                                                      if(confirm('提交成功！是否前往留言板？')){
                                                        window.location.href = "<?php echo U('Home/Comment/index');?>"; 
                                                      }else{
                                                        
                                                      }                                             
                                                         }else {                                                          alert(data[1]);
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
        <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>" ><span class="glyphicon glyphicon-star-empty"></span><?php echo C('HOME');?></a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav ">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    学习分享 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                   <?php if(is_array($cate_name)): $i = 0; $__LIST__ = $cate_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Cate/index',array('cateName'=>$v['name']));?>"><?php echo ($v['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>                   
                </ul>
            </li>
            <li><a href="<?php echo U('Home/Diary/index');?>">随笔</a></li>
            <li><a href="<?php echo U('Home/Comment/index');?>">留言</a></li>
            <li><a href="<?php echo U('Home/About/index');?>">关于</a></li>
        </ul>
    </div>
    </div>
</nav>
</div>
</div>
   <div class="row banner-row">
    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="bannerx">
      <div class="text-center">
       <p class="h1">ARTICLE</p>
       <p class="h3">Date:<?php echo ($time); ?></p>
      </div>
     </div>    
    </div>
   </div>

<div class="container">
  <div class="row">
   <div class="col-xs-12 col-sm-8 col-md-8">
    <div class="content">
    <?php if(is_array($article_info)): $i = 0; $__LIST__ = $article_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_info): $mod = ($i % 2 );++$i;?><div class="article-pannel panel panel-default ">
         <div class="panel-heading">
             <p class="h4"> <span class="glyphicon glyphicon-bookmark"></span>&nbsp<?php echo ($article_info["title"]); ?></p>
         </div>
         <div class="panel-body">
           <div class="well">
             <span class="glyphicon glyphicon-pencil"></span><?php echo ($article_info["author"]); ?>
              <span class="glyphicon glyphicon-time"></span><?php echo ($article_info["create_time"]); ?>
              <span class="glyphicon glyphicon-comment"></span><?php echo ($article_info["comment_sum"]); ?>
              <span class="glyphicon glyphicon-tag"></span><?php echo ($article_info["category"]); ?>
              <span class="glyphicon glyphicon-eye-open"></span><?php echo ($article_info["click_sum"]); ?>
           </div> 
           <div class="text-p article">
             <?php echo htmlspecialchars_decode($article_info['content']);?>
           </div>  
         </div>
     </div><?php endforeach; endif; else: echo "" ;endif; ?>
   </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4">
   <div class="info ">   
       <div class="panel panel-default">
         <div class="panel-heading">
             <p class="h4"> <span class=" glyphicon glyphicon-tags">&nbsp</span>文章标签</p>
         </div>
         <div class="panel-body">
         <ul class="side-tag-li">
          <?php if(is_array($cate_name)): $i = 0; $__LIST__ = $cate_name;if( count($__LIST__)==0 ) : echo "没有标签" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['id']%6==0): ?><li class="label label-primary"><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><?php echo ($vo["name"]); ?></a></li><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endif; ?>
            <?php if($vo['id']%6==1): ?><li class="label label-info"><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><?php echo ($vo["name"]); ?></a></li><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endif; ?>
            <?php if($vo['id']%6==2): ?><li class="label label-success"><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><?php echo ($vo["name"]); ?></a></li><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endif; ?>
            <?php if($vo['id']%6==3): ?><li class="label label-warning"><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><?php echo ($vo["name"]); ?></a></li><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endif; ?>
            <?php if($vo['id']%6==4): ?><li class="label label-danger"><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><?php echo ($vo["name"]); ?></a></li><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endif; ?>
            <?php if($vo['id']%6==5): ?><li class="label label-default"><a href="<?php echo U('Home/Cate/index',array('cateName'=>$vo['name']));?>"><?php echo ($vo["name"]); ?></a></li><span class="badge"><?php echo ($vo["article_sum"]); ?></span><?php endif; endforeach; endif; else: echo "没有标签" ;endif; ?>

          </ul>   
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


        <div class="panel panel-default">
         <div class="panel-heading">
             <p class="h4"> <span class="glyphicon glyphicon-comment"></span>&nbsp最新留言</p>
         </div>
         <div class="panel-body">
          <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="well">
             <div class="h5">
              <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo ($comment["nickname"]); ?>
              <span class="glyphicon glyphicon-time"></span>&nbsp<?php echo ($comment["com_time"]); ?>
             </div>
             <a href="<?php echo U('Home/Comment/index');?>"><?php echo mb_substr($comment['content'],0,30,'utf-8');?>......</a>
           </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
	     <p class="text-center h3">留点什么再走吧:-)
	      <small class="text-muted">不用担心，邮箱将不会公布，还有一件事：麻烦填一下验证码</small>
	     </p>	
		 <form class="form-horizontal" role="form" onsubmit="return Sub();">
		  <div class="form-group">
		    <label for="nickname" class="col-sm-2 control-label">昵称: </label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入您的昵称" required="required">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mail" class="col-sm-2 col-md-2 control-label">邮箱:</label>
		    <div class="col-sm-10">
		      <input type="mail" class="form-control" id="mail" name="mail" placeholder="请输邮箱">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="content" class="col-sm-2 control-label">留言:</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" name="content" id="content" required="required" rows="3" cols="10" placeholder="想说什么？"></textarea>
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
		      <input type="submit" class="btn btn-danger" value="提交">
		    </div>
		  </div>
		 </form>
		</div>
	  </div>
     </div>
	</div>
</div>
  <div class="footer">
 <footer>
  <p>Copyright © 2017 DAYSON dayson.cc All Rights Reserved.</p> 
  <p>Power By <a href="http://www.thinkphp.cn" target="_blank">Thinkphp</a>&<a href="http://www.bootcss.com" target="_blank">Bootstrap</a></p>
  <p>本站部分内容来自互联网，如有侵权请联系站长删除！</p>
  <p>备案号：粤ICP备17042601号 </p>
 </footer>
</div>
  <aside class="fixedSideBar">
  <p class="to-top" data-toggle="tooltip" title="回到顶部"><span class="glyphicon glyphicon-circle-arrow-up"></span></p>
</aside>
       <script src="/myblog/Public/bootstrap/ot/jquery.min.js"></script>
       <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
   </body>
</html>