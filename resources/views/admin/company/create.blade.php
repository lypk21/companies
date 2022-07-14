@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="mb-5">Create Company</h3>
            @include('layouts.message')
            <form action="{{url('admin/company')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Company Name *</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                    <label>Company Email </label>
                    <input type="email" class="form-control"  name="email" value="{{old('email')}}" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label>Company Logo </label>
                    <input id="logo" class="form-control" type="file"
                           name="logo" value="{{old('logo')}}">

                </div>

                <div class="form-group">
                    <label>Company Website </label>
                    <input type="text" class="form-control"  name="website" value="{{old('website')}}" placeholder="Enter website">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
