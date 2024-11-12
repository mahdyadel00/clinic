<div class="col-lg-12" >
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif


    @if ($message = Session::get('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif


    @if ($message = Session::get('warning'))
        <div class="alert alert-warning">{{ $message }}</div>
    @endif


    @if ($message = Session::get('info'))
        <div class="alert alert-info">{{ $message }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
