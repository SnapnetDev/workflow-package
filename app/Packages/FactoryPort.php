<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/13/2020
 * Time: 12:01 PM
 */

namespace App\Packages;


interface FactoryPort
{

    function roleFactory();
    function permissionFactory();
    function rolePermissionFactory();
    function userFactory();
    function candidateFactory();
    function disciplineFactory();
    function documentFactory();
    function candidateJobFactory();
    function candidateEducationFactory();
    function candidateSkillFactory();

    function candidateWorkExperienceFactory();
    function filterFactory();
    function settingFactory();



}