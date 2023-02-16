<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RateList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateApiController extends Controller
{
    public function rates(Request $request){
        $data = DB::table('rate_lists')
            ->join('rate_banks', 'rate_lists.bank_id', '=', 'rate_banks.id')
            ->where('rate_banks.active', '1')
            ->where('rate_lists.type_id', $request->type)
            ->select('rate_banks.name', 'rate_banks.image', 'rate_lists.id', 'rate_lists.bank_id', 'rate_lists.high_rate', 'rate_lists.rental', 'rate_lists.uninsurable_conv', 'rate_lists.uninsurable_refinance', 'rate_lists.amortization')
            ->paginate(5);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => array('media_url' => url('/storage/images/ratebank/'), 'collection' => $data),
        ];
        return response()->json($output);
    }

    public function rateDetail(Request $request){
        $data = RateList::find($request->id);
        $output = [
            'response' => array('response_id' => 0, 'response_desc' => "Success"),
            'result' => array(
                array('title' => 'High Rate', 'value' => $data->high_rate),
                array('title' => 'Ins Conv 80% - 75%', 'value' => $data->conv_one),
                array('title' => 'Ins Conv 75% - 70%', 'value' => $data->conv_two),
                array('title' => 'Ins Conv 70% - 65%', 'value' => $data->conv_three),
                array('title' => 'Ins Conv 65% - 0%', 'value' => $data->conv_four),
                array('title' => 'Uninsurable Conv', 'value' => $data->uninsurable_conv),
                array('title' => 'Uninsurable Refinance', 'value' => $data->uninsurable_refinance),
                array('title' => 'Amortization', 'value' => $data->amortization),
                array('title' => 'Rental', 'value' => $data->rental)
            )
        ];
        return response()->json($output);
    }
}
