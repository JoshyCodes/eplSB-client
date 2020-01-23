<?php

function postTest() {
    $sizeArray = dataToArray($_POST["sizes_name"]);
    $colorArray = dataToArray($_POST["colors_name"]);
    $decoArray = dataToArray($_POST["deco_name"]);

    $p_id = create_product_variation( array(
      'author'        => '', // optional
      'title'         => $_POST["title"],
      'content'       => $_POST["content"],
      'excerpt'       => $_POST["excerpt"],
      'regular_price' => $_POST["reg_price"], // product regular price
      'sale_price'    => $_POST["sale_price"], // product sale price (optional)
      'stock'         => '1', // Set a minimal stock quantity
      'image_id'      => $_POST["img"], // optional
      'gallery_ids'   => array(), // optional
      'sku'           => $_POST["sku"], // optional
      'tax_class'     => '', // optional
      'weight'        => '', // optional
      'attributes'    => array(
          'size'   =>  $sizeArray,
          'color'   =>  $colorArray,
          'deco'  =>  $decoArray,
      ),
    )
  );

  $priceModifier = 0;

  for ($x = 0; $x < count($sizeArray); $x++) {
      for ($y = 0; $y < count($colorArray); $y++) {
          for ($z = 0; $z < count($decoArray); $z++) {

              $isDeco = ifDeco($decoArray[$z]);
              $finalSku = $sizeArray[$x] . "-" . $colorArray[$y] . "-" . $isDeco;
      
              $variation_data =  array(
                  'attributes' => array(
                      'size'  => $sizeArray[$x],
                      'color' => $colorArray[$y],
                      'deco'  =>  $isDeco,
                  ),
                  'sku'           => $finalSku,
                  'regular_price' => getModifiedPrice($_POST["reg_price"], $priceModifier),
                  'sale_price'    => getModifiedPrice($_POST["sale_price"], $priceModifier),
                  'stock_qty'     => 1,
              );

              create_product_variant( $p_id, $variation_data );
              

          }
      }
  }
  $response = new WP_REST_Response("Added Product " . $p_id . " of " . $_POST["title"]);
  $response->set_status(200);
  return $response;
}