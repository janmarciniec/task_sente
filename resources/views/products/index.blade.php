@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped border">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>SKU</th>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Cena</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="align-middle no-wrap">
                            {{ $product['SKU'] }}
                        </td> 
                        <td class="align-middle no-wrap">
                            <a href="#" data-toggle="modal" data-target="#product{{ $loop->iteration }}Modal" class="text-decoration-none">{{ $product['name'] }}</a>
                            
                            <div class="modal fade" id="product{{ $loop->iteration }}Modal" tabindex="-1" role="dialog" aria-labelledby="product{{ $loop->iteration }}ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">SKU: <span class="font-weight-bold">{{ $product['SKU'] }}</span></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="https://www.tim.pl/media/catalog/product/cache/1/image/1360x768/03c9020fe5dfd8dce96a25a84de37182/K/a/Kask-ochronny-atestowany-regulowany-obwod-55-65cm-bialy-82S201-0001_00001_42336_1_pr_pr.jpg" alt="{{ $product['name'] }}" class="mw-100">
                                        </div>
                                        <div class="modal-footer">
                                            <h4>{{ $product['name'] }}</h4>
                                            <p>{{ $product['description'] }}</p>
                                            <h5 class="mt-3">
                                                @if($product['discount'] > 0)
                                                    Cena: <del>{{ number_format($product['price'],2) }} {{ $product['currency'] }}</del> <b class="text-success">{{ number_format($product['price']*(100-$product['discount'])*0.01, 2) }} {{ $product['currency'] }}</b>
                                                @else
                                                Cena: <b>{{ number_format($product['price'], 2) }} {{ $product['currency'] }}</b>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            {{ $product['description'] }}
                        </td>
                        <td class="align-middle no-wrap">
                            @if($product['discount'] > 0)
                                <del>{{ number_format($product['price'],2) }} {{ $product['currency'] }}</del> <b class="text-success">{{ number_format($product['price']*(100-$product['discount'])*0.01, 2) }} {{ $product['currency'] }}</b>
                            @else
                                {{ number_format($product['price'], 2) }} {{ $product['currency'] }}
                            @endif
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>
    
</div>
@endsection