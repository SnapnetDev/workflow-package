<?php
/**
 * Created by IntelliJ IDEA.
 * User: NnamdiAlexanderAkamu
 * Date: 1/20/2020
 * Time: 4:03 PM
 */

namespace App\Packages\Job;


interface JobPort
{

    function create();
    function update();
    function delete();
    function getList();
    function getItem($id);
    function getCount();


}
