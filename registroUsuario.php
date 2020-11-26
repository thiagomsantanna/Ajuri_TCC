<?php

require "conexao.php";

  $sqlUF="SELECT id,uf FROM estados ORDER BY id,uf ASC";
  $resultUF = mysqli_query($conn,$sqlUF);
  $dadosUF = mysqli_fetch_array($resultUF);

  $sqlCidade="SELECT id,nome_cidades FROM cidades ORDER BY nome_cidades ASC";
  $resultCidade = mysqli_query($conn,$sqlCidade);
  $dadosCidade = mysqli_fetch_array($resultCidade);

?>

<!doctype html>
<html lang="en">
<head>
	  <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<script type="text/javascript" src="file/location/pwstrength-bootstrap-1.2.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="images/logo3.png">
    <link href="css/bootstrap.css" rel="stylesheet"/>
	  <link href="css/coming-sssoon.css" rel="stylesheet"/>
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    
    <title>Ajuri - Register</title>
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
  
  .quadradinRegistroNAOVOUMEXERNAPONTOCSS{
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    /*align-content: center;*/
    margin-top: 60px;
    width: 800px;
    height: 600px;
    /* box shadow pedro-webkit-box-shadow: 13px 10px 0px 0px rgba(128,128,128,0.58);
    -moz-box-shadow: 13px 10px 0px 0px rgba(128,128,128,0.58);
    box-shadow: 13px 10px 0px 0px rgba(128,128,128,0.58);*/
    -webkit-box-shadow: 6px 7px 15px 0px rgba(0,0,0,0.36);
    -moz-box-shadow: 6px 7px 15px 0px rgba(0,0,0,0.36);
    box-shadow: 6px 7px 15px 0px rgba(0,0,0,0.36);

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


    .input-group-separator {
        padding: 0;
        width: 0;
        border: none;
}

    .input-group-separator + .form-control {
        border-left: none;
}

/*----------------------------------*/
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

    .gridContainer {
        display: grid;
        grid-template-columns: 0.8fr 1.2fr;
        grid-template-rows: 0.1fr 0.1fr 0.1fr 0.1fr 0.1fr 0.1fr 0.1fr 0.1fr 0.1fr;
        gap: 8px 8px;
        grid-template-areas:
        ". ."
        ". ."
        ". ."
        ". ."
        ". ."
        ". ."
        ". ."
        ". ."
        ". .";
}
    

    .gridItem12 {
        grid-row-start: 1;
        grid-row-end: 1;
        grid-column-start: 1;
    }

    .gridItem1 {
        grid-row-start: 2;
        grid-row-end: 2;
        grid-column-start: 1;
    }

    .gridItem2 {
        grid-row-start: 2;
        grid-row-end: 2;
        grid-column-start: 2;
        grid-column-end: 2;
        margin-left: -100px ;
    }

    .gridItem3 {
        grid-row-start: 3;
        grid-row-end: 3;
        grid-column-start: 1;
        grid-column-end: 1;
    }

    .gridItem4 {
        grid-row-start: 3;
        grid-row-end: 3;
        grid-column-start: 2;
        grid-column-end: 2;
        margin-left: -48px;
    }

    .gridItem5 {
        grid-row-start: 4;
        grid-row-end: 4;
        grid-column-start: 1;
        grid-column-end: 2;
    }
    .gridItem6 {
        grid-row-start: 5;
        grid-row-end: 5;
        grid-column-start: 1;
        grid-column-end: 2;
    }

    .gridItem7 {
        grid-row-start: 6;
        grid-row-end: 6;
        grid-column-start: 1;
        margin-left: 12px;
        margin-top: -20px;
        width: 80px;
    }

    .gridItem8 {
        grid-row-start: 6;
        grid-row-end: 6;
        grid-column-start: 2;
        grid-column-end: 2;
        margin-top: -20px;
        margin-left: -340px;
        margin-right: 24px;
    }

    .gridItem9 {
        grid-row-start: 7;
        grid-row-end: 7;
        grid-column-start: 1;
        grid-column-end: 2;
        margin-top: -20px;
        margin-left: -20px;
    }

    .gridItem10 {
        grid-row-start: 8;
        grid-row-end: 8;
        grid-column-start: 1;
        grid-column-end: 2;
        
    }

    .gridItem11 {
        grid-row-start: 9;
        grid-row-end: 9;
        grid-column-start: 1;
        grid-column-end: 2;
        margin-top: -40px;
        margin-left: 20px;
        margin-right: -5px;
        
    }

    .form-control01 {
        margin-bottom: .5rem;
        margin-top: -20px;
        margin-left: -185px;
        display: flex;
        width: 170px;
        height: 38px;
        padding: 0.625rem 0.75rem;
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

    .form-control01::placeholder {
        color: #cad1d7;
        opacity: 1;
}

    .form-control01:focus {
        border-color: #8898aa;
        outline: 0;
}

    .form-control02 {
        margin-bottom: .5rem;
        margin-top: -20px;
        display: flex;
        width: 205px;
        height: 38px;
        padding: 0.625rem 0.75rem;
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

    .form-control02::placeholder {
        color: #cad1d7;
        opacity: 1;
}

    .form-control02:focus {
        border-color: #8898aa;
        outline: 0;
}

    .form-control03 {
        margin-bottom: .5rem;
        margin-top: -20px;
        margin-left: 20px;
        display: flex;
        width: 375px;
        height: 38px;
        padding: 0.625rem 0.75rem;
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

    .form-control03::placeholder {
        color: #cad1d7;
        opacity: 1;
}

    .form-control03:focus {
        border-color: #8898aa;
        outline: 0;
}

    .form-control04:placeholder {
        color: #999999;
}


    .form-control04 {
        margin-bottom: .5rem;
        margin-top: -20px;
        margin-left: 20px;
        display: flex;
        width: 375px;
        height: 38px;
        padding: 0.625rem 0.75rem;
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

    .form-control04::placeholder {
        color: #cad1d7;
        opacity: 1;
}

    .form-control04:focus {
        border-color: #8898aa;
        outline: 0;
}

    .inputSize{
        margin-left: -210px;
        width: 200px;
}
</style>

   

</head>


<body>

<div class="main" style="background-image: url('images/lawyerandroid.jpg')">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->
    
    <div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

<div class="content">
    <!-- ----------BOTAO NO CANTO DE NOVA CONTA ------------>
    <!--<h5 class="h5Posicao">Não possui uma conta?</h5><button type="submit" class="btnLogin">nova conta</button>-->
    
<div class="container">

      <h1 class="logo cursive">
          
      </h1>
      <center>
    <div class="quadradinRegistroNAOVOUMEXERNAPONTOCSS">

            <div style="height: 450px; width: 330px; float: left;">
                    <img src="images/logo.png" class="logoAjuriRegistro">
            </div>
        
<form style="height: 600px;" name="frmUser" action="registroUser.php" method="POST" enctype="multipart/form-data">
                
    <h3>Crie sua conta Ajuri</h3>

    <div class="gridContainer">

        <div class="gridItem12">
          
            <hr class="hr1Registro" style="margin-left: 40px;">

        </div>

        <div class="gridItem1 form-group">
          
            <input type="text" placeholder="Nome:"  id="nome" name="nome" class="form-control" style="margin-left: -218px; width: 140px;"required>
        </div>

        <div class="gridItem2 form-group">
            
            <input type="text" placeholder="Username:"  id="nomeusuario" name="nomeusuario" class="form-control" style="margin-left:-190px; width: 232px;" required>
        </div>

        <div class="gridItem3 form-group">
            <input type="date" placeholder="dd/mm/aa"  id="dataNasc" class="form-control01"  name="dataNasc" required>
        </div>

        <div class="gridItem4 form-group">
            <input type="text" placeholder="Telefone:"  id="tel" name="tel" class="form-control02 inputSize"  required>
        </div>

        <div class="gridItem5 form-group">
            <input type="email" placeholder="Email:"  id="email" name="email"  class="form-control03" required>
        </div>
 
        <div class="gridItem6 form-group">
            <input type="password" placeholder="Senha:"  id="senha" name="senha" class="form-control04" required>
        </div>

        <div class="gridItem7 form-group">

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

        <div class="gridItem8 form-group">
        <select name="cidade" id="cidade" class="form-control" required>
          <option value=""selected>Município:</option>
          <?php
          while( $dadosCidade=mysqli_fetch_array($resultCidade)){
          $idC=$dadosCidade["id"];
          $nomeC=$dadosCidade["nome_cidades"];
          ?>
          <option value="<?php echo $idC?>"><?php echo $nomeC?></option>                 
          <?php } ?>       
        </select>
        
        </div>
        
      <div class="gridItem11 form-group">
        
        <div class="custom-file">
            <h5 class="h5Margin">Selecione uma foto de perfil:</h5>
        <label class="custom-file-label" for="imagem" required></label>  
        <input type="file"  id="imagem" name="imagem" class="custom-file-input" required>
        
<br>
<p>&nbsp;</p>
<p>&nbsp;</p>

          <h5 class="h5Margin">Já possui uma conta? 
            <a class="" style="color: #0088d7;" href="loginTeste.php">Faça login aqui!</a>
          </h5> 

        <a href="registroUser.php" target="_blank"></a>
            <center>
              <button type="submit" class="btnDiv" style="width: 95%;margin-left: 15px;" name="cadastrar">registrar-se</button>
            </center>
        </div>
      </div>


    </div>
    </div>
    
    


  </div>


            </form>
        
    </div>
      </center>
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