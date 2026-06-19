<?php
ob_start();
include __DIR__ . '/application/helpers/fddi_helper.php';
$c = ob_get_clean();
if ($c === '') {
    echo "NO_OUTPUT\n";
} else {
    echo "OUTPUT:[" . substr($c,0,200) . "]\n";
}
?>