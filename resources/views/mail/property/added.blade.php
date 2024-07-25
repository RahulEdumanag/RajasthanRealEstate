@component('mail::message')
    # Property Added

    Your property has been successfully added.

    **Property Details:**
    - Type:@if ($property->PType == 1)Rent @else Sale/Purchase @endif
    - Contact Number: {!! nl2br(e($property->PNumber)) !!}
    - Title: {{ $property->PTitle }}
    - Amount: {{ $property->PAmount }}

    Thank you for using our application!

    Regards,
    {{ config('app.name') }}
@endcomponent
