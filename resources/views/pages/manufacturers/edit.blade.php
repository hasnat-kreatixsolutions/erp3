@extends('layouts.app')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Manufacturer Edit</h3>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route('manufacturers.update', $manufacturer->id) }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $manufacturer->name }}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Brand</label>
                        <input type="text" id="brand" name="brand" class="form-control" value="{{ $manufacturer->brand }}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Contact Person</label>
                        <input type="text" id="contact_person" name="contact_person" class="form-control" value="{{ $manufacturer->contact_person }}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $manufacturer->email }}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Contact</label>
                        <input type="text" id="contact" name="contact" class="form-control" value="{{ $manufacturer->contact }}">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-secondary">Update</button>
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
    $('#form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var formAction = $(this).attr('action');
        
        $.ajax({
            url: formAction,
            method: 'PUT',
            data: formData,
            success: function(response) {
                console.log('Manufacturer updated successfully:', response);
                alert('Manufacturer updated successfully!');
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