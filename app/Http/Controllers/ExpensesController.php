<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;

class ExpensesController extends Controller
{
    public function index()
    {
        //  $tenants = Cache()->rememberForever('tenants', function(){
             
        // return Tenant::all();
        //  });
        
        $tenant_1= Tenant::first();    
        $tenant1_id=$tenant_1->id;
           
        $tenant_2= Tenant::where('id','>',$tenant1_id)->first();
        $tenant2_id= $tenant_2->id;
 
         $tenant_3= Tenant::where('id','>',$tenant2_id)->first();
         $tenant3_id= $tenant_3->id;
  
         $tenant_4= Tenant::where('id','>',$tenant3_id)->first();
         $tenant4_id= $tenant_4->id;

         $tenant_5= Tenant::where('id','>',$tenant4_id)->first();
         $tenant5_id= $tenant_5->id;
        
        return view('expenses',['tenant_1'=>$tenant_1,'tenant_2'=>$tenant_2,'tenant_3'=>$tenant_3,'tenant_4'=>$tenant_4,'tenant_5'=>$tenant_5]);
    }

    
    public function update_expenses(Request $request)
    {
        $tenant_1= Tenant::first();    
        $tenant1_id=$tenant_1->id;
           
        $tenant_2= Tenant::where('id','>',$tenant1_id)->first();
       $tenant2_id= $tenant_2->id;

       $tenant_3= Tenant::where('id','>',$tenant2_id)->first();
       $tenant3_id= $tenant_3->id;     
       
       $tenant_4= Tenant::where('id','>',$tenant3_id)->first();
       $tenant4_id= $tenant_4->id;    

       $tenant_5= Tenant::where('id','>',$tenant4_id)->first();
       $tenant5_id= $tenant_5->id;
        $tenants = new Tenant;
       
        $tenant_1->expenses= $request->expense1_value ;  
        $tenant_2->expenses = $request->expense2_value ;
        $tenant_3->expenses = $request->expense3_value ;
        $tenant_4->expenses = $request->expense4_value ;
        $tenant_5->expenses = $request->expense5_value ;
           
        $tenant_1->save();           
        $tenant_2->save();           
        $tenant_3->save();    
        $tenant_4->save();
        $tenant_5->save();
        $Total= array($tenant_1->expenses, $tenant_2->expenses, $tenant_3->expenses, $tenant_4->expenses, $tenant_5->expenses);
        $total= array_sum($Total);
        $no_of_tenants=Tenant::all()->count();
      
        $each_=$total/$no_of_tenants;
        $each= round($each_,2);
       
        
        session(['each' => $each]);
         return redirect(route('expenses'))->with('status','expenses value updated Successfully');
       
       
    }



}
