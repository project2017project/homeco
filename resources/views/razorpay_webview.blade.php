<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('user.Razorpay Payment')}}</title>
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>

</head>
<body>
    <p style="text-align: center">Please wait. Your payment is processing....</p>
    <p style="text-align: center">Do not press browser back or forward button while you are in payment page</p>



    <form action="{{ route('razorpay-webview-payment', $pricing_plan->plan_slug) }}" style="display: none">
        @csrf
        @php
            $payable_amount = $pricing_plan->plan_price * $razorpay->currency_rate;
            $payable_amount = round($payable_amount, 2);
        @endphp
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ $razorpay->key }}"
                data-currency="{{ $razorpay->currency_code }}"
                data-amount= "{{ $payable_amount * 100 }}"
                data-buttontext="{{__('user.Pay')}} {{ $payable_amount }} {{ $razorpay->currency_code }}"
                data-name="{{ $razorpay->name }}"
                data-description="{{ $razorpay->description }}"
                data-image="{{ asset($razorpay->image) }}"
                data-prefill.name=""
                data-prefill.email=""
                data-theme.color="{{ $razorpay->color }}">
        </script>
    </form>



    <script>
        $(".razorpay-payment-button").click();
    </script>
</body>
</html>
