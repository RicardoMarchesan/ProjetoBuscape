<?php

    session_start();

    require_once '../Apiki_Buscape_API.php';

    $applicationID = '36686569316a69734762553d';
    $sourceID = '35665711';

    $objBuscaPeApi = new Apiki_Buscape_API($applicationID, $sourceID);
    $objBuscaPeApi->setSandbox();
    $objBuscaPeApi->setFormat('json');

    try {

// Busca ofertas a partir de palavras-chave
	     $array_itens_json = $objBuscaPeApi->findOfferList( array( 'keyword' => $_POST['filtro']) );
       //$itens = json_decode($array_itens_json);
       $itens = $array_itens_json;
       $_SESSION['itens'] = $itens;
       header("location:../View/dashboard.php");
     } catch( Exception $e ) {
	         echo $e->getMessage();
       }

?>
