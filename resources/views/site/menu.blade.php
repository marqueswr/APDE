
<nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Início</a></li>
      @can('criar-usuario')
      <li class="dropdown"><a href="#"><i class="bi bi-radioactive"></i> <span>&nbsp&nbspAdministração</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
        <ul>
            <li><a href="{{ route('listar.usuarios') }}">Listar usuários</a></li>
          <li><a href="{{ route('criar.usuario') }}">Criar usuário</a></li>
          <li><a href="#">Alterar nivel acesso</a></li>
        </ul>
      </li>
      @endcan
      <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Saúde</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Alergias</a></li>
            <li><a href="#">Remédios</a></li>
            <li><a href="#">Deficiencias</a></li>
            <li><a href="#">Ficha médica</a></li>
            <li><a href="#">Contatos emergência</a></li>
          </ul>
        </li>
      <li class="dropdown"><a href="#"><i class="bi bi-file-earmark-text navicon"></i> <span>Ocorrências</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Tipos</a></li>
            <li><a href="#">Individual</a></li>
            <li><a href="#">Coletiva</a></li>
            <li><a href="#">Grave</a></li>
          </ul>
        </li>
      <li class="dropdown"><a href="#"><i class="bi bi-images navicon"></i> <span>Acompanhamento</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Períodos</a></li>
            <li><a href="#">Lançamentos</a></li>
          </ul>
        </li>
      {{-- <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li> --}}
      <li class="dropdown"><a href="#"><i class="bi bi-person navicon"></i> <span>Alunos</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
        <ul>
          <li><a href="#">Documentos</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Deep Dropdown 1</a></li>
              <li><a href="#">Deep Dropdown 2</a></li>
              <li><a href="#">Deep Dropdown 3</a></li>
              <li><a href="#">Deep Dropdown 4</a></li>
              <li><a href="#">Deep Dropdown 5</a></li>
            </ul>
          </li> --}}
          <li><a href="#">Contato</a></li>
          <li><a href="#">Endereço</a></li>
          <li><a href="#">Foto</a></li>
          <li><a href="#">Filiação</a></li>
        </ul>
      </li>
      <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contato</a></li>

<li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a onclick="event.preventDefault();
                            this.closest('form').submit();" href="{{ route('logout') }}" class="active"><i class="bi bi-x-lg navicon"></i>Sair do programa</a>
    </form>
</li>
    </ul>
  </nav>
