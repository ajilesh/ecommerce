@component('mail::message')
# Introduction

{{ $details['title'] }}

@component('mail::button', ['url' => $details['url']])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
