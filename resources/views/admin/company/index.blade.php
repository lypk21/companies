@extends('layouts.admin')

@section('content')
      <div class="row">
          <div class="col-sm-6">
              <h3>Company List</h3>
          </div>
          <div class="col-sm-6">
              <a href="{{url('admin/company/create')}}" class="btn btn-primary">
                  Create Company
              </a>
          </div>
          @include('layouts.message')

          <div class="col-sm-12">
              <table class="table table-hover">
                  <thead>
                  <tr>
                      <td>id</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>Logo</td>
                      <td >Website</td>
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
                          <td style="display: flex;">
                              <a href="{{url('admin/company/'.$company->id.'/edit')}}" class="btn btn-primary" style="margin-right: 10px">Edit</a>
                              <form action="{{url('admin/company/'.$company->id)}}"  method="post">
                                  @csrf
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tboday>
              </table>
                <div class="text-center">
                    {{ $companies ? $companies->links() : ""}}

                </div>
          </div>
      </div>
@endsection
