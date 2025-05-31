<script>
    $('#profilePic').dropify({
        messages: {
            'default': 'Insert your picture!',
            'replace': 'click to replace your picture!',
            'remove':  'remove picture!',
            'error':   'Ooops, something went wrong!.'
        },
        error: {
            'fileSize': 'error because of file size',
            'minWidth': 'required minWidth is',
            'maxWidth': 'not allowed because its maxWidth',
            'minHeight': 'min Height is',
            'maxHeight': 'maxHeight require is',
            'imageFormat': 'must be jpg, png, gif, etc.'
        },
    });

    $('#editProfilePic').click(function(){
        $('#edit-profile-pic').modal('show');
    })
   
    $('#save-profile-pic').click(function(event) {
            event.preventDefault(); 

            var form = $('#profile-pic-form');

            var formData = new FormData(form[0]);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: response.successMessage,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Okay'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                },
                error: function(xhr, status, error) {
                    let errors = xhr.responseJSON.errors;

                    let errorMessage = '';
                    if (errors && errors.profilePic) {
                        errorMessage = errors.profilePic[0];
                    } else {
                        errorMessage = 'Something went wrong while uploading.';
                    }

                    Swal.fire({
                        title: 'Error',
                        text: errorMessage,
                        icon: 'error'
                    });
                }
            });
    });
   

   
   

    
    
</script>