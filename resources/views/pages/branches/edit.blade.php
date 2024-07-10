@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Branch Edit</h3>
                        </div>
                        <div class="card-body">
                            <form id="form" action="{{ route('branches.update', $branch->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $branch->name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="text" id="email" name="email" class="form-control"
                                                value="{{ $branch->email }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Contact Number</label>
                                            <input type="text" id="contact_number" name="contact_number" class="form-control"
                                                value="{{ $branch->contact_number }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Address</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                value="{{ $branch->address }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-secondary">Update</button>
                                        </div>
                                    </div>
                                </div>
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
                    console.log('Branch updated successfully:', response);
                    alert('Branch updated successfully!');
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
                        console.error('Error creating branch:', xhr.responseText);
                        alert('Error creating branch. Please try again.');
                    }
                }
            });
        });
    });
</script>
