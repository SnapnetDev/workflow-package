                @if (session()->has('message'))
                  @if (!session()->get('error'))
                    <div class="alert alert-info">{{session()->get('message')}}</div>
                  @else
                    <div class="alert alert-danger">{{session()->get('message')}}</div>
                  @endif  
 
                @endif


                @if ($errors->any())

                 @foreach ($errors->all() as $error)
                  
                    <div class="alert alert-danger">{{$error}}</div>

                 @endforeach

                @endif