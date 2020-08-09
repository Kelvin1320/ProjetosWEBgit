<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Recuperar Senha</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

</head>
  <style type="text/css">
    <body>


 .map-container-section {
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
  border: 1px solid black;
  }
 .map-container-section iframe {
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
  }

  .mt-3{
    color: white;
  }

   .nav-item{
    padding-left: 50px;
  }

  .container {
  width: 50%;
  margin: 0 auto;
}

.form-contact {
  width: 100%;
  font-family: "Arial", Times, serif;
}

.form-contact-input {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 40px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
}

.form-contact-textarea {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 100px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
  padding-top: 16px;
  padding-left: 0;
  padding-right: 0;
  font-family: "Arial", Times, serif;
}

.form-contact-button {
  width: 100%;
  font-size: 18px;
  border-radius: 4px;
  color: #fff;
  height: 40px;
  opacity: .8;
  margin-bottom: 20px;
  cursor: pointer;
  background: #B22222;
  display: block;
  border: none;
  border-bottom: 1px solid #500707;
  border-right: 1px solid #500707;
  transition: 1s;
}

.form-contact-button:hover {
  opacity: 1;
}

  </style>

</head>
<body>

 
      
  <h4 class="card-title h3 my-1"><strong><i class="fas fa-envelope pr-2"></i>Confirmar Codigo</strong></h4>
     <input type="number" class="form-contact-input" name="codigo" required />  
  </textarea>  



     <button type="submit" class="btn btn-primary">Verificar Codigo</button>  
<?php
session_start();
unset($_SESSION['codigo']);
?>

 
</div>
      </div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>

</body>
</html>