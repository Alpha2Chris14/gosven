@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Create New Product</h2>
                  
                  <form class="forms-sample" action= "{{ route('products.update',$product->id) }}" enctype="multipart/form-data" method="post">
                  {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputEmail3" value="{{$product->price}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail3">Previous Price</label>
                      <input type="number" name="previous" class="form-control" id="exampleInputEmail3" value="{{$product->previous}}" placeholder="Enter Previous Price">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender" name ="category">
                          @foreach ($categorys as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>  
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Weight Unit</label>
                        <select class="form-control" id="exampleSelectGender" name ="unit">
                          @foreach ($units as $unit)
                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>  
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">Weight</label>
                      <input type="number" name="weight" class="form-control" id="exampleInputEmail3" value="{{$product->weight}}" placeholder="Enter Weight">
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Upload Product Image</label>
                      <input type="file" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <!--<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">-->
                        <input type="file" name="image" class="form-control file-upload-info"  value="{{$product->image}}">
                        
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Upload Product Video</label>
                      <input type="file" name="featured_video" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="file" name="featured_video" class="form-control file-upload-info" value="{{$product->featured_video}}" placeholder="Upload Video">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">Quantity</label>
                      <input type="number" class="form-control" id="exampleInputCity1" value="{{$product->quantity}}" placeholder="Enter Quantity" name="quantity">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{$product->description}}</textarea>
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