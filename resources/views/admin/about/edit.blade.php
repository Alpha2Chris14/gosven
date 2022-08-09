@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Edit About Page</h2>
                  
                  <form class="forms-sample" action= "{{ route('about.update',$about->id) }}" enctype="multipart/form-data" method="post">
                  {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form-group">
                      <label for="exampleTextarea1">Answer</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{ $about->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>

@endsection