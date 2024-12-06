<?php
function processXml($xmlString) {
    $xmlObj = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOENT | LIBXML_DTDLOAD);

    echo $xmlObj;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $xmlString = file_get_contents("php://input");
    processXml($xmlString);
} else {
    echo "Aucune donnée XML reçue.";
}
?>
