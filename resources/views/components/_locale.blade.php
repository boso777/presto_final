@props(['lang', 'nation' => null])
@php
    $flag = $nation ?? $lang;
@endphp
<form action="{{ route('setLocale' , $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/country-' . $flag . '.svg') }}" width="32" height="32" alt="">
    </button>
</form>