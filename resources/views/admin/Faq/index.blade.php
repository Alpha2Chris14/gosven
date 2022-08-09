@extends('layouts.adminlayout')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @include('partials._messages')
                  <h4 class="card-title">All Faq</h4>
                  <p class="card-description">
                    <a class="btn btn-outline-primary" href="{{ route('faq.create') }}">Create New Faq</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Question</th>
                          <th>Answer</th>
                          <th>Created</th>
                          <th>Updated</th>
                          <th></th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($faqs as $faq)
                        <tr>
                          <td>{{ $faq->title }}</td>
                          <td>{{ $faq->description }}</td>
                          <td>{{ $faq->created_at }}</td>
                          <td>{{ date("F jS, Y", strtotime($faq->updated_at)) }}</td>
                          <td>
                            <td>
                            
                                <a href="{{ route('faq.edit',$faq->id) }}"type="button" class="btn btn-sm btn-dark btn-icon-text" style="color:white">
                                  Edit
                                  <i class="ti-file btn-icon-append"></i>                          
                                </a>
                            </td>
                            <td>
                                <form action ="{{Route('faq.destroy',$faq->id)}}" method="POST" >
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