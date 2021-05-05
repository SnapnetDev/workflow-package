@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div style="clear: both;">&nbsp;</div>
<span style="font-weight: bold;">
@include('notifications.message')
</span>
<div style="clear: both;">&nbsp;</div>




<div class="col-md-12 row" style="padding: 0;margin: 0;">

 <div class="col-md-6" style="padding: 3px;">
   
   <img alt="" src="{{ asset('landing/1.jpg') }}" style="width: 100%;" />
   
   <div class="col-md-12" style="
    margin-top: 7px;
   ">
   
      <h3>
        Experienced Professional
      </h3>
      
      <p align="justify">
      
      Enhance your career development as an experienced professional with Snapnet and continue on your path to reach your full potential.
      
      </p>
   
   </div>
  
 </div>

 <div class="col-md-6" style="padding: 3px;">
   
   <img alt="" src="{{ asset('landing/2.jpg') }}" style="width: 100%;height: 374px;" />


   <div class="col-md-12" style="
    margin-top: 7px;
   ">
   
      <h3>
        Students and graduates
      </h3>
      
      <p align="justify">
      
      Are you a remarkable student or graduate with less than three years' experience? Join us as we explore and discover better innovative technological solutions together.

      
      </p>
   
   </div>

  
 </div>

</div>



@include('js.job_filter')


            <div class="card-header" style="background-color: #100a46;color: #fff;">Jobs Filter</div>
            <div class="col-md-12 row" style="padding-top: 14px;padding-bottom: 27px;margin: 0;border: 1px solid #eee;margin-bottom: 5px;">

                 <div class="col-md-4">
                     <label for="">
                         Search Phrase
                     </label>
                     <input type="text" class="form-control" id="search_phrase"  />
                 </div>


                 <div class="col-md-4">
                        <label for="">
                            Discipline
                        </label>
                        <select class="form-control" id="search_discipline_id">
                            <option value="">Select All</option>
                            @foreach ($discipline['list'] as $item)

                               <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-4">
                            <label for="">
                                Region
                            </label>
                            <select class="form-control" id="search_region_id">
                                    <option value="">Select All</option>
                                    @foreach ($region['list'] as $item)

                                       <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @endforeach
                                </select>
                    </div>



                    {{-- <div class="col-md-12" align="right" style="padding-top: 16px;">
                        <button class="btn btn-sm btn-success">Search</button>
                    </div> --}}


            </div>






            <div class="card-header" style="background-color: #100a46;color: #fff;">Jobs Listing</div>



            <div class="col-md-12" style="padding: 0;" id="outlet">


            {{-- <div class="col-md-12">
              {{$jobs->links()}}
            </div> --}}


            </div>

            <div class="col-md-12">
                <button class="form-control btn btn-sm btn-default"><b style="color: #000;" id="status">+ Load More</b></button>
            </div>




        </div>
    </div>
</div>
@endsection
