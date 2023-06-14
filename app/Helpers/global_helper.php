<?php
function format_currency($number, $currencyCode)
{
    $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
    return $formatter->formatCurrency($number, $currencyCode);
}
