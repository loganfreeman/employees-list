<?php

namespace App\Http\Controllers;

use App\Employee;
use Session;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	 public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', ['employees'=>Employee::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'phone' => 'required|phone',
      'employee_id' => 'required',
      'salary' => 'required',
			'email' => 'required|email',
			'street' => 'required',
			'state' => 'required',
			'city' => 'required',
			'country' => 'required',
		]);

		$employee = Employee::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'salary' => $request->salary,
      'phone' => $request->phone,
      'employee_id' => $request->employee_id,
			'slug' =>str_slug($request->first_name . $request->last_name),
			'email' => $request->email,
			'street' => $request->street,
			'state' => $request->state,
			'city' => $request->city,
			'country' => $request->country,
		]);


		$employee->save();


		$request->session()->flash('status', 'New Employee created');
		return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.show',['employee'=>Employee::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit', ['employee'=>Employee::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::findOrFail($id);
		$this->validate($request,[
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|email',
      'phone' => 'required|phone',
      'employee_id' => 'required',
      'salary' => 'required',
			'street' => 'required',
			'state' => 'required',
			'city' => 'required',
			'country' => 'required',
		]);

    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->salary = $request->salary;
    $employee->employee_id = $request->employee_id;
    $employee->phone = $request->phone;
		$employee->slug = str_slug($request->first_name . $request->last_name);
		$employee->email = $request->email;
		$employee->street = $request->street;
		$employee->state = $request->state;
		$employee->city = $request->city;
		$employee->country = $request->country;
		$employee->save();

		$request->session()->flash('status', 'New Employee created');
		return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
    {
        $employee=Employee::findOrFail($id);
		$employee->delete();

		Session::flash('success','Employee deleted');
		return redirect()->route('employees.index');
    }


	public function restore($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		$employee->restore();

		Session::flash('success', 'The employee user account is restored.');
		return redirect()->route('employees.index');
	}

	public function kill($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		foreach($employee->payrolls as $payroll):
			$payroll->delete();
		endforeach;

		$employee->forceDelete();

		Session::flash('success', 'The employee account has been permanently destroyed.');
		return redirect()->route('employees.index');
	}
}
