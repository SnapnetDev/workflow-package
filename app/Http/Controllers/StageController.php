<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    return [
	    	'list'=>Stage::all()
	    ];
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

    private function getLastIndex(){
    	$query = (new Stage)->newQuery();
    	$query = $query->orderBy('position','desc');
    	$obj = $query->first();
    	if (is_null($obj)){
    		return 0;
	    }
	    return ($obj->position * 1);
    }

    public function store(Request $request)
    {
        //
	    $obj = new Stage;

	    $obj->stage_name = request('stage_name');
	    $obj->position = $this->getLastIndex();

	    $obj->save();

	    $this->rearrange();

	    return [
	    	'message'=>'New stage added',
		    'error'=>false
	    ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

	    $obj = Stage::find($id);

	    $obj->stage_name = request('stage_name');
//	    $obj->position = $this->getLastIndex();
	    $obj->save();

	    return [
		    'message'=>'Stage updated',
		    'error'=>false
	    ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */

    private function rearrange(){
    	$query = (new Stage)->newQuery();
    	$query = $query->orderBy('position','asc');
    	$list = $query->get();
    	$c = -1;
    	foreach ($list as $item){
    		$c+=1;
    		$item->position = $c;
    		$item->percentage = round(($c + 1)/count($list) * 100);
    		$item->save();
	    }
    }

    public function destroy($id)
    {
        //
	    $obj = Stage::find($id);
	    $obj->delete();

        $this->rearrange();

	    return [
		    'message'=>'Stage removed',
		    'error'=>false
	    ];

    }

}
