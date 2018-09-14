<?php
/*
 * Example taken from https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/index.en.html#dev
 * and slightly modified
 * Required: config option allow_url_fopen=On (default)
 * To get current data, change simplexml_load_file argument to the following:
 * http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml
 * (the file is updated at around 16:00 CET)
 */
  $XML=simplexml_load_file("../eurofxref-daily.xml");

  //The following array will be encoded as JSON and passed through responseText
  $currenciesRates = array("date"=>(string)$XML->Cube->Cube[0]["time"]);

  //read values into $currenciesRates array
  foreach($XML->Cube->Cube->Cube as $rate){
    $currenciesRates[$rate["currency"]->__toString()] =
                                                  $rate["rate"]->__toString();
    //echo var_export($rate["currency"],true);
  }
  echo json_encode($currenciesRates);
?>
