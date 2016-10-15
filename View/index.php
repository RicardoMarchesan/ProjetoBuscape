<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="PesquisaBuscape">
        <meta name="author" content="Grupo4">

        <title>Busca Buscapé</title>

        <link rel="icon" href="../Include/images/buscape.ico">  

        <link href="../Include/css/index.css" rel="stylesheet">
    </head>
    <body>
        <form class="form-wrapper" method="post" action="../Controller/buscar.php">
            <input type="text" name="filtro" placeholder="Pesquisar por..." required>
            <input type="submit" value="Buscar" id="submit">
        </form>
    </body>
</html>