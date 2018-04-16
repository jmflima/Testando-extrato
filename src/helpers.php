<?php

function dateParse($date)
{
    //DD/MM/YYYY -> YYYY-MM-DD
    $dateArray = explode('/', $date);
    // a fun��o acima vai gerar tres variaveis 'dd' 'mm' 'yyyy'
    $dateArray = array_reverse($dateArray);
    // a fun��o acima vai inverter as posi��es dentro do array 'yyyy' 'mm' 'dd'
    
    return implode('-', $dateArray);
    //a fun��o a cima retorna uma data no formato yyyy-mm-dd
}

function numberParse($number)
{
    //1.000,00 -> 1000.00
    
    $newNumber = str_replace('.', '', $number);
    $newNumber = str_replace(',', '.', $newNumber);
    return $newNumber;    
}
