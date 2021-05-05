<?php
namespace App\Packages\Region;


interface RegionPort{


     function create();
     function update();
     function delete();
     function getList();
     function getItem($id);
     function getCount();


}
