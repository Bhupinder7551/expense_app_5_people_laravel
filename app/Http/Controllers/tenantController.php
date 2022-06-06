<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;
   
Use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Cache()->rememberForever('tenants', function(){
       
             
        return Tenant::all();
         });
          $tenants=Tenant::all();
        return view('index',['tenants'=>$tenants,'i'=>0]);
    }

    public function index_($locale)
    {
            App::setLocale($locale);
            
       $tenants = Tenant::all();
        return view('index',['tenants'=>$tenants,'i'=>0]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //   $validated=  $request->validate([
    //         'name'=>'required|min:3|max:20',
    //         'email'=>'required|email',
    //         'city'=>'required',
    //         'contact'=>'required|max:11|min:9',              
    //         'image'=>'required|mimes:jpeg,png|max:1024'

    //     ]);
    //     $image_name= $request->image->getClientOriginalName();
    //     $request->image->move(public_path('images'),$image_name);
    //     //  $request->file('image')->store('media');
    //     // dd($image_name);
    //         DB::table('students')->insert ([
            
    //             'name'=>$request->name,
    //             'email'=>$request->email,
    //             'city'=>$request->city,
    //             'contact'=>$request->contact,    
    //             'image'=>$image_name,              
    //         ]);
    //     if( $validated){
    //     return redirect(route('index'))->with('status','data inserted successfully');
    // }else{
      
    //     return redirect(route('index'))->withInput()->with('status','data inserted successfully');  
        
    // }
    // }
    public function add_tenant(Request $request)
    {
      $validated=  $request->validate([
            'tenant_name'=>'required|min:3|max:20',
            'tenant_contact'=>'required|max:15|min:9',            

        ]);

        $tenant= new Tenant();
        $tenant->name = $request->tenant_name;
        $tenant->contact = $request->tenant_contact;
        $tenant->save();
        return redirect(route('index'))->with('status','data inserted successfully');
            
  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit_tenant($id)
    {
        
        
        $tenant= Tenant::find($id);
        return view('edit',['tenant'=>$tenant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_tenant(Request $request, $id)
    {
        $validated=  $request->validate([
            'tenant_name'=>'required|min:3|max:20',
            'tenant_contact'=>'required|max:15|min:9',            

        ]);
       $tenant= Tenant::find($id);
        $tenant->name = $request->tenant_name;
        
        $tenant->contact = $request->tenant_contact;
         $tenant->save();

        
        return redirect(route('index'))->with('status','data has been updated');
    }   
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_tenant($id)
    {  
        $tenant = new Tenant(); 
        $tenant::destroy($id);
        
        return redirect(route('index'))->with('status','data deleted succesfully');
    }
}
