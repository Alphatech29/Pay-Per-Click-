@extends('layouts.backend.app')

@section('title', __('Edit User'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=> __('Edit User'), 'prev'=> url()->previous()])
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/select2.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-5">
            <strong>{{ __('Description') }}</strong>
            <p>{{ __('Update your customer details and necessary information from here') }}</p>
        </div>
        <div class="col-lg-7">
            <form class="ajaxform_with_reload" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"
                                            class="font-weight-bold required">{{ __('Full Name') }}</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $user->name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold required">{{ __('Email') }}</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                            value="{{ $user->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username"
                                            class="font-weight-bold required">{{ __('Username') }}</label>
                                    <input class="form-control" type="text" name="username" id="username"
                                            value="{{ $user->username }}" required>
                                    <div id="message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="font-weight-bold required">{{ __('Phone') }}</label>
                                    <input class="form-control" type="tel" name="phone" id="phone"
                                            value="{{ $user->phone }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="font-weight-bold required">{{ __('Password') }}</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="balance"
                                            class="font-weight-bold required">{{ __('Balance') }}</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="balance" id="balance"
                                                value="{{ $user->balance }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ defaultcurrency('currency') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address" class="font-weight-bold">{{ __('Address') }}</label>
                                    <textarea class="form-control" type="tel" name="address"
                                                id="address">{{ $meta->value['address'] ?? null }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city" class="font-weight-bold">{{ __('City') }}</label>
                                    <input class="form-control" type="text" name="city" id="city"
                                            value="{{ $meta->value['city'] ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="state" class="font-weight-bold">{{ __('State') }}</label>
                                    <input class="form-control" type="text" name="state" id="state"
                                            value="{{ $meta->value['state'] ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="zip" class="font-weight-bold">{{ __('Zip / Postal') }}</label>
                                    <input class="form-control" type="text" name="zip" id="zip"
                                            value="{{ $meta->value['zip'] ?? null }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country" class="font-weight-bold">{{ __('Country') }}</label>
                                    <select class="form-control" name="country" id="country" data-control="select2" data-placeholder="{{ __('Select Country') }}">
                                        <option></option>
                                        @foreach(\App\Lib\Data::getCountriesList() as $country)
                                            <option value="{{ $country['name'] }}" @selected($country['name'] == ($meta->value['country'] ?? null) )>{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group col custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status"
                                            name="status" @checked($user->status)>
                                    <label class="custom-control-label" for="status">{{ __('Status') }}</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group col custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="email_verification"
                                            name="email_verification" @checked($user->email_verified_at)>
                                    <label class="custom-control-label"
                                            for="email_verification">{{ __('Email Verification') }}</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group col custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sms_verification"
                                            name="sms_verification" @checked($user->phone_verified_at)>
                                    <label class="custom-control-label"
                                            for="sms_verification">{{ __('SMS Verification') }}</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3 basicbtn float-right">
                            <i class="fas fa-save"></i>
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
@endpush
