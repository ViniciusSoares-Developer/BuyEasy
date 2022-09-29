<header>
    <?php if(!isset($_SESSION['user'])):?>
        <a href="?page=login"><button>Entrar</button></a>
    <?php else:?>
        <a href="?logout=true"><button>deslogar</button></a>
    <?php endif;?>
</header>