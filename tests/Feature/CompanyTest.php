<?php

namespace Tests\Feature;

use App\Http\Utiles\Constants;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function getAdminUser() {
        return User::where('role', Constants::USER_ROLE_ADMINISTRATOR)->first();
    }

    public function test_index_authentication()
    {
        $this->actingAs($this->getAdminUser());
        $company = Company::first();
        $this->get('/admin/company')->assertStatus(200);
        $this->get('/admin/company/create')->assertStatus(200);
        $this->get('/admin/company/'.$company->id.'/edit')->assertStatus(200);

    }


    public function test_admin_visit_companies_list()
    {
        $response = $this->actingAs($this->getAdminUser())->get('/admin/company');
        $response->assertStatus(200)
                ->assertSee('Company List');
    }

    public function test_admin_create_companies() {

        $this->actingAs($this->getAdminUser());

        $this->get('/admin/company/create')
            ->assertStatus(200)
            ->assertViewIs('admin.company.create')
            ->assertSee("Create Company");

        $this->post('/admin/company/create',
            [
                'name' => Str::random(10),
                '_token' => csrf_token(),
                "email" => null,
                "website" => null
            ]
        )->assertSee("create company successfully");
    }

    public function  test_admin_edit_companies() {
        $this->actingAs($this->getAdminUser());
        $company = Company::first();

        $this->get('/admin/company/'.$company->id.'/edit')
            ->assertStatus(200)
            ->assertViewIs('admin.company.edit')
            ->assertSee("Edit Company");

        $this->put('/admin/company/'.$company->id,
            [
                'name' => Str::random(10),
                '_token' => csrf_token(),
            ]
        )->assertRedirect('/admin/company')
        ->assertSessionHas('success');

    }

}
