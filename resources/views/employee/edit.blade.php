@extends('layouts.app')


@section('content')

  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

	<div class="col-lg-12">
		<h1 class="page-header">Update Employee: {{$employee->name }}</h1>
	</div>

	<form action="{{ route('employees.update', ['id'=>$employee->id]) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

		<div class="form-group ">
			<label for="name">First Name: </label>
			<input type="text" name="first_name" value="{{ $employee->first_name}}" class="form-control">
    </div>

		<div class="form-group ">
			<label for="name">Last Name: </label>
			<input type="text" name="last_name" value="{{ $employee->last_name}}" class="form-control">
		</div>

		<div class="form-group ">
			<label for="name">Employee ID: </label>
			<input type="text" name="employee_id" value="{{ $employee->employee_id}}" class="form-control">
		</div>
		<div class="form-group ">
			<label for="name">Salary: </label>
			<input type="text" name="salary" value="{{ $employee->salary}}" class="form-control">
		</div>
		<div class="form-group ">
			<label for="name">Phone: </label>
			<input type="text" name="phone" value="{{ $employee->phone}}" class="form-control">
		</div>


		<div class="form-group ">
			<label for="email">Email: </label>
			<input type="email" name="email" value="{{ $employee->email}}" class="form-control">
		</div>

		<div class="form-group ">
			<label for="street">Street: </label>
			<input type="text" name="street" value="{{ $employee->street}}" class="form-control">
    </div>

		<div class="form-group ">
			<label for="city">City: </label>
			<input type="text" name="city" value="{{ $employee->city}}" class="form-control">
    </div>

		<div class="form-group ">
			<label for="state">State: </label>
			<input type="text" name="state" value="{{ $employee->state }}" class="form-control">
		</div>

		<div class="form-group ">
			<label for="country">Country: </label>
			<input type="text" name="country"  value= "{{ $employee->country}}" class="form-control">
		</div>

		<div class="form-group ">
			<label for="full_time">Position:	</label>
			<select name="full_time" id="full_time" class="form-control">
				<option value="1">Full-Time</option>
				<option value="0">Part-Time</option>
			</select>
		</div>

		<div class="text-center">
			<button class="btn btn-success" type="submit" >Update Changes</button>
		</div>
	</form>

@endsection
