
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		<link href="<?php echo site_url('resources/css/materialize.min.css')?>" rel="stylesheet" id="bootstrap-css">

  </head>
  
  <body>
<style>
.brand-logo {
    content: "";
    background: url(<?php echo base_url('resources/img/logo-sabores.svg');?>) 50% no-repeat;
		background-position: center; 
		height: 50px;
		margin:20px 0 20px 0;
}
</style>

	<div class="container">
    <div class="row">
        <div class="col m6 s12 offset-m3">
				   <div  class="brand-logo col m12 s12"></div>
            <div class="row">
                <form class="col s12" action="sincronia">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="text" class="validate" autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pass" type="password" class="validate" autocomplete="off">
                            <label for="pass">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember me</label>
                            </p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col m12">
                            <p class="center-align">
                                <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Login</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo site_url('resources/js/materialize.min.js')?>"></script>
<script src="<?php echo site_url('resources/js/jquery.min.js')?>"></script>
</body>
</html>