@extends('layouts.dashboard')

@section('content')
<div class="row">

    <!-- Ordini Totali -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Ordini Totali</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($orders) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--   EIncasso Lord -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Incasso Lordo</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $revenue = 0;
                        foreach ($orders as $order){
                          $revenue += $order->total_price;
                        }
                        echo $revenue ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Media Incassi -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Media Incassi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $revenue = 0;
                        foreach ($orders as $order){
                          $revenue += $order->total_price;
                        }
                        echo $revenue/count($orders) ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Customer</th>
                <th scope="col">Restaurant</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>

            @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->client_name, $order->client_surname }}</td>
                <td>{{ $order->name}}</td>
                <td>{{ $order->total_price }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
