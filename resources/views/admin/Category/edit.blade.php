@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Edit Category</h2>
                  
                  <form class="forms-sample" action="{{ route('category.update',$category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form-group">
                      <label for="exampleInputName1">Category Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $category->name }}">
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