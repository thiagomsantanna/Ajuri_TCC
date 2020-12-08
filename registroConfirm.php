<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

    <!--<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">-->
    <link rel="icon" type="image/png" href="images/logo3.png">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="css/coming-sssoon.css" rel="stylesheet" />    
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css" />
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/all.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>


    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
    
    <title>Ajuri - Login</title>

    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   

<style type="text/css">
      
  /* --------------- BOTAO FOFIN ------------------ */   
  button {
    display: inline-block;
    padding: 12px 24px;
    background: rgb(220,220,220);
    font-weight: bold;
    color: rgb(120,120,120);
    border: none;
    outline: none;
    border-radius: 3px;
    cursor: pointer;
    transition: ease .3s;
  }
  
  button:hover {
      /*--gradient gay--*/
    /*background: rgba(212,228,239,1);/* Old Browsers */
    /*background: -moz-linear-gradient(left, rgba(212,228,239,1) 17%, rgba(212,228,239,1) 24%, rgba(134,174,204,1) 100%); /* FF3.6+ */
    /*background: -webkit-gradient(left top, right top, color-stop(17%, rgba(212,228,239,1)), color-stop(24%, rgba(212,228,239,1)), color-stop(100%, rgba(134,174,204,1)));/* Chrome, Safari4+ */
    /*background: -webkit-linear-gradient(left, rgba(212,228,239,1) 17%, rgba(212,228,239,1) 24%, rgba(134,174,204,1) 100%); /* Chrome10+,Safari5.1+ */
    /*background: -o-linear-gradient(left, rgba(212,228,239,1) 17%, rgba(212,228,239,1) 24%, rgba(134,174,204,1) 100%); /* Opera 11.10+ */
    /*background: -ms-linear-gradient(left, rgba(212,228,239,1) 17%, rgba(212,228,239,1) 24%, rgba(134,174,204,1) 100%); /* IE 10+ */
    /*/background: linear-gradient(to right, rgba(212,228,239,1) 17%, rgba(212,228,239,1) 24%, rgba(134,174,204,1) 100%);/* W3C */
    /*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d4e4ef', endColorstr='#86aecc', GradientType=1 );/* IE6-9 */
    background: #4c80c6;
    color: #ffffff;
  }

  label {
    display: block;
    position: relative;
    margin: 40px 0px;
  }
  .label-txt {
    position: absolute;
    top: -2.4em;
    padding: 10px;
    font-family: sans-serif;
    font-size: .8em;
    letter-spacing: 1px;
    color: rgb(120,120,120);
    transition: ease .3s;
  }
  .input {
    width: 100%;
    padding: 10px;
    background: transparent;
    border: none;
    outline: none;
  }
  
  .line-box {
    position: relative;
    width: 100%;
    height: 2px;
    background: #BCBCBC;
  }
  
  .line {
    position: absolute;
    width: 0%;
    height: 2px;
    top: 0px;
    left: 50%;
    transform: translateX(-50%);
    background: #336ebe;
    transition: ease .6s;
  }
  
  .input:focus + .line-box .line {
    width: 100%;
  }
  
  .label-active {
    top: -3em;
  }

  .btnDiv{
    width: 100%;
    margin-top: -8px;
    margin-bottom: 13px;
    display: inline-block;
    font-size: 14px;
  }

  .linkEsqueci{
        color:blue;
  }

  .logoAjuri{
  margin-top: 10px;
  }

  .logoAjuri2{
  margin-top: -450px;
  margin-right: -380px;
  }

  .quadradinlogin{
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  /*align-content: center;*/
  margin-top: 60px;
  width: 400px;
  height: 500px;
  /* box shadow pedro-webkit-box-shadow: 13px 10px 0px 0px rgba(128,128,128,0.58);
-moz-box-shadow: 13px 10px 0px 0px rgba(128,128,128,0.58);
box-shadow: 13px 10px 0px 0px rgba(128,128,128,0.58);*/
-webkit-box-shadow: 6px 7px 15px 0px rgba(0,0,0,0.36);
-moz-box-shadow: 6px 7px 15px 0px rgba(0,0,0,0.36);
box-shadow: 6px 7px 15px 0px rgba(0,0,0,0.36);
}

  .hr1{
    border: 0.7px solid #3F51B5;
    margin-top: 3px;
    width: 330px;
  }

  hr{
    border: 0.5px solid #3F51B5;
    margin-top: 13px;
    width: 330px;
}

  .h5Margin{
  
  margin-top: 13px;
  margin-bottom: 18px;
}

.form-control {
  margin-bottom: .5rem;
    

  width: 80%;
  height: 38px;
  padding: 0.625rem 0.75rem;
  /*font-family: 'Montserrat Classic';*/
  font-size: 1.9rem;
  font-weight: 400;
  line-height: 1.5;
  color: #8898aa;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #cad1d7;
  border-radius: 0.25rem;
  box-shadow: none;
  transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.botaoUsuarioS{
  background-color: #b2c8e6;
  align-items: center;
}

.botaoUsuarioS:hover{
  background-color: purple;
}
.botaoAdvogadoS{
  background-color: #b2c8e6;

}

.swal-footer {
  text-align:center;
  
}

.linkRegistro:hover{
      color: #336ebe; 
      text-decoration: none;
  }

</style>

<script type="text/javascript"> /*SWAL ALERT*/ 


function xesque(){
swal({
  title:"Deseja se cadastrar como:",
 
  buttons: {
  button: {
    text: "Usuário",
    value: "user",
    visible: true,
    className: "botaoUsuarioS",
    
    
  },
  advogados: {
    text: "Advogado",
    value: "useradvogado",
    visible: true,
    className: "botaoAdvogadoS",
    
  }
},
})
.then((result) => {
  if (result == "useradvogado") {
    location.href = "registroAdvogado.php";
  } else if(result == "user"){
    location.href = "registroUsuario.php";
  }
})
}
</script>

</head>

<body>

<div class="main" style="background-image: url('images/lawyerandroid.jpg')">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->
    
<div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->


<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
        
        <!--<div class="content">
          <h5 class="h5Posicao">Não possui uma conta? Registre-se aqui.</h5>  <button class="btnLogin" type="button" onClick="linkRegistro()">Registrar-se</button>
      <div class="container">-->
        
    <div class="content">


      
        

        <div class="container">

            <h1 class="logo cursive"></h1>
                
<center>
    <div class="quadradinlogin">

          <?php
              if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
              }
              if(isset($_SESSION['msgcad'])){
              echo $_SESSION['msgcad'];
              unset($_SESSION['msgcad']);
              }
          ?>

<br>
<br>
  
            <h2>Bem-Vindo ao Ajuri!</h2>
              
              <a href="index.php" class="linkRegistro">
                <h4>Faça Login para acessar.</h4>
              </a>
              <br>
            <hr class="hr">

            <br>
<center>
    <img src="images/logo.png" class="logoAjuri">
</center>




            
      <div class="Container">


      </div>



      </div>
</center>



<!--<div class="quadradinlogin">-->
  <!--<div style="float: right; margin-left:-70px;">--> 
      
  <!--</div>-->
<!--</div>-->
          </div>
    </div>

    <div class="footer">
      <div class="container">
             <a href="">Ajuri</a>&nbsp;-&nbsp;2020<a href=""></a>
      </div>
    </div>
 </div>
 </body>

</html>