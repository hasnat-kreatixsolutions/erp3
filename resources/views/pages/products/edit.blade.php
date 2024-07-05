@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Product Edit</h3>
                        </div>
                        <div class="card-body">
                            <form id="form" action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $product->name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="department_id">Department</label>
                                            <select id="department_id" name="department_id" class="form-control" required>
                                                @foreach (App\Models\Department::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $product->department_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="product_type_id">Product Type</label>
                                            <select id="product_type_id" name="product_type_id" class="form-control"
                                                required>
                                                @foreach (App\Models\ProductType::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $product->product_type_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="material_id">Material</label>
                                            <select id="material_id" name="material_id" class="form-control" required>
                                                @foreach (App\Models\Material::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $product->material_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="particular_id">Particular</label>
                                            <select id="particular_id" name="particular_id" class="form-control" required>
                                                @foreach (App\Models\Particular::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $product->particular_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="qty">Opening Quantity</label>
                                            <input type="text" id="qty" name="qty" class="form-control"
                                                value="{{ $product->qty }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inventory_price">Opening Inventory Price</label>
                                            <input type="text" id="inventory_price" name="inventory_price"
                                                class="form-control" value="{{ $product->inventory_price }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="total_price">Total Price</label>
                                            <input type="text" id="total_price" name="total_price" class="form-control"
                                                value="{{ $product->total_price }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="min_qty_limit">Minimum Quantity Limit</label>
                                            <input type="text" id="min_qty_limit" name="min_qty_limit"
                                                class="form-control" value="{{ $product->min_qty_limit }}">
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
                    console.log('Product updated successfully:', response);
                    alert('Product updated successfully!');
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
                        console.error('Error creating product:', xhr.responseText);
                        alert('Error creating product. Please try again.');
                    }
                }
            });
        });
    });
</script>


