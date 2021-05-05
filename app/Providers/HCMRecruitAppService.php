<?php

namespace App\Providers;

use App\Packages\Applicant\ApplicantAdapter;
use App\Packages\Applicant\ApplicantPort;
use App\Packages\Application\ApplicationAdapter;
use App\Packages\Application\ApplicationPort;
use App\Packages\BooleanAdapter;
use App\Packages\BooleanPort;
use App\Packages\Candidate\CandidateAdapter;
use App\Packages\Candidate\CandidatePort;
use App\Packages\CandidateDocument\CandidateDocumentAdapter;
use App\Packages\CandidateDocument\CandidateDocumentPort;
use App\Packages\DataAdapter;
use App\Packages\DataPort;
use App\Packages\Discipline\DisciplineAdapter;
use App\Packages\Discipline\DisciplinePort;
use App\Packages\FactoryAdapter;
use App\Packages\FactoryPort;
use App\Packages\FilterAdapter;
use App\Packages\FilterPort;
use App\Packages\GarbageAdapter;
use App\Packages\GarbagePort;
use App\Packages\Job\JobAdapter;
use App\Packages\Job\JobPort;
use App\Packages\Job\JobSearchAdapter;
use App\Packages\Job\JobSearchPort;
use App\Packages\NotificationAdapter;
use App\Packages\NotificationPort;
use App\Packages\PermissionAdapter;
use App\Packages\PermissionPort;
use App\Packages\Region\RegionAdapter;
use App\Packages\Region\RegionPort;
use App\Packages\RepoAdapter;
use App\Packages\RepoPort;
use App\Packages\ScanAdapter;
use App\Packages\ScanPort;
use App\Packages\UploadAdapter;
use App\Packages\UploadPort;
use App\Packages\User\UserAdapter;
use App\Packages\User\UserPort;
use App\Packages\ValueAdapter;
use App\Packages\ValuePort;
use Illuminate\Support\ServiceProvider;

class HCMRecruitAppService extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(CandidateDocumentPort::class,CandidateDocumentAdapter::class);
        $this->app->bind(ApplicantPort::class,ApplicantAdapter::class);
        $this->app->bind(UserPort::class,UserAdapter::class);
        $this->app->bind(CandidatePort::class,CandidateAdapter::class);
        $this->app->bind(DisciplinePort::class,DisciplineAdapter::class);
        $this->app->bind(RegionPort::class,RegionAdapter::class);
        $this->app->bind(JobPort::class,JobAdapter::class);
        $this->app->bind(JobSearchPort::class,JobSearchAdapter::class);

        $this->app->bind(RepoPort::class,RepoAdapter::class);
        $this->app->bind(BooleanPort::class,BooleanAdapter::class);
        $this->app->bind(DataPort::class,DataAdapter::class);
        $this->app->bind(NotificationPort::class,NotificationAdapter::class);
        $this->app->bind(ApplicationPort::class,ApplicationAdapter::class);

        $this->app->bind(FactoryPort::class,FactoryAdapter::class);
        $this->app->bind(GarbagePort::class,GarbageAdapter::class);
        $this->app->bind(ValuePort::class,ValueAdapter::class);
        $this->app->bind(PermissionPort::class,PermissionAdapter::class);
        $this->app->bind(FilterPort::class,FilterAdapter::class);
        $this->app->bind(ScanPort::class,ScanAdapter::class);
        $this->app->bind(UploadPort::class,UploadAdapter::class);


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
