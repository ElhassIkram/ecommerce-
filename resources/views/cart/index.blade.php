@extends('layouts.interface')
@section('section')


<h1>Shopping Cart</h1>

<section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(!empty($cart))

    <table class="table">
        <thead>
            <tr>
                <th  scope="col">Image</th>
                <th  scope="col">Designation</th>
                <th  scope="col">Quantity</th>
                <th  scope="col">Price</th>
                <th  scope="col">Total</th>
                <th  scope="col">Description</th>
                <th  scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $totals = 0; @endphp
            @foreach($cart as $id => $details)
                @php
                    $total = $details['quantity'] * $details['price'];
                    $totals += $total;
                @endphp
                <tr>
                    <td>
                        <div class="">
                            <img src="{{ asset('storage/' . $details['image']) }}" class="img-fluid w-40 rounded-top cart-image" alt="">
                        </div>
                    </td>
                    <td>{{ $details['designation'] }}</td>
                    <td>
                        <input type="number" name="quantity" id="sst"  value="{{ $details['quantity'] }}" min="1" class="form-control quantity-input" data-id="{{ $id }}" style="width: 60px;">
                    </td>
                    <td>{{ $details['price'] }} DH</td>
                    <td>{{ $total }} DH</td>
                    <td>{{ $details['description'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">x</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td colspan="3"><strong>{{ $totals }} DH</strong></td>
            </tr> -->
            <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>{{ $totals }}DH</h5>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
            <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" href="/login">Update Cart</a>
                  </td>
           
                    <div class="cupon_text">
                    <form action="{{ route('cart.order') }}" method="POST">
                        @csrf
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <td>
                                <div class="form-group">
                                    <label for="mode_reglements_id">Mode de Règlement</label>
                                    <select name="mode_reglements_id" class="form-control">
                                        @foreach($mode_reglements as $mode_reglement)
                                            <option value="{{ $mode_reglement->id }}">{{ $mode_reglement->mode_reglements }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="etat_id">État</label>
                                    <select name="etat_id" class="form-control">
                                        @foreach($etats as $etat)
                                            <option value="{{ $etat->id }}">{{ $etat->etat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td> 
                        </div>
                        <td>
                        <button type="submit" class="main_btn">Apply</button>
                        </td> 
                    </div>
                    </form>
                    </div>
                 
                </tr>
        </tbody>
    </table>
    
@else
    <p>Your cart is empty</p>
@endif
@endsection
<style>
    .cart-image {
        width: 100px;
        height: 100px;
        object-fit: cover; /* Ensure the image is properly scaled */
    }
    .quantity-input {
        width: 60px;
    }
    .quantity-input + .btn-primary {
        margin-left: 10px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.quantity-input').on('change', function() {
            var id = $(this).data('id');
            var quantity = $(this).val();

            $.ajax({
                url: '{{ url("cart/update") }}/' + id,
                method: 'put',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: quantity
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    });
</script>
