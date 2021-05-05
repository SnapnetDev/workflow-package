<?php
namespace App\Packages\Crud;


interface CrudPort{


     function create();
     function update();
     function delete();
     function getList();
     function getItem($id);
     function getCount();


}
