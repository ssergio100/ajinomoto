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
    background: url(http://localhost/ajinomoto/resources/img/logo-sabores.svg) 50% no-repeat;
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

@media (min-width : 1000px) {
    .brand-logo {
        margin-left: 20px;
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

.btn-floating.halfway-fab.left {
    right: auto;
    left: 180px;
}
</style>
<body>
  <!-- Dropdown Structure -->
  <div class="navbar-fixed">
  <nav class="lighten-1">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" onclick="sincroniza()">Sincronizar</a></li>
        <li><a href="painel" class="show-on-large">Painel</a></li>
        <li><a href="./" class="show-on-large">Fotos</a></li>
        <li><a href="badges.html">Sair</a></li>
      </ul>
    </div>
  </nav>
</div>
<!--  -->
  <ul class="sidenav" id="mobile-demo">
    <li><a href="#" onclick="sincroniza()"><i class="material-icons">cached</i>Sincronizar</a></li>
    <li><a href="painel" class="show-on-large"><i class="material-icons">art_track</i>Painel</a></li>
    <li><a href="./" class="show-on-large"><i class="material-icons">add_a_photo</i>Fotos</a></li>
    <li><a href="badges.html" class="show-on-large"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>

    <div class="container">
        <?php $this->load->view($page);?>
    </div>
        <?php $this->load->view('includes/footer');?>
     
</body>
</html>
