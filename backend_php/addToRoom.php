<?php
    $filename = "../".$_GET['rm'];

    $user = 'todo';
    $time = date('h:i');
    $msg = $_GET['q'];
    $toWrite = $time.';'.$user.';'.$msg;

    $current = file_get_contents($filename);
    file_put_contents($filename, $current."\n".$toWrite);
?>