<?php 


if($_SESSION['TIPO'] == "advogado"){
        //Especialidade//
          echo "<div class='h6 mt-4'><i class='fas fa-user-graduate'></i>&nbsp;-&nbsp;<strong>".$_SESSION['area_direito']."</strong></div>";
        //Formação ou onde se formou//
          echo "<div><i class='ni education_hat mr-2'></i>".$_SESSION['LUGAR_FORMACAO']."</div>";
}else{

        //Especialidade
        echo "<div class='h6 mt-4'></div>";
        //Formação ou onde se formou
        echo "<div></div>";
}

?>