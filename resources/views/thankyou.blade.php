<h1>Thank you</h1>

<script>
    setTimeout(function(){
        window.location.href = '{{ url()->previous() }}';
    },2000);
</script>