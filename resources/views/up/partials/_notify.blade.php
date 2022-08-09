@if (Session::has('success'))
<a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
	                <strong>Success:</strong> {{ Session::get('success')}}
                </p>
                </div>
</a>
@endif

@if (count($errors) > 0)
<a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">

	<strong>Errors:</strong>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach

    </p>
                </div>
</a>
@endif