<?php
// Datos
//$token = 'apis-token-6054.wLV9fovIV5IoAmL7zphpofY2vtaPQb-a';
//$token = '6c1b5cb9836aeef540a7da35b5da2766';
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im5vaGFsYWs3NDJAdmludGhhby5jb20ifQ.dEoIGUfE72Qg0aYCxqPMvO69WwaKCMNs3GsTOYh7xsc';
//creamos la variable
$dni = $_REQUEST['dni'];
//$dni='46027897';
//$dni='27427864';

// Iniciar llamada a API
$curl = curl_init();

// Buscar dni
curl_setopt_array($curl, array(
  // para user api versión 2
  //CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
  // para user api versión 1
  CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 2,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: https://apis.net.pe/consulta-dni-api',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);
//aca hacemos esto
echo $response;// imprimimos los datos 

//curl_close($curl);
// Datos listos para usar
//$persona = json_decode($response);
//var_dump($persona);
?>