<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/css/materialize.min.css');?>" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('resources/css/pace.css');?>" media="screen,projection" />
    <title>Document</title>
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
    background: url(img/logo-sabores.svg) 50% no-repeat;
    background-size: 100% auto;
    width: 100px;
    height: 50px;
}
.lighten-1 {
    background-color: #FFF !important;
    color: #CCC;
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
</style>
<body>
  <!-- Dropdown Structure -->

  <nav class="lighten-1">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" onclick="sincroniza()">Sincronizar</a></li>
        <li><a href="badges.html">Sair</a></li>
           <li><a href="#" onclick="toggleFullScreen()">Full</a></li>
      </ul>
    </div>
  </nav>
<!--  -->
  <ul class="sidenav" id="mobile-demo">
    <li><a href="#" onclick="sincroniza()"><i class="material-icons">cached</i>Sincronizar</a></li>
    <li><a href="badges.html"><i class="material-icons">exit_to_app</i>Sair</a></li>
      <li><a href="#" onclick="toggleFullScreen()"><i class="material-icons">exit_to_app</i>Ful</a></li>
  </ul>

    <div class="container">
        <?php $this->load->view($view);?>
    </div>
        <?php $this->load->view('includes/footer');?>
        <script type="text/javascript" src="<?php echo base_url('resources/js/fotos/scripts.js');?>"></script>

</body>
</html>
