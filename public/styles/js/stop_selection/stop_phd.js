$(document).ready(function() {
    $('#block-btn').on('click', function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/block-links_PHD', 
            type: 'POST',
            data: {
                'link_id': 5, 
                'status': true // true for blocking, false for unblocking
            },
            success: function(response) {
                let message = response.message1; // the response contains a 'message' property with the success message
                $('#alert-container').append(
                    `<div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                        <strong>${message}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                );
                //location.reload(); Reload the page after successful update
            },
            error: function(xhr, status, error) {
                //the error if needed
            }
        });
    });
    $('#unblock-btn').on('click', function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/block-links_PHD', 
            type: 'POST',
            data: {
                'link_id': 5, 
                'status': false // true for blocking, false for unblocking
            },
            success: function(response) {
                let message = response.message2; // the response contains a 'message' property with the success message
                $('#alert-container').append(
                    `<div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                        <strong>${message}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                );
                //location.reload(); Reload the page after successful update
            },
            error: function(xhr, status, error) {
                //the error if needed
            }
        });
    });
});