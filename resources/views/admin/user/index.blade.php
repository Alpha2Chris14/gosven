@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Users</h4>
                  <p class="card-description">
                    This Table Contains All Registered Users
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>
                            Image
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Created At
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                          Action    
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $user)
                      @if($user->name == "Admin")
                      
                      @else
                          <tr>
                          <td class="py-1">
                            <img src="/images/uploads/avatars/{{ $user->avatar }}" alt="{{ $user->name }}"/>
                          </td>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            <a href="{{route('message',$user->id)}}">{{ $user->email }}</a>
                          </td>
                          <td>
                            {{ date("F jS, Y", strtotime($user->created_at)) }}
                          </td>

                          <td>
                            @if($user->verify['status'] == 2 )
                            <label class="badge badge-success">Approved</label>
                            @elseif($user->verify['status'] == 1 )
                            <label class="badge badge-danger">Pending</label>
                            @else
                            <label class="badge badge-primary">Regular</label>
                            @endif
                          </td>
                          <td>
                          @if($user->verify['status'] == 2)
                          <a class ="btn btn-sm btn-outline-success" href="{{ route('user.show',$user->id) }}">
                            View
                          </a>
                          @elseif($user->verify['status'] == 1)
                          <a class ="btn btn-sm btn-outline-success" href="{{ route('user.show',$user->id) }}">
                            View
                          </a>
                          @else
                            Regular User
                          @endif
                          </td>
                        </tr>
                      @endif
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