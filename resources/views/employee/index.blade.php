@extends('layouts.app')


@section('content')

	<hr>
		<h1 class="text-center">Employees</h1>
	<hr>

	<a href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>

	<br>
	<br>
	<table class= "table table-hover" id="filterTable">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Trash</th>
		</thead>

		<tbody>
			@if($employees->count()> 0)
				@foreach($employees as $employee)
					<tr>
						<td><a href="{{ route('employees.show', ['id' => $employee->id]) }}">{{ $employee->first_name . ' ' .$employee->last_name }}</a></td>
						<td>{{ $employee->email }}</td>
						<td>
							<a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<form action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="POST">
								{{csrf_field() }}
								{{method_field('DELETE')}}
								<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<th colspan="5" class="text-center">Empty</th>
				</tr>
			@endif
		</tbody>
	</table>
	<div class="text-center">{{ $employees->links('vendor.pagination.bootstrap-4') }}</div>
@endsection
