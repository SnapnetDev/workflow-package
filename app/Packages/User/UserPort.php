<?php

namespace App\Packages\User; 



interface UserPort{
    
    
    function getUserDocuments($userId);
    function getUserProfile($userId);
    function getCandidateProfile($candidateId);
    function updateUserCollection($collection);

    function enableNotification();
    function disableNotification();
    
    
    
    
}
