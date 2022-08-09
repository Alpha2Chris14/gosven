<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Receipt Invoice</title>
    <link rel="stylesheet" href="{{url('bootsfile/css/bootstrap.min.css')}}">
</head>
<body class="container-fluid p-0" id="boot-override">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <br>
            <div class="card">
                <h5 class="card-header">Transaction Details</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Marketlada</h3>
                        </div>
                        <div class="col-md-6">
                            <strong>Date: </strong>{{$date}}<br>
                            <strong>Invoice ID: </strong>{{$ref_id}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                    <div class="card-body">
                                         <h5 class="card-title">Customer Details</h5>
                                         <p class="card-text"><Strong>Customer Name: </Strong>{{$name}}</p>
                                         <p class="card-text"><Strong>Customer Email: </Strong>{{$email}}</p>
                                         <p class="card-text"><Strong>Billing Address: </Strong>{{$address}}</p>
                                         <a href="/" class="btn btn-primary">Go Home</a>
                                         <input type="button" class="btn btn-success" value="Print" onclick="window.print()" />
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Items:</strong>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction as $trx)
                            <tr>
                                <td>{{$trx->name}}</td>
                                <td>&#8358;{{$trx->price}}</td>
                                <td>{{$trx->quantity}}</td>
                                <td>&#8358;{{$trx->quantity * $trx->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div> 
                    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <strong>Note:</strong><br>
                        <div class="card">
                                    <div class="card-body">
                                         <p class="card-text">Due To Govera Steadfast Venture It's Important To Note That This Is Not Actual Receipt But Use To Tell Us About Your Order And Verify You Placed This Order. Delivery. Receipt Will Be Issued At Delivery Center.</p>
                                         
                                    </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <strong>Total</strong><br>
                            <div class="card">
                                    <div class="card-body">
                                         <p class="card-text">
                                         <?php 
                                         $total=0; 
                                            foreach($transaction as $trx){
                                                $total+=($trx->price * $trx->quantity);
                                            }
                                            ?>
                                            &#8358;{{$total}}
                                         </p>
                                         
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

<script src="{{url('bootsfile/js/bootstrap.min.js')}}" ></script>
</body>
</html>