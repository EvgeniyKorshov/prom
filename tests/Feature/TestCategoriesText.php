<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestCategoriesText extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function TestCategoriesText()
    {
        $response = $this->get('/categories');
        $response->assertSeetext('Спорт');
        $response->assertSeetext('Экономика');
        $response->assertSeetext('Политика');
        $response->assertSeetext('Авто');
        $response->assertSeetext('Наука');
        $response->assertStatus(200);

    }
}
