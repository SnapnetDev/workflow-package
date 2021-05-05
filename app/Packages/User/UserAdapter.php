<?php 

namespace App\Packages\User;


use App\JbCandidateDocument;
use App\Packages\DataPort;
use App\User;
use App\Models\JbCandidate;
use App\Packages\Candidate\CandidatePort;
use Auth;

class UserAdapter implements UserPort{
    
//     private $userPort = null;

    private $candidatePort = null;
    private $dataPort = null;
    
    function __construct(CandidatePort $candidatePort, DataPort $dataPort){
//         $this->userPort = $userPort;
        $this->candidatePort = $candidatePort;
        $this->dataPort = $dataPort;
    }
    
    public function getUserDocuments($userId)
    {
        $collection = JbCandidateDocument::where('user_id',$userId)->get();
        return [
            'list'=>$collection
        ];
    }

    public function updateUserCollection($collection)
    {
        
        foreach ($collection as $k=>$v){ //this collection is from candidates ... 
            
            $collection[$k]['documents'] = $this->getUserDocuments($v->candidate->user_id);
            $collection[$k]['candidate_profile'] = $this->candidatePort->getProfile($v->candidate->id);
        }
        
        return $collection;
    }

    public function getUserProfile($userId)
    {
        $user = User::find($userId);
        return [
            'data'=>$user
        ];
    }
    public function getCandidateProfile($candidateId)
    {
        $candidate = JbCandidate::find($candidateId);
        return [
            'data'=>$candidate
        ];
    }


    function enableNotification()
    {
        // TODO: Implement enableNotification() method.
        //createNotification
        $this->dataPort->createNotification(Auth::user()->id);
        return $this->dataPort->enableNotification(Auth::user()->id);
    }

    function disableNotification()
    {
        // TODO: Implement disableNotification() method.
        $this->dataPort->createNotification(Auth::user()->id);
        return $this->dataPort->disableNotification(Auth::user()->id);
    }
}