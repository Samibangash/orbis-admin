<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LenderBank;
use App\Models\LenderDirectory;

class LenderApiController extends Controller
{
    public function allBanks(){
        $data = LenderBank::query()->select('id','image', 'name', 'submission_process', 'acreditation_process')->orderByDesc('id')->paginate(10);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => array('media_url' => url('/storage/images/lender_banks/'), 'collection' => $data),
        ];

        return response()->json($output);
    }


    public function allBankDirectory(Request $request){
        $data = LenderDirectory::query()->select('id', 'name', 'phone', 'email', 'position')->where('bank_id', $request->id)->get();
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => $data,
        ];
        return response()->json($output);
    }
}
