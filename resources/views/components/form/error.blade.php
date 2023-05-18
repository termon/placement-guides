@props([
    'name'
])
@error($name)
    <div class="text-sm text-red-500 dark:text-red-800">{{$message}}</div>
@enderror
