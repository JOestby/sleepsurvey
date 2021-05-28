<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="utf-8"/>
	<link rel="stylesheet" href="stil.css">
    <title>Søvnundersøkelse resultat</title>
	<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
		table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<div class="center">
 <h1>Søvnundersøkelse resultat</h1>
<?php
$fil = fopen("personfil.csv","a") // Åpne fil
   or die("Kan ikke åpne fil");

$sum = 0;
foreach ($_GET as $key => $value) // Gå gjennom alle input-data
{
  echo "<p> $key: $value";
if(is_numeric($value))
	$sum = $value + $sum;
fwrite($fil,"\n");
	
}
   echo "\nDu sov til sammen $sum timer.";
	
$array = array($sum/7);

$average = array_sum($array);

echo "\nDu sov i gjennomsnitt $average timer hver dag.";

	if ($sum < "50") {
  echo "\nDu sover for lite.";
		} else {
  echo "\nDu sover nok.";
}
 ?>
	
	<h2>Så mange timers søvn trenger vi:</h2>

<table>
  <tr>
    <th>Alder</th>
    <th>Søvnbehov</th>
    
  </tr>
  <tr>
    <td>0-11 måneder</td>
    <td>15-18 timer</td>
   
  </tr>
  <tr>
    <td>1-5 år</td>
    <td>11-14 timer</td>
    
  </tr>
  <tr>
    <td>6-13 år</td>
    <td>9-11 timer</td>
   
  </tr>
  <tr>
    <td>14-17 år</td>
    <td>8-10 timer</td>
    
  </tr>
  <tr>
    <td>18-64 år</td>
    <td>7-9 timer</td>
    
  </tr>
  <tr>
    <td>64+ år</td>
    <td>7-8 timer</td>
    
  </tr>
</table>
	
<form method="get" action="/php/sovnundersokelse.php">
    <button type="submit">Gå tilbake</button>
</form>
	
 </body>
</html>
