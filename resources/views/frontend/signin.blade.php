@extends('frontend.layout.loginMaster')
@section('title', __('S\'identifier'))

@section('content')
@php
    $company = \App\CompanySetting::first(['logo','name','logo_dark']);
@endphp
    <div class="sign-inup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sign-form">
                        <div class="sign-inner">
                            <div class="sign-logo" id="logo">
                                <a href="{{ url('/') }}"><img src="{{ url('images/upload/'.$company->logo) }}" alt=""></a>
                                <a href="{{ url('/') }}"><img class="logo-inverse" src="{{ url('images/upload/'.$company->logo_dark) }}" alt=""></a>
                            </div>
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">
                                    <form action="{{url('/signin')}}" method="post">
                                        @csrf
                                        <div class="form-title"><h6>{{__('S\'identifier')}}</h6></div>
                                        <div class="form-group pos_rel">
                                            <input id="email" name="email" type="text" placeholder="{{__('Entrer l\'adresse email')}}" class="form-control lgn_input">
                                            <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="password" name="password" type="password" placeholder="{{__('Entrer le mot de passe')}}" class="form-control lgn_input">
                                            <i class="uil uil-padlock lgn_icon"></i>
                                        </div>
                                        @if($errors->any())
                                            <h4 class="text-center text-danger">{{$errors->first()}}</h4>
                                        @endif
                                        @if ($message = Session::get('error'))
                                            <h4 class="text-center text-danger">{{$message}}</h4>
                                        @endif
                                        @if ($message = Session::get('msg'))
                                            <h4 class="text-center text-success">{{$message}}</h4>
                                        @endif
                                        <button class="login-btn hover-btn" type="submit">{{__('connectez-vous maintenant')}}</button>
                                    </form>
                                </div>
                                <div class="password-forgor">
                                    <a href="{{url('/forgot-password')}}">{{__('Mot de passe oublié')}}?</a>
                                </div>
                                <div class="signup-link">
                                    <p>{{__("Vous n'avez pas de compte?")}} - <a href="{{url('/signup')}}">{{__('s\'inscrire maintenant')}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center mt-3">
                        <i class="uil uil-copyright"></i> {{__('Copyright')}} @php echo date('Y'); @endphp <b > {{$company->name}} </b>. {{__('Tous les droits sont réservés')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection