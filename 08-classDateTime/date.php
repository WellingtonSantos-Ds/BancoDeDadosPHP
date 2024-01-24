<?php 

// criando uma objeto data e passando por parâmetro o que eu quero que mostre;
$date = new DateTime('2020-1-1 15:30:30');

// formatando aumentando o que eu quero aumentar; 
$date ->add(DateInterval::createFromDateString('7 years 2 days 5 minutes 17 seconds'));

// Diminuindo se usa a método sub;  
$date ->sub(DateInterval::createFromDateString('7 years 2 days 5 minutes 17 seconds'));

//formatando para o horário de sao paulo; 
$date->setTimezone( new DateTimeZone('America/Sao_Paulo'));

// Mudando o formato;
echo $date->format('d/m/Y H:i:s');