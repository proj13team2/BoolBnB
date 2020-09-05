@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4> Seleziona la stanza "{{$apartment->title}}"</h4>
                <p>Seleziona la modalità di sponsorizzazione:</p>
                <form method="post" id="payment-form" action=" {{ url('/checkout') }} ">
                    @csrf
                    <section>
                        <label for="amount">
                            <span class="input-label">Amount</span>
                            <div class="input-wrapper amount-wrapper">
                                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                            </div>
                        </label>

                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>
                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="button" type="submit"><span>Test Transaction</span></button>
                </form>
                <form action="">
                    <div class="form-group">
                        @foreach ($sponsors as $sponsor)
                            <div class="form-check">
                                <label class="form-check-label">
                                <input name="sponsor_id" class="form-check-input" type="radio" value="{{ $sponsor->id }}">
                                    {{ $sponsor->price }} $ per {{($sponsor->duration) * 24}} ore di sponsorizzazione
                                </label>
                            </div>
                        @endforeach
                        </div>
                        <button type='submit'>Sponsor</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('head')
  <script src="{{ asset('js/app.js')}}"></script>
@endpush
