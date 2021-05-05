<div>
    {{-- The best athlete wants his opponent at his best. --}}


    <h4>
        Applicants Mail Centre
    </h4>

    <div class="row">

        <div class="col-md-3" style="
    background-color: #888888;
    color: #fff;
    padding-top: 11px;
    letter-spacing: 2px;
    border-top: 4px solid #000;">

            {{--{{ $filterSelect }}--}}

            <div class="col-md-12">
                <label for="">
                    Filters
                </label>
                <select wire:model="filterSelect" class="form-control" name="" id="">
                    <option value="">--Select-</option>
                    @foreach ($filters as $filter)
                        <option value="{{ $filter->id }}">{{ $filter->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label for="">
                    Job Role
                </label>
                <select wire:model="jobRoleSelect" class="form-control" name="" id="">
                    <option value="">--Select--</option>
                    @foreach ($jobRoles as $jobRole)
                        <option value="{{ $jobRole->id }}">{{ $jobRole->role }}</option>
                    @endforeach
                </select>
            </div>



            <div class="col-md-12">
                <label for="">
                    Folder/Groups
                </label>
                <select wire:model="folderSelect" class="form-control" name="" id="">
                    <option value="">--Select--</option>
                    @foreach ($folders as $folder)
                        <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="col-md-6" style="
    background-color: #eee;
    padding: 11px;">

            <div class="col-md-12">
                <h5 style="text-transform: uppercase;">{{ $subject }}</h5>
            </div>


            <form method="post" wire:submit.prevent="sendCandidateMail">


                <div class="col-md-12">
                    <label for="">To : </label>
                    <input type="text" class="form-control" wire:model="to" />
                </div>

                <div class="col-md-12">
                    <label for="">Subject : </label>
                    <input type="text" class="form-control" wire:model="subject" />
                </div>

                <div class="col-md-12">
                    <label for="">Message : </label>
                    <textarea class="form-control" id="" cols="30" rows="10" wire:model="message"></textarea>
                </div>

                <div>
                    &nbsp;
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary">Send</button>
                </div>

            </form>



        </div>

        <div class="col-md-3" style="height: 300px;overflow-y: scroll;">
            
            <h5><u style="color: #000;">Selected E-mails</u></h5>
            <div>
                @foreach ($applicants as $k=>$item)

                     <div>
                         <input type="checkbox" wire:model="applicants" value="{{ $item->id }}" checked   />
                         &nbsp;{{ $item->email }}
                     </div>

                @endforeach
            </div>

        </div>




    </div>


</div>
