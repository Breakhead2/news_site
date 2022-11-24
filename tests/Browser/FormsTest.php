<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class FormsTest extends DuskTestCase
{

    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddCategoryWrong()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                    ->type('name', '123456')
                    ->press('Добавить')
                    ->assertSee('Поле Имя может содержать только буквы.')
                    ->assertPathIs('/admin/category/create');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('name', 'Политика')
                ->press('Добавить')
                ->type('name', 'Политика')
                ->press('Добавить')
                ->assertSee('Такое значение поля Имя уже существует.')
                ->screenshot('test_1')
                ->assertPathIs('/admin/category/create');
        });
    }

    public function testAddCategoryValid()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category/create')
                ->type('name', 'Автомобили')
                ->press('Добавить')
                ->assertPathIs('/admin/category/create')
                ->assertSee('Категория успешно добавлена');
        });
    }


    public function testAddNewsWrong()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', '123')
                ->press('Опубликовать')
                ->assertSee('Количество символов в поле Заголовок должно быть не меньше 15.')
                ->assertPathIs('/admin/news/create');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('desc', '123')
                ->press('Опубликовать')
                ->assertSee('Количество символов в поле Краткое описание должно быть не меньше 30.')
                ->assertPathIs('/admin/news/create');
        });
    }

    public function testAddNewsValid()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'Заголовок')
                ->type('category_id', '2')
                ->type('desc', 'Заголовок заголовок Заголовок заголовок Заголовок заголовок')
                ->type('inform', 'Заголовок заголовок Заголовок заголовок Заголовок заголовок Заголовок заголовок')
                ->press('Опубликовать')
                ->assertSee('Новость успешно добавлена')
                ->assertPathIs('/admin/news/create');
        });
    }

}
