<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Business;

class BusinessController extends Controller
{
    /**
     * Display Business
     * @param
     * @return businessList
     */
    public function getBusiness()
    {
        $businessList =  Business::getListQuery()->orderBy('createdAt','desc')->get()->toArray();

        return view('front.home',compact('businessList'));
    }


    /**'
     * Get Business Detail
     */
    public function getBusinessDetail(Business $business)
    {
        $businessInfo=   Business::getListQuery()->where('id',$business->id)->first();

        return view('front.businessDetail',['businessInfo' => $businessInfo]);

    }

    /**
     * Add Edit Business Form show
     */
    public function addBusiness()
    {
        return view('front.addBusinessDetail');
    }


     /**
     * Store Business details
     * @param Request $request
     * @return $business
     */
    public function storeBusiness(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:50',
            'phoneNumber' => 'required|max:10',
        ]);

        $business =  new Business();
        $business->fill($request->all());
        $business->save();

        return redirect(route('addBranches',['business' => $business]))->with('success',trans('ascasc'));
    }

}
