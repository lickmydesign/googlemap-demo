<div class="alert alert-danger mt-3" role="alert">
    <i class="material-icons" style="display: inline-flex; vertical-align: top;">error</i> There are errors:
    <ul class="mt-2">
    @foreach($errors->all() as $err)
        <li>{{ $err }}</li>
    @endforeach
    </ul>
</div>
