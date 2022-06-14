@extends('frontend.layout.master')
@section('title', __('Commande passée avec succès'))

@section('content')


	<!-- Body Start -->
	<div class="wrapper">
		<div class="gambo-Breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Acceuil')}}</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{__('Commande passée avec succès')}}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="all-product-grid">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-8">
						<div class="order-placed-dt">
							<i class="uil uil-check-circle icon-circle"></i>
							<h2>{{__('Commande passée avec succès')}}</h2>
							<p>{{__('Nous vous remercions de votre commande! recevra bientôt la commande')}}</p>
							<div class="delivery-address-bg">
								<div class="title585">
									<div class="pln-icon"><i class="uil uil-telegram-alt"></i></div>
									<h4>{{__('Votre commande sera envoyée à cette adresse')}}</h4>
								</div>
								<ul class="address-placed-dt1">
									<li><p><i class="uil uil-map-marker-alt"></i>{{__('Adresse')}} :<span>{{$order->address['soc_name']}}, {{$order->address->street}}, {{$order->address->city}}, {{$order->address->zipcode}}
                                    </span></p></li>
									<li><p><i class="uil uil-phone-alt"></i>{{__('Numéro de téléphone')}} :<span>{{Auth::user()->phone_code . Auth::user()->phone}} </span></p></li>
									<li><p><i class="uil uil-envelope"></i>{{__('Adresse e-mail')}} :<span>{{Auth::user()->email}} </span></p></li>
									<li><p><i class="uil uil-card-atm"></i>{{__('Mode de paiement')}} :<span>
										@if ($order->payment_type == "COD")
											{{__('Paiement à la livraison')}}
										@elseif($order->payment_type == "WHATSAPP")
											{{__('Whatsapp (Paiement à la livraison)')}}
										@else
											{{$order->payment_type}}
										@endif
									</span></p></li>
								</ul>
								<div class="stay-invoice">
									<div class="st-hm">{{__('Rester à la maison')}}<i class="uil uil-smile"></i></div>
									<a href="{{url('invoice/'.$order->id)}}" target="_blank" class="invc-link hover-btn">{{__('Facture d\'achat')}}</a>
								</div>
								<div class="placed-bottom-dt">
									{{__('Le paiement de')}} <span> {{ $data['currency'].$order->payment }} </span> {{__(" que vous effectuerez lorsque la livraison arrivera avec votre commande..")}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- Body End -->

@endsection