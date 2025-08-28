<?php

namespace Tests\Feature;

use App\Models\MasterForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MasterFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_master_forms_index_page_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/master-forms');

        $response->assertStatus(200);
        $response->assertSee('Master Form');
    }

    public function test_master_form_can_be_created(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/master-forms', [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '1234567890',
            'gender' => '1',
            'single_selection' => '1',
            'multi_selection' => ['1', '2'],
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/master-forms');
        $this->assertDatabaseHas('master_forms', [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function test_master_form_requires_authentication(): void
    {
        $response = $this->get('/master-forms');

        $response->assertRedirect('/login');
    }

    public function test_create_form_contains_ckeditor(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/master-forms/create');

        $response->assertStatus(200);
        $response->assertSee('CKEditor');
        $response->assertSee('text_editor');
    }

    public function test_edit_form_contains_ckeditor(): void
    {
        $user = User::factory()->create();
        $masterForm = MasterForm::factory()->create();

        $response = $this->actingAs($user)->get("/master-forms/{$masterForm->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('CKEditor');
        $response->assertSee('text_editor');
    }
}
