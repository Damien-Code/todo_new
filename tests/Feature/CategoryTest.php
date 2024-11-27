<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Todo;
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

    public function test_can_update_category(): void
    {
        $category = Category::factory()->create();
        $data = [
            'category' => 'test_category',
            'color' => '#ffff00'
        ];
        //update categories
        $category->fill($data);
        $category->save();

        //assert
        $this->assertEquals($data['category'], $category->category);
        $this->assertEquals($data['color'], $category->color);
    }

    public function test_can_delete_category(): void
    {
        $category = Category::factory()->create();
        $category->delete();
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_can_create_category_with_todo()
    {
        $category = Category::factory()
            ->has(Todo::factory(2))
            ->create();
        $data = [
            'category' => 'test_category',
            'color' => '#ffffff'
        ];
        $category->fill($data);
        $category->save();
        $this->assertEquals($data['category'], $category->category);
        $this->assertEquals($data['color'], $category->color);
        $this->assertCount(2, Todo::where('category_id', $category->id)->get());
    }
}
