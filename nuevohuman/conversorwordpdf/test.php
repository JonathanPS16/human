<?php
/* this is the copy pase read example */
require_once 'vendor/autoload.php';



$objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
$contents=$objReader->load("examenes.docx");

$rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;

$renderLibrary="tcpdf";
$renderLibraryPath=''.$renderLibrary;
if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
	die("Provide Render Library And Path");
}
$renderLibraryPath=''.$renderLibrary;
$objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
$objWriter->save("testa.pdf");


?>
<a href="testa.pdf">testa.pdf</a>