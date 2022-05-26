<?php
function array_multisum($arr)
{
    $sum = array_sum($arr);
    foreach ($arr as $cartitem) {
        $sum += is_array($cartitem) ? $cartitem['price'] : 0;
    }
    return $sum;
}
