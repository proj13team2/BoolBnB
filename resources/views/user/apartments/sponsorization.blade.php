@extends('layouts.app')

@section('page_title')
  <title>{{ config('pagetitle.main_title') }} -  {{ config('pagetitle.dashboard') }} - {{ config('pagetitle.sponsor') }} - {{ $apartment->title }}</title>
@endsection

@section('content')
    @if($array_sponsorizzati_attuali != [])
        <h1>L'appartamento è sponsorizzato</h1>
    @else
    <div class="container">
        <h1 class="text-center "> Sponsorization for: <span class="green-text">{{$apartment->title}}</span></h1>
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4 green-text">Sponsor</h1>
        <p class="lead text-muted">The best and quick way to get attention! Let your insertion appear everywhere on our site for a small amount of price. The quickest way to get the attention your apartments needs.</p>
      </div>

                      @if (session('success_message'))
                      <div class="alert alert-success">
                          {{ session('success_message') }}
                      </div>
                      @endif

                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li> {{ $error }} </li>
                              @endforeach
                          </ul>
                      </div>
                      @endif

      <div class="card-deck mb-3  text-center">

                <form method="post" class="row col-12"id="payment-form" action="{{route('user.apartment.sponsorization', ['apartment' => $apartment->id])}}">
                    @csrf
                        @foreach ($sponsors as $sponsor)
                          <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{$sponsor->sponsorship_level}}</h4>
                          </div>
                            <div class="card-body text-center">
                                <h1 class="card-title pricing-card-title">${{ $sponsor->price }} </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li class="text-muted">Show Apartment in Homepage</li>
                                  <li class="text-muted">Carousel show</li>
                                  <li><strong>Duration</strong></li>
                                  <li><span class="font-big pt-3"><strong>{{($sponsor->duration) * 24}}</strong></span><small class="text-muted">/ hr</small></li>
                                </ul>
                            <label for="amount" class="form-check-label">
                                <input id="amount" name="amount" class="form-check-input sponsorship-level" type="radio"  value=" {{ $sponsor->id }} " checked>
                            </label>
                        </div>
                        </div>
                        @endforeach
                        <div class="bt-drop-in-wrapper col-12">
                            <div id="bt-dropin"></div>
                        </div>
                        <div class="col-12">
                          <input id="nonce" name="payment_method_nonce" type="hidden" />
                          <button class="button btn btn-green-moon white-text" type="submit"><span>Proceed to payment</span></button>
                        </div>
                  </form>
      </div>
    @endif

<script src="https://js.braintreegateway.com/web/dropin/1.23.0/js/dropin.min.js"></script>
<script>

    var form = document.querySelector('#payment-form');
    var client_token = "{{ $token }}";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin'

    }, function(createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            instance.requestPaymentMethod(function(err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }

                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>

@endsection
@push('head')
<script src="{{ asset('js/app.js')}}"></script>
@endpush
