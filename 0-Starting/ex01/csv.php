<?php

    $myfile = fopen("ex01.txt", "r") or die("Unable to open file!");
    $char = 't';
    while ($char)
    {
        $char = fgetc($myfile);
        if ($char != ',')
            echo "$char";
        else
            echo "\n";
    }
    fclose($myfile);

?>