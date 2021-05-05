<?php

namespace App\Http\Controllers\User;

use App\Models\WorkFlowGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\BaseController;

use App\User;

class UserController extends BaseController
{
  
     // protected $scrollTo = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function loadUsers(){
        $query = User::fetchV2();
        if (\request()->filled('search_text')){
            $query = $query->where('email','like' , '%' . \request('search_text') . '%');
        }
        $this->data['users'] = $query->paginate(11);
    }

    function loadGroups(){
        $this->data['groups'] = WorkFlowGroup::fetch()->get();
    }


    public function index()
    {
        //
        $this->loadUsers();
        $this->loadGroups();
        return view('user.index',$this->data);

    }

    function indexAjax(){
        return view('user.index_ajax',[
           'users'=>User::paginate(7) 
        ]);
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
    public function update(Request $request,User $user)
    {
        //
        $data = request()->validate([
          'role'=>'required'
        ]);

        try {
            // if ($data['status'] == 1){
            //  $message = 'Account Enabled.';
            // }else if ($data['status'] == 0){
            //  $message = 'Account Disabled.';
            // }else{
            //  throw new \Exception("Invalid account-status-change request!", 1);
            // }
            $user->update($data);
            $message = 'Role updated.';
            $this->scrollTo = '#usr' . $user->id;
           return $this->logSuccess('user.index',[],$message);    
        } catch (Exception $e) {
            return $this->logError('user.index',[],$e->getMessage());
        }

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
