<?php 

namespace App\Packages\Discipline;


interface DisciplinePort{
    
    
    function create();
    function update();
    function delete();
    function getList();
    function getItem($id);
    function getCount();
    
    
}
