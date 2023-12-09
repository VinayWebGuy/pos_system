<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            #print-paper {
                position: fixed;
                bottom: 3%;
                right: 3%;
                background: #6a52d3;
                color: #fff;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-size: 1.4rem
            }
            h3 {
                color: #6a52d3;
                font-weight: 800;
            }
        </style>
</head>
<body>
    @php
    $check = DB::table('setup')->first();
@endphp
    <div class="container py-5">
        <h3 class="text-center">{{ $check->business_name }}</h3>
        <h4 class="text-center">Purchase</h4>
        <div class="row mt-5 d-flex flex-wrap">
            <div class="col-md-6">
               <p> Invoice no: <strong>{{$purchase[0]->invoice_no}}</strong></p>
               <p>Supplier Name: <strong>{{$purchase[0]->name}}</strong></p>
            </div>
            <div class="col-md-6 text-end">
               <p> Date: <strong>{{$purchase[0]->date}}</strong></p>
               <p>Total Cost: <strong>{{$purchase[0]->total_cost}}</strong></p>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($purchase as $p)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$p->product_name}}</td>
                                <td>{{$p->quantity}}</td>
                                <td>{{$p->cost}}</td>
                                <td>{{$p->total_product_cost}}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>{{$purchase[0]->total_quantity}}</strong></td>
                                <td></td>
                                <td><strong>{{$purchase[0]->total_cost}}</strong></td>
                            </tr>
                        </tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div id="print-paper">
        <i class="fa fa-print"></i>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#print-paper').on('click', function () {
                $('#print-paper').hide();
                window.print();
                $('#print-paper').show();
            });
        });
    </script>
</body>
</html>
