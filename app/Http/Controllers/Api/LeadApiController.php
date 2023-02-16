<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LeadApiController extends Controller
{
    public function createLead(Request $request) {
        $validator = Validator::make($request->all(), [
            'add_extra_payment' => 'required',
            'amortization' => 'required',
            'condo_fees' => 'required',
            'down_payment' => 'required',
            'heat' => 'required',
            'home_price' => 'required',
            'mortgage' => 'required',
            'others_expenses' => 'required',
            'payment' => 'required',
            'property' => 'required',
            'rate' => 'required',
            'rental_income' => 'required',
        ]);
        if ($validator->fails()) {
            $output = [ 'response' => ['response_id' => 1, 'response_desc' => $validator->errors()->first()]];
            return response()->json($output);
        }

        DB::beginTransaction();
        try {
            $lead = new Lead();
            $lead->add_extra_payment        = $request->add_extra_payment;
            $lead->amortization             = $request->amortization;
            $lead->condo_fees               = $request->condo_fees;
            $lead->down_payment             = $request->down_payment;
            $lead->heat                     = $request->heat;
            $lead->home_price               = $request->home_price;
            $lead->mortgage                 = $request->mortgage;
            $lead->others_expenses          = $request->others_expenses;
            $lead->payment                  = $request->payment;
            $lead->property                 = $request->property;
            $lead->rate                     = $request->rate;
            $lead->rental_income            = $request->rental_income;
            $lead->save();
            $output = ['response' => ['response_id' => 0, 'response_desc' => "success."]];
            DB::commit();
        }catch (Exception $e){
            Db::rollBack();
            $output = [ 'response' => ['response_id' => 1, 'response_desc' => "Internal Server Error." , 'exception' => $e->getMessage()]];
            return response()->json($output, 500);
        }
        return response()->json($output);
    }
}
