<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use  App\Services\XMLParserService;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   private  $link;

    public function __construct($link)
    {
       $this->link = $link;
    }

    public function handle(XMLParserService $parserService)
    {
        $parserService->saveNews($this->link);
    }
   
}
