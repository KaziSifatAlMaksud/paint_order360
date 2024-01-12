<script>
    function showNotificationModal(message,context,position){

        if (context === '') {
            context = 'info';
        }

        if (position === '') {
            positionClass = 'toast-bottom-right';
        } else {
            positionClass = 'toast-' + position;
        }
        toastr.remove();
        toastr[context](message, '', {
            positionClass:  positionClass
        });

    }
</script>
@if ($message = Session::get('success'))
   <script>
       showNotificationModal('{{ $message }}','success','bottom-right');
   </script>
@endif


@if ($message = Session::get('error'))
   <script>
       showNotificationModal('{{ $message }}','error','bottom-right');
   </script>
@endif


@if ($message = Session::get('warning'))
   <script>
       showNotificationModal('{{ $message }}','warning','bottom-right');
   </script>
@endif

@if ($message = Session::get('info'))
   <script>
       showNotificationModal('{{ $message }}','info','bottom-right');
   </script>
@endif


@if ($errors->any())
    <script>
    @foreach ($errors->all() as $error)
        showNotificationModal('{{ $error }}','error','bottom-right');
    @endforeach
   </script>
@endif


