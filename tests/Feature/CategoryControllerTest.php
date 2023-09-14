<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function test_News_List_Success(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertSeeText('Список категорий');
        $response->assertStatus(200);
    }

    public function test_News_Store_Success(): void
    {
        $categoryData = [
            'title' => 'title',
        ];
        $response = $this->post(route('admin.categories.store'), $categoryData);

        $response->assertStatus(302);

    }
}
