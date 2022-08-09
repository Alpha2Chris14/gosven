@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <!--This Displays The Card-->
            <div class="card">
             <div class="card-body">
                <form action="{{ route('verify.update',$verify->id) }}" method="POST">
                {{ csrf_field() }}
                    {{method_field('PUT')}}
                <!--This Collects The User Address-->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" value = "{{ $verify->name }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                <!--This Collects The User Phone Number-->
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" value = "{{ $verify->phone }}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--This Collects The User Phone Number-->
                        <div class="form-group row">
                            <label for="phone2" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number 2') }}</label>

                            <div class="col-md-6">
                                <input id="phone" value = "{{ $verify->phone2 }}" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ old('phone2') }}" required autocomplete="phone2" autofocus>

                                @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--This Collects The User Address-->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" value = "{{ $verify->address }}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--This Collects The User Address-->
                        <div class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address2') }}</label>

                            <div class="col-md-6">
                                <input id="address2" type="text" value = "{{ $verify->address2 }}" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" required autocomplete="address2" autofocus>

                                @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!--This Collects The User Nationality-->
                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                            <div class="col-md-6">
                                <input id="nationality" type="text" value = "{{ $verify->nationality }}" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality" autofocus>

                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--This Collects The User State-->
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" value = "{{ $verify->state }}" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--This Collects The User Local Government Area-->
                        <div class="form-group row">
                            <label for="lga" class="col-md-4 col-form-label text-md-right">{{ __('L.G.A') }}</label>

                            <div class="col-md-6">
                                <input id="lga" type="text" value = "{{ $verify->lga }}" class="form-control @error('lga') is-invalid @enderror" name="lga" value="{{ old('lga') }}" required autocomplete="lga" autofocus>

                                @error('lga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!--This Collects The User Address-->
                        <div class="form-group row">
                            <label for="tog" class="col-md-4 col-form-label text-md-right">{{ __('Type Of Goods') }}</label>

                            <div class="col-md-6">
                                <select name = "tog[]" value = "{{ $verify->tog }}" multiple data-live-search="true" class="selectpicker form-control @error('tog') is-invalid @enderror" value="{{ old('tog') }}">
                                    @foreach ($categorys as $cat)
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('tog')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        


                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
