@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php $items = json_decode( $items, true ); ?>
                    <?php 
                        $key = array_search($repo['item_id'], array_column($items, 'id'));
                        $item_name = $items[$key]['name'];
                        // dd($name);
                    ?>
                    <nav class="nav nav-pills nav-fill lead">
                        <li class="nav-item nav-link">Customer Name: <span class="text-dark font-weight-bold">{{$repo['name']}}</span></li>
                        <li class="nav-item nav-link">Item Name: <span class="text-dark font-weight-bold">{{$item_name}}</span></li>
                        <li class="nav-item nav-link">Total Amount: <span class="text-primary font-weight-bold">{{$repo['total_amount']}}</span></li>
                        <li class="nav-item nav-link">Remain Amount: <span class="text-danger font-weight-bold">{{$repo['remain_amount']}}</span></li>
                        <li class="nav-item nav-link">Remain Assets: <span class="text-danger font-weight-bold">{{$repo['remain_assets']}}</span></li>
					</nav>
                </div>
                <div class="card-body">
                <table class="table table-hover  table-sm table-responsive-lg">
                    <?php $sales = json_decode( $sales, true ); ?>
                        <thead>
                            <tr>
                                @foreach($sales[0] as $key => $value)
                                    @if($key == 'bill_no')
                                        <th scope="row">{{$key}}</th>
                                    @elseif($key == 'created_at' || $key == 'updated_at' || $key == 'id' || $key == 'name')
                                            
                                    @elseif ($key == 'customer_id')
                                        <th scope="col">customer_name</th>
                                    @elseif ($key == 'item_id')
                                        <th scope="col">item_name</th>
                                    @else
                                        <th scope="col">{{ $key}}</th>
                                    @endif  
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    @foreach($sale as $key => $value)
                                        @if($key == 'bill_no')
                                            <th scope="row">{{$value}}</th>
                                        @elseif($key == 'created_at' || $key == 'updated_at' || $key == 'id' || $key == 'name')

                                        @elseif ($key == 'customer_id')
                                            <td>{{$sale['name']}}</td>
                                        @elseif ($key == 'item_id')
                                            <?php 
                                                $key = array_search($value, array_column($items, 'name'));
                                                $name = $items[$key]['name'];
                                                $sku = $items[$key]['sku'];
                                                // dd($name);
                                            ?>
                                            <td>{{$name}} | {{$sku}}</td>
                                        @else
                                            <td>{{$value}}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
