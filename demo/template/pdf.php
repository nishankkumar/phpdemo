<?php
require '_lib/pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd("nishankkumar1994", "639e2dc3bb1484f37ef88f67b715da10");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://localhost/Own Repo/phpdemo/demo/template/dashboard_in.php');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"google_com.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>
