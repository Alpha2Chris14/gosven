@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Users</h4>
                  <p class="card-description">
                    This Table Contains All Pending Request
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
                      @if($user->verify['status'] == 1)
                          <tr>
                          <td class="py-1">
                            <img src="/images/uploads/avatars/{{ $user->avatar }}" alt="{{ $user->name }}"/>
                          </td>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ date("F jS, Y", strtotime($user->created_at)) }}
                          </td>

                          <td>
                            <label class="badge badge-danger">Pending</label>
                          </td>
                          <td>
                          <a class ="btn btn-sm btn-outline-success" href="{{ route('user.show',$user->id) }}">
                            View
                          </a>
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