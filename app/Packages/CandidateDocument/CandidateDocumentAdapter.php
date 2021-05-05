<?php

namespace App\Packages\CandidateDocument;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\JbCandidateDocument;

class CandidateDocumentAdapter implements CandidateDocumentPort
{
    
    private $request = null;
    
    function __construct(Request $request){
       $this->request = $request; 
    }
    
    public function getList()
    {
      $user_id = Auth::user()->id;
      return [
          'list'=>JbCandidateDocument::where('user_id',$user_id)->get()
      ];
    }

    public function create()
    {
      $model = new JbCandidateDocument;
      $model->name = $this->request->name;
      $model->user_id = Auth::user()->id;
      $this->doUpload($model);
      $model->save();
      
      return [
          'message'=>'Document uploaded successfully',
          'data'=>$model
      ];
    }
    
    private function doUpload($model){
        $path = '';
        if ($this->request->file('doc')){
           $model->file = $this->request->file('doc')->store($path,[
               'disk'=>'uploads'
           ]); 
        }
    }
    
    private function getModel(){
        $id = $this->request->id;
        $model = JbCandidateDocument::find($id);
        return $model;
    }

    public function update()
    {
      
      $model = $this->getModel();
      $model->name = $this->request->name;
      $this->doUpload($model);
      $model->save();
      
      return [
          'message'=>'Document saved successfully',
          'data'=>$model
      ];
      
    }

    public function getItem($id)
    {
       return [
           'data'=>JbCandidateDocument::find($id)
       ]; 
    }

    public function delete()
    {
        $model = $this->getModel();
        $model->delete();
        return [
            'message'=>'Document removed',
            'data'=>$model
        ];
    }

    
}
