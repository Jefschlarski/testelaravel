    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.index')}}">
              <span data-feather="home"></span>
              Dashboard<span class="sr-only">(Atual)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('venda.index')}}">
              <span data-feather="file"></span>
              Vendas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('produto.index') }}">
              <span data-feather="shopping-cart"></span>
              Produtos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cliente.index') }}">
              <span data-feather="users"></span>
              Clientes
            </a>
          </li>
        </ul>
      </div>
    </nav>