@extends('layouts.app')


@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">Employee: {{ $employee->name }}<h1>
	</div>

	@auth
		<a href="{{ route('employees.edit',['id'=>$employee->id]) }}" class="btn btn-primary">Edit</a>
		<a href="{{ route('employees.destroy',['id'=>$employee->id]) }}" class="btn btn-danger">Delete</a>
	@endauth

	<br>
	<br>

	<table style="width:100% ">
		<tr>
			<th>Name:</th>
			<td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $employee->email }}</td>
		</tr>
		<tr>
			<th>street</th>
			<td>{{ $employee->street }}</td>
		</tr>
		<tr>
			<th>city</th>
			<td>{{ $employee->city }}</td>
    </tr>
    <tr>
			<th>state</th>
			<td>{{ $employee->state }}</td>
		</tr>
		<tr>
			<th>country</th>
			<td>{{ $employee->country }}</td>
		</tr>
	</table>
@endsection
