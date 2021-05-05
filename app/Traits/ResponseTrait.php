<?php


namespace App\Traits;


trait ResponseTrait
{

    function resolveResponse($response){
        if (isset($response['error']) && $response['error']){
            return redirect()->back()->with($response)->withInput();
        }
        return redirect()->back()->with($response);
    }

}