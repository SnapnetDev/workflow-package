<?php
namespace App\Packages\CandidateDocument;



interface CandidateDocumentPort {



     function getList();
     function create();
     function update();
     function delete();
     function getItem($id);



}
