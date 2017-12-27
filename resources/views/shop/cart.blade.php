@extends('layouts.layout')

@section('content')
<div class="row">
	@if(!Session::has('cart'))
		<h3>Votre panier est vide</h3>
	@else
		<h3>Votre panier</h3>
		<ul class="list-group">
			@foreach($items as $item)
				<li class="list-group-item">
					<span><strong>{{$item['item']->title}}</strong> x {{$item['quantity']}}</span>
					<span class="badge">{{$item['price']}} €</span>
				</li>
			@endforeach
		</ul>
	@endif
	<span class="pull-right badge">Total a payer: {{$totalP}}€</span>
	<a href="{{route('product.checkout')}}" class="btn btn-success">Passer au paiement</a>
</div>

@endsection