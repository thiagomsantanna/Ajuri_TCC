<?php
    session_start();

    require "conexao.php";

    /*sql para pegar os estados e cidades */
    $sqlUF="SELECT id,uf FROM estados ORDER BY id,uf ASC";
    $resultUF = mysqli_query($conn,$sqlUF);
    $dadosUF = mysqli_fetch_array($resultUF);

    $sqlCidade="SELECT id,nome_cidades FROM cidades ORDER BY nome_cidades ASC";
    $resultCidade = mysqli_query($conn,$sqlCidade);
    $dadosCidade = mysqli_fetch_array($resultCidade);

    $sqlArea="SELECT id_area, area_direito FROM tb_areas_direito ";
    $resultArea = mysqli_query($conn,$sqlArea);
    $dadosArea = mysqli_fetch_array($resultArea);

    /*variavel de local das fotos de perfil*/
    $pastaArquivos='fotodeperfil/';
    $img=$_SESSION['FOTODEPERFIL'];
    $id = $_SESSION['ID'];


    /*calculo de idade*/
    $age = floor((time() - strtotime($_SESSION['IDADE'])) / 31556926);

    if($_SESSION['TIPO'] == "advogados"){
      $area_direito = $_SESSION['area_direito'];
      
        $sql="SELECT * FROM tbadvogados where id ='$id' ";

        $result = mysqli_query($conn, $sql);

        $dados = mysqli_fetch_array($result);

    }else{
        
        $sql="SELECT * FROM tbusuario where id ='$id' ";

        $result = mysqli_query($conn, $sql);

        $dados = mysqli_fetch_array($result);


    }
  ?>
  
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="icon" type="image/png" href="images/logo3.png">
  <title>
    Seu Perfil - Ajuri 
  </title>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bigSlide.js"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="css/nucleo-icons.css" rel="stylesheet" />
  <link href="css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
   <link href="css/all.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="css/argon-design-system.css?v=1.2.0" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css" />
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>



	<style>
/* General */
@import "https://fonts.googleapis.com/css?family=Comfortaa:400,700";


/* Navbar */
.better-nav {
  word-wrap: break-word;
  background:  whitesmoke;
  height: 100px;
  margin-bottom: 30px;
} /* Set the height of the navbar */
.better-nav a {
  color: #000;
  opacity: 0.6;
}
.better-nav a:hover,
.better-nav a:focus {
  opacity: 1;
}
.better-nav .container {
  height: 100%;
}
.container .better-nav .container {
  max-width: 100%;
}
/* Fixed */
.better-nav.fixed-top {
  position:absolute;
  top: 0;
  left: 0;
  right: 0;
  z-index: 90;
}
.better-nav.fixed-bottom {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 90;
}
/* Head */
.better-nav .head {
  float: left;
  height: 100%;
}
.better-nav .head .brand {
  display: block;
  opacity: 1;
  padding: 15px 0;
  height: 100%;
  text-decoration: none;
}
.better-nav .head .brand .logo {
  float: left;
  margin-right: 15px;
  height: 100%;
}
.better-nav .head .brand .logo .image {
  height: 100%;
  width: auto;
  width: auto;
}
.better-nav .head .brand .title {
  float: left;
  display: table;
  height: 100%;
}
.better-nav .head .brand .title h3 {
  opacity: 0.7;
  display: table-cell;
  vertical-align: middle;
  font-size: 24px;
  font-weight: bold;
  font-family: "Comfortaa", cursive;
}
.better-nav .head .brand .title h3:hover,
.better-nav .head .brand .title h3:focus {
  opacity: 1;
}
/* Body */
.better-nav .body {
  float: right;
  height: 100%;
}
.better-nav .body li:hover,
.better-nav .body li:focus {
  background: #b2c8e6;
}
.better-nav .body li:hover > a,
.better-nav .body li:focus > a {
  opacity: 1;
}
.better-nav .body ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
}
.better-nav .body ul li.active {
  background: #b2c8e6;
}
.better-nav .body > ul > li {
  display: table;
  float: left;
  height: 100%;
}
.better-nav .body > ul > li > a {
  display: table-cell;
  vertical-align: middle;
  text-decoration: none;
  padding: 0 15px;
}
/* Dropdown */
.better-nav .body ul li.dropdown {
  position: relative;
}

/*.better-nav .body ul li.dropdown > a::after {
  content: "\f0d7";
  font: normal normal normal 14px/1 FontAwesome;
  margin-left: 5px;
  text-decoration: none;
  opacity: 0.2;
}*/
.better-nav .body ul li.dropdown:hover a:after {
  opacity: 1;
}
.better-nav .body ul li.dropdown:hover > ul {
  transform: scale(1);
  max-height: 500px;
}
.better-nav .body ul li.dropdown ul {
  min-width: 160px;
  max-width: 240px;
  transform: scale(0);
  transition: all 300ms ease;
  background: #fff;
  max-height: 0;
  position: absolute;
  top: 100%;
  right: 0;
  z-index: 10;
  height: initial;
}
.better-nav .body ul li.dropdown ul li {
  height: initial;
}
.better-nav .body ul li.dropdown ul li a {
  display: block;
  padding: 15px;
  text-decoration: none;
}
.better-nav .body ul li.dropdown ul .dropdown ul {
  right: 100%;
  top: 0;
}
/* Fixed Bottom */
.better-nav.fixed-bottom .body ul li.dropdown ul {
  bottom: 100%;
  top: initial;
}
.better-nav.fixed-bottom .body ul li.dropdown ul .dropdown ul {
  bottom: 0;
  top: initial;
}
/* Search */
.better-nav .body .more a::after {
  display: none;
}
.better-nav .body .search {
  padding: 15px;
}
.better-nav .body .search form {
  position: relative;
  min-width: 160px;
  width: 100%;
}
.better-nav .body .search form input {
  width: 100%;
  height: 40px;
  padding: 10px 50px 10px 10px;
}
.better-nav .body .search form button {
  width: 40px;
  height: 40px;
  padding: 0;
  position: absolute;
  right: 0;
  top: 0;
}
/* Toggle */
.better-nav .toggle {
  display: none;
  float: right;
  height: 100%;
}
.better-nav .toggle a {
  display: table;
  height: 100%;
  text-decoration: none;
}
.better-nav .toggle a i {
  display: table-cell;
  vertical-align: middle;
  padding: 0 15px;
  font-size: 24px;
}

/* Navbar Slide */
#navbar-slide {
  position: fixed;
  top: 0;
  bottom: 0;
  left: -80%;
  width: 80%;
  z-index: 94;
  background: #fff;
  overflow: auto;
  padding: 0;
  margin: 0;
}

/* Navbar Pills */
.container .better-nav-pills .container {
  max-width: 100%;
}
.better-nav-pills {
  padding: 0 15px;
  background: #fff;
  margin-bottom: 30px;
}
.better-nav-pills a {
  color: #000;
  opacity: 0.6;
}
.better-nav-pills a:hover,
.better-nav-pills a:focus {
  opacity: 1;
}
.better-nav-pills .head {
  height: 100%;
}
.better-nav-pills .head .brand {
  display: block;
  opacity: 1;
  padding: 15px 0;
  height: 100%;
  text-decoration: none;
}
.better-nav-pills .head .brand .logo {
  margin: 30px;
  text-align: center;
  height: 100%;
}
.better-nav-pills .head .brand .logo .image {
  height: 100%;
  width: auto;
  width: auto;
}
.better-nav-pills .head .brand .title {
  margin: 30px 0;
  display: table;
  text-align: center;
  width: 100%;
  height: 100%;
}
.better-nav-pills .head .brand .title h3 {
  opacity: 0.7;
  display: table-cell;
  vertical-align: middle;
  font-size: 24px;
  font-weight: bold;
  font-family: "Comfortaa", cursive;
}
.better-nav-pills .head .brand .title h3:hover,
.better-nav-pills .head .brand .title h3:focus {
  opacity: 1;
}
.better-nav-pills .body {
  margin: 0 0 30px;
}
.better-nav-pills .body a {
  opacity: 0.6;
  background-color: #e3e3e3;
}
.better-nav-pills .body a:hover,
.better-nav-pills .body a:focus {
  opacity: 1;
}
.better-nav-pills .body ul {
  transition: all 300ms ease;
  list-style: none;
  margin: 0;
  padding: 0;
}
.better-nav-pills .body ul li {
  margin: 1px 0 1px;
}
.better-nav-pills .body ul li a {
  position: relative;
  display: block;
  padding: 15px;
  text-decoration: none;
}
.better-nav-pills .body ul li.active > a::before {
  content: "\f0da";
  font: normal normal normal 14px/1 FontAwesome;
  position: absolute;
  left: 5px;
  top: 50%;
  margin-top: -7px;
  opacity: 0.5;
}
/* Dropdowns */
.better-nav-pills .body ul li.dropdown ul {
  max-height: 0;
  overflow: hidden;
  margin: 0 0 0 30px;
}
.better-nav-pills .body ul li.dropdown.opened > ul {
  max-height: 1000px;
  margin: 0 0 -1px 30px;
}
.better-nav-pills .body ul li.dropdown ul li a {
  position: relative;
}
.better-nav-pills .body ul li.dropdown > a {
  margin-right: 51px;
}
.better-nav-pills .body ul li.dropdown > .selector {
  position: absolute;
  cursor: pointer;
  z-index: 30;
  top: 0;
  right: 0;
  width: 50px;
  height: 78px;
  background: rgba(0, 0, 0, 0.1);
  text-align: center;
  opacity: 0.6;
}
.better-nav-pills .body ul li.dropdown > .selector:hover {
  opacity: 1;
}
.better-nav-pills .body ul li.dropdown > .selector::before {
  transition: all 300ms ease;
  content: "\23F7";
  font: normal normal normal 24px/1 FontAwesome;
  margin-top: 30px;
  display: block;
  opacity: 0.5;
}
.better-nav-pills .body ul li.dropdown.opened > .selector::before {
  content: "\23F6";
  font: normal normal normal 24px/1 FontAwesome;
}
/* Search */
.better-nav-pills .body .search {
  padding: 15px;
}
.better-nav-pills .body .search form {
  position: relative;
  min-width: 160px;
  width: 100%;
}
.better-nav-pills .body .search form input {
  width: 100%;
  height: 40px;
  padding: 10px 50px 10px 10px;
}
.better-nav-pills .body .search form button {
  width: 40px;
  height: 40px;
  padding: 0;
  position: absolute;
  right: 0;
  top: 0;
}

/* Underlay */
.better-nav-mobile-underlay {
  transition: all 300ms ease;
  position: absolute;
  left: 100%;
  right: 0;
  top: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.8);
  z-index: 92;
}
.better-nav-mobile-underlay.active {
  left: 0;
}

/* Media Queries */
@media (min-width: 768px) {
}
@media (min-width: 992px) {
}
@media (min-width: 1200px) {
}
@media (max-width: 1199px) {
}
@media (max-width: 991px) {
}
@media (max-width: 767px) {
  .better-nav .body {
    display: none;
  }
  .better-nav .toggle {
    display: block;
  }
}

/* Dummy Content */
dummy {
  display: block;
  margin: 30px 0 0;
}
dummy article {
  display: block;
  text-align: center;
  margin-bottom: 30px;
}
dummy article content {
  text-align: center;
  background: rgba(0, 0, 0, 0.1);
  display: block;
  padding: 50px;
}
dummy article content::before {
  content: "\f03e";
  font: normal normal normal 50px/1 FontAwesome;
  opacity: 0.2;
}
dummy article:first-of-type content::before {
  display: none;
}
dummy article content h3 {
  font-size: 24px;
  font-weight: bold;
  opacity: 0.2;
  font-family: "Comfortaa", cursive;
}
dummy article content ul {
  list-style: none;
  padding: 0;
  margin: 0;
  font-weight: bold;
  opacity: 0.5;
  font-family: "Comfortaa", cursive;
}
dummy article content ul li {
  background: rgba(255, 255, 255, 1);
  margin: 15px 0;
  padding: 10px;
  border-radius: 10px;
}

dummy {
  max-width: 970px;
}

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
</style>

<script type="text/javascript">

function perfilConfirm(){
  swal({
  icon: "success",
  title: "Alterações feitas com sucesso!",
  text: "Faça login novamente para aplicar as alterações!",
  button: false,
});
}
</script>

<script type="text/javascript">
function perfilError(){
  swal({
  icon: "error",
  title: "Não foi possivel realizar as alterações!",
  text: "Tente novamente!",
  button: false,
});
}
</script>



</head>

<body class="profile-page">

  <!-- Navbar -->
  <nav id="navbar" class="push better-nav fixed-top" style="box-shadow: 0 3px 15px 0 #b2c8e6; background-color: #fff;">
    <div class="container">
      <div class="head">
        <a href="menu.php" class="brand">
          <div class="logo">
            <img class="image" src="images/logo.png" data2x="images/logo.png" alt="Ajuri" />
          </div>
          <div class="title">
            <!-- caso precise digitar algo do logo-->
          </div>
        </a>
      </div>
      <div class="body">
        <ul>
          <li class="home"><a href="menu.php"><i class="fas fa-house-user"></i>&nbsp;<strong>Home</strong></a></li>
          <li class="blog active dropdown"><a href="#"><?php echo "Olá @<strong>".$_SESSION['USERNAME']."</strong>!<br> sua <strong>Conta</strong>";?>&nbsp;&nbsp;<i class="fas fa-caret-down"></i></a>
            <span class="selector"></span>
            <ul>
              <li><a href="perfil.php"><i class="fas fa-user-circle"></i>&nbsp;<strong>Perfil</strong></a></li>
              <li><a href="config.php"><i class="fas fa-user-cog"></i>&nbsp;<strong>Configurações</strong></a></li>
              <li><a href="exit.php"><i class="fas fa-door-open"></i>&nbsp;<strong>Sair</strong></a></li> 
            </ul>
          </li>
          
        </ul>
      </div>
      <div class="toggle">
        <a href="#navbar-slide">
          <i class="fas fa-bars" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </nav>
  <div id="underlay" class="better-nav-mobile-underlay"></div>
  <nav id="navbar-slide" class="better-nav-pills"></nav>

  
  <!-- Fim da Navbar -->
  <div class="wrapper">
    <section class="section-profile-cover section-shaped my-0">
      <!-- Imagem do fundo -->
      <img class="bg-image" src="images/lawyer.jpg" style="width: 100%;">
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    
    <section class="section bg-secondary">
      <div class="container">
        <div class="card card-profile shadow mt--300" style="background-color: #FBFCFC ">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">

<form name="frmEditaPerfil" action="" method="POST" enctype="multipart/form-data">
                <div class="card-profile-image">
                  
            <!--Foto de perfil-->
                    <?php echo "<img src = '$pastaArquivos/$_SESSION[FOTODEPERFIL]' class='rounded-circle'>"?>

                  <br><br><br><br><br><br>
                    <div class="custom-file">
                      
          <input type="file"  id="imagem" name="imagem" class="custom-file-input">
          <label class="custom-file-label" for="imagem"><i class="far fa-image"></i></label>  
                    </div>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <!--<a href="perfilEditar.php" class="btn btn-sm btn-info mr-4" style="background-color:#336ebe; border-color: #336ebe;"><i class="fas fa-user-edit"></i>&nbsp;Editar perfil</a>-->

                  <!--<a href="#" class="btn btn-sm btn-default float-right" ><i class="fas fa-envelope"></i>&nbsp;Mensagem</a>-->
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center"> 
              <div>
              <br>
              <br>
                <div class="h5 font-weight-300">
                  <i class="fas fa-phone-alt"></i>&nbsp;-
                  <input type="text" value="<?php echo $_SESSION['TELEFONE']?>" id="tel" name="tel" class="form-control">
                </div>
              </div>
                  
              </div>
              </div>
            </div>
            <div class="text-center mt-5">              
				<!--Nome e idade-->
              <h3><?php echo "<strong>".$_SESSION['NOME']."</strong>";?><span class="font-weight-light">,<?php echo "&nbsp;<strong>".$age."</strong>";?></span></h3>
				<!--username-->
      <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i><i class="fas fa-user"></i>&nbsp;-&nbsp;<?php echo "@<strong>".$_SESSION['USERNAME']."</strong>";?></div> 
      <!-- telefone -->
      
        <!--Cidade e Estado-->
        <div class="form-group">
          <center>
              <div class="col-md-6">
              <label for="area_direito" style="float:left !important"><i class="fas fa-map-marker-alt"></i>&nbsp;-&nbsp;Estado:</label>
              <select name="estado" id="estado" class="form-control" required>
                <option value="" selected>UF:</option>
                  <?php
                    while( $dadosUF=mysqli_fetch_array($resultUF)){
                    $id=$dadosUF["id"];
                    $uf=$dadosUF["uf"];
                  ?>
                <option value="<?php echo $id?>"><?php echo $uf?></option>
                <?php } ?>       
              </select>
              </div>
                    </center>
                    </div>
              
              <div class="form-group">
                    <center>
              <div class="col-md-6">
                <label for="area_direito" style="float:left !important"><i class="fas fa-map-marked-alt"></i>&nbsp;-&nbsp;Municipio:</label>
              <select name="cidade" id="cidade" class="form-control" required>
                <option value="" selected>Município:</option>
                  <?php
                    while( $dadosCidade=mysqli_fetch_array($resultCidade)){
                    $idC=$dadosCidade["id"];
                    $nomeC=$dadosCidade["nome_cidades"];
                  ?>
                <option value="<?php echo $idC?>"><?php echo $nomeC?></option>                 
                <?php } ?>       
              </select>
              </div>
                    </center>
                    </div>
                   
            <?php 

                if($_SESSION['TIPO'] == "advogado"){
            ?>
                    <div class="form-group">
                    <center>
                    <div class="col-md-6">
                    <label for="area" style="float:left !important"><i class="fas fa-user-graduate"></i>&nbsp;-&nbsp;Área de Direito:</label>
                    <select name="area" id="area" class="form-control" required>
                      <option value="" selected>Área de Direito:</option>
                        <?php
                        while( $dadosArea=mysqli_fetch_array($resultArea)){
                        $idA=$dadosArea["id_area"];
                        $nomeA=$dadosArea["area_direito"];
                        ?>
                      <option value="<?php echo $idA?>"><?php echo $nomeA?></option>          
                    <?php } ?>       
                  </select>
                    </div></div></center>
                    
                    <div class="form-group"> 
                    <center>
                    <div class="col-md-6">

                    <i class="ni education_hat mr-2"></i>
                    <label for="descricao" style="float:left !important">Lugar de Formação:</label>

                    <input type="text" class="form-control form-control-alternative" id="formacao" name="formacao" value="<?php echo $_SESSION['LUGAR_FORMACAO'] ?>">
                    </div></div></center>
                    
            <?php        
                }else{
            ?>
                    <div class='h6 mt-4'></div>
                    
                    <div></div>
            <?php
                }
            ?>
            </div>
            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <!--Descrição do perfil -->
                <label for="descricao">Apresentação:</label>
                <br>
                <div class="col-lg-9"> 
                <p><textarea class="form-control form-control-alternative" id="descricao" name="descricao" rows="4" placeholder="<?php echo $_SESSION['DESCRICAO']?>" required></textarea> 
                </p>

                </div>

                <br>
                <button type="submit" class="btnDiv" name="alterar" value="alterar" style="width: 60%;">Aplicar Modificações</button>
                
</form>

<?php

require "perfilEditaAA.php";
?>	            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="container">

        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2020 <a href="" target="_self">Ajuri</a>.
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="menu.php" class="nav-link" target="_self">Página inicial</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->

  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="assets/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->

	
	
<script>
/*
* BetterNav - Bootstrap Navbar + bigSlide (for mobile)
* ATTENTION: CSS does not use browser prefixes, modify if you decide to use in production!
*/
$(document).ready(function () {
/* Navbar specifics */
$(".better-nav").each(function () {
  /* Set max width of fixed navbar equal to parent element (ignore this it's project specific) */
  $parentMaxWidth = $("dummy").css("max-width");
  $(".container", this).css("max-width", $parentMaxWidth);
  /* Add body padding if navbar is fixed on top or bottom */
  if ($(".better-nav").hasClass("fixed-top")) {
    var $navHeight = $(this).height();
    $("body").css("padding-top", $navHeight + "px");
  } else if ($(".better-nav").hasClass("fixed-bottom")) {
    var $navHeight = $(this).height();
    $("body").css("padding-bottom", $navHeight + "px");
  }
});
/* Clone main navbar for mobile */
$(".better-nav .toggle").on("click touchstart", function () {
  $("#navbar-slide").empty();
  $(this).siblings(".body").clone().appendTo("#navbar-slide");
  betterNavPillsInit("#navbar-slide li.dropdown .selector");
});
/* Navbar pills dropdown trigger */
function betterNavPillsInit($action) {
  $($action).on("click tap", function () {
    if ($(this).parent("li.dropdown").hasClass("opened")) {
      $(this).parent("li.dropdown").removeClass("opened");
    } else {
      $(this).parent("li.dropdown").addClass("opened");
    }
  });
}
betterNavPillsInit("li.dropdown .selector");
/* Initialize bigSlide */
$(".better-nav .toggle").bigSlide({
  menu: "#navbar-slide",
  push: "body",
  side: "left",
  menuWidth: "60%",
  speed: 300,
  easyClose: true,
  afterOpen: function () {
    $("body").css("overflow", "hidden");
    $("#underlay").addClass("active");
  },
  afterClose: function () {
    setTimeout(function () {
      $("body").css("overflow", "visible");
    }, 300);
    $("#underlay").removeClass("active");
  }
});
/* Dummy Content */
var $dummyCount = 0;
while ($dummyCount < 5) {
  $("<article><content><h3>DUMMY ARTICLE</h3></content></article>").appendTo(
    "dummy"
  );
  $dummyCount++;
}
});

</script>
</body>

</html>