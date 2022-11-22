<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companie;
use App\Models\Employee;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=Companie::all();
        $allEmployees = Employee::join('companies', 'companies.id', '=', 'employees.company_id')
              ->get(['employees.*', 'companies.name']);
        return view('employee',compact('all','allEmployees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $allEmployees = Employee::join('companies', 'companies.id', '=', 'employees.company_id')
        //       ->get(['employees.*', 'companies.name']);
       
        // return view('companie',compact('allEmployees'));  
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
            "firstName" => "required",
            "lastName" => "required",            
            
            
                    ]);
                    $employee=new Employee();
                    $employee->firstName=$request->firstName;
                    $employee->lastName=$request->lastName;
                    $employee->email=$request->email;
                    
                    $employee->phone=$request->phone;
                    $employee->company_id=$request->company_id;
                    
                    $employee->save();
                    return redirect('emplyees')->with(['status' => 'Success Employee Added ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id)->get();
        $all=Companie::all();
        return view('singleEmployee')->with(['employee' => $employee ,'all'=>$all]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $employee= Employee::find($id);
        $employee->firstName=$request->firstName;
        $employee->lastName=$request->lastName;
        $employee->email=$request->email;
        
        $employee->phone=$request->phone;
        $employee->company_id=$request->company_id;
        
        $employee->save();
        return redirect('emplyees')->with(['status' => 'Success Employee Edited ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('emplyees')->with(['status' => 'Success Employee Deleted ']);
    }
}
