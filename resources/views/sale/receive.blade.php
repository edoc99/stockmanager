@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">Add Receiving</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sale.store') }}" onsubmit="add.disabled = true; return true;">
                        @csrf

                        <div class="form-group row">
                            <label for="bill_no" class="col-md-4 col-form-label text-md-right">{{ __('Bill no.') }}</label>

                            <div class="col-md-6">
                                <input id="bill_no" type="text" class="form-control @error('bill_no') is-invalid @enderror" name="bill_no" value="{{ old('bill_no') ?? $bill_no }}" required autocomplete="bill_no" style="text-transform: uppercase">

                                @error('bill_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
						   <label for="customer_id" class="col-md-4 col-form-label text-md-right">Customer Name</label>
						   <div class="col-md-6">
							   <select class="form-control" id="customer_id" name="customer_id" value="{{ old('customer_id') }}" autofocus>
								   <option selected>Choose customer...</option>
									@foreach ($customers as $customer)
		 								<option name="customer_id" <?php echo ($customer['id'] == old('customer_id') ? 'selected' : '' )?> value="{{ $customer['id'] }}">{{ $customer['name'] }}</option>
		 							@endforeach
							   </select>
						   </div>
                        </div>

                        <div class="form-group row">
						   <label for="item_id" class="col-md-4 col-form-label text-md-right">Item Name</label>
						   <div class="col-md-6">
							   <select class="form-control" id="item_id" name="item_id" value="{{ old('item_id') }}">
								   <option selected value="0">Default (No asset)</option>
									@foreach ($items as $item)
		 								<option name="item_id" <?php echo ($item['id'] == old('item_id') ? 'selected' : '' )?> value="{{ $item['id'] }}">{{ $item['name'] }}</option>
		 							@endforeach
							   </select>
						   </div>
                        </div>

                                    <input id="qty" type="hidden" class="form-control @error('qty') is-invalid @enderror" name="qty" value="0" autocomplete="qty">
                                    <input id="amount" type="hidden" class="form-control @error('amount') is-invalid @enderror" name="amount" value="0" autocomplete="amount">


                        <div class="form-group row">
                            <label for="bill_date" class="col-md-4 col-form-label text-md-right">Bill date</label>

                            <div class="col-md-6">
                                <input id="bill_date" type="date" class="form-control{{ $errors->has('bill_date') ? ' is-invalid' : '' }}" name="bill_date" value="<?php echo date("Y-m-d");?>" required>

                                @if ($errors->has('bill_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="card alert-success text-body pt-3 mb-3">
                            <div class="card-title text-center">
                                Deposit
                            </div>
                            <div class="form-group row">
                                <label for="given_amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount given') }}</label>

                                <div class="col-md-6">
                                    <input id="given_amount" type="text" class="form-control @error('given_amount') is-invalid @enderror" name="given_amount" value="{{ old('given_amount') }}" autocomplete="given_amount">

                                    @error('given_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="given_assets" class="col-md-4 col-form-label text-md-right">{{ __('Crate given') }}</label>

                                <div class="col-md-6">
                                    <input id="given_assets" type="text" class="form-control @error('given_assets') is-invalid @enderror" name="given_assets" value="{{ old('given_assets') }}" autocomplete="given_assets">

                                    @error('given_assets')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" style="text-transform: capitalize">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="add" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
