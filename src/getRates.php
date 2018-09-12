<?php
/*
 * Example taken from https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/index.en.html#dev
 * and slightly modified
 */
  //This is aPHP(5)script example on how eurofxref-daily.xml can be parsed
  //Read eurofxref-daily.xml file in memory
  //For the next command you will need the config
  //option allow_url_fopen=On (default)
  $XML=simplexml_load_file("../eurofxref-daily.xml"); //for testing
  //http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml
  //the file is updated at around 16:00 CET
  $currenciesRates = array();
  $id = 0;
  foreach($XML->Cube->Cube->Cube as $rate){
    //Output the value of 1EUR for a currency code
    $currenciesRates[$rate["currency"]->__toString()] = $rate["rate"];
    //echo var_export($rate["currency"],true);
  }
  /*foreach ($currenciesRates as $currency => $rate) {
    echo $currency." => ".$rate."<br>";
  }*/
  echo json_encode($currenciesRates);
?>
