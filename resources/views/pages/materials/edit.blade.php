@extends('layouts.app')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Material Edit</h3>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route('materials.update', $material->id) }}" method="POST">
                  @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" id="name" name="name" class="form-control" value="{{$material->name}}">
                        </div>
                      </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="particular">Particular</label>
                                <select id="particular" name="particular_id" class="form-control" required>
                                @foreach (App\Models\Particular::all() as $item)
                                <option value="{{ $item->id }}" {{$material->particular_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                                </select>
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
                console.log('Material updated successfully:', response);
                alert('Material updated successfully!');
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
                    console.error('Error creating material:', xhr.responseText);
                    alert('Error creating material. Please try again.');
                }
            }
        });
    });
});


</script>