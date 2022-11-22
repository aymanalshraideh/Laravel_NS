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
                    $Companie=new Employee();
                    $Companie->firstName=$request->firstName;
                    $Companie->lastName=$request->lastName;
                    $Companie->email=$request->email;
                    
                    $Companie->phone=$request->phone;
                    $Companie->company_id=$request->company_id;
                    
                    $Companie->save();
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
        //
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
        //
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
        return redirect('employees')->with(['status' => 'Success Employee Deleted ']);
    }
}
