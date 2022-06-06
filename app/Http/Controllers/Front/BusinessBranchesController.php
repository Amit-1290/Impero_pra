<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\BusinessBranches;

use App\Models\Business;
use PhpParser\Node\Stmt\Foreach_;

class BusinessBranchesController extends Controller
{
   /**
    * Add Branches form show
    * @param Request $request,Business $business
    * @return view => business
    */
    public function addBranches(Request $request,Business $business)
    {
        return view('front.addBranches',compact('business'));
    }

    /**
     * Store Business Branch
     * @param Request $request , Business $business
     * @return view business
     */
    public function storeBusinessBranch (Request $request, Business $business)
    {
        $this->validate($request, [
            'associatedBusinessName' => 'required',
            'name' => 'required',
        ]);

        $workingDays = [];

        \DB::beginTransaction();

        // Convert Days request to json format with day wise timing
        foreach (config('constant.days') as $key => $dayInfo) {

            $dayWiseArray =[];
            $count = 0;
            for ($i= 0; $i < count($request[$dayInfo.'startTime']); $i++) {
                if($request[$dayInfo.'startTime'][$i] && $request[$dayInfo.'closeTime'][$i])
                {
                    $dayWiseArray[$count] =  (String)$request[$dayInfo.'startTime'][$i].'-'.$request[$dayInfo.'closeTime'][$i];
                    $count++;
                }
            }
            $workingDays[$dayInfo] = $dayWiseArray;
        }

        $workingDaysJsonData =  json_encode($workingDays);

        // Store branches data
        $businessBranches = new BusinessBranches();
        $businessBranches->fill($request->all());
        $businessBranches->businessId = $business->id;
        $businessBranches->workingDayAndTime = $workingDaysJsonData;
        $businessBranches->save();

        \DB::commit();

        // redirect to business detail page
        return redirect(route('getBusinessDetail',['business' => $business['id'] ] ));
    }
}
