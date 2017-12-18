<script type="text/javascript">
  $('body').delegate("#deleteUser","click", function() {
    var delete_url = $(this).attr('data-url');
    var id_quotation = $(this).attr('idUser');

    swal({
      title: 'Warning !',
      text: "Delete user with id "+id_quotation,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel'
    }).then (function(){
      window.location.href = delete_url;
    });
    return false;
  });
</script>