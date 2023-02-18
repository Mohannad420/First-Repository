<?php
session_start();

     require_once 'navbar.php';






echo '<iframe width="100%" height="480" src="https://www.youtube.com/embed/cbAj3biUeDI" title="탁 트인 숲에서 맑은 공기 마셔요. 릴렉스 뉴에이지 (+숲 ASMR🌳)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></body>
    ';

$n1 = 10 ;
$n2 = 20 ;

echo $n1 + $n2 .'<hr>';

$names = ['mohannad','ismaeel','baseel',[' shawakh',' hanaa',' fatma']] ;

$age = array(
    'mohannad' => 25 ,
    'ismael' => 24 ,
    'baseel' => 31 
);

echo $names[0] . $age['mohannad'] .'<hr>' ;

if($n1 == $n2){
    echo 'n1 == n2' ;
}else if($n1 > $n2){
    echo 'n1 > n2';
}else{
    echo 'n1 < n2' ;
}

for($i = 0 ; $i< 3 ; $i++){
    echo $names [$i] . $names[3][$i] . '<br>';
};

echo '<hr>' ;

foreach($age as $s => $a){
    echo $s . $a . '<br>' ;
}


function pls($q,$W){
    settype($q,'int');
    settype($W,'int');

    return $q + $W;
}

echo gettype(pls('ss',22)) ;

echo '<hr>' ;

date_default_timezone_set('Europe/Istanbul');
date_default_timezone_get();
echo date('y.m.d h:i:s');

$time = mktime(0,0,0,4,28,1997);
echo date('d.m.y',$time);









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="all.min.js">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
   <title>index</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    
</body>
</html>