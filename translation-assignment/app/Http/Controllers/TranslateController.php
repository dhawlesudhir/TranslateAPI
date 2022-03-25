<?php

namespace App\Http\Controllers;

use App\GoogleTranslator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TranslateController extends Controller
{


    /**
     * Accepting Text and TargetLaguage code
     * 1st Parameter - Getting GooleTranlator OBJ using service provider
     * 2nd Parameter - Request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(GoogleTranslator $gt,Request $request)
    {  
        // storing request parameters into localVariables
        $text = $request->input("text");
        $translateTo = $request->input("translateTo");

        //validation for TEXT
            if($text == ''){
                $failedResponse = [ 
                    'success' => false,
                    'error'   => 'Text not provided',
                ];
            return response()->json($failedResponse,400);   
        }
        //validating To language and if not provided deafult is Germany
        $translateTo = $translateTo == '' ? "de" : $translateTo;

        //replying back to client
        return $gt->translate($text,$translateTo);
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
