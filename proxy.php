<?php

error_reporting(E_ALL & ~E_NOTICE);

$http_basic_user     = $_REQUEST['http_basic_user'];
$http_basic_password = $_REQUEST['http_basic_password'];
$http_host_path      = $_REQUEST['http_host_path'];
$http_scheme         = $_REQUEST['http_scheme'];

if (!($http_basic_user && $http_basic_password && $http_host_path)) {
  http_response_code(500);
  die('Invalid parameters');
}

if (!$http_scheme) {
  $http_scheme =  'https';
}

$url = sprintf('%s://%s:%s@%s?%s',
  $http_scheme,
  $http_basic_user,
  $http_basic_password,
  $http_host_path,
  $_SERVER['QUERY_STRING']
);

print file_get_contents($url);


