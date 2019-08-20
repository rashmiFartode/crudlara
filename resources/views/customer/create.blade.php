@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Customer List</div>
					
                <div class="card-body">
                	<form method="post" action="{{ route('customer.store') }}">
						@csrf

					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text"  name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Name">
					    <div class="text-danger">{{ $errors->first('name') }}</div>
					  </div>
					  <div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="name@example.com">
					    <div class="text-danger">{{ $errors->first('email') }}</div>
					  </div>
					  <div class="form-group">
					    <label for="number">Number</label>
					    <input type="number" name="number" maxlength="100" class="form-control" id="number" value="{{ old('number') }}" placeholder="Number">
					    <div class="text-danger">{{ $errors->first('number') }}</div>
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					  <a href="{{ route('customer.index') }}" class="btn btn-success">Back</a>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection