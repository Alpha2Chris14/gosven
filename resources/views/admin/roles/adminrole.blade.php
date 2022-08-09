@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Create New Admin</h2>
                  
                  <form class="forms-sample" action="{{route('storeroles')}}"  enctype="multipart/form-data" method="post">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter Username">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputName1" placeholder="Enter Email">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="Enter Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>

@endsection