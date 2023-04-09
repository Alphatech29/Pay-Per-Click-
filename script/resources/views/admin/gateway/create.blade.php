@extends('layouts.backend.app')

@section('title','Create New')

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>'Payment Gateway','prev'=> route('admin.gateway.index')])
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/dropzone.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{ __('Create New Payment Gateway') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.gateway.store') }}" class="ajaxform_with_reset">
                @csrf
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Name') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                    </div>
                    <div class="row  mb-4">
                    <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Logo') }}</label>
                       <div class="col-sm-12 col-md-7">
                          {{mediasection()}}
                       </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Currency Rate') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" step="any" class="form-control" name="rate" value="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Currency Name') }}</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control" name="currency_name" value="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Charge') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" step="any" class="form-control" name="charge" value="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Status') }}</label>
                        <div class="col-sm-12 col-md-7">

                           <select class="form-control selectric" name="status">
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Deactive') }}</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Accept Attachment') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="image_accept">
                                <option value="1">{{ __('Yes') }}</option>
                                <option value="0">{{ __('No') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Minimum Deposit Amount') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" step="any" class="form-control" name="min_amount" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Maximum Deposit Amount') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" step="any" class="form-control" name="max_amount" required>
                        </div>
                    </div>
                     <div class="form-group row mb-4">
                        <label
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Payment Instruction') }}</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control" name="instruction" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary basicbtn">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{ mediasingle() }}
@endsection

@push('script')
<script src="{{ asset('admin/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('admin/plugins/dropzone/components-multiple-upload.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>
@endpush

