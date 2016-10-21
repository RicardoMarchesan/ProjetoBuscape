<?php
session_start();
$_SESSION['itens'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Dashboard">
    <meta name="author" content="Adm">
    <link rel="icon" href="../Include/images/buscape.ico">

    <title>Resultado da Busca</title>

    <!-- Bootstrap core CSS -->
    <link href="../Include/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../Include/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Include/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../Include/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="container-fluid">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.php">Retorno Buscapé</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
           <form class="navbar-form navbar-right" method="post" action="../Controller/buscar.php">
             <input type="text" name="filtro" placeholder="Nova Pesquisa">
           </form>
         </div>
       </div>
     </nav>

    <div class="container-fluid">
      <div class="row">
         <h2 class="sub-header">Resultado da pesquisa</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Imagem</th>
                  <th>Valor</th>
                  <th>Loja</th>
                  <th>Ver Oferta</th>
               </tr>
              </thead>
              <tbody>

                <!-- Leitura Json -->

              <?php
                $itemaqui = $_SESSION['itens'];
                $jsonObj = json_decode($itemaqui);
                $produtos = $jsonObj->offer;

                // Ordena os produtos

                usort($produtos, function($a, $b) { //Sort the array using a user defined function
                  return $a->offer->price->value < $b->offer->price->value ? -1 : 1; //Compare the scores
                });

                // Mostrar os produtos

                foreach($produtos as $o) {
                  echo"<tr>";
                  echo"  <td>".$o->offer->offershortname."</td>";
                  if (isset($o->offer->thumbnail->url)){
                    echo"  <td>"."<img src=".$o->offer->thumbnail->url.">"."</td>";
                  }
                  else{
                    echo"  <td>"."<img src=../Include/imagens/sem-foto.jpg>"."</td>";
                  }
                  echo"  <td>R$".$o->offer->price->value."</td>";
                  echo"  <td>".$o->offer->seller->sellername."</td>";
                  echo"  <td>"."<button onclick=window.location.href=>Ir para anuncio</button>". "</td>";
                  // não estou usando porque não é um link válido retornado. $o->offer->links->link->url
                  echo"</tr>";
                }
              ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../Include/js/jquery/jquery.min.js"><\/script>')</script>
    <script src="../Include/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../Include/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../Include/css/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
