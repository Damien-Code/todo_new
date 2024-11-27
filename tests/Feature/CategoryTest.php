<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_category(): void
    {
        //create category
        $category = Category::factory([
            'category' => 'test_category',
            'color' => '#ffffff'
        ])->create();

        $data = [
            'category' => 'test_category',
            'color' => '#ffffff'
        ];

        //assert
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($data['category'], $category->category);
        $this->assertEquals($data['color'], $category->color);
    }
}
