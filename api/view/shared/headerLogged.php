<header class="container-fluid row m-0 py-3 px-0">
  <section class="col">
    <a href="?page=initial">
      <img src="../../assets/imgs/logo.png" alt="logo">
    </a>
  </section>
  <section class="col-2 d-flex justify-content-end pe-3">
    <div class="">
      <span>Nome</span>
      <button class="btn btn-secon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu">
        <li class="text-center"><a class="dropdown-item" href="?page=user&id=<?= $_SESSION['user']['id'] ?>"><button>Perfil</button></a></li>
        <li class="text-center"><a class="dropdown-item" href="?page=pnew"><button>Adicionar produto</button></a></li>
        <li class="text-center"><a class="dropdown-item" href="?logout=true"><button>Deslogar</button></a></li>
      </ul>
    </div>
  </section>
</header>