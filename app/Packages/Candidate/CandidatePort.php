<?php
namespace App\Packages\Candidate;

interface CandidatePort{



     function getList();
     function getItem($id);
     function create();
     function update();
     function hasProfile($id);
     function delete();

     function myEducations($user_id);
     function mySkills($user_id);
     function myCertifications($user_id);
     function myWorkExperience($user_id);

     function skills($candidateId);


     function applyForJob($jobId);

     function hasCv();
     function getCandidate();
     
     function getProfile($id);


    //  function getRecruitmentType();
    //  function getCompetence();
    //  function getEducation();
    //  function getskill();
    //  function getCertification();

    //  $config['jb_recruitment_type_ids'] = JbRecruitmentType::all();
    //  $config['jb_competency_ids'] = JbCompetence::all();
    //  $config['educations'] = JbEducation::all();
    //  $config['skills'] = JbSkill::all();
    //  $config['certifications'] = JbCertification::all();



}
