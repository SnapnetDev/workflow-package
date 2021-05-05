@foreach ($list as $job)

<div class="col-md-12" style="border: 1px solid #ddd;margin: 8px;padding-top: 10px;padding-bottom: 10px;margin-left: 0;margin-top: 0;border-top: 0;">

  <div class="col-md-12">
         <label style="font-weight: bold;">
             Role
         </label>

         <div style="float: right;">
             <small>
              Salary Range : &#x20A6;
               {{$job->formatSalaryRange()}}
             </small>
         </div>

  </div>
  <div class="col-md-12">
      {{$job->role}}
  </div>



  <div class="col-md-12">
         <label style="font-weight: bold;">
             Description
         </label>
  </div>
  <div class="col-md-12 t-overflow" style="
    overflow-y: hidden;
    text-overflow: ellipsis;
    /*height: 40px;*/
">
      {!! $job->description !!}

      <p class="read-more">&nbsp;</p>
  </div>



  <div class="col-md-12">
         <label style="font-weight: bold;margin-top: 21px;color: #aaa;margin-bottom: 0;">
              Job expires in
         </label>
  </div>
  <div class="col-md-12 t-overflow">
      {{$job->expiry_date}}
  </div>



  <div class="col-md-12" align="right" style="padding: 0;">

          @auth
         @if (Auth::user()->role == 'admin')
         <!-- nothing -->
         @endif
          @endauth

       @auth
         @if (Auth::user()->candidate()->exists() && !$job->hasCandidate(Auth::user()->candidate->id))
           <a href="{{ route('job.show',$job->id) }}" class="btn btn-sm btn-primary" style="            width: 14%;
            padding: 6px;
            border-radius: 0;
            background-color: #100a46;
            border: 1px solid #100a46;
">
             Detail
           </a>
         @elseif (Auth::user()->candidate()->exists() && $job->hasCandidate(Auth::user()->candidate->id))
           <a href="{{ route('job.show',$job->id) }}" class="btn btn-sm btn-success">
             <img src="/pass.png" style="width: 18px;" />  Applied.
           </a>
         @else
           <a href="{{ route('job.show',$job->id) }}" class="btn btn-sm btn-primary" style="
            width: 14%;
            padding: 6px;
            border-radius: 0;
            background-color: #100a46;
            border: 1px solid #100a46;
        ">
             Detail
           </a>
         @endif
       @else
         <a href="{{ route('job.show',$job->id) }}" class="btn btn-sm btn-primary" style="
            width: 14%;
            padding: 6px;
            border-radius: 0;
            background-color: #100a46;
            border: 1px solid #100a46;
        ">
           Detail
         </a>
       @endauth
       </a>

  </div>




  </div>

@endforeach
