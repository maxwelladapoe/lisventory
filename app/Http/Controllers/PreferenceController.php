<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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

        $this->validate($request, [
            'currency' => ['nullable', 'string'],
        ]);
        $preferences = Auth::user()->preferences;

        $preferences->currency = $request->currency;

        if($preferences->save()){
            return response()->json([
                'success' => true,
                'message' => 'Saved successfully',
            ]);
        }else{
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);

        }


    }

}
