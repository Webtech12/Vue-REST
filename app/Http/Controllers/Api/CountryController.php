<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Getting the records
        // $countries = Country::paginate(5);
        return response()->json(Country::limit(5)->get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Storing data
        $fill = Country::create($request->all());
        return response()->json($fill, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show a specific record
        $country = Country::find($id);

        $retVal = (is_null($country)) ? 
        response()->json('Record Not Found', 404) :
        response()->json($country, 200);

        return $retVal;
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
    public function update(Request $request, $id)
    {
        // Update a record
        $fill = Country::find($id);

        $retVal = (is_null($fill)) ?
        response()->json('Record not found', 404) :
        [ $fill->update($request->all()),
        response()->json($fill, 200) ] ;

        return $retVal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Deleting specific record
        $fill =  Country::find($id);
        
        $retVal = (is_null($fill)) ? 
        response()->json('Record not found', 404) : 
        [ $fill->delete(), 
        response()->json('Deleted', 204) ] ;
        
        return $retVal;
    }
}
