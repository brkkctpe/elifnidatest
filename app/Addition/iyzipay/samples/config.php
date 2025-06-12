<?php

// -------Ödeme Ayarları--------------
// define('iyzico_api_key',"sandbox-xXkAUtofA8dhXkNCCbVCCKgpi53Qnwz7");
// define('iyzico_api_secret',"sandbox-HoTuUrQwVHipgtONNOln5I1v8zCxBFQv");
// define('iyzico_base_url',"https://sandbox-api.iyzipay.com");

require_once(eklentiyol.'iyzipay/IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey(iyzico_api_key);
        $options->setSecretKey(iyzico_api_secret);
        $options->setBaseUrl(iyzico_base_url);
        return $options;
    }
}