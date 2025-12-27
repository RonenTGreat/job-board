<nav {{ $attributes->except('links') }}>
    <ul class="flex space-x-4 text-slate-500">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $url)
            <li>→</li>
            <li>
                <a href="{{ $url }}">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
