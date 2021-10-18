<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandPostAdd;

class LandPostAddController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LandPostAdd::where('user_id','4')->paginate(10);
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
       


        $data                    = new LandPostAdd;
        $data->user_id          = '4';
        $data->typeOnwer            = $request->typeOnwer;
        $data->price            = $request->price;
        $data->duration            = $request->duration;
        $data->dss           = $request->dss;
        $data->dss_due           = $request->dss_due;
        $data->deposit          = $request->deposit;
        $data->staymax       = $request->staymax;
        $data->staymin             = $request->staymin;
        $data->available_date        = date('d-m-Y', strtotime($request->available_date));
        $data->property_type         = $request->property_type;
        $data->occupancy         = $request->occupancy;
        $data->bedroom   = $request->bedroom;
        $data->bathroom           = $request->bathroom;
        $data->latitude     = $request->latitude;
        $data->longtitude           = $request->longtitude;
        $data->bath_toilet           = $request->bath_toilet;
        $data->bath_toilet       = $request->bath_toilet;
        $data->furnishing        = $request->furnishing[0];
        $data->misc              = $request->misc[0];
        $data->property_features = json_encode($request->property_features);

        $images = $request->images;
        $arr = [];
        foreach($images as $image){
            if($image){
                $name = time().'_' . $image->getClientOriginalName();
                array_push($arr,['name' => $name]);
                // mkdir(public_path('uploads/images/'), 777, true);
                 // mkdir(public_path('uploads/images/thumbnail-gallery/'), 777, true);
                // mkdir(public_path('uploads/images/thumbnail-square/'), 777, true);
                // mkdir(public_path('uploads/images/thumbnail/'), 777, true);
                // mkdir(public_path('uploads/images/thumbnail-rec/'), 777, true);
                \Image::make($image)->save('./uploads/images/'.$name);
                \Image::make($image)->fit(200, 200)->save('uploads/images/thumbnail-square/'.$name)->destroy();
                \Image::make($image)->fit(260, 340)->save('uploads/images/thumbnail-rec/'.$name)->destroy();
                \Image::make($image)->fit(100, 70)->save('uploads/images/thumbnail/'.$name)->destroy();
                \Image::make($image)->fit(400, 600)->save('uploads/images/thumbnail-gallery/'.$name)->destroy();
            }
        }

        $data->images      = json_encode($arr);
        $data->utilities = json_encode($request->utilities);
        $data->video_link          = $request->video_link;
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
