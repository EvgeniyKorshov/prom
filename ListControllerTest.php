<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListController extends WebTestCase
{
    public function testIndex(){
        $client = static::createClient();
        $client->request('GET','/list');
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleSame('Hello listController!');
        $this->assertPageTitleContains('Hello listController!');
        $this->assertSelectorExists('.container');
        $this->assertSelectorTextContains('div.container','You need to login to see the list 😜😜 >>');
    }
}