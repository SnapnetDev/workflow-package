<?php

namespace App\Packages\Applicant;


interface ApplicantPort{
    
    
    function getMetricsByJob($jobId);
    function getApplicantsByJob($jobId);
    function saveFilterredSearch();
    
    function getMetricsByPool();
    function getApplicantsByPool();

    function roleFetch();
    function roleCreate();
    function roleUpdate();
    function permissionFetch();
    function permissionCreate();
    function permissionUpdate();

    function userAssignRole($userId);
    function userGet($id);




}