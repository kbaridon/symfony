<?php

    function array2hash_sorted($array) {
        $result = array();
        echo "Array\n(\n";
        foreach ($array as $element)
        {
            if (count($element) == 2)
            {
                $name = $element[0];
                $age = $element[1];
                
                if (is_string($name) && ctype_digit($age))
                    $result[(string)$name] = $age;
                else
                    echo "  Error: Respect the format array(Name, age) (Skipping element...)\n";
            }
            else
                echo "  Error: Respect the format array(Name, age)\n";
        }
        krsort($result);
        foreach ($result as $name => $age)
            echo "  [" . $name . "] => " . $age . "\n";
        echo ")\n";
    }

?>