<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PolicyList;
use App\Models\PolicyBank;
use App\Models\PolicyDetail;

class PolicyApiController extends Controller
{
    // For All Policies List
    public function allPolicies(){
        $data = PolicyList::query()->select('id','name')->where('active', '1')->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => $data,
        ];

        return response()->json($output);
    }
    
    // For All Banks Against that Policy
    public function policyBankList(Request $request){
        $data = DB::table('policy_details')
            ->join('policy_banks', 'policy_details.bank_id', '=', 'policy_banks.id')
            ->where('policy_banks.active', '1')
            ->where('policy_details.policy_id', $request->id)
            ->select('policy_details.id','policy_banks.name','policy_banks.image')
            ->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => array('media_url' => url('/storage/images/policy_banks/'), 'collection' => $data),
        ];
        return response()->json($output);
    }
    public function policyBankDetail(Request $request){
        
        $data = PolicyDetail::query()->select('id','description')->where('id', $request->id)->first();
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => $data,
        ];

        return response()->json($output);
    }
}
