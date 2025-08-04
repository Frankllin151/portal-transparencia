{{-- filepath: /home/frankllin/docker/portal-transparencia/vendor/laravel/framework/src/Illuminate/Notifications/resources/views/email.blade.php --}}

{{-- Logo personalizada --}}
<div style="text-align:center; margin-bottom: 24px;">
    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Acesso Transparência" style="max-width: 220px;">
</div>

{{-- Saudação --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# Opa!
@else
# Olá!
@endif
@endif

{{-- Linhas de introdução --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Botão de ação --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Linhas finais --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Saudação final --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Atenciosamente,<br>
{{ config('app.name') }}
@endif

{{-- Subcópia --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Se você estiver com problemas para clicar no botão \":actionText\", copie e cole a URL abaixo\n".
    'no seu navegador:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
