@extends('layouts.app')

@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>
<!-- by this code session get all product that user chose -->
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <!-- <div class="col-sm-3 hidden-xs"><img src="#" width="100" height="100" class="img-responsive"/></div> -->
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">RM{{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">RM{{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                    <!-- this button is to update card -->
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i>Update</button>
                       <!-- this button is for update card -->
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>Remove</button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
       
        <tr>
            <td><a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
// this function is for update card
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
           var quantity = ele.parents("tr").find(".quantity").val();
           
           console.log('test', ele.parents("tr").find(".quantity").val());
           $.ajax({
            url: '/update-cart',
            method: "POST",
            data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity:quantity},

            success: function (response) {
                        window.location.reload();
                        
                    }
           })
            // $.ajax({
            //    url: '{{ url('update-cart') }}',
            //    method: "POST",
            // data: { _token: '{{ csrf_token() }}'},
            //    success: function (response) {
            //        window.location.reload();
            //    }
            // });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);

            console.log('');

            // $.ajax({
            //         url: '{{ url('test') }}',
            //         method: "delete",
            //         data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
            //         success: function (response) {
                        
            //             console.log('res',response);
                        
            //         }
            //     });

            // return;
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                        
                    }
                });
            }
        });
    </script>
@endsection
