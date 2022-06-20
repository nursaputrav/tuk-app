@if(session()->has('success'))
  <div id="alert" class="alert alert-success text-center" role="alert">
    {{ session()->get('success') }}
    {{-- <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
@endif

@if(session()->has('error'))
<div id="alert" class="alert alert-danger text-center" role="alert">
    {{ session()->get('error') }}
    {{-- <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  </div>
@endif
<script>
    window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
</script>
