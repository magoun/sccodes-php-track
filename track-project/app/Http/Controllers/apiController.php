<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    /**
     * Display a list of events.
     */
    public function showEvents()
    {
        $url = 'https://nunes.online/api/gtc';
        $data = file_get_contents($url);
        
        // Put the JSON into a nested array format.
        $json = json_decode($data, true);
        dd($json);
    }
    
    /**
     * Display a list of organizations.
     */
    public function showOrgs()
    {
        $url = 'https://data.openupstate.org/rest/organizations';
        $data = file_get_contents($url);
        
        // Put the data into JSON format.
        $json = json_decode($data);
        
        // Put the data into a nested array format.
        // $array = json_decode($data, true);
        
        // dd($json);
        
        return view('orgs', [
                            'orgs' => $json, 
                            'title' => 'Organizations',
                            ]);
    }
    
    /**
     * Debug orgs - delete in production.
     */
    public function debugOrgs()
    {
        $url = 'https://data.openupstate.org/rest/organizations';
        $data = file_get_contents($url);
        
        // Put the data into JSON format.
        $json = json_decode($data);
        
        // Put the data into a nested array format.
        // $array = json_decode($data, true);
        
        dd($json);
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
        //
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
