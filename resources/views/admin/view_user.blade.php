@extends('layouts.master')
@section('title','View User')
@section('content')
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> All Users</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <form method="post" action="{{url('multipleusersdelete')}}">
		{{ csrf_field() }}
		<br>
		<input class="btn btn-success" type="submit" name="submit" value="Delete All Users"/>
		<br><br>
                  <table class="table" id="userTable">
                    <thead class=" text-primary">
                      <th>
                      User ID
                      </th>
                      <th>
                      User Name
                      </th>
                      <th>
                      User Number 
                      </th>
                      <th>
                      User Address
                      </th>
                      <th>
                      User Email 
                      </th>
                      <th>
                      Created At 
                      </th>
                      <th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th>
                      <th class="text-right">
                        Actions
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>
                        {{ $user->id }}
                        </td>
                        <td>
                        {{ $user->user_name }}
                        </td>
                        <td>
                        {{ $user->user_num }}
                        </td>
                        <td>
                        {{ $user->user_address }}
                        </td>
                        <td>
                        {{ $user->user_email }}
                        </td>
                        <td>
                        {{ $user->created_at }}
                        </td>
                        <td class="text-center"><input name='id[]' type="checkbox" id="checkItem" 
                         value="<?php echo $user->id; ?>"></td>
                         </form>
                        <td class="text-right">
                        <a class="btn btn-sm btn-primary mb-1" href="{{ url('user_edit/'.$user->id) }}">Edit</a>
                        <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
     