@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Customer List-> {{ $customer->name }}</div>
					
                <div class="card-body">
                	<form method="post">
						@csrf
					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text"  name="name" class="form-control" id="name" placeholder="Name" value="{{ $customer->name }}" readonly="">
					  </div>
					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="{{ $customer->email }}" readonly="">
					  </div>
					  <div class="form-group">
					    <label for="number">Number</label>
					    <input type="number" name="number" class="form-control" id="number" placeholder="Number" value="{{ $customer->number }}" readonly="">
					  </div>
					  <a href="{{ url('customer/index') }}" class="btn btn-success">Back</a>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection