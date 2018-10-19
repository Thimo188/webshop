@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
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
						@if(!empty($cartlines))
							@foreach($cartlines as $cartline)
								<tr>
									<td data-th="Product">
										<div class="row">
											<div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
											<div class="col-sm-9">
												<h4 class="nomargin">{{ $cartline->product->product_name}}</h4>
												<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
											</div>
										</div>
									</td>
									<td data-th="Price">€{{ number_format($cartline->product->price,2,",",".")}}</td>
									<td data-th="Quantity">
										<input type="number" class="form-control text-center" value="{{ $cartline->amount }}">
									</td>
									<td data-th="Subtotal" class="text-center">€{{ number_format($cartline->product->price * $cartline->amount,2,",",".") }}</td>
									<td class="actions" data-th="">
										<button class="btn btn-info btn-sm"><i class="fas fa-sync-alt"></i></button>
										<a href="{{ url('/cart/remove', $cartline->id) }}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td><a href="#" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total €{{number_format($cartlines->sum('Product.price'),2,",",".")}}</strong></td>
							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
@endsection
