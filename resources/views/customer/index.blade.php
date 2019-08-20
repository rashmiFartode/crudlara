@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Customer List</div>

                <div class="card-body">
                	<a href="{{ route('customer.create') }}" class="btn btn-primary">Create</a>
					
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white ">
	<div class="row">
		<div class="col-12">
			@if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
			<table class="table table-bordered">
		<thead>
			<tr>
				<td>#</td>
				<td class="text-primary">Name</td>
				<td class="text-primary">Email</td>
				<td class="text-primary">Contact</td>
				<td class="text-primary">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($customers as $c)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $c->name }}</td>
				<td>{{ $c->email }}</td>
				<td>{{ $c->number }}</td>
				<td>
					<form action="{{ route('customer.destroy',$c->id) }}" method="POST">
   
                    <a class="btn btn-warning" href="{{ route('customer.show',$c->id) }}">
						<i class="fa fa-eye" style="font-size: 20px"></i>
                    </a>
    
                    <a class="btn btn-primary" href="{{ route('customer.edit',$c->id) }}">
                    	<i class="fa fa-pencil" style="font-size: 20px"></i>
                    </a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">
                    	<i class="fa fa-trash" style="font-size: 20px"></i>
                    </button>
                </form>
					
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>

		</tfoot>
	</table>
		</div>
		<div class="col-md-12">
			<div class="text-center">
				{{ $customers->links() }}
			</div>
		</div>
	</div>
</div>
@endsection