<!-- Navigation -->
<h6 class="navbar-heading text-muted">
  @if (auth()->user()->role == 'admin')
  Gestionar datos
  @else
  Menú
  @endif
</h6>
<ul class="navbar-nav">
  @if (auth()->user()->role == 'admin')
    @include('includes.panel.menu.admin')
  @elseif (auth()->user()->role == 'dentista')
    @include('includes.panel.menu.doctor')
  @else {{-- patient --}}
    @include('includes.panel.menu.patient')
  @endif
  <li class="nav-item">
    <a class="nav-link" href="{{ route ('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-key-25"></i> Cerrar sesión
    </a>
    <form action="{{ route ('logout') }}" method="POST" style="display: none;" id="formLogout">
      @csrf
    </form>
  </li>

</ul>
@if (auth()->user()->role == 'admin')
{{-- Divider --}}
<hr class="my-3">
{{-- Heading --}}
<h6 class="navbar-heading text-muted">Reportes</h6>
{{-- Navigation --}}
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="#"></i> Frecuencia de citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"></i> Dentistas más activos
    </a>
  </li>
</ul>
@endif