@props(['value'])

<label {{ $attributes->merge(['class' => 'form-control']) }}>
    {{ $value ?? $slot }}
</label>
