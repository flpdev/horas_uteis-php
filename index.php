<?php

$row["Data_CriacAo"] = '18/06/2021';
// $date1 = '2021-06-17 09:30:52';

date_default_timezone_set('America/Cuiaba');
$date1 = preg_replace('/([\d]{2})\/([\d]{2})\/([\d]{4})/', '$3-$2-$1', $row["Data_CriacAo"]); // Supondo que $row["Data_CriacAo"] tem uma data no formato Brasil dd/mm/YYYY
$date2 = date('Y-m-d H:i:s'); //data atual
$horas = 0;
while($date1 < $date2) {
  $date1 = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($date1)));
  if (
      (date('Hi', strtotime($date1)) > 730 and date('Hi', strtotime($date1)) < 1130) 
      || 
      (date('Hi', strtotime($date1)) > 1330 and date('Hi', strtotime($date1)) < 1730)
    ) { // Filtra as horas comerciais
  	if (date('N', strtotime($date1)) < 6) { // Filtra os dias comerciais (seg a sex)
      $horas++; 
    }
  }
}
echo 'Se passaram '.$horas.' Horas';