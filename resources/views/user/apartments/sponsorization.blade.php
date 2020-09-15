@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4> Seleziona la stanza "{{$apartment->title}}"</h4>
            <p>Seleziona la modalità di sponsorizzazione:</p>

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

            <form method="post" id="payment-form" action="{{route('user.apartment.sponsorization', ['apartment' => $apartment->id])}}">
                @csrf
                <section>
                  <div class="form-group">
                      @foreach ($sponsors as $sponsor)
                      <div class="form-check">
                          <label for="amount" class="form-check-label">
                              <input id="amount" name="amount" class="form-check-input sponsorship-level" type="radio"  value=" {{ $sponsor->id }}">
                              {{ $sponsor->price }} € per {{($sponsor->duration) * 24}} ore di sponsorizzazione
                          </label>
                      </div>
                      @endforeach
                  </div>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Proceed to payment</span></button>
            </form>
        </div>
    </div>
</div>


<script src="https://js.braintreegateway.com/web/dropin/1.23.0/js/dropin.min.js"></script>
<script>

    var form = document.querySelector('#payment-form');
    var client_token = "{{ $token }}";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        paypal: {
            flow: 'vault'
        }
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
