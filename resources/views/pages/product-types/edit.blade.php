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
                            <form id="form" action="{{ route('product-types.update', $product_type->id) }}" method="POST" data-method="PUT">
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

