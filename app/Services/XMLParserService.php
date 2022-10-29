<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService 
{
    public function saveNews($link){
       
        $xml = XmlParser::load($link);

        $xml->parse([
        'link' => ['uses' => 'channel.link'],
        'title' => ['uses' => 'channel.title'],
        'description' => ['uses' => 'channel.description'],
        'image' => ['uses' => 'channel.image.url'],
        'news' => ['uses' => 'channel.item[link,title,description,pubDate]'],
        ]);
           
        $filename = sprintf('files%s.log',time(),rand(0,10000));
        Storage::disk('local')->put($filename, $link);
            // Storage::disk('local')->append('file.log',date('c'). ' ' . $link);
            // echo date('c') . '' . $link;
          
    }
    
}
