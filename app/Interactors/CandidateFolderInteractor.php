<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 8/3/2020
 * Time: 1:08 PM
 */

namespace App\Interactors;


use App\JbCandidateFolder;
use App\JbFolder;
use App\Models\JbCandidate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;

class CandidateFolderInteractor
{



	function updateFolder(){

		if (request()->filled('id')){

		  $id = request('id');
		  if (!(new JbFolder)->newQuery()->where('id',$id)->exists()){
		  	return [
		  		'message'=>'Invalid folder!',
			    'error'=>true
		    ];
		  }

		  $obj  = JbFolder::find($id);

		  if (request()->filled('remove')){
		  	$obj->delete();
			  return [
				  'message'=>'Folder removed',
				  'error'=>false
			  ];
		  }



		  $obj->name = request('name');

		  $obj->save();

			return [
				'message'=>'Folder updated',
				'error'=>false
			];

		}


		$obj = new JbFolder;
        $obj->name = request('name');
		$obj->save();

		return [
			'message'=>'New Folder created',
			'error'=>false
		];

	}


	function updateCandidateFolder(){

		if (!request()->filled('candidate')){
			return [
				'message'=>'Candidate required!',
				'error'=>true
			];
		}
		$candidate = request('candidate');

		if (!(new JbCandidate)->newQuery()->where('id',$candidate)->exists()){
			return [
				'message'=>'Invalid candidate!',
				'error'=>true
			];
		}

		if (!request()->filled('folder')){
			return [
				'message'=>'Invalid folder!',
				'error'=>true
			];
		}

		$folder = request('folder');
		$folderObj = JbFolder::find($folder);

		if (request()->filled('remove')){ //supply id to remove...


			//$id = request('id');
			//->where('id',$id='')

			if (!(new JbCandidateFolder)->newQuery()->whereHas('candidate',function(Builder $builder) use ($candidate){
				return $builder->where('jb_candidate_id',$candidate);
			})->exists()){
				return [
					'message'=>'Invalid candidate-folder selection!',
					'error'=>true
				];
			}

//			$obj = JbCandidateFolder::find($id);
//			$obj->delete();

			(new JbCandidateFolder)->newQuery()->whereHas('candidate',function(Builder $builder) use ($candidate,$folder){
				return $builder->where('jb_candidate_id',$candidate)->where('jb_folder_id',$folder);
			})->delete();

			return [
				'message'=>'Candidate-folder removed!',
				'error'=>true
			];


		}


		$obj = new JbCandidateFolder;
		$obj->jb_candidate_id = $candidate;
		$obj->jb_folder_id = $folder;
		$obj->save();

		return [
			'message'=>'Candidate assigned to selected folder (' . $folderObj->name . ')',
			'error'=>false
		];

	}


	function fetchCandidateBelongingToFolder(){

		if (!request()->filled('folder')){
			return [
				'message'=>'Invalid folder!',
				'error'=>true
			];
		}

		$folder = request('folder');

		$query = (new JbCandidate)->newQuery();
		$query = $query->whereHas('candidate_folder',function(Blueprint $blueprint) use ($folder){
           return $blueprint->where('jb_folder_id',$folder);
		});

		return $query;

	}

	function fetchFolders(){
		return (new JbFolder)->newQuery()->get();
	}





}