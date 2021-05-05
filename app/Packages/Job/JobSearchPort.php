<?php
namespace App\Packages\Job;

interface JobSearchPort{


     function filter();

     function skills($jobId);


}
