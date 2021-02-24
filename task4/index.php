<?php
include("./parser/simple_html_dom.php");

$links = array(
    "2009-2010" => "https://terrikon.com/football/italy/championship/2009-10/table",
    "2010-2011" => "https://terrikon.com/football/italy/championship/2010-11/table",
    "2011-2012" => "https://terrikon.com/football/italy/championship/2011-12/table",
    "2012-2013" => "https://terrikon.com/football/italy/championship/2012-13/table",
    "2013-2014" => "https://terrikon.com/football/italy/championship/2013-14/table",
    "2014-2015" => "https://terrikon.com/football/italy/championship/2014-15/table",
    "2015-2016" => "https://terrikon.com/football/italy/championship/2015-16/table",
    "2016-2017" => "https://terrikon.com/football/italy/championship/2016-17/table",
    "2018-2018" => "https://terrikon.com/football/italy/championship/2017-18/table",
    "2019-2019" => "https://terrikon.com/football/italy/championship/2018-19/table",
    "2020-2020" => "https://terrikon.com/football/italy/championship/2019-20/table",
    "2020-2021" => "https://terrikon.com/football/italy/championship/table"
);

foreach ($links as $key => $value) {
    $html = file_get_html($value);
    $tbody = $html->find("tbody");

    
    // foreach ($html->find('tbody')->children(1) as $td) {
    //     # code...
    // }

    //echo "[$key] => ", $value, "<br>";
}


$html = file_get_html('https://terrikon.com/football/italy/championship/2009-10/table');

foreach($html->find('tr td:first-child') as $e)
{
    if ($e->innertext == "#") continue;
    echo $e . '<br>';
}

// foreach($html->find('td > a') as $e)
// {
//     if ($e->innertext == "#") continue;
//     echo $e->innertext . '<br>';
// }
    