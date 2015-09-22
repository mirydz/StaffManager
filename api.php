<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

$resources = ['groups', 'people', 'departments'];

$requestedResource = $request[0];



switch ($method) {
    case 'GET':
    
        break;
    case 'POST':
      
        break;
    case 'PUT':
      
        break;
    case 'DELETE':

        break;
    default:
     
        break;
}
//echo $request;