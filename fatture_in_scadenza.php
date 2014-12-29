<?php
exit; //disabled
error_reporting(E_ALL);
ini_set('display_errors', 1);

//connessione al database
$connessione= mysql_connect("localhost","selfrule_wp2","U(aRr8CrOX#~2") 
			or die("Connessione non riuscita database it " . mysql_error());
//seleziona il database
mysql_select_db("selfrule_wp2",$connessione) 
				or die("Errore nella selezione del database " . mysql_error());	
$query="SET NAMES utf8";
$result=mysql_query($query);
$query="SET CHARACTER SET utf8";
$result=mysql_query($query);

function bindingData($data, $html) {
	foreach ($data as $fieldName => $fieldValue) {
		$html = str_replace('{{' . $fieldName. '}}', $fieldValue, $html);
	}
	return $html;
}

function sendHtmlEmail ($data, $subject, $indirizzo, $from, $template) {
	
	$messaggio = file_get_contents('http://selfrules.org/progetti/' . $template);
	$messaggio = bindingData($data, $messaggio);

	$header = "From: $from\n";
	$header .= "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/html; charset=\"utf-8\"\n";
	$header .= "Content-Transfer-Encoding: 7bit\n\n";


	mail($indirizzo, $subject, $messaggio, $header);	
}

//SCADENZA FATTURE < 3 GIORNI
$query= "SELECT clients.*, invoices.reference FROM clients JOIN companies ON clients.company_id = companies.id JOIN invoices ON companies.id = invoices.company_id LIMIT 1";//WHERE invoices.issue_date < NOW() - INTERVAL 3 DAY AND invoices.issue_date > NOW() - INTERVAL 4 DAY AND invoices.status != 'Paid'
$queryResult=mysql_query($query) or die("query sbagliata1 " . mysql_error());
while($row = mysql_fetch_assoc($queryResult)) {
	$row['username'] = $row['firstname'] . ' ' . $row['lastname'];
	$row['pass'] = $row['password'];
	sendHtmlEmail (
		$row, 
		'Fattura n° ' . $row['reference'] . 'in scadenza (Selfrules.org)', 
		'mattia@selfrules.org', 
		"Selfrules", 
		'ritardo_pagemnto_fattura.html'
	);
}

//FATTURE GIA' SCADUTE
$query= "SELECT clients.*, invoices.reference FROM clients JOIN companies ON clients.company_id = companies.id JOIN invoices ON companies.id = invoices.company_id WHERE invoices.issue_date > NOW() + INTERVAL 3 DAY AND invoices.issue_date < NOW() + INTERVAL 4 DAY AND invoices.status != 'Paid'";
$queryResult=mysql_query($query) or die("query sbagliata1 " . mysql_error());
while($row = mysql_fetch_assoc($queryResult)) {
	$row['username'] = $row['firstname'] . ' ' . $row['lastname'];
	$row['pass'] = $row['password'];
	sendHtmlEmail (
		$row, 
		'Fattura n° ' . $row['reference'] . 'in scadenza (Selfrules.org)', 
		'mattia@selfrules.org', 
		"Selfrules", 
		'ritardo_pagemnto_fattura2.html'
	);
} 

/*sendHtmlEmail (stripslashes($firstName . ' ' . $lastName), stripslashes($email), $password, "Dati accesso Selfrules.org", stripslashes($email), "Selfrules");*/

?>