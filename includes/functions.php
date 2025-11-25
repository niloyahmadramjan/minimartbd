<?php
function formatPrice($price) {
    return number_format($price, 2) . " BDT";
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>
