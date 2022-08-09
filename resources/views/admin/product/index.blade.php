@extends('layouts.adminlayout')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @include('partials._messages')
                  <h3>All Product</h3>
                  <h6 class="card-title">Views: {{$count->reads}}</h6>
                  <p class="card-description">
                    <a class="btn btn-outline-primary" href="{{ route('products.create') }}">Create New Product</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>previous</th>
                          <th>Category</th>
                          <th>Unit</th>
                          <th>Image</th>
                          <th>Video</th>
                          <th>Quantity</th>
                          <th>Description</th>
                          <th>Uploaded By</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Updated</th>
                          <th></th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($product as $product)
                        <tr>
                          <td>{{ $product->name }}</td>
                          <td>&#8358; {{ number_format($product->price) }}</td>
                          <td>&#8358; {{ number_format($product->previous) }}</td>
                          <td>{{ $product->category }}</td>
                          <td>{{ $product->weight }} {{ $product->unit }}</td>
                          <td><a href="/products/images/{{$product->image}}" >{{ $product->name }} Image</a></td>
                          <td><a href="/storage/products/video/{{$product->featured_video}}">{{ $product->name }} Video</a></td>
                          <td>{{ $product->quantity }}</td>
                          <td>{{ $product->description }}</td>
                          <td><a href="{{ route('user.show',$product->userInfo) }}" >{{ $product->farmName }}</a></td>
                          @if($product->status == 1)
                          <td>
                            <label class="badge badge-success">Approved</label>
                          </td>
                          @else
                          <td>
                            <label class="badge badge-primary">Pending</label>
                          </td>
                          @endif
                          <td>{{ date("F jS, Y", strtotime($product->created_at)) }}</td>
                          <td>{{ date("F jS, Y", strtotime($product->updated_at)) }}</td>
                          <td>
                            <td>
                            
                                <a href="{{Route('products.edit',$product->id)}}"type="button" class="btn btn-sm btn-dark btn-icon-text" style="color:white">
                                  Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                                </a>
                            </td>
                            <td>
                                <form action ="{{Route('products.destroy',$product->id)}}" method="POST" >
                                          @csrf
                                          {{method_field('DELETE')}}
                                      <button class="btn btn-sm btn-danger btn-icon-text item" title="Delete" onClick="return confirm('Are You Sure?')">
                                        <i class="ti-alert btn-icon-prepend"></i>                                                    
                                        Delete
                                      </button>
                                </form>

                                
                            </td>
                            <td>
                              <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Action</button>
                                  <div class="dropdown-menu">
                                  <form method="POST"  action="{{route('admin.product.approve',$product->id)}}">
                                   @csrf   
                                    <button class="dropdown-item">Approve</button>
                                </form>
                                
                                <form method="POST"  action="{{route('admin.product.decline',$product->id)}}">
                                   @csrf   
                                      <button class="dropdown-item">Deline</button>
                                </form>
                                </div>                          
                              </div>
                            </td>
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