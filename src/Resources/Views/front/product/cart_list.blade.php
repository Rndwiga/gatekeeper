@extends(config('writter.views.front.layouts.base'))

@section('content')
    <!-- Navigation -->
    @include(config('writter.views.front.layouts.partials.navbars.alt_main_nav'))
    <!-- end navigation -->

    <div class="main-container container pt-40" id="main-container">

        <!-- Letest News -->
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

            @if(session('cart'))
                @foreach(session('cart') as $id => $details)

                    <?php $total += $details['price'] * $details['quantity'] ?>

                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['featured_image'] }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button href="shortcodes.html#" style="background-color: deepskyblue" class="btn btn-sm btn-color update-cart" data-id="{{ $id }}">@</button>
                            <button href="shortcodes.html#" class="btn btn-sm btn-color remove-from-cart" data-id="{{ $id }}">X</button>

                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
            <tfoot>
            <tr>
                <td>
                    <a href="{{ url('seo') }}" class="btn btn-sm btn-color">
                        <span>< Order More</span>
                    </a>
                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                <td class="hidden-xs text-center">
                    <a href="{{url('pay/paypal')}}" class="btn btn-sm btn-color">
                        <span>Pay With Paypal</span>
                    </a>
                </td>
            </tr>
            </tfoot>
        </table>
        <!-- end latest news -->
    </div> <!-- end main container -->
@endsection


@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

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
