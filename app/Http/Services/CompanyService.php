<?php


namespace App\Http\Services;


use App\Http\Utiles\Constants;
use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;

class CompanyService
{
    public function listCompanies() {
        try {
            return Company::latest()->paginate();
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function createCompany($request) {
        try {
            $companyDate = $request->except('logo');
            if($request->has('logo') && $file = $request->file('logo')) {
                if($file->isValid()) {
                    $img_path = $file->store('logo');
                    $companyDate['logo'] = $img_path;
                }
            }
            $company = Company::create($companyDate);
            return $company;
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function updateCompany($request, $company) {
        try {
            $company->update($request->except('logo'));
            if($request->has('logo') && $file = $request->file('logo')) {
                if($file->isValid()) {
                    $img_path = $file->store('logo');
                    $company->logo = $img_path;
                    $company->save();
                }
            }
            return $company;
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function deleteCompany() {

    }
}
