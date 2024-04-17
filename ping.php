<?php
$ip = $_GET['ip'];
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) && filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) && filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)) {
    exec("ping -c 1 -W 1 $ip", $output, $result);
    echo ($result === 0) ? "1" : "0";
} else {
    echo("0");
}
?>
