@extends('layouts.app')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Customer Edit</h3>
            </div>
            <div class="card-body">
                <form id="form" action="{{ route('customers.update', $customer->id) }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $customer->email }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $customer->address }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" class="form-control" value="{{ $customer->country }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ $customer->city }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $customer->telephone }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="res">Res</label>
                            <input type="text" id="res" name="res" class="form-control" value="{{ $customer->res }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input type="text" id="fax" name="fax" class="form-control" value="{{ $customer->fax }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="s_man">Sales Manager</label>
                            <input type="text" id="s_man" name="s_man" class="form-control" value="{{ $customer->s_man }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{ $customer->mobile }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="strn">STRN</label>
                            <input type="text" id="strn" name="strn" class="form-control" value="{{ $customer->strn }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ntn">NTN</label>
                            <input type="text" id="ntn" name="ntn" class="form-control" value="{{ $customer->ntn }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control" value="{{ $customer->date }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="balance_type">Balance Type</label>
                            <select id="balance_type" name="balance_type" class="form-control">
                                <option value="Credit" {{ $customer->balance_type == 'Credit' ? 'selected' : '' }}>Credit</option>
                                <option value="Debit" {{ $customer->balance_type == 'Debit' ? 'selected' : '' }}>Debit</option>
                                <option value="Other" {{ $customer->balance_type == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="opening_balance">Opening Balance</label>
                            <input type="number" step="0.01" id="opening_balance" name="opening_balance" class="form-control" value="{{ $customer->opening_balance }}">
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
                console.log('Customer updated successfully:', response);
                alert('Customer updated successfully!');
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
                    console.error('Error creating customer:', xhr.responseText);
                    alert('Error creating customer. Please try again.');
                }
            }
        });
    });
});


</script>