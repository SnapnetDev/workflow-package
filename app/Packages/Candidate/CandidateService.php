<?php
namespace App\Packages\Candidate;

class CandidateService implements CandidatePort{


     private $port = null;

     function __construct(CandidatePort $candidatePort)
     {
         $this->port = $candidatePort;
     }

     function getList()
     {
        return $this->port->getList();
     }

     function getItem($id)
     {
        return $this->port->getItem($id);
     }

     function hasProfile($id)
     {
        return $this->port->hasProfile($id);
     }

     function delete()
     {
        return $this->port->delete();
     }

     function create()
     {
        return $this->port->create();
     }

     function update()
     {
        return $this->port->update();
     }


     function myEducations($user_id)
     {
        return $this->port->myEducations($user_id);
     }

     function mySkills($user_id)
     {
        return $this->port->mySkills($user_id);
     }

     function myCertifications($user_id)
     {
        return $this->port->myCertifications($user_id);
     }

     function myWorkExperience($user_id)
     {
        return $this->port->myWorkExperience($user_id);
     }

     function skills($candidateId)
     {
         return $this->port->skills($candidateId);
     }

     function applyForJob($jobId)
     {
         return $this->port->applyForJob($jobId);
     }

     function hasCv()
     {
         return $this->port->hasCv();
     }

     function getCandidate()
     {
         return $this->port->getCandidate();
     }

}
