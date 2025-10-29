<?php

    function capital_city_from($capital) {
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
        foreach ($states as $fullname => $abbreviation)
        {
            if ($fullname == $capital)
            {
                foreach($capitals as $abb => $city)
                {
                    if ($abb == $abbreviation)
                        return ($city . "\n");
                }
                break ;
            }
        }
        return ("Unknown\n");
    }

?>