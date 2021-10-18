<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TenantPostAdd;
use Auth;

class TenantPostAddController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TenantPostAdd::where('user_id','4')->paginate(10);
        $response = [
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem()
            ],
            'data' => $data
        ];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data                    = new TenantPostAdd;
        $data->user_id          = '4';
        $data->gender            = $request->gender;
        $data->ageone            = $request->ageone;
        $data->agetwo            = $request->agetwo;
        $data->occupation        = $request->occupation;
        $data->staymin           = $request->staymin;
        $data->staymax           = $request->staymax;
        $data->langauge          = $request->langauge;
        $data->nationality       = $request->nationality;
        $data->hobby             = $request->hobby;
        $data->movingdate        = date('d-m-Y', strtotime($request->movingdate));
        $data->price_min         = $request->price_min;
        $data->price_max         = $request->price_max;
        $data->price_due   = $request->price_due;
        $data->deposit           = $request->deposit;
        $data->property_type     = $request->property_type;
        $data->bed_min           = $request->bed_min;
        $data->bed_max           = $request->bed_max;
        $data->bath_toilet       = $request->bath_toilet;
        $data->bath_private      = $request->bath_private;
        $data->furnishing        = $request->furnishing[0];
        $data->misc              = $request->misc[0];
        $data->property_features = json_encode($request->property_features);
        $data->latitude          = $request->latitude;
        $data->longtitude        = $request->longtitude;
        $data->ad_title          = $request->ad_title;
        $data->ad_desc           = $request->ad_desc;
        $data->ad_firstname      = $request->ad_firstname;
        $data->ad_lastname       = $request->ad_lastname;
        $data->ad_display        = $request->ad_display;
        $data->ad_email          = $request->ad_email;
        $data->ad_phone          = $request->ad_phone;
        $data->ad_hide_phone     = $request->ad_hide_phone;
        $data->email_alerts      = $request->email_alerts;
        $data->membership        = $request->membership;
        $data->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
