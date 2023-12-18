@component('mail::message')
# Invitation à rejoindre une société

Vous avez été invité à rejoindre une société. Cliquez sur le lien ci-dessous pour accepter l'invitation :

@component('mail::button', ['url' => $invitationLink])
Accepter l'invitation
@endcomponent

Merci,
{{ config('app.name') }}
@endcomponent