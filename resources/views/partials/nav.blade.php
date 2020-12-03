<nav class="navbar bg-white shadow-sm">  
<a class="navbar-brand" href="{{ route('home') }}">
    <ul>
        <li class="{{setActive('home')}}"><a href="/">Home</a></li>
        <li class="{{setActive('about')}}"><a href="/about">About</a></li>
        <li class="{{setActive('contact')}}"><a href="/contact">Contact</a></li>
        <li class="{{setActive('portafolio')}}"><a href="/portafolio">Portafolio</a></li>  
    </ul>
</nav>