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


/* .btn-floating.halfway-fab.left {
    right: auto;
    left: 180px;
} */
</style>
<body>
  <!-- Dropdown Structure -->
  <div class="navbar-fixed">
  <nav class="lighten-1">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" onclick="sincroniza()">Sincronizar</a></li>
        <li><a href="painel" class="">Painel</a></li>
        <li><a href="./" class="">Fotos</a></li>
        <li><a href="badges.html">Sair</a></li>
      </ul>
    </div>
  </nav>
</div>
<!--  -->
  <ul class="sidenav sidenav-fixed" id="mobile-demo">
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
    <li><a href="#" class="sidenav-close" onclick="sincroniza()"><i class="material-icons">cached</i>Sincronizar</a></li>
    <li><a href="painel" class="sidenav-close"><i class="material-icons">art_track</i>Painel</a></li>
    <li><a href="./" class="sidenav-close"><i class="material-icons">add_a_photo</i>Fotos</a></li>
    <li><a href="badges.html" class="sidenav-close"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>

    <div class="container">
        <?php $this->load->view($page);?>
        <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">input1</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">input2</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s12">
        <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
        <label>Materialize Select1</label>
    </div>
    <div class="input-field col s12">
        <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
        <label>Materialize Select2</label>
    </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email_inline" type="email" class="validate">
            <label for="email_inline">Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
          </div>
        </div>
      </div>
    </form>
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>
    </div>
        <?php $this->load->view('includes/footer');?>
        <script type="text/javascript" src="<?php echo base_url('resources/js/scripts.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resources/js/jimp.min.js');?>"></script>
</body>
</html>
