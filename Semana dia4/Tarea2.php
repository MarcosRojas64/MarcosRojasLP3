<?php
//CONICION 1
$valor = rand (1,10);
echo "El valor sorteado es $valor".PHP_EOL;
if ($valor<= 5 ){
    echo " Es menor o igual  a 5";
}else{
    echo "Es mayor a 5 ";


}
//CONDICION 2 
echo PHP_EOL;
$valor = rand(1,100);
echo "El valor sorteado es $valor".PHP_EOL;
if ($valor <=9){
        echo"Tiene un digito ";
}else{
    if($valor <= 100){
        echo"Tiene 2 digitos";

    }else{
        echo "Tiene 3 digitos ";
    }
}
//Codiciones3 
echo PHP_EOL;
$valor = rand(1,100);
echo "El valor sorteado es $valor".PHP_EOL;
if ($valor <= 9 ){
    echo"Tiene un digito ";
}elseif ($valor <100){
    echo"Tiene 2 digitos ";
}else{
    echo "Tiene 3 digitos";
}
?>







