@extends('layouts.app')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Manufacturer Create</h3>
            </div>
            <div class="card-body">
                <form id="form" data-route="{{ route('manufacturers.store') }}" method="POST">
                  @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" id="name" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Brand</label>
                          <input type="text" id="brand" name="brand" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Contact Person</label>
                          <input type="text" id="contact_person" name="contact_person" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Email</label>
                          <input type="email" id="email" name="email" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Contact</label>
                          <input type="text" id="contact" name="contact" class="form-control">
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-secondary">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#form').on('submit', function(event) {
        event.preventDefault();

        const formData = $(this).serialize();
        const route = $(this).data('route');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: route,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                console.log('Manufacturer created successfully:', response);
                alert('Manufacturer created successfully!');
                // Optionally redirect or perform other actions after success
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Validation error:\n';
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessage += `${key}: ${errors[key].join(', ')}\n`;
                        }
                    }
                    alert(errorMessage);
                } else {
                    console.error('Error creating manufacturer:', xhr.responseText);
                    alert('Error creating manufacturer. Please try again.');
                }
            }
        });
    });
});

</script>