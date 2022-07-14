<?php


namespace App\Http\Services;


use App\Http\Utiles\Constants;
use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class CompanyService
{
    public function listCompanies() {
        try {
            return Company::priority()->paginate(10);
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function createCompany($request) {
        try {
            $companyDate = $request->except('logo');
            $companyDate['logo'] = $this->handleUploadedImage($request->file('logo'));
            $company = Company::create($companyDate);
            return $company;
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function sendNotificationEmail($company) {
        try {
            Mail::send('mails.company_notify', compact('company'), function ($message) use ($company) {
                $message->subject('Company Create Successfully'.date('Y-m-d h:i'));
                $message->to($company->email);
            });
        } catch (\Exception $exception) {
            Log::channel('mail')->error($exception->getMessage());
        }
    }

    public function updateCompany($request, $company) {
        try {
            $company->update($request->except('logo'));
            $img_path = $this->handleUploadedImage($request->file('logo'));
            if($img_path) {
                $company->logo = $img_path;
                $company->save();
            }
            return $company;
        } catch (QueryException $e) {
            throw $e;
        }
    }

    private function handleUploadedImage($file) {
        if(!is_null($file) && $file->isValid()) {
            return $file->store('logo');
        }
        return null;
    }

    public function deleteCompany($company) {
        try {
            $company->delete();
        } catch (\Exception $e) {
            throw  $e;
        }
    }

    public function listAllCompanies() {
        try {
            return Company::priority()->get();
        } catch (QueryException $e) {
            throw $e;
        }
    }
}
