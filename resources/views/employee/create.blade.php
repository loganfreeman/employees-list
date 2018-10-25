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
		<h1 class="page-header">New Employee</h1>
	</div>

	<form action="{{ route('employees.store') }}" method="POST">
			{{ csrf_field() }}

		<div class="form-group ">
			<label for="name">First Name: </label>
			<input type="text" name="first_name" class="form-control">
    </div>

    <div class="form-group ">
			<label for="name">Last Name: </label>
			<input type="text" name="last_name" class="form-control">
    </div>

    <div class="form-group ">
			<label for="name">Employee ID: </label>
			<input type="text" name="employee_id" class="form-control">
    </div>

		<div class="form-group ">
			<label for="name">Salary: </label>
			<input type="text" name="salary" class="form-control">
		</div>

		<div class="form-group ">
			<label for="name">Phone: </label>
			<input type="text" name="phone" class="form-control">
		</div>
		<div class="form-group ">
			<label for="email">Email: </label>
			<input type="email" name="email" class="form-control">
		</div>

		<div class="form-group ">
			<label for="street">Street: </label>
			<input type="text" name="street" class="form-control">
		</div>

		<div class="form-group ">
			<label for="city">City: </label>
			<input type="text" name="city" class="form-control">
    </div>


		<div class="form-group ">
			<label for="state">State: </label>
			<input type="text" name="state" class="form-control">
		</div>


		<div class="form-group ">
			<label for="country">Country: </label>
			<input type="text" name="country" class="form-control">
		</div>

		<div class="form-group ">
			<label for="full_time">Position:</label>
			<select name="full_time" id="full_time" class="form-control">
				<option value="1">Full-Time</option>
				<option value="0">Part-Time</option>
			</select>
		</div>

		<div class="text-center">
			<button class="btn btn-success" type="submit" >Create</button>
		</div>
	</form>



@endsection
