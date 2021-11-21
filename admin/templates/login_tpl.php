<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <base href="<?=  _SCHEME_.'://'._SITEURL_.'/admin/' ?>">
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <link rel="icon" href="favicon.ico" type="image/x-icon">
   <title>ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ WEBSITE - CIP MEDIA ,.JSC</title>
   <meta name="robots" content="noindex,nofollow" />
   <meta name="google" content="notranslate" />
   <meta name='revisit-after' content='1 days' />
   <meta name="ICBM" content=" ">
   <!-- DNS Prefetch -->
   <meta http-equiv="x-dns-prefetch-control" content="on">
   <link rel="dns-prefetch" href="//www.google-analytics.com" />
   <link rel="dns-prefetch" href="//www.facebook.com" />
   <link rel="dns-prefetch" href="//fonts.googleapis.com" />
   <link rel="dns-prefetch" href="//sp.zalo.me" />
   <link rel="dns-prefetch" href="//google.com" />
   <!-- DNS Prefetch -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <!-- CDN -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&amp;subset=vietnamese" rel="stylesheet">
   <!-- CSS -->
   <link rel="stylesheet" href="plugins/fontawesome5/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="plugins/wow/animate.css" type="text/css" media="screen"/>
   <style>
    body,html{font-size:14px}body#loginsite{position:relative;max-width:100%;width:100%;overflow:hidden}body#loginsite canvas{width:100%;height:100%}body#loginsite header#header{position:absolute;top:0;left:0;width:100%;height:auto;background:#000}body#loginsite header#header .contents a{padding:.5em 1em;display:inline-block;background:#f15829;color:#fff;border-left:1px solid rgba(255,255,255,.25);border-right:1px solid rgba(255,255,255,.25);transition:all .5s}body#loginsite header#header .contents a:hover{text-decoration:none;border-color:#fff}body#loginsite footer#footer{position:absolute;bottom:0;left:0;width:100%;height:auto;background:#000;padding:.75em 0;color:#fff}section#section .blocklogin{position:absolute;top:50%;left:50%;-webkit-transform:translateX(-50%) translateY(-50%);transform:translateX(-50%) translateY(-50%);min-width:60%;align-items:center}section#section .blocklogin .blocklbl{font-family:Montserrat;text-align:center}section#section .blocklogin .blocklbl .titles{white-space:nowrap;text-align:center;display:inline-block}section#section .blocklogin .blocklbl .titles h2{font-weight:200;font-size:1.5em;padding:0;margin:0;line-height:1;color:#fff;margin-top:.5em}section#section .blocklogin .blocklbl .titles h1{position:relative;color:#fff;font-weight:100;padding:0;margin:0;line-height:1;text-shadow:0 0 10px #f15829,0 0 20px #f15829,0 0 30px #f15829,0 0 40px #f15829,0 0 70px #f15829,0 0 80px #f15829,0 0 100px #f15829,0 0 150px #f15829;font-size:2.5em;margin-top:.75em;font-weight:700}section#section .blocklogin #eyespassword{position:absolute;top:50%;right:15px;font-size:1.25em;-webkit-transform:translateY(-50%);transform:translateY(-50%);color:#ccc;transition:all .3s;cursor:pointer}section#section .blocklogin #eyespassword:hover{color:#21112a}.form-signin{width:100%}.form-signin .btn{font-size:80%;border-radius:5rem;letter-spacing:.1rem;font-weight:700;padding:1rem;transition:all .2s}.form-label-group{position:relative;margin-bottom:1rem}.form-label-group input{height:auto;border-radius:2rem}.form-label-group>input,.form-label-group>label{padding:var(--input-padding-y) var(--input-padding-x)}.form-label-group>label{position:absolute;top:0;left:0;display:block;width:100%;margin-bottom:0;line-height:1.5;color:#495057;border:1px solid transparent;border-radius:.25rem;transition:all .1s ease-in-out}.form-label-group input::-webkit-input-placeholder{color:transparent}.form-label-group input:-ms-input-placeholder{color:transparent}.form-label-group input::-ms-input-placeholder{color:transparent}.form-label-group input::placeholder{color:transparent}.form-label-group input:not(:placeholder-shown){padding-top:calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));padding-bottom:calc(var(--input-padding-y)/ 3)}.form-label-group input:not(:placeholder-shown)~label{padding-top:calc(var(--input-padding-y)/ 3);padding-bottom:calc(var(--input-padding-y)/ 3);font-size:12px;color:#777}.btn-google{color:#fff;background-color:#ea4335}.btn-facebook{color:#fff;background-color:#3b5998}#loginsite .blockform .contentblock{visibility:hidden}#loginsite .blockform .contentblock{padding:2em;background:#b72200;border-radius:10px;box-shadow:2px 2px 10px #771700;text-align:center}#loginsite .blockform .contentblock h2{color:#fff;font-size:1.5em;margin-bottom:1em}#loginsite .blockform .contentblock .form-signin input{padding:.5em 1em;font-size:1.5em;padding-top:.85em;transition:all .25s;text-align:center;outline:0;border:1px solid #fff; font-weight: 500; color: black}#loginsite .blockform .contentblock .form-signin label{font-size:1.25em;height:100%;padding-top:.5em;pointer-events:none}#loginsite .blockform .contentblock .form-signin button{font-size:1em;background:#252327;border:1px solid #252327;transition:all .5s}#loginsite .blockform .contentblock .form-signin button:hover{background:#000}#loginsite .blockform .contentblock .form-signin input:not(:placeholder-shown)~label{padding-top:0;font-size:.95em;transition:all .25s}#loginsite .blockform .contentblock .form-signin input:focus~label{padding-top:0;font-size:.95em;transition:all .25s}#loginsite .blockform .contentblock .notification{margin-top:1em;text-align:left;min-height:1em;color:#fff;text-align:center}#loginsite .blockform .contentblock .notification span.warning{position:relative;padding-left:2em;color:#ffab0c;font-size:1.05em}#loginsite .blockform .contentblock .notification span.error{position:relative;padding-left:2em;color:#f10000;font-size:1.05em}#loginsite .blockform .contentblock .notification span.warning:before{content:'\f071';font-family:'Font Awesome 5';font-weight:900;margin-right:.5em;position:absolute;font-size:1.5em;top:-.25em;left:0}#loginsite .blockform .contentblock .notification span.error:before{content:'\f05e';font-family:'Font Awesome 5';font-weight:900;margin-right:.5em;position:absolute;top:-.25em;left:0;font-size:1.5em}
</style>
</head>
<body id="loginsite" >
    <header id="header" class="clearfix">
        <div class="container pad0">
            <div class="text-right contents">
                <a href="../"><i class="fas fa-globe"></i> Về trang chính</a>
            </div>
        </div>
    </header>
    <section id='section'>
        <div class="blocklogin row clearfix">
            <div class="blocklbl col-lg-6 col-md-6 col-sm-12">
                <div class="titles">
                    <a href="https://cipmedia.vn"><img src="images/logo2.png" alt="logo"></a>
                    <h1>ĐĂNG NHẬP</h1>
                    <h2>HỆ THỐNG QUẢN TRỊ WEBSITE</h2>
                </div>
            </div>
            <div class="blockform col-lg-6 col-md-6 col-sm-12">
                <div class="contentblock wow flipInX clearfix" data-wow-duration="1s" data-wow-delay="0.5s"> 
                    <h2>THÔNG TIN ĐĂNG NHẬP</h2>
                    <form class="form-signin" action="index.php?com=user&act=login" id="validate" class="form" method="post">
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" placeholder="Email address" required autocomplete="off" >
                            <label for="inputEmail">Username</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required autocomplete="off">
                            <label for="inputPassword">Password</label>
                            <span class="eyes" id="eyespassword" data-is="hind"><i class="fas fa-eye-slash"></i></span>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="logMeIn">ĐĂNG NHẬP</button>
                    </form>
                    <div class="notification clearfix" id='loginError'>
                    </div>
                </div>
            </div>
        </div>  
    </section>
    <footer id="footer" class="clearfix">
        <div class="container pad0">
            <div class="text-center contents">
                Copyright @ <?=  date('Y',time()) ?>. <a href="https://cipmedia.vn" target="_blank">CIP Media ,.JSC</a>
            </div>
        </div>
    </footer>
</body>
<script type="text/javascript" src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="plugins/jquery/jquery.migrate.js"></script>
<script src="plugins/fontawesome5/js/all.min.js"></script>
<script src="plugins/bootstrap/popper/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/wow/wow.min.js"></script>
<script>
    let particles=[],microparticles=[];const c1=createCanvas({width:$(window).width(),height:$(window).height()}),tela=c1.canvas,canvas=c1.context;$("body").append(c1.canvas);class Particle{constructor(t){this.random=Math.random(),this.random1=Math.random(),this.random2=Math.random(),this.progress=0,this.canvas=t,this.life=1e3+3e3*Math.random(),this.x=$(window).width()/2+(20*Math.random()-20*Math.random()),this.y=$(window).height(),this.s=2+Math.random(),this.w=$(window).width(),this.h=$(window).height(),this.direction=this.random>.5?-1:1,this.radius=1+3*this.random,this.color="#fff",this.ID=setInterval(function(){microparticles.push(new microParticle(c1.context,{x:this.x,y:this.y}))}.bind(this),20*this.random),setTimeout(function(){clearInterval(this.ID)}.bind(this),this.life)}render(){this.canvas.beginPath(),this.canvas.arc(this.x,this.y,this.radius,0,2*Math.PI),this.canvas.shadowOffsetX=0,this.canvas.shadowOffsetY=0,this.canvas.shadowColor="#000000",this.canvas.fillStyle=this.color,this.canvas.fill(),this.canvas.closePath()}move(){return this.x-=this.direction*Math.sin(this.progress/(430*this.random1))*this.s,this.y-=Math.cos(this.progress/this.h)*this.s,this.x<0||this.x>this.w-this.radius?(clearInterval(this.ID),!1):this.y<0?(clearInterval(this.ID),!1):(this.render(),this.progress++,!0)}}class microParticle{constructor(t,i){this.random=Math.random(),this.random1=Math.random(),this.random2=Math.random(),this.progress=0,this.canvas=t,this.x=i.x,this.y=i.y,this.s=2+3*Math.random(),this.w=$(window).width(),this.h=$(window).height(),this.radius=1+.5*this.random}render(){this.canvas.beginPath(),this.canvas.arc(this.x,this.y,this.radius,0,2*Math.PI),this.canvas.lineWidth=2,this.canvas.fillStyle=this.color,this.canvas.fill(),this.canvas.closePath()}move(){return this.x-=Math.sin(this.progress/(100/(this.random1-10*this.random2)))*this.s,this.y+=Math.cos(this.progress/this.h)*this.s,!(this.x<0||this.x>this.w-this.radius)&&(!(this.y>this.h)&&(this.render(),this.progress++,!0))}}var random_life=1e3;function clear(){let t=canvas.createRadialGradient(tela.width/2,tela.height/2,0,tela.width/2,tela.height/2,tela.width);t.addColorStop(0,"rgba(37, 35, 39)"),t.addColorStop(1,"rgba(26,14,4,0)"),canvas.globalAlpha=.16,canvas.fillStyle=t,canvas.fillRect(0,0,tela.width,tela.height)}function blur(t,i,s){}function update(){clear(),particles=particles.filter(function(t){return t.move()}),microparticles=microparticles.filter(function(t){return t.move()}),requestAnimationFrame(update.bind(this))}function createCanvas(t){let i=document.createElement("canvas");i.width=t.width,i.height=t.height;let s=i.getContext("2d");return{canvas:i,context:s}}setInterval(function(){particles.push(new Particle(canvas)),random_life=2e3*Math.random()}.bind(this),random_life),update(),(new WOW).init();
    $(document).ready(function(){$("#loginsite #eyespassword").click(function(a){if("hind"==$(this).attr("data-is")){$(this).attr("data-is","show");$(this).html('<i class="fas fa-eye"></i>'),$("#loginsite #inputPassword").attr("type","text")}else{$(this).attr("data-is","hind");$(this).html('<i class="fas fa-eye-slash"></i>'),$("#loginsite #inputPassword").attr("type","password")}}),$(".forgot-pwd").click(function(){return $("#loginForm").hide(),$("#forgotForm").show(),!1}),$(".back-login").click(function(){return $("#loginForm").show(),$("#forgotForm").hide(),!1});var baseurl="";jQuery("#logMeIn").click(function(){var email=jQuery("#username").val(),pass=jQuery("#inputPassword").val();return!email||!pass||(jQuery.ajax({type:"POST",url:baseurl+"ajax.php?do=admin&act=login",data:{pass:pass,email:email},success:function(data){var myObject=eval("("+data+")");$(".ajaxloader").css("display","none"),myObject.page?window.location=myObject.page:myObject.mess&&(jQuery("#loginError").css("display","block"),jQuery("#loginError").html('<span class="warning">'+myObject.mess+"</span>"))}}),!1)})});
</script>
</html>