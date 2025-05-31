<script>
    function confirmDelete(id){
        let employeeId = id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger mr-2',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            imageUrl: "{{ asset("img/trash-can.png") }}",
            imageHeight: 200,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel.',
            reverseButtons: false
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: `/employees/${employeeId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: "Employee has been deleted.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                            // Add a delay of 1 second (1000 ms) before reloading the page
                            setTimeout(function() {
                                window.location.reload();  // Fixed the typo here
                            }, 1000);  // 1 second delay
                        }
                        })

                    },
                    error: function(error) {
                        // Handle error response
                        console.error('DELETE request failed:', error);
                    }
                });
            } else {
                result.dismiss == Swal.DismissReason.cancel;
                swalWithBootstrapButtons.fire(
                    'Oops...',
                    'Something went wrong!',
                    'error'
                );
            }
        })
    }
</script>

<script>
    let table = new DataTable('#employeeTable');
</script>