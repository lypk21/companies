@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="mb-5">Create Employee</h3>
            @include('layouts.message')
            <form action="{{url('admin/employee')}}"  method="post">
                @csrf
                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label>Last Name * </label>
                    <input type="text" class="form-control"  name="last_name" value="{{old('last_name')}}" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label>Company *</label>
                    <select required class="form-control selectpicker"  name="company_id">
                        <option >please select ...</option>
                        @foreach($companies as $company)
                            <option {{ old('company_id') == $company->id ? 'selected' : ''}} value="{{$company->id}}">{{$company->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control"  name="email" value="{{old('email')}}" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control"  name="phone" value="{{old('phone')}}" placeholder="Enter Phone">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
