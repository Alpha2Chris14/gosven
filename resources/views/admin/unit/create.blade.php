@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Create New Category</h2>
                  
                  <form class="forms-sample" action="{{ route('unit.store') }}" method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Unit Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter Unit Name">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>

@endsection