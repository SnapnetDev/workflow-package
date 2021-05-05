<?php
namespace App\Packages\Job;

class JobSearchService implements JobSearchPort{

    private $port = null;

    function __construct(JobSearchPort $jobSearchPort)
    {
        $this->port = $jobSearchPort;
    }

    function filter()
    {
        return $this->port->filter();
    }

    function skills($jobId)
    {
        return $this->port->skills($jobId);
    }


}
