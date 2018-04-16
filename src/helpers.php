<?php

function dateParse($date)
{
    //DD/MM/YYYY -> YYYY-MM-DD
    $dateArray = explode('/', $date);
    // a função acima vai gerar tres variaveis 'dd' 'mm' 'yyyy'
    $dateArray = array_reverse($dateArray);
    // a função acima vai inverter as posições dentro do array 'yyyy' 'mm' 'dd'
    
    return implode('-', $dateArray);
    //a função a cima retorna uma data no formato yyyy-mm-dd
}

function numberParse($number)
{
    //1.000,00 -> 1000.00
    
    $newNumber = str_replace('.', '', $number);
    $newNumber = str_replace(',', '.', $newNumber);
    return $newNumber;    
}
