@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Employee Create</h3>
                        </div>
                        <div class="card-body">
                            <form id="form" data-route="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" id="contact_number" name="contact_number"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cnic_number">CNIC Number</label>
                                            <input type="text" id="cnic_number" name="cnic_number" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" id="dob" name="dob" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="shift">Shift</label>
                                            <input type="text" id="shift" name="shift" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="department_id">Department</label>
                                            <select id="department_id" name="department_id" class="form-control" required>
                                                @foreach (App\Models\Department::all() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hiring_date">Hiring Date</label>
                                            <input type="date" id="hiring_date" name="hiring_date" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="salary">Salary</label>
                                            <input type="number" id="salary" name="salary" class="form-control"
                                                step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="profile_picture">Profile Picture</label>
                                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="resume">Resume</label>
                                            <input type="file" id="resume" name="resume" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="documents">Document</label>
                                            <input type="file" id="documents" name="documents" class="form-control">
                                        </div>
                                    </div>
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

            // Prepare form data
            var formData = new FormData(this);

            // Add extra data if needed (e.g., CSRF token)
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: $(this).data('route'), // URL to submit the form data
                type: 'POST',
                data: formData,
                contentType: false, // Ensure Content-Type is false for FormData
                processData: false, // Ensure processData is false for FormData
                success: function(response) {
                    console.log('Employee created successfully:', response);
                    alert('Employee created successfully!');
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
                        console.error('Error creating employee:', xhr.responseText);
                        alert('Error creating employee. Please try again.');
                    }
                }
            });
        });
    });
</script>
