<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function testPageNotFound()
    {
        $response = $this->get('/news/word');

        $response->assertStatus(404);
        $response->assertSeeText('Страница не найдена. Код 404');
    }

    /** @test */
    public function testPageAdmin(){
        $response = $this->post('/admin');

        $response->assertStatus(200);
        $response->assertSeeText('Добро пожаловать Admin!');
    }
}
