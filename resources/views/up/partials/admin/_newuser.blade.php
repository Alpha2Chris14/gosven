@if (Session::has('success'))

<a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>

@endif

@if (count($errors) > 0)

<div class="alert alert-danger" role="alert">
	
	<strong>Errors:</strong>
	@foreach ($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach

</div>

@endif