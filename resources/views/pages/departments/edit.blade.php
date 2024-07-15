@extends('layouts.app')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Department Edit</h3>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route('departments.update', $department->id) }}" method="POST" data-method="PUT">
                  @csrf
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $department->name }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Code</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{ $department->code }}">
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