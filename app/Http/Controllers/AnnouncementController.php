<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Announcement;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcement.anc_index');
    }

    public function getAnnouncement(Request $request)
    {
        if ($request->ajax()) {
            $data = Announcement::query()->latest()->with(['created_by'])->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', function($row){
                    $actionBtn = '<a href="" class="btn btn-sm btn-clean btn-icon view-item" data-item-id="'.$row->id.'" data-toggle="modal" data-target="#viewItemModel" title="Edit details">
                                        <i class="la la-eye"></i>
                                      </a>';
                    return $actionBtn;
                })
                ->rawColumns(['Actions'])
                ->make(true);
        }
    }

    public function show(Request $request)
    {
        $data = Announcement::find($request->itemID);
        return response()->json(['title' => $data->title, 'message' => $data->message ]);
    }

    public function store(Request $request)
    {
        $anc = new Announcement;
        $anc->title = $request->title;
        $anc->message = $request->message;
        $anc->created_by = Auth::user()->id;
        $anc->save();

        $agents = Agent::query()->where('active', 1)->get();

        foreach ($agents as $agent){
            $this->sendNotification($agent->token, $request->title, $request->message);
        }
        return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Announcement add successfully']);

    }

    public function sendNotification($token, $title, $mesg)
    {
        #API access key from Google API's Console
        $api_key = "AAAASur2hoA:APA91bG5SBmDKo0ejAQThR3J2ANY9hD16glAVwPQteBd2ECjn-aNLaeyaDuGBprQtrSgh6tzCl4_cLtAg8dX_p3nuc5-7PtZePb9EB7M-248-_NPJTN0xhncBiA_OD1ZjUnhr75lOscz";
        if (!defined("API_ACCESS_KEY")) define("API_ACCESS_KEY", $api_key);

        #prep the bundle
        $msg = array
        (
            'title' => $title,
            'body' => $mesg,
        );

        $fields = array
        (
            'to' => $token,
            'notification' => $msg
        );


        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if(!empty(curl_error($ch))){
            // echo "empty curl error \n";
            Log::info('SendNotification-Error.log '. $result);
        }
        Log::info('SendNotification-Success.log '. $result . 'HTTP_CODE' .$httpcode);
        curl_close($ch);

        return array('HTTP_CODE' => $httpcode, 'result' => $result);
        // return $api_key;

    }

}
