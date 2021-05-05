<?php
namespace App\Packages\Job;

use App\Models\JbJob;
use Illuminate\Http\Request;

class JobSearchAdapter implements JobSearchPort{

     private $request = null;


     function __construct(Request $request)
     {
         $this->request = $request;
     }

     function filter()
     {
         $query = JbJob::where('expiry_date','>=',date('Y-m-d h:i:s'));

         if ($this->request->filled('search_phrase')){
            $query = $query->where('role','like','%' . $this->request->search_phrase . '%')
                     ->orWhere('description','like','%' . $this->request->search_phrase . '%');
         }

         if ($this->request->filled('region_id')){
            if (is_null($query)){
                $query = $query->where('region_id',$this->request->region_id);
            }else{
                $query = $query->where('region_id',$this->request->region_id);
            }
         }

         if ($this->request->filled('discipline_id')){
            if (is_null($query)){
                $query = $query->where('discipline_id',$this->request->discipline_id);
            }else{
                $query = $query->where('discipline_id',$this->request->discipline_id);
            }
         }


         $pageLength = 3;

         if (is_null($query)){
            $query = JbJob::orderBy('id','desc')->paginate($pageLength);
         }else{
            $query = $query->orderBy('id','desc')->paginate($pageLength);
         }

         return [
             'list'=>$query
         ];

    //    $query = JbJob::
     }


     function skills($jobId)
     {
         $obj = JbJob::find($jobId);
         if (!is_null($obj->discipline)){
            //  dd($obj->discipline->skills);
            return [
                'list'=>$obj->discipline->skills
            ];
         }else{
             return [
                 'list'=>[]
             ];
         }
     }



}
