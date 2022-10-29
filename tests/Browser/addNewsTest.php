<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class addNewsTest extends DuskTestCase
{
    /**
     *
     * @throws /Throwable
     */
    public function form_validation_test1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/add_news')
                    ->type('title', 'test title')
                    ->type('description', 'test description')
                    ->type('detailed_discripion', 'test detailed_discripion')
                    ->press('Добавить')
                    ->assertPathIs('/news');
        });
    }
    /**
     *
     * @throws /Throwable
     */
    public function form_validation_test2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/add_news')
            ->type('title','')
            ->type('description','')
            ->type('detailed_discripion', 'test detailed_discripion')
            ->press('Добавить')
            ->assertSee('Поле Заголовок новости обязательно для заполнения.')
            ->assertSee('Поле Описание новости обязательно для заполнения.')
            ->assertPathIs('/add_news');
        });
    }
}
