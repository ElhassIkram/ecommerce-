<h1>Shopping Cart</h1>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(!empty($cart))
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Designation</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Description</th>
                <th>Actions</th>
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
                        <img src="{{ asset('storage/' . $details['image']) }}" class="img-fluid w-100 rounded-top cart-image" alt="">
                    </td>
                    <td>{{ $details['designation'] }}</td>
                    <td>
                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control quantity-input" data-id="{{ $id }}" style="width: 60px;">
                    </td>
                    <td>{{ $details['price'] }} DH</td>
                    <td>{{ $total }} DH</td>
                    <td>{{ $details['description'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td colspan="3"><strong>{{ $totals }} DH</strong></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('cart.order') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mode_reglements_id">Mode de Règlement</label>
            <select name="mode_reglements_id" class="form-control">
                @foreach($mode_reglements as $mode_reglement)
                    <option value="{{ $mode_reglement->id }}">{{ $mode_reglement->mode_reglements }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="etat_id">État</label>
            <select name="etat_id" class="form-control">
                @foreach($etats as $etat)
                    <option value="{{ $etat->id }}">{{ $etat->etat }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
@else
    <p>Your cart is empty</p>
@endif

<style>
    .cart-image {
        width: 100px;
        height: 100px;
        object-fit: cover; /* Ensure the image is properly scaled */
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