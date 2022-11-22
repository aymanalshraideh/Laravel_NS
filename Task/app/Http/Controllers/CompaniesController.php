<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companie;
use Faker\Provider\ar_EG\Company;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companie');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all=Companie::all();
        return view('companie',compact('all'));

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
            "name" => "required",            
            
            "logo"=>"required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100",
                    ]);
                    $Companie=new Companie();
                    $Companie->name=$request->name;
                    $Companie->email=$request->email;
                    if ($request->hasFile('logo')) {
                        $file=$request->logo;
                        $new_file=time().$file->getClientOriginalName();
                        $file->move('images',$new_file);
                        $Companie->logo='images/'.$new_file;
                         }
                    $Companie->website=$request->website;
                    
                    $Companie->save();
                    return redirect('companie')->with(['status' => 'Success Companie Added ']);
                    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Companie = Companie::find($id)->get();
        return view('singleCompanie')->with(['companie' => $Companie]);
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
        // $this->validate($request,[

        //     "name" => "required",            
                
        //         "logo"=>"required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100",
        //                 ]);
        // dd($request->all());
                        $Companie=Companie::find($id);
                        $Companie->name=$request->name;
                        $Companie->email=$request->email;
                        if ($request->hasFile('logo')) {
                            $file=$request->logo;
                            $new_file=time().$file->getClientOriginalName();
                            $file->move('images',$new_file);
                            $Companie->logo='images/'.$new_file;
                             }
                        $Companie->website=$request->website;
                        
                        $Companie->save();
                        return redirect('companie')->with(['status' => 'Success Companie Edited ']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Companie = Companie::find($id);
        $Companie->delete();
        return redirect('companie')->with(['status' => 'Success Companie Deleted ']);
    }
}
