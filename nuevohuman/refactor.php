<?php
//Datos de la base de datos
$mysqlDatabaseName ='byvnilva_humantalents';
$mysqlUserName ='byvnilva_drupal';
$mysqlPassword ='admByV$';
$mysqlHostName ='localhost';
$mysqlExportPath ='imagenesinfo/db_daily_backup.sql';

// Backup con mysqldump
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;

exec($command,$output=array(),$worked);

switch($worked){
case 0:
    $zip = new ZipArchive();
 $archivoComprimido = "imagenesinfo/bk".date('YmdHis').".zip";
$comprimido = $archivoComprimido;
if (file_exists($comprimido)) {
    unlink($comprimido);
}
 
$comprimidoStatus = $zip->open($comprimido, ZipArchive::CREATE);
if ($comprimidoStatus !== true) {
    throw new RuntimeException(sprintf('Error al crear el comprimido. (Codigo de error: %s)', $comprimidoStatus));
}
 
if (!$zip->setPassword("kratoss")) {
    throw new RuntimeException('Error al establecer contraseña');
}
 
$fileName =  $mysqlExportPath;
$baseName = basename($fileName);
if (!$zip->addFile($fileName, $baseName)) {
    throw new RuntimeException(sprintf('Error al agregar archivo: %s', $fileName));
}
 
if (!$zip->setEncryptionName($baseName, ZipArchive::EM_AES_256)) {
    throw new RuntimeException(sprintf('Error al agregar encriptacion: %s', $baseName));
}
 
$zip->close();
unlink($mysqlExportPath);
//echo "<a href="$comprimido">asaS</>";
echo 'La base de datos <b>' .$mysqlDatabaseName .'</b> se ha almacenado correctamente.</b><a href="'.$archivoComprimido.'">Descargar</a>';
/*require_once 'terceros/dropbox/vendor/autoload.php';
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

$dropboxKey ="xexyy3vertp7zwl";
$dropboxSecret ="xexyy3vertp7zwl";
$dropboxToken="sl.A4KCrP40Q4iKSugfmba64io0po9HhF_GoZ-6DNvgIsdESk81_dFzmp64JsaQKSwhGLqEK0tZTElBJqLuxiq8qzr7GIWtSsEyrM9WB29e_BLEzHGvrEZ4KQwrKIg3Jamn_tcTbzDaO_lC";


$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
$dropbox = new Dropbox($app);

if(!empty($_FILES)){
    $nombredropbox = "test.zip";

   try{
        $file = $dropbox->simpleUpload( $archivoComprimido,$nombredropbox, ['autorename' => true]);
        echo "archivo subido";
   }catch(\exception $e){
        print_r($e);
        
   }*/



break;
case 1:
echo 'Se ha producido un error al exportar <b>' .$mysqlDatabaseName .'</b> a '.getcwd().'/' .$mysqlExportPath .'</b>';
break;
case 2:
echo 'Se ha producido un error de exportación, compruebe la siguiente información: <br/><br/><table><tr><td>Nombre de la base de datos:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>Contraseña MySQL:</td><td><b>NOTSHOWN</b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
break;
}
?>