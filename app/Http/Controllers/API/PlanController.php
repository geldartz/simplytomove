<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Plan::latest()->paginate(10);
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

     public function getAgencyplan(){
        $data = Plan::where('user_type','agency')->get();
        return response()->json($data);
     }

     public function getAgencyPricing(){
        $data = Plan::with('pricing')->where('user_type','agency')->get();
        // dump($data);
        $newArr = [];
        $name = "";

        foreach($data as $item){
            $name = $item->pricing->name;
            $newArr[] = [
                'price' => $item->pricing->price,
                'variation' => $item->pricing->variation
            ]; 
        }
        array_push($newArr,['name'=>$name]);
        return response()->json($newArr);
     }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_type' => 'required',
            'name' => 'required|string',
        ]);

        $data = new Plan;
        $data->user_type = $request->user_type;
        $data->name = $request->name;
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
       $data = Plan::findOrFail($id);
       $data->user_type = $request->user_type;
       $data->name = $request->name;
       $data->update();
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
