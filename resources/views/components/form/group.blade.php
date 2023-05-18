@props([
    'name',
    'label'
])

<div {{ $attributes->merge(['class' =>'flex flex-col gap-x-2 gap-y-2 my-2']) }}>
    <x-form.label for="{{$name}}">{{$label}}</x-form.label>
    <div class="flex flex-col gap-y-2 w-full">
        {{$slot}}
        <x-form.error name="{{$name}}"/>
    </div>
</div>
