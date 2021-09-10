<?php
    require_once 'vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;
    $html2pdf = new Html2Pdf('P', 'LETTER', 'es', 'true', 'UTF-8');
    $html2pdf->setTestTdInOnePage(false);
    ob_start();
    require_once 'contenido2.php';
    $html = ob_get_clean();
     
    $html2pdf->writeHTML($html);
    $html2pdf->output();


?>