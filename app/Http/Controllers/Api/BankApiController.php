<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankApiController extends Controller
{
    public function policies(){
        $data = DB::table('policies')
            ->join('banks', 'policies.bank_id', '=', 'banks.id')
            ->where('policies.active', '1')
            ->select('banks.name','policies.title','policies.detail')
            ->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => $data,
        ];
        return response()->json($output);
    }

    public function searchPolicies(Request $request){
        $data = DB::table('policies')
            ->join('banks', 'policies.bank_id', '=', 'banks.id')
            ->where('policies.active', '1')
            ->where('policies.title', 'like', '%'.$request->title.'%')
            ->select('banks.name','policies.title','policies.detail')
            ->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => $data,
        ];
        return response()->json($output);
    }
}
