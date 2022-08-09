@extends('layouts.adminlayout')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @include('partials._messages')
                  <h3>Online Order</h3>
                  <p class="card-description">
                    <a class="btn btn-outline-primary" href="#">Create New Product</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Address</th>
                          <th>Local Government Area</th>
                          <th>State</th>
                          <th>Transaction Id</th>
                          <th> Seller ID</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th>Created</th>
                          <th>status</th>
                          <th></th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $count = 1;?>
                      @foreach($transactions as $p)
                        <tr>
                        <td>{{ $count }}</td>
                          <td>{{ $p->firstName }}</td>
                          <td>{{ $p->lastName }}</td>
                          <td>{{ $p->email }}</td>
                          <td>{{ $p->phone }}</td>
                          <td>{{ $p->address }}</td>
                          <td>{{ $p->lga }}</td>
                          <td>{{ $p->state }}</td>
                          <td><a href="{{route('admin.online.trx',$p->buyer_name)}}">{{ $p->buyer_name }}</a></td>
                          @if($p->seller_name > 0)
                          <td><a href="{{ route('user.show',$p->seller_name ) }}">{{ $p->seller_name }}</a></td>
                          @else
                          <td>Admin</td>
                          @endif
                          <td><a href="/products/images/{{$p->image}}" >{{ $p->name }}</a></td>
                          <td>&#8358; {{ number_format($p->price) }}</td>
                          <td>{{ $p->quantity }}</td>
                          <td>&#8358; {{ number_format($p->quantity * $p->price) }}</td>
                          <td><a href="{{route('admin.online.date',$p->date)}}">{{ date("F jS, Y", strtotime($p->created_at)) }}</a></td>
                          <td>
                            <label class="badge badge-success">Paid</label>
                          </td>
                          <td>
                            <td>
                            
                                <a href="{{route('admin.online.single',$p->id)}}" type="button" class="btn btn-sm btn-dark btn-icon-text" style="color:white">
                                  View
                                  <i class="ti-file btn-icon-append"></i>                          
                                </a>
                            </td>
                            <td>
                            <form action ="{{route('admin.online.destroy',$p->id)}}" method="POST" >
                                          @csrf
                                          {{method_field('DELETE')}}
                                      <button class="btn btn-sm btn-danger btn-icon-text item" title="Delete" onClick="return confirm('Are You Sure?')">
                                        <i class="ti-alert btn-icon-prepend"></i>                                                    
                                        Delete
                                      </button>
                                </form>

                                
                            </td>
                          </td>
                        </tr>
                        <?php $count++; ?>
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