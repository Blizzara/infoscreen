<?php

$url = $_GET["url"];
$ip = $_SERVER["REMOTE_ADDR"];
$now = time();
$fname = "log.txt";
$log = fopen($fname, "r");
$content = trim(fread($log, filesize($fname)));
fclose($log);

$lines = explode("\n", $content);
$found = false;
for ($i = 0; $i < count($lines); $i++) {
    $tokens = explode("##", $lines[$i]);
    if ($tokens[0] == $url && $tokens[1] == $ip) {
        $tokens[2] = $now;
        $found = true;
        $lines[$i] = implode("##", $tokens);
        break;
    }
}
if (!$found) {
    $tokens = array($url, $ip, $now);
    $line = $url . "##" . $ip . "##" . $now;
    $lines[] = $line;
}
$log = fopen($fname, "w");
fwrite($log, implode("\n", $lines));
fclose($log);

?>
