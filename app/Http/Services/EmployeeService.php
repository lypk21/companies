<?php


namespace App\Http\Services;


use App\Models\Employee;
use Illuminate\Database\QueryException;

class EmployeeService
{
    public function listEmployees() {
        try {
            return Employee::priority()->with('company')->paginate(10);
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function createEmployee($request) {
        try {
           return  Employee::create($request->except('_token'));
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function updateEmployee($request, $employee) {
        try {
            $employee->update($request->except('_token'));
            return $employee;
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function deleteEmployee($employee) {
        try {
            $employee->delete();
        } catch (\QueryException $e) {
            throw  $e;
        }
    }
}
