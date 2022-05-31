<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Practice;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $with["practices"] = Practice::select('name','id')->get();
        return view('employee.form', $with);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {

        $validated = $request->validated();

        $emp = Employee::create([
            'first_name' => $validated["fname"],
            'last_name' => $validated["lname"],
            'email' => $validated["email"] ?? null,
            'phone' => $validated["phone"] ?? null,
            'practice_id' => $validated["practice_id"],
        ]);

        return redirect()->to(route("employees.edit", ["employee" => $emp->id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $with["practices"] = Practice::select('name','id')->get();
        $with["employee"] = $employee;
        return view('employee.form', $with);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        $employee->update([
            'first_name' => $validated["fname"],
            'last_name' => $validated["lname"],
            'email' => $validated["email"] ?? null,
            'phone' => $validated["phone"] ?? null,
            'practice_id' => $validated["practice_id"],
        ]);

        return redirect()->to(route("employees.edit", ["employee" => $employee->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->to(route('dashboard'));
    }
}
