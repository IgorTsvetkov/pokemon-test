<li class="nav-item">
    <a href="{{ route('pokemon.index') }}"
       class="nav-link {{ Request::is('pokemon*') ? 'active' : '' }}">
        <p>Pokemon</p>
    </a>
</li>


