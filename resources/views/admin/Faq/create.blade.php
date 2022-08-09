@extends('layouts.adminlayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Create New Faq</h2>
                  
                  <form action="{{ route('faq.store') }}" method="post" class="forms-sample">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Question</label>
                      <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="What's On Your Mind???">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Answer</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>

@endsection