<?php
    session_start();

    require_once '../Apiki_Buscape_API.php';

    $applicationID = '36686569316a69734762553d';
    $sourceID = '35665711';

    $objBuscaPeApi = new Apiki_Buscape_API($applicationID, $sourceID);
    $objBuscaPeApi->setSandbox();
    $objBuscaPeApi->setFormat('json');

    try {
//
//	// Busca uma lista de categorias
//	//echo $objBuscaPeApi->findCategoryList();
//
//	// Busca uma lista de produtos por palavras-chave
    // echo "BUSCAREI: ".$_POST['filtro'];
	  // $produto = $objBuscaPeApi->findProductList( array( 'keyword' => $_POST['filtro'] ) );

//
//	// Busca ofertas a partir de palavras-chave
	     $produto = $objBuscaPeApi->findOfferList( array( 'keyword' => $_POST['filtro'] ) );
       $categories = json_decode($produto);
       echo $produto;



//
//	// Busca os dados de uma oferta a partir do seu ID
//	// echo $objBuscaPeApi->findOfferList( array( 'offerId' => 126733147 ) );
//
//	// Busca ofertas a partir de um código de barras
//	// echo $objBuscaPeApi->findOfferList( array( 'barcode' => 9788575222379 ) );
//
//	// Busca ofertas a partir de palavras-chave e coordenadas geográficas
//	// echo $objBuscaPeApi->findOfferList( array(
//	// 	'keyword'   => 'celular',
//	// 	'latitude'  => '-23.557362',
//	// 	'longitude' => '-46.660927',
//	// 	'radius'    => 400 // metros
//	// ) );
//
//	// Busca os produtos mais clicados da última semana
//	//echo $objBuscaPeApi->topProducts();
//
//	// Busca as avaliações dos usuários através do ID do produto
//	//echo $objBuscaPeApi->viewUserRatings( array( 'productId' => 240493 ) );
//
//	// Busca os detalhes de um produto a partir de seu ID
//	//echo $objBuscaPeApi->viewProductDetails( array( 'productId' => 232685 ) );
//
//	// Busca os detalhes de uma loja a partir de seu ID
//	//echo $objBuscaPeApi->viewSellerDetails( array( 'sellerId' => 335525 ) );
//
} catch( Exception $e ) {
	echo $e->getMessage();
}
?>
