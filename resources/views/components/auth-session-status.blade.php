@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm']) }}>
        {{ $status }}
    </div>
@endif
