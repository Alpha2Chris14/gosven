@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Create New Product</h2>
                  
                  <form class="forms-sample" action= "{{ route('mail',$user->id) }}" enctype="multipart/form-data" method="post">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Send To</label>
                      <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputName1" placeholder="Enter Product Name">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Send To</label>
                      <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleInputName1" placeholder="Enter Product Name">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Message</label>
                      <textarea name="message" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Send</button>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>

@endsection