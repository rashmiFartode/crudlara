@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Customer List-> {{ $customer->name }}</div>
					
                <div class="card-body">
                	@if (session('status'))
		                <div class="alert alert-success" role="alert">
		                    {{ session('status') }}
		                </div>
		            @endif
                	<form method="post" action="{{ route('customer.update',$customer->id)  }}">
						@csrf
                		@method('PUT')
					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" name="name" class="form-control" id="name" value="{{ $customer->name }}">
					  </div>
					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" name="email" class="form-control" id="email" value="{{ $customer->email }}">
					  </div>
					  <div class="form-group">
					    <label for="number">Number</label>
					    <input type="number" name="number" class="form-control" id="number" value="{{ $customer->number }}" maxlength="10">
					  </div>
					  <button type="submit" class="btn btn-primary" >Submit</button>
					  <a href="{{ url('customer/index') }}" class="btn btn-success">Back</a>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection