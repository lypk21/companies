@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="mb-5">Edit Company</h3>
            @include('layouts.message')
            <form action="{{url('admin/company/'.$company->id)}}"  method="post" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <input  type="hidden" name="id" value="{{$company->id}}">

                <div class="form-group">
                    <label>Company Name *</label>
                    <input type="text" class="form-control" name="name" value="{{$company->name}}" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                    <label>Company Email </label>
                    <input type="email" class="form-control"  name="email" value="{{$company->email}}" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <label>Company Logo {!! renderImage($company->logo) !!}</label>
                    <input id="logo" class="form-control" type="file"
                           name="logo">


                </div>

                <div class="form-group">
                    <label>Company Website </label>
                    <input type="text" class="form-control"  name="website" value="{{$company->website}}" placeholder="Enter website">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
