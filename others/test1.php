<?php

require __DIR__ . '/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

const GS="\x1d";
try {
	$connector = new WindowsPrintConnector("webplayPOS");
	$printer = new Printer($connector);

	$printer -> setEmphasis(true);
	$printer -> text("Webplay Technologies Ltd.\n");
	$printer -> setEmphasis(false);
	$printer -> feed();
	$printer -> text("Receipt for Android application\n");
	$printer -> text("Pesonalised mail services\n");
	$printer -> text("Receipt for Bulk SMS services\n");
	$printer -> feed(4);
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	$printer -> barcode("987654321");
	$printer -> cut();
	echo GS . "V\x41".chr(3);
	$printer -> close();
} catch(Exception $e) {
	echo "Couldn't print to this printer: " . $e -> getMessage(). "\n";
}
?>