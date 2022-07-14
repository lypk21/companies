@extends('layouts.admin')

@section('content')
      <div class="row">
          <h3>Company List</h3>
          @include('layouts.message')

          <div class="col-12">
              <table class="table table-hover">
                  <thead>
                  <tr>
                      <td>id</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>Logo</td>
                      <td>Website</td>
                      <td>Actions</td>
                  </tr>
                  </thead>
                  <tboday>
                      @foreach($companies as $company)
                      <tr>
                          <td>{{$company->id}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$company->email}}</td>
                          <td>{!! renderImage($company->logo) !!}</td>
                          <td><a href="{{$company->website}}" target="_blank">{{$company->website}} </a> </td>
                          <td>
                              <a href="{{url('admin/company/'.$company->id.'/edit')}}" class="btn btn-primary">Edit</a>
                              <button class="btn btn-danger">Delete</button>
                          </td>
                      </tr>
                      @endforeach
                  </tboday>
              </table>
          </div>
      </div>
@endsection
