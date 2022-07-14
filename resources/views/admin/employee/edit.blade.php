@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="mb-5">Edit Eemployee</h3>
            @include('layouts.message')
            <form action="{{url('admin/employee/'.$employee->id)}}"  method="post">
                @csrf
                <input name="_method" type="hidden" value="PUT">

                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}" placeholder="Enter Last name">
                </div>

                <div class="form-group">
                    <label>Company *</label>
                    <select required class="form-control"  name="company_id">
                        <option >please select ...</option>
                        @foreach($companies as $company)
                            <option {{ $employee->company_id == $company->id ? 'selected' : ''}} value="{{$company->id}}">{{$company->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control"  name="email" value="{{$company->email}}" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control"  name="phone" value="{{$company->phone}}" placeholder="Enter Phone">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
