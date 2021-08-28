<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title></title>
    <link href="{{ asset('') }}" rel="stylesheet">

</head>
<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 46mm;
        background: #FFF;
        background-repeat: no-repeat;
    }

    #invoice-POS ::selection {
        background: #f31544;
        color: #FFF;
    }

    #invoice-POS ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: .9em;
    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: .7em;
        color: #666;
        line-height: 1.2em;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
    }

    #invoice-POS #top {
        min-height: 100px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        /* background: url() no-repeat; */
        background-size: 60px 60px;
    }

    #invoice-POS .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: .5em;
        background: #EEE;
        text-align: center;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #EEE;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: .5em;
        text-align: center;
    }

    #invoice-POS .itemmake {
        font-size: .5em;
        text-align: center;
    }

    #invoice-POS .payment {
        font-size: 9px;

    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
        text-align: center;
    }

</style>
<link rel="stylesheet" href="{{ asset('public/assets/fonts/css/font-awesome.min.css') }}">

<body>

<div wire:ignore id="invoice-POS">

    <center id="top">
        <div class="logo">
            <img class="logo" src="{{asset('public/assets/images/layouts/02.jpg')}}" alt="">
        </div>
        <div class="info">
            <h2>StopOva Fast Food</h2>
        </div>
        <!--End Info-->
    </center>
    <!--End InvoiceTop-->

    <div id="mid">
        <div class="info">
            <h2>Contact Info</h2>
            <p>
                Address : Poly Junction, Mayfair, Ile-Ife, Osun State.<br>
                Email : stopova247@yahoo.com<br>
                Phone : 09068189481, 08177416020<br>
            </p>
        </div>
    </div>
    <!--End Invoice Mid-->

    <div id="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="Hours">
                        <h2>S/N</h2>
                    </td>
                    <td colspan="2" class="Hours">
                        <h2>ITEM(S)</h2>
                    </td>
                    <td class="Hours">
                        <h2>QTY</h2>
                    </td>
                    <td class="Hours">
                        <h2>PRICE</h2>
                    </td>
                    <td class="Hours">
                        <h2>SUB TOTAL</h2>
                    </td>
                </tr>


                @foreach ($order_receipt as $key => $receipt)
                    <tr class="service">
                        <td class="Hours">
                            <p class="itemmake">{{ $key + 1 }}.</p>
                        </td>
                        <td colspan="2" class="Hours">
                            <p class="itemmake">{{ $receipt->product_name }}</p>
                        </td>
                        <td class="Hours">
                            <p class="itemtext">{{ $receipt->qty }}</p>
                        </td>
                        <td class="Hours">
                            <p class="itemtext"># {{ number_format($receipt->product_price) , 2 }}</p>
                        </td>
{{--                        <td class="Hours">--}}
{{--                            <p class="itemtext">{{ $receipt->discount ? ' ' : '0' }}</p>--}}
{{--                        </td>--}}
                        <td class="Hours">
                            <p class="itemmake"># {{ number_format($receipt->unitprice), 2 }}</p>
                        </td>

                    </tr>
                @endforeach
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td class="Hours">
                        <h2 style="text-align: right">     Total:
                        # {{ number_format($order_receipt->sum('unitprice')), 2 }}</h2>
                    </td>
                </tr>

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>




                    <td class="Hours">
                        <h2 style="text-align: right">
                            @foreach ($order_receipt as $key => $data)
                                @if($data==true)
                                    Payment: # {{ number_format($data->payment), 2 }}
                                    @break
                                @endif
                            @endforeach
                        </h2>
                    </td>

                </tr>

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>


                    <td class="Hours">
                        <h2 style="text-align: right">

                            @foreach ($order_receipt as $key => $data)
                                @if($data==true)
                                    Balance: # {{ number_format($data->balance), 2 }}
                                    @break
                                @endif
                            @endforeach</h2>
                    </td>
                    <td class="payment">

                    </td>
                </tr>
            </table>
        </div>
        <!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thanks for your purchase! </strong>
            </p>
            <button id="btnPrint"  class="btn btn-dark btn-sm"
            ><i class="fa fa-print"></i></button>
        </div>

    </div>
    <!--End InvoiceBot-->
</div>
<!--End Invoice-->

<script>
    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });

</script>
</body>

</html>
