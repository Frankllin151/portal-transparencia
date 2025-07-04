
    <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{route("main")}}">
      <img src="{{asset("assets/images/logo.jpeg")}}" alt="Logo portal" class="" style="height: 40px;">
     
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route("main")}}">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route("receitapublica")}}">Receitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route("publico.despesas")}}">Despesas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route("publico.servidores")}}">Servidores</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mais
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route("publico.relatorio")}}">Relatório</a></li>
            <li><a class="dropdown-item" href="{{route("publico.processos")}}">Licitações</a></li>
            <li><hr class="dropdown-divider"></li>
           
          </ul>
        </li>
       
      </ul>
      <form class="d-flex ms-lg-3 mt-2 mt-lg-0" action="{{ route('search.results') }}">
        <input class="form-control me-2" type="search" name="query" placeholder="Pesquisar no portal..." aria-label="Pesquisar">
        <button class="btn btn-outline-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</header>


