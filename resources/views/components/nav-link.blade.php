@props(['active' => null])
<a
    {{$attributes}}
    class="nav-Link {{request()->routeIs($active) ? 'active' : null }}">
    {{$slot}}
</a>