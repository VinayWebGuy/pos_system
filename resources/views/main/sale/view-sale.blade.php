<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

   
    <div class="container py-5">
        <h3 class="text-center">Sale</h3>
        <div class="row mt-5">
            <div class="col-md-6">
               <p> Invoice no: <strong>{{$sale[0]->invoice_no}}</strong></p>
               <p>Customer: <strong>{{$sale[0]->customer}}</strong></p>
               
            </div>
            <div class="col-md-6 text-end">
               <p> Date: <strong>{{$sale[0]->date}}</strong></p>
               <p>Total Cost: <strong>{{$sale[0]->total_cost}}</strong></p>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total Cost</th>
                        <th>Product ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                    @foreach ($sale as $s)
                            <tr>
                                <td>{{$s->product_name}}</td>
                                <td>{{$s->quantity}}</td>
                                <td>{{$s->cost}}</td>
                                <td>{{$s->total_product_cost}}</td>
                                <td>{{$s->product_id}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td><strong>{{$sale[0]->total_quantity}}</strong></td>
                                <td></td>
                                <td><strong>{{$sale[0]->total_cost}}</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
