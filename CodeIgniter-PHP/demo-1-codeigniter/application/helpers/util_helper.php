<?php
function encrypt_decrypt($action, $string)
{
    $codigo = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key     = '23647586978AFDBGEJRKKDKSK';
    $secret_iv      = 'sjskekedkdkdkdkdkdkdkdkdk';

    $key = hash('sha256', $secret_key);
    $iv  = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $codigo = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $codigo = base64_encode($codigo);
    }else if( $action == 'decrypt' ){
        $codigo = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $codigo;
}
?>