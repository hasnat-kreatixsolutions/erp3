@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Product Type Edit</h3>
                        </div>
                        <div class="card-body">
                            <form id="form" action="{{ route('product-types.update', $product_type->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $product_type->name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="material">Material</label>
                                            <select id="material" name="material_id" class="form-control" required>
                                            @foreach (App\Models\Material::all() as $item)
                                            <option value="{{ $item->id }}" {{$product_type->material_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="particular">Particular</label>
                                            <select id="particular" name="particular_id" class="form-control" required>
                                            @foreach (App\Models\Particular::all() as $item)
                                            <option value="{{ $item->id }}" {{$product_type->material_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                            @endforeach
                                            </select>
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
                    console.log('Product Type updated successfully:', response);
                    alert('Product Type updated successfully!');
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
                        console.error('Error creating product-type:', xhr.responseText);
                        alert('Error creating product-type. Please try again.');
                    }
                }
            });
        });
    });
</script>
