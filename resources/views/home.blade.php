@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crud</div>

                <div class="card-body">
                    <a href="{{ route('customer.index') }}" >CRUD</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
