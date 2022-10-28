<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deposit with Stripe</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
@php
    $publishable_key = $data->StripeJSAcc->publishable_key;
    $sessionId = $data->session->id;

@endphp

<script>
    'use strict'
    var stripe = Stripe('{{$publishable_key}}');
    stripe.redirectToCheckout({
        sessionId: '{{$sessionId}}'
    }).then(function (result) {
        console.log(result);
    });
</script>
</body>
</html>
