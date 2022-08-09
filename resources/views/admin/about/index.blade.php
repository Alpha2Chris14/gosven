@extends('layouts.adminlayout')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @include('partials._messages')
                  <h4 class="card-title">About Us</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Description</th>
                          <th>Created</th>
                          <th>Updated</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($abouts as $about)
                        @if($about->id == 1)
                        <tr>
                          <td>{{ $about->description }}</td>
                          <td>{{ $about->created_at }}</td>
                          <td>{{ $about->updated_at }}</td>
                          <td>
                            <td>
                            
                                <a href="{{ route('about.edit',$about->id) }}"type="button" class="btn btn-sm btn-dark btn-icon-text" style="color:white">
                                  Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                                </a>
                            </td>
                            <td>
                                <form action ="{{Route('about.destroy',$about->id)}}" method="POST" >
                                      @csrf
                                      {{method_field('DELETE')}}
                                      <button class="btn btn-sm btn-danger btn-icon-text item" title="Delete">
                                        <i class="ti-alert btn-icon-prepend"></i>                                                    
                                        Delete
                                      </button>
                                </form>

                                
                            </td>
                          </td>
                        </tr>
                        @endif
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