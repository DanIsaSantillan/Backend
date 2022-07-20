<?php

header("Content-Type: application/json; chartset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");

/*echo ("Hello World ");
print ("Hello Again ");*/
//comentario
/*parrafo comentario */
/*$var1 = 10;
$var2 = 20;
$var3 = "30";
echo $var1;
echo $var2;
echo $var3;
echo($var1 + $var2 + $var3);
echo("La suma de ".$var1." mas ".$var2." es ".($var1+$var2). "<br>".$var3);
$x = "<h1>Este es un Titulo";
echo $x;*/

$data = array(
    "data"=>[
        array("id"=>"1", "contact"=>"Veronica", "phone"=>"4494656742", "date"=>"2022/07/01", "status"=>"Activo"),
        array("id"=>"2", "contact"=>"Laura", "phone"=>"4494656778", "date"=>"2022/07/11", "status"=>"No Activo")
    ]
);

echo json_encode($data);







?>