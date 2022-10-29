<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use  App\Jobs\NewsParsing;

class ParserController extends Controller
{
    public function index(){
        $start = date('c');
        $rssLinks =[
            'https://news.rambler.ru/rss/holiday/',
            'https://news.rambler.ru/rss/technology/',
            'https://news.rambler.ru/rss/gifts/',
            'https://news.rambler.ru/rss/world/',
            'https://news.rambler.ru/rss/moscow_city/',
            'https://news.rambler.ru/rss/politics/',
            'https://news.rambler.ru/rss/community/',
            'https://news.rambler.ru/rss/incidents/',
            'https://news.rambler.ru/rss/tech/',
            'https://news.rambler.ru/rss/starlife/',
            'https://news.rambler.ru/rss/army/',
        ];
        foreach($rssLinks as $link){
            NewsParsing::dispatch($link);
          
        }
        
        return $start . ' ' . date('c') ;
    }
}
