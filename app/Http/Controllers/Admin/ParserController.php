<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(){
        $xml = XmlParser::load('http://www.itar-tass.com/rss/all.xml');
        $data = $xml->parse([
        'title' => ['uses' => 'channel.title'],
        'description' => ['uses' => 'channel.description'],
        'image' => ['uses' => 'channel.image.url'],
        'news' => ['uses' => 'channel.item[title,description,pubDate]'],
        ]);
      
        dump($data['news']);

        
    }
}
