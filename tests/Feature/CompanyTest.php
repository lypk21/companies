<?php

namespace Tests\Feature;

use App\Models\Company;
use Database\Factories\CompanyFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_companies_list_url()
    {
        $response = $this->get('/admin/company');
        $response->assertStatus(200);
    }
    public function test_a_user_can_read_all_the_companies() {
        $company =  Company::factory(1)->create();;
        $response = $this->get('/admin/company');
        $response->assertSee($company->name);
    }
}
