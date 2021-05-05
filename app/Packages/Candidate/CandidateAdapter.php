<?php
namespace App\Packages\Candidate;

use App\Models\JbCandidate;
use App\Models\JbCandidateJob;
use App\Packages\BooleanPort;
use App\Packages\DataPort;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class CandidateAdapter implements CandidatePort{


    private $request = null;
    private $cvParser = null;
    private $booleanPort = null;
    private $dataPort = null;

    function __construct(Request $request,BooleanPort $booleanPort,DataPort $dataPort)
    {
       $this->request = $request;
       $this->cvParser = new Parser;
       $this->booleanPort = $booleanPort;
       $this->dataPort = $dataPort;
    }


    function getList()
    {
      return [
          'list'=>JbCandidate::all()
      ];
    }

    private function updateInput($model){
        // 'name'=>'required',
        // 'email'=>'required',
        // 'phone_number'=>'required',
        // 'address'=>'required',
        // 'age'=>'required',
        // 'gender'=>'required',
        // 'marital_status'=>'required',
        // 'cover_letter'=>'required'
        $model->name = $this->request->name;
        $model->email = $this->request->email;
        $model->phone_number = $this->request->phone_number;
        $model->address = $this->request->address;
        $model->age = $this->request->age;
        $model->gender = $this->request->gender;
        $model->marital_status = $this->request->marital_status;
        $model->cover_letter = $this->request->cover_letter;

        $model->jb_discipline_id = $this->request->jb_discipline_id;

        $model->user_id = Auth::user()->id;

        $allowed = ['pdf'];

        if ($this->request->has('cv_upload') && $this->request->filled('cv_upload')){

            $mime = $this->request->cv_upload->getClientOriginalextension();

            if (!in_array($mime, $allowed)){
            //    return [
            //        'message'=>'Invalid file-type (Only PDF is allowed)',
            //        'error'=>true
            //    ];
            }else{
                $pdf = $this->cvParser->parseFile($this->request->cv_upload->getRealPath());

                $text = $pdf->getText();

                $text =  $this->scanText($text);

                $model->cv_string = $text;
            }

        }


    }

    function scanText($txt)
    {
        $r = [];
        for ($c = 0; $c < strlen($txt); $c++) {
            if ($txt[$c] == "," || $txt[$c] == '.') {
                $r[] = "_SPC_";
            } else {
                $r[] = trim($txt[$c]);
            }
        }
        return implode('', $r);
    }


    private function getModel(){
      $id = $this->request->id;
      $model = JbCandidate::find($id);
      return $model;
    }


    function create()
    {

        $check = JbCandidate::where('user_id',Auth::user()->id)->count();
        if ($check){
          $model = JbCandidate::where('user_id',Auth::user()->id)->first();
        }else{
          $model = new JbCandidate;
        }

        $this->updateInput($model);

        $model->save();

        if (session()->has('jobId')){
          $this->applyForJob(session()->get('jobId'));
        }

        return [
            'message'=>'Your C.V has been created successfully, Edit below additional information about your C.V ',
            'error'=>false,
            'data'=>$model
        ];

    }

    function update()
    {
        $model = $this->getModel();
        $this->updateInput($model);
        $model->save();

        if (session()->has('jobId')){
            $this->applyForJob(session()->get('jobId'));
        }

        return [
            'message'=>'Your C.V has been created successfully, Edit below additional information about your C.V ',
            'data'=>$model
        ];
    }

    function delete()
    {
      $model = $this->getModel();
      $model->delete();
      return [
          'message'=>'Application removed.',
          'data'=>$model
      ];
    }

    function hasProfile($user_id)
    {
      return (JbCandidate::where('user_id',$user_id)->count() >= 1);
    }

    function getItem($id)
    {
       return [
           'data'=>JbCandidate::find($id)
       ];
    }


    function myEducations($user_id)
    {

    }

    function mySkills($user_id)
    {

    }

    function myCertifications($user_id)
    {

    }

    function myWorkExperience($user_id)
    {

    }


    function skills($candidateId)
    {
        $obj = JbCandidate::find($candidateId);
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


    function applyForJob($jobId)
    {
        //jobId
        $check = JbCandidateJob::where('jb_job_id',$jobId)->where('jb_candidate_id',Auth::user()->id);
        if ($check->count()){
           return [
               'message'=>'You have already applied for this job!',
               'data'=>$check->first()
           ];
        }else{
           $model = new JbCandidateJob;
           $model->jb_job_id = $jobId;
           $model->jb_candidate_id = Auth::user()->id;
           $model->save();
           return [
               'message'=>'You have successfully applied for the Job.',
               'data'=>$model
           ];

        }
    }


    function hasCv()
    {
        //JbCandidate
//        $check = JbCandidate::where('user_id',Auth::user()->id)->count();
//        return ($check > 0);
        return $this->booleanPort->hasCv(Auth::user()->id);
    }

    function getCandidate()
    {
        $obj = JbCandidate::where('user_id',Auth::user()->id)->first();
        return $obj;
    }
    
    public function getProfile($id)
    {
        
//         $candidateService = new CandidateService(new CandidateAdapter($request));
//         $data = $candidateService->getItem($candidate);
//         $data3 = $candidateService->skills($data['data']->id);
//         $data['skills'] = $data3['list'];
        
        $response = [];
        
        $response = $this->getItem($id);
//         dd($response);
        $data3 = $this->skills($response['data']->id);
        
        $response['skills'] = $data3['list'];
        
        return $response;
        
        
    }


}
