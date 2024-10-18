<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

include('pdf.php');

$html = ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream();
?>
