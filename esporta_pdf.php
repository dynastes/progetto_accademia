<?php
  include_once("pdfcrowd-4.3.6/pdfcrowd.php");
  @include_once 'shared/menu.php';
  // create an API client instance
  $client = new Pdfcrowd("username", "apikey");

  // convert a web page and store the generated PDF into a variable
  $pdf = $client->convertURI('http://www.google.com/');
  // set HTTP response headers
  header("Content-Type: application/pdf");
  header("Cache-Control: max-age=0");
  header("Accept-Ranges: none");
  header("Content-Disposition: attachment; filename=\"google_com.pdf\"");

  // send the generated PDF
  echo $pdf;

 ?>
