<?php

$content = 
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="display: flex; justify-content: center; border-collapse: collapse;">
';

function set_null($r, $c)
{
    $result = array();
    for ($i = 0; $i < $r; $i++)
    {
        $row = array();
        for ($j = 0; $j < $c; $j++)
            $row[$j] = null;
        $result[$i] = $row;
    }
    return ($result);
}

function getData($src)
{
    $result = set_null(7, 18);
    $row = 0;
    while ($line = fgets($src))
    {
        $line = trim($line);
        if (empty($line))
            continue;
        preg_match('/^([A-Za-z]+) = position:(\d+), number:(\d+), small:\s*([A-Za-z]+), molar:([0-9.]+), electron:([0-9 ]+)/', $line, $matches);
        if (count($matches) > 0)
        {
            $name = $matches[1];
            $position = $matches[2];
            $number = $matches[3];
            $small = $matches[4];
            $molar = $matches[5];
            $electron = $matches[6];

            $result[$row][$position] = array(
                'name' => $name,
                'number' => $number,
                'small' => $small,
                'molar' => $molar,
                'electron' => $electron
            );
            if ($position == 17)
                $row++;
        }
    }
    return ($result);
}

function addElements($data, $row)
{
    $result = "";
    for ($i = 0; $i < 18; $i++)
    {
        if ($data[$row][$i] != null)
        {
            $element = $data[$row][$i];
            $result = $result . "        <td style='border: 1px solid black; padding:2px;'>\n" .
            "            <h4 style='text-align:center;'>" . $element['name'] . "</h4>\n" .
            "                <ul>\n" .
            "                    <li>No " . $element['number'] . "</li>\n" .
            "                    <li>" . $element['small'] . "</li>\n" .
            "                    <li> " . $element['molar'] . " </li>\n" .
            "                    <li>" . $element['electron'] . " electron</li>\n" .
            "                </ul>\n        ";
        }
        else
            $result = $result . "        <td>";
        $result = $result . "</td>\n";
    }
    return ($result);
}

$src = fopen("ex06.txt", "r") or die ("");

if ($src == "")
{
    echo "Unable to open ex06.txt";
    exit();
}

$dest = fopen("mendeleiv.html", "w+b") or die ("");

if ($dest == "")
{
    echo "Unable to create mendeleiv.html";
    fclose($src);
    exit();
}

$data = getData($src);

for ($i = 0; $i < 7; $i++)
{
    $content = $content . "     <tr>\n";
    $content = $content . addElements($data, $i);
    $content = $content . "     </tr>\n";
}

fclose($src);

$content = $content . " </table>\n</body>\n</html>\n";

fwrite($dest, $content);
fclose($dest);

?>