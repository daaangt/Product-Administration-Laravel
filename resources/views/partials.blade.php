@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="py-3">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
