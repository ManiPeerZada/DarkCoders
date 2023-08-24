<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pricing_plan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricing = Pricing_plan::get();
        return view('back.pricing.index', compact('pricing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = new Pricing_plan();
            $data->name = $request->name;
            $data->price = $request->price;
            $data->description = $request->description;
            $data->save();
            return redirect()->back()->with('message', 'Price Plan Inserted Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        try {
            $id = $request->e_id;
            $data = Pricing_plan::where('id', $id)->first();
            $data->name = $request->e_name;
            $data->price = $request->e_price;
            $data->description = $request->e_description;
            $data->save();
            return redirect()->back()->with('message', 'Price Plan Updated Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            if (Pricing_plan::where('id', $id)->exists()) {
                Pricing_plan::where('id', $id)->delete();
                return '1';
            } else {
                return '0';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
