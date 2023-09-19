<?php
    if(session_id() === "") session_start();
    $file = fopen('Base.CSV', 'r');

    $_SESSION['zona'] = $_POST['zona'];
    $_SESSION['secao'] = $_POST['secao'];

    $_SESSION['response'] = get_info($file, $_SESSION['zona'], $_SESSION['secao']);

    header('Location: index.php');
    exit();

    function get_info($file, $zona, $secao){
        while (!feof($file)) {
            $line = fgets($file);
            $line = explode(";", $line);
            if ($line[0] == $zona) {
                if (in_array($secao, explode(",",$line[1]))) {
                    return array_slice($line, 2);
                }
            }
        }
        return 0;
    }