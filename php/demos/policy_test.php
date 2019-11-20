<?php

require_once __DIR__ . '/../vendor/autoload.php';

$scope = new \Qcloud\STS\Scope(
    "name/cos:PutObject",
    "test-12500000",
    "ap-guangzhou",
    "/exampleobject"
);
echo $scope->get_action() . '|' . $scope->get_resource() . '<br>';

$scopes = array();
array_push($scopes, $scope);
array_push(
    $scopes,
    new \Qcloud\STS\Scope(
        "name/cos:GetObject",
        "test-12500000",
        "ap-guangzhou",
        "/1.txt"
    )
);
$sts = new \Qcloud\STS\STS();
$policy= $sts->getPolicy($scopes);
$policyStr = str_replace('\\/', '/', json_encode($policy));
echo $policyStr;
