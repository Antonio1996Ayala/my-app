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
            <li class="nav-item">
              <a class="nav-link" href="/home">
                <i class="ni ni-tv-2 text=danger"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/specialties">
                <i class="ni ni-planet text-blue"></i> Atención dental
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/doctors">
                <i class="ni ni-single-02 text-orange"></i> Dentistas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/patients">
                <i class="ni ni-satisfied text-info"></i> Pacientes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./examples/tables.html">
                <i class="ni ni-bullet-list-67 text-red"></i> Tables
              </a>
            </li>
          @elseif (auth()->user()->role == 'dentista')  
            <li class="nav-item">
              <a class="nav-link" href="/schedule">
                <i class="ni ni-time-alarm text=danger"></i> Gestionar horario
               </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/patients">
                <i class="ni ni-satisfied text-info"></i> Mis pacientes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/specialties">
                <i class="ni ni-calendar-grid-58 text-blue"></i> Mis citas
              </a>
            </li>
          @else {{-- patient --}}
          <li class="nav-item">
              <a class="nav-link" href="/home">
                <i class="ni ni-check-bold text=danger"></i> Agendar cita
               </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/specialties">
                <i class="ni ni-calendar-grid-58 text-blue"></i> Mis citas
              </a>
            </li>

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