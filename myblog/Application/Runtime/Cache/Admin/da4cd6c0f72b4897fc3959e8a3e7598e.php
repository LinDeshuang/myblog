<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
      <link rel="stylesheet" type="text/css" href="/myblog/Public/bootstrap/css/bootstrap.min.css"/>
 
      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
       <style type="text/css">
       	body{
       		padding: 0px;
       		margin: 0px;
       		background-color: #0066CC;
       	}
        .container{
          margin: 100px auto;
          padding: 10px;
          width: 400px;
          background-color: white;
        }
        input{
          margin:10px;
          width: 100%;
        }
       </style>
       <script type="text/javascript" src="/myblog/Public/js/jquery-3.1.1.min.js"></script>
       <script type="text/javascript">
       $(function(){
                  // 验证码生成  
                  var captcha_img = $('#verifyImg'); 
                  var verifyimg = captcha_img.attr("src");  
                  captcha_img.attr('title', '点击刷新');  
                  captcha_img.click(function(){  
                      if( verifyimg.indexOf('?')>0){  
                          $(this).attr("src", verifyimg+'&random='+Math.random());  
                      }else{  
                          $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
                      }  
                  });
       });
         function login(){
          var name = $('#name').val();
          var pwd = $('#pwd').val();
          var verify = $('#verify').val();
          $.ajax({
                  url : "<?php echo U(Admin/index);?>",
                  data : {
                          'name' : name,
                          'pwd' : pwd,
                          'verify' : verify
                         },
                  type : 'post',
                  success : function(data){
                                    if (data[0] == 1) {
                                    alert('登录成功');  
                                    window.location.href = "<?php echo U('Adm/index');?>";
                                                    }else if(data[0] == 0){
                                                       alert('登录失败,密码或帐号错误！');
                                                        }else {
                                                          alert('登录失败，验证码错误！');
                                                        }
                                          }
                 });
          return false;
         }
       </script>
</head>
<body>
<div class="container text-center">	
 <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="panel-title">
            登录后台管理
        </h3>
     </div>
     <div class="panel-body">
       <form class="form" role="form" onsubmit="return login();">
        <input id="name" type="text" name="name" required="required" placeholder="用户名">  
        <input id="pwd" type="password" name="password" required="required" placeholder="密码">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
           <input type="text" name="verify" id="verify" placeholder="请输入验证码" required="required">
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
           <img src="<?php echo U('Admin/Index/verifyShow',array());?>" width="100px" height="40px" title="点击刷新" id="verifyImg">
          </div>
        </div>
        <input type="submit" value="登录">
       </form>
     </div>
 </div>
</div>
      <script src="/myblog/Public/bootstrap/ot/jQuery.min.js"></script>
      <script src="/myblog/Public/bootstrap/ot/bootstrap.min.js"></script>
</body>
</html>