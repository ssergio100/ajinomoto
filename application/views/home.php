<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <?php $this->load->view($view_header);?>
</head>
<style>
/*.card img {
    max-width:100px;
    max-height:250px;
    width: auto;
    height: auto;
}*/
.brand-logo {
    content: "";
    background: url(<?php echo base_url('resources/img/logo-sabores.svg');?>) 50% no-repeat;
    background-size: 100% auto;
    width: 100px;
    height: 50px;
}
.lighten-1 {
    background-color: #FFF !important;
    color: #CCC;
}

.ico_red {
color:#ff0000 !important;

}

.ico_blue {
color:#26a69a !important;
}
.brand-logo {
        margin-top: 5px;
    }
@media (min-width : 1000px) {
    .brand-logo {
        margin-left: 20px;
        margin-top: 8px;
    }
}

nav ul li a{
  color: #f29021;
} 

 nav .sidenav-trigger i {
    color: #f29021;
}

.sidenav li>a>i.material-icons {
    margin: 0 12px 0 0 !important;
}

.preloader-background {
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #eee;
	position: fixed;
	z-index: 999;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
  p {
    padding-top:120px;
    margin-left: -60px;
    opacity: 0.8;
  } 
}

// ADD BLINKING TEXT CLASS
.blinking {
	animation: blinker 0.5s linear infinite;
}
@keyframes blinker {  
  50% { opacity: 0; }
}
/* .btn-floating.halfway-fab.left {
    right: auto;
    left: 180px;
} */
</style>
<body>
  <!-- Dropdown Structure -->
  <div class="preloader-background">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
            <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
            </div><div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
    </div>
</div>
<div class="navbar-fixed">
    <nav class="lighten-1">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#" onclick="sincronizaFotos()" class="waves-effect waves-block waves-light">Sincronizar</a></li>
                <li><a href="painel"class="waves-effect waves-block waves-light">Painel</a></li>
                <li><a href="home" class="waves-effect waves-block waves-light">Fotos</a></li>
                <li><a href="login" class="waves-effect waves-block waves-light">Sair</a></li>
            </ul>
        </div>
    </nav>
</div>

<!--  -->
<ul class="sidenav" id="mobile-demo">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="<?php echo base_url('resources/img/3.png');?>">
        </div>
        <a href="#user">
          <img class="circle" src="<?php echo base_url('resources/img/yuna.jpg');?>">
        </a>
        <a href="#name">
          <span class="white-text name">John Doe</span>
        </a>
        <a href="#email">
          <span class="white-text email">jdandturk@gmail.com</span>
        </a>
      </div>
    </li>
    <li>
        <a href="#" class="sidenav-close" onclick="sincronizaFotos()"><i class="material-icons">cached</i>Sincronizar</a>
    </li>
    <li>
        <a href="painel" class="sidenav-close"><i class="material-icons">art_track</i>Painel</a>
    </li>
    <li>
        <a href="home" class="sidenav-close"><i class="material-icons">add_a_photo</i>Fotos</a>
    </li>
    <li>
        <a href="login" class="sidenav-close"><i class="material-icons">exit_to_app</i>Sair</a>
    </li>
</ul>

    <div class="container">
        <?php $this->load->view($page);?>
    </div>
        <?php $this->load->view('includes/footer');?>
        <script type="text/javascript" src="<?php echo base_url('resources/js/scripts.js');?>"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                $('.preloader-background').delay(1700).fadeOut('slow');
                
                $('.preloader-wrapper')
                    .delay(1700)
                    .fadeOut();
            });
        </script>
</body>
</html>
