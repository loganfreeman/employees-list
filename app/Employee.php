<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

	protected $dates=['deleted_at'];

	protected $fillable=['slug','email','full_time', 'first_name', 'last_name', 'employee_id', 'salary','phone',
		'street','state','city','country'];

}
