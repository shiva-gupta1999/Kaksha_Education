
@if ($message = Session::get('success'))
<div class="success">
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="error">
    <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{ url('charge') }}" method="post">
    @csrf
<input type="text" name="amount" />
<input type="submit" name="submit" value="Pay Now" />
@csrf
</form>
