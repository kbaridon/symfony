<?php

    function getLocations($str) {
        $result = array();
        for ($i = 0; $i < strlen($str); $i++)
        {
            $item = "";
            while ($i < strlen($str) && $str[$i] == ' ')
                $i++;
            while ($i < strlen($str) && $str[$i] != ',')
                $item = $item . $str[$i++];
            if ($item)
                array_push($result, $item);
        }
        return ($result);
    }

    function search_by_states($str) {
        $states = [
        'Oregon' => 'OR',
        'Alabama' => 'AL',
        'New Jersey' => 'NJ',
        'Colorado' => 'CO',
        ];
        $capitals = [
        'OR' => 'Salem',
        'AL' => 'Montgomery',
        'NJ' => 'trenton',
        'KS' => 'Topeka',
        ];
        $result = array();
        $list = getLocations($str);
        foreach ($list as $location)
        {
            $is_state = false;
            $is_capital = false;
            foreach ($states as $fullname => $abbreviation)
            {
                if ($fullname == $location)
                {
                    foreach($capitals as $abb => $city)
                    {
                        if ($abb == $abbreviation)
                        {
                            array_push($result, $city . " is the capital of " . $location . ".");
                            $is_state = true;
                        }
                    }
                    break ;
                }
            }
            if (!$is_state)
            {
                foreach ($capitals as $abb => $city)
                {
                    if ($city == $location)
                    {
                        foreach($states as $fullname => $abbreviation)
                        {
                            if ($abb == $abbreviation)
                            {
                                array_push($result, $city . " is the capital of " . $fullname . ".");
                                $is_capital = true;
                                break ;
                            }
                        }
                    }
                }
                if (!$is_capital)
                    array_push($result, $location . " is neither a capital nor a state.");
            }
        }
        return ($result);
    }

?>