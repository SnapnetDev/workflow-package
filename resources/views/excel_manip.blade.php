@if (session()->has('message'))
    <div>
        <b>{{ session()->get('message') }}</b>
    </div>
@endif
<form action="{{ route('excel.manip.action') }}" method="post" enctype="multipart/form-data">

    <input type="file" name="file" />

     @csrf

    <input type="submit" value="Convert" />

</form>