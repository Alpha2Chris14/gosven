@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Details</h4>
                  <p class="card-description">
                    Order Placed By {{ $p->firstName }} {{ $p->lastName }} <br>
                    Ref ID: " {{ $p->buyer_name }} "
                  </p>

                    <p><i class=" ti ti-user"></i> Product Name:  <strong> {{ $p->name }}</strong></p> 
                    <p><i class=" ti ti-mobile"></i> Phone Number:    <strong> {{ $p->phone }}</strong></p>
                    <p><i class=" ti ti-location-pin"></i> Address:<strong> {{ $p->address }}</strong></p>
                    <p><i class=" ti ti-home"></i> State:<strong> {{ $p->state }}</strong></p>
                    <p><i class=" ti ti-map"></i> Local Government Area(lga):<strong> {{ $p->lga }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Price:<strong> &#8358;{{ number_format($p->price) }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Quantity:<strong> {{ $p->quantity }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Ordered By:<strong>{{ $p->firstName }} {{ $p->lastName }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Trader:<strong> {{ $user->name }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Total:<strong> &#8358;{{ number_format($p->price * $p->quantity)}}</strong></p>
                     
                     <br>
                     <div class="row">
                     <div class="col-md-2">
                     <form method = "post" action="{{route('admin.online.approve',$p->id)}}">
                        {{ csrf_field() }}
                        <button class="btn btn-inverse-success"><i class="ti-face-smile"></i> Approve</button>
                     </form>
                     </div>

                     <div class="col-md-2"> 
                     <form method = "post" action="{{route('admin.online.decline',$p->id)}}">
                        {{ csrf_field() }}
                        <button class="btn btn-inverse-danger" style="padding-right:35px;"><i class="ti-face-sad"></i>Deline</button>
                     </form>
                     </div>

                     </div>
                </div>
                </div>  
            </div>
        
        </div>
    </div>
@endsection