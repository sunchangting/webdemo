<?php
header("Content-Type:application/json;charset=utf-8");
$rows=["name"=>["Android","IOS","华为","other"],
    "data"=>[420,350,210,500]];
echo json_encode($rows);

