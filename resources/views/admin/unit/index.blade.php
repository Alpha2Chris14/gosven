@extends('layouts.adminlayout')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @include('partials._messages')
                  <h4 class="card-title">All Unit</h4>
                  <p class="card-description">
                    <a class="btn btn-outline-primary" href="{{ route('unit.create') }}">Create New Unit</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Created</th>
                          <th>Updated</th>
                          <th></th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($units as $cat)
                        <tr>
                          <td>{{ $cat->name }}</td>
                          <td>{{ $cat->created_at }}</td>
                          <td>{{ date("F jS, Y", strtotime($cat->updated_at)) }}</td>
                          <td>
                            <td>
                            
                                <a href="{{ route('unit.edit',$cat->id) }}"type="button" class="btn btn-sm btn-dark btn-icon-text" style="color:white">
                                  Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                                </a>
                            </td>
                            <td>
                                <form action ="{{Route('unit.destroy',$cat->id)}}" method="POST" >
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