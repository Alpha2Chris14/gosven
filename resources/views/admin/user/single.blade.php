@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $user->name }} Verification Info</h4>
                  <p class="card-description">
                    Verify This User
                  </p>

                    <p><i class=" ti ti-user"></i> Register Name:  <strong>{{ $verify->name }}</strong></p> 
                    <p><i class=" ti ti-mobile"></i> Phone Number:    <strong>{{ $verify->phone }}</strong></p>
                    <p><i class=" ti ti-location-pin"></i> Address:<strong>{{ $verify->address }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Nationality:<strong>{{ $verify->nationality }}</strong></p>
                    <p><i class=" ti ti-home"></i> State:<strong>{{ $verify->state }}</strong></p>
                    <p><i class=" ti ti-map"></i> Local Government Area(lga):<strong>{{ $verify->lga }}</strong></p>
                    <p><i class=" ti ti-map-alt"></i> Type Of Goods:<strong>{{ $verify->tog }}</strong></p>
                     
                     <br>
                     <div class="row">
                     <div class="col-md-2">
                     <form action="{{ route('approve.update',$user->id) }}" method = "post">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <button class="btn btn-inverse-success"><i class="ti-face-smile"></i> Approve</button>
                     </form>
                     </div>

                     <div class="col-md-2"> 
                     <form action="{{ route('decline.update',$user->id) }}" method = "post">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
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