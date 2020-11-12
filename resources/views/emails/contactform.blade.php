@component('mail::message')
# Contact Form Submission

From: {{ $contact['name'] }}

Email: {{ $contact['email'] }}

Phone: {{ $contact['phone'] }}

Message: {{ $contact['message'] }}

Email sent automatically from: {{ config('app.name') }}

@endcomponent
