<main class="main">
    <div class="page-header text-center" style="background-image: url({{URL::asset('user/assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount" >
                    <div style="margin:0 auto;">
                        <h3>Your <span style="color: #FB0000">INVOICE</span></h3>
                        <input type="text" class="form-control" style="font-weight: bold; " disabled placeholder="{{$order->invoice}}" id="checkout-discount-input">
                    </div>
                </div><!-- End .checkout-discount -->
                <form action="#">
                    <div class="row">
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Total : <span style="color: #F80404">$100</span></h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                
                                    <tbody>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{$order->total}}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    Direct bank transfer
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    
                                </div><!-- End .accordion -->

                                <a href="https://api.whatsapp.com/send?phone=6285339101125" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Already Paid?</span>
                                    <span class="btn-hover-text"><span class="fa fa-whatsapp"></span> Send Proof of Payment</span>
                                </a>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main>