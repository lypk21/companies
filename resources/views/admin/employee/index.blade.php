@extends('layouts.admin')

@section('content')
      <div class="row">
          <div class="col-sm-6">
              <h3>Employee List</h3>
          </div>
          <div class="col-sm-6">
              <a href="{{url('admin/employee/create')}}" class="btn btn-primary">
                  Create Employee
              </a>
          </div>

          @include('layouts.message')

          <div class="col-12">
              <table class="table table-hover">
                  <thead>
                  <tr>
                      <td>id</td>
                      <td>Company</td>
                      <td>Full Name</td>
                      <td>Email</td>
                      <td>Phone</td>
                      <td>Actions</td>
                  </tr>
                  </thead>
                  <tboday>
                      @foreach($employees as $employee)
                      <tr>
                          <td>{{$employee->id}}</td>
                          <td>{{$employee->company->name}}</td>
                          <td>{{$employee->fullName}}</td>
                          <td>{{$employee->email}}</td>
                          <td><a href="tel: {{$employee->phone}}">{{$employee->phone}} </a> </td>
                          <td style="display: flex;">
                              <a href="{{url('admin/employee/'.$employee->id.'/edit')}}" class="btn btn-primary" style="margin-right: 10px">Edit</a>
                              <form action="{{url('admin/employee/'.$employee->id)}}"  method="post">
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
                    {{ $employees ? $employees->links() : ""}}
                </div>
          </div>
      </div>
@endsection
