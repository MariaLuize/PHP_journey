<?php
namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function listSeries()
    {
        $series=[
            "Doctor Who",
            "Bojack Horseman",
            "Community"
        ];
    
        $html="<ul>";
        foreach( $series as $serie){
            $html   .= "<li>$serie</li>";
        }
        $html .= '</ul>';
    
        return $html;
    }
    
}