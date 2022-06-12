<?php

function json_getir()
{
    //dovizgetir
    $url = "https://finans.truncgil.com/v3/today.json";
    $json = file_get_contents($url);
    $data = json_decode($json, true);

    return $data;
}

$data = json_getir();
//her seferinde siteye bağlanmak yerine tek seferlik global data değişkenini set etme kodu
function getDoviz($tur, $alsat){
    global $data;
    return $data[$tur][$alsat];
}