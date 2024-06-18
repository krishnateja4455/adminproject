

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $this->Url->webroot("/plugins/fontawesome-free/css/all.min.css")?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $this->Url->webroot("/plugins/icheck-bootstrap/icheck-bootstrap.min.css")?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $this->Url->webroot("/css/adminlte.min.css")?>">
  
<?= $this->Html->css('style.css'); ?>	
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">




<?php echo $this->fetch('content')?>


<!-- jQuery -->
<script src="<?php echo $this->Url->webroot("/plugins/jquery/jquery.min.js")?>"></script>


<!-- Bootstrap 4 -->
<script src="<?php echo $this->Url->webroot("/plugins/bootstrap/js/bootstrap.bundle.min.js")?>></script>
<!-- AdminLTE App -->
<script src="<?php echo $this->Url->webroot("/js/adminlte.min.js")?>></script>

</body>
</html>