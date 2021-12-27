@extends('layouts.master')
@section('title','Edit User')
@section('content')
      <div class="content">
        <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                <h5 class="card-title">Edit User</h5>
                </div>
                <div class="col-md-4">
                @if(Session::has('message'))
                  <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show w-100 ml-auto alert-custom"
                      role="alert">
                      {{ Session::get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  @endif
                </div>
              </div>
              <div class="card-body">
                <form action="{{ url('update_user/'.$users->id) }}" method="POST">
                @csrf
                    @method('PUT')
                  <div class="row">
                    <div class="col-md-6 ">
                      <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" class="form-control" value="{{$users->user_name}}" placeholder="User Name">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">User Number</label>
                        <input type="number" name="user_num" class="form-control" value="{{$users->user_num}}" placeholder="User Number">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>User Address</label>
                        <input type="text" name="user_address" class="form-control" value="{{$users->user_address}}" placeholder="User Address">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>User Email</label>
                        <input type="email" name="user_email" class="form-control" value="{{$users->user_email}}" placeholder="User Email" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="User Password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Edit User</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection