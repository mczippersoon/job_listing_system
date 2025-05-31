<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {

        $employees = Employee::all();
    
        return view('admin.employees.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all(); 
        return view('admin.employees.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'contact_number' => 'required',
            'type_of_job' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);
      
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->company_name = $request->company_name;
        $employee->contact_number = $request->contact_number;
        $employee->type_of_job = $request->type_of_job;
        $employee->description = $request->description;
        $employee->requirements = $request->requirements;

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $employee = Employee::findOrFail($id);

        return view('admin.employees.show', ['employee' => $employee,]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id); 
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        $employee = Employee::findOrFail($id);
    
       
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'contact_number' => 'required',
            'type_of_job' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);
    
       
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->company_name = $request->company_name;
        $employee->contact_number = $request->contact_number;
        $employee->type_of_job = $request->type_of_job;
        $employee->description = $request->description;
        $employee->requirements = $request->requirements;
        $employee->save();
    
        
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteEmployee = Employee::findOrFail($id);
        $userName = $deleteEmployee->first_name;
        $deleteEmployee->destroy($id);
        
        if($deleteEmployee){
            return response()->json(['message' => $userName .' deleted successfully']);
        } else {
            return response()->json(['error' => 'Deletion failed!']);
        }
    }
}
