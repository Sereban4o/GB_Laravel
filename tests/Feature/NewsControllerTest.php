<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function test_News_List_Success(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertSeeText('Список новостей');
        $response->assertStatus(200);
    }

    public function test_News_Store_Success(): void
    {
        $postData = [
            'title' => 'title',
            'author' => 'Alex',
            'status' => 'draft',
            'description' => '1111',
        ];
        $response = $this->post(route('admin.news.store'), $postData);

        $response->assertStatus(302);

    }
}
