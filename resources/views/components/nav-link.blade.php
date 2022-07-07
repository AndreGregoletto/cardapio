@props(['active' => null])
<a
    {{$attributes}}
    class="nav-link {{request()->routeIs($active) ? 'active' : null }}">
    {{$slot}}
</a>