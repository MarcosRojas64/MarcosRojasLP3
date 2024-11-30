
 <?php
 session_start();
 include '../library/configServer.php';
 include '../library/consulSQL.php';

 sleep(5);
 $nameAd= $_POST['name-admin'];
 $consA= ejecutarSQL::consultar("select * from administrador where Nombre='$nameAd'");
 $totalA = mysqli_num_rows($consA);

 if($totalA>0){
 if(consultasSQL::DeleteSQL('administrador', "Nombre='".$nameAd."'")){
 echo '<img src="assets/img/ok.png" class="center-all-contens"><br><p class="lead textcenter">Administrador eliminado éxitosamente</p>';

 }else{
 echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead textcenter">Ha ocurrido un error.<br>Por favor intente nuevamente</p>';

 }
 }else{
 echo '<img src="assets/img/error.png" class="center-all-contens"><br><p class="lead textcenter">El nombre del administrador no existe</p>';

 }
