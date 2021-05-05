<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\JbCandidate;

class JbFilter extends Model
{
    //



    function applyAndGetFilterResult($queryBuilder,$filters=[]){

      
      
      // $query = JbCandidate;

      $query = $queryBuilder;
      

      //Age Start / Stop .
      if (isset($filters['ageStart'])){

          $query = $query->where('age','>=',$filters['ageStart']);

          if (isset($filters['ageStop'])){
            $query = $query->where('age','<=',$filters['ageStop']);
          }

      }

      
      // Skills
      if (isset($filters['skill'])){
                
          $skill = $filters['skill'];

          foreach ($skill as $skl){

           
           if (is_numeric($skl)){

            // echo '111:' . $skl;

           
               $query = $query->whereHas('candidateSkills',function($innerQuery2) use ($filters,$skl){

                     $innerQuery2->where('jb_skill_id',$skl);
                   
               });
           
           }else{

            // echo 'called...' . $skl;

                $query = $query->where('cv_string','like',"%" . $skl . "%");

           }
            
          }

      }



      // Skills
      if (isset($filters['certification'])){
        
          $certification = $filters['certification'];

          foreach ($certification as $cert){

            
           
           if (is_numeric($cert)){
            
                $query = $query->whereHas('candidateCertifications',function($innerQuery2) use ($filters,$cert){

                       $innerQuery2->where('jb_certification_id',$cert);
                     
                });  
           
           }else{

               $query = $query->where('cv_string','like',"%" . $cert . "%");

           }
            
          }

      }

      //competence
      if (isset($filters['keyword'])){

       // print_r($filters);

          $keyword = $filters['keyword'];

          foreach ($keyword as $kwd){            
           // echo $kwd;
              $query = $query->where('cv_string','like',"%" . $kwd . "%"); 
             
          }


      }


      return $query;        
      // return $query->paginate(7);        

    }


}
