<?php
namespace App\Repositries;

use App\Models\Company;
use App\Repository\CompanyRepositryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\traits\ApiResponseTrait;
use Illuminate\Support\Facades\Hash;



class CompanyRepository implements CompanyRepositryInterface{


   
use ApiResponseTrait;

    public function index(){
        $companies=Company::paginate(5);
        if($companies){
            return $this->apiresponse($companies,'Successful Data Retrived',200);
        }
        $companies=Company::paginate(5);
        return $this->apiResponse('[]','No Data Found',404);

    }
    
    public function store(Request $request){
            $request->validate( [
                'name'=>'required|string',
                'email'=>'required|email|unique:companies',
                'website' => 'required',
            ]);
            Company::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request-> website,
            ]);
            return $this->apiresponse('[]','Successful Data Stored',200);
    }
    public function update(Request $request){
        $request->validate( [
            'name'=>'required|string',
            'email'=>'required|email|unique:companies,email,'.$request->id,
            'website'=>'required,'
        ]);
        $company=Company::findOrFail($request->id);
        $company->name=$request->name;
        $company->email=$request->email;
        $company->website=$request->website;
        $company->save();
        return $this->apiresponse('[]','Successful Data Updated',200);
    }

    public function destroy($id){
        Company::findOrFail($id)->delete();
        return $this->apiresponse('[]','Successful Data Deleted',200);
    }
    
}
