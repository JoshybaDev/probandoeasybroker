@if (isset($response["error"]))
<div class="alert alert-danger">
    <ul>
        @foreach ($response as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@else
<div class="alert alert-success">
    <ul>
        @foreach ($response as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif