<header class="container-fluid sticky-top bg-blue top-0 mb-4 rounded-bottom">
    <section class="row justify-content-center">
        <!-- Carrinho -->
        <section class="col-sm-3 my-2">
            <?php if (empty($_SESSION['user']) || $_SESSION['user']['type'] == 1): ?>
            <div class="h-100 d-flex align-items-center justify-content-center">
                <button class="btn btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart">
                    <i style="font-size: 20px;" class="fas fa-shopping-cart"></i>
                </button>
            </div>
            <?php endif; ?>
        </section>
        <!-- Logo -->
        <section class="col-6 col-sm-6 my-2">
            <div class="row justify-content-center m-0 p-0">
                <a href="?page=initial" class="col-6 col-md-2 p-0 py-2">
                    <video class="w-100 rounded-circle" src="assets/src/Logo.mp4" autoplay muted></video>
                </a>
            </div>
        </section>
        <!-- Registro e login -->
        <?php if (!isset($_SESSION['user'])): ?>
        <section class="col-sm-3 my-2">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-white me-1" data-bs-toggle="modal" data-bs-target="#register">
                    <b>Registrar</b>
                </button>
                <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#login">
                    Entrar
                </button>
            </div>
        </section>
        <?php else: ?>
        <section class="col-sm-3 my-2">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                <?php if (User::accessSeller()): ?>
                    <a href="?page=user&u=<?= $_SESSION['user']['id']?>" class="me-2">
                        <img src="<?= $_SESSION['user']['imgPath'] ?>" class="rounded-circle border border-blue" alt=""
                            width="40" height="40" />
                    </a>
                <?php endif; ?>
                <div class="dropdown">
                    <button type="button" class="btn btn-blue dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-list"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <?php if(User::accessSeller()):?>
                            <li>
                                <a class="dropdown-item" href="?page=addp">
                                    <i class="fas fa-cart-plus"></i> Adicionar Produto</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="?page=learning">
                                    <i class="fas fa-book"></i> Aprenda</a>
                            </li>
                        <?php endif;?>
                        <li>
                            <a class="dropdown-item" href="?page=editu"><i class="fas fa-cog"></i> Editar Perfil</a>
                        </li>
                        <?php if(!User::accessSeller()):?>
                            <li>
                                <a class="dropdown-item" href="?page=listbuy"><i class="fas fa-shopping-cart"></i> Compras
                                    Realizadas</a>
                            </li>
                        <?php endif;?>
                        <li>
                            <a class="dropdown-item" href="?logout=true">
                                <i class="fas fa-sign-in-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </section>
</header>
<?php if (!User::accessLogged()): ?>
<!-- registro -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="register">Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body px-5">
                    <div class="row">
                        <label class="form-label">Nome de usuario:</label>
                        <input class="col-12 form-control" type="text" placeholder="Nome de usuario" name="name"
                            autocomplete="off" required />
                    </div>
                    <div class="row mt-2">
                        <label class="form-label">E-mail:</label>
                        <input class="col-12 form-control" type="email" name="email" placeholder="Email" name="name"
                            autocomplete="off" required />
                    </div>
                    <div class="row mt-2">
                        <label class="form-label">Confirmar E-mail:</label>
                        <input class="col-12 form-control" type="email" name="confirm_email"
                            placeholder="Confirma????o de email" name="name" autocomplete="off" required />
                    </div>
                    <div class="row mt-2">
                        <label class="form-label w-100">Senha:</label>
                        <div class="col-sm-10 p-0">
                            <input class="form-control rounded-0 rounded-start" placeholder="Senha" type="password"
                                name="password" id="password" required />
                        </div>
                        <div class="col-sm-2 p-0">
                            <button class="btn btn-blue w-100 rounded-0 rounded-end" type="button"
                                onclick="toogleVisibility(password, this)">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <label class="form-label w-100">Confirmar Senha:</label>
                        <div class="col-sm-12 p-0">
                            <input class="form-control" placeholder="Confirmar a senha" type="password"
                                name="confirm_password" id="c_password" required />
                        </div>
                    </div>
                    <div class="row col mt-2">
                        <div class="col-12 form-check">
                            <input class="form-check-input" type="checkbox" name="type">
                            <label for="merchant" class="form-check-label">Comerciante</label>
                        </div>
                    </div>
                    <p class="text-center mt-2">ao se cadastrar aceita os <a href data-bs-toggle="modal"
                            data-bs-target="#termsAndConditions">termos e condi????es</a></p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Limpar e fechar</button>
                    <button type="submit" name="submitU" value="register" class="btn btn-blue">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login">Conectar-se</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body p-5">
                    <div class="row">
                        <label class="form-label">Login:</label>
                        <input class="col-12 form-control" type="email" placeholder="Email / Nome de usuario"
                            name="email"
                            value="<?= isset($_COOKIE['buyeasy_login']) ? $_COOKIE['buyeasy_login'] : "" ?>" />
                    </div>
                    <div class="row mt-2">
                        <label class="form-label w-100">Senha:</label>
                        <div class="col-sm-10 p-0">
                            <input class="form-control rounded-0 rounded-start" placeholder="Senha" type="password"
                                name="password" id="password" required />
                        </div>
                        <div class="col-sm-2 p-0">
                            <button class="btn btn-blue w-100 rounded-0 rounded-end" type="button"
                                onclick="toogleVisibility(password, this)" class="col-1"><i
                                    class="fa fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 form-check">
                            <?php if (isset($_COOKIE['buyeasy_login'])): ?>
                            <input class="form-check-input" type="checkbox" name="remember" checked />
                            <?php else: ?>
                            <input class="form-check-input" type="checkbox" name="remember" />
                            <?php endif; ?>
                            <label for="remember" class="form-check-label">
                                Lembrar-me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Limpar e fechar</button>
                    <button type="submit" name="submitU" value="login" class="btn btn-blue">Conectar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- termos e condi????es -->
<div class="modal fade" id="termsAndConditions" tabindex="-1" aria-labelledby="termsAndConditions" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsAndConditions">Termos e Condi????es</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: justify;">
                Bem-vindo ao website Buy Easy, onde todos os servi??os s??o ofertados por meio da pessoa f??sica, *nome do
                responsavel*, inscrito sob o CPF n?? 012.345.678-90 e RG n?? 9.876.543, endere??o eletr??nico
                www.buyeasy.com.br, com endere??o para receber notifica????es na Rua da *nome da rua*, 0001, CEP n??
                08000-800, Cidade *nome da cidade*, Estado *nome do estado*, representado nessa p??gina eletr??nica.
                Avisamos previamente que ao acessar esse site voc?? concorda tacitamente com as disposi????es contidas
                nesse documento, por isso muita aten????o ao ler cada uma das cl??usulas e obriga????es dispostas a seguir:
                <br><strong>1. Do Objeto</strong>
                <br>1.1 Essa plataforma tem como finalidade o ???e-commerce???, ou seja, disponibilizar a venda de produtos
                e servi??os online disponibilizados na nossa plataforma ou aplicativo. Este documento foi criado pelo
                advogado Diego Castro e modificado com permiss??o para este website.
                <br><strong>2. Da reserva de produtos</strong>
                <br>2.1 O nosso website n??o trabalha com nenhuma possibilidade de reservar qualquer um dos produtos
                ofertados em nossa plataforma.
                <br>2.2 O fato de o produto estar no carrinho de compras n??o ?? tido como uma reserva e n??o impossibilita
                que outras pessoas possam adquirir o produto e eles venham a se esgotar.
                <br><strong>3. Das obriga????es do cliente</strong>
                <br>3.1 O cliente dever?? informar os dados de forma completa e correta no momento de cadastro em nossa
                plataforma.
                <br>3.2 ?? responsabilidade do cliente qualquer erro na escrita ou na transmiss??o err??nea dos dados.
                <br>3.3 Para efetuar qualquer compra em nosso website ou adicionar produtos ao carrinho ?? necess??rio
                logar com o usu??rio e senha que foi fornecido no momento do cadastro.
                <br>3.4 N??o informar os seus dados de login a terceiros sob pena de ser responsabilizado por qualquer
                conduta advinda desse uso.
                <br>3.5 Cada cliente s?? poder?? efetuar um cadastro, n??o sendo aceito mais de uma conta por CPF.
                <br>3.6 Usar a plataforma respeitando a ??tica, bons costumes, legisla????es e ordenamentos vigentes no
                pa??s, sob pena de sofrer san????es.
                <br>3.7 Ser maior de idade (18 anos) e ter capacidade plena para realizar o cadastro e efetuar compras
                em nossa plataforma.
                <br>3.7.1 Se um menor de idade ou pessoa f??sica sem capacidade plena vir a adquirir algum produto ou
                servi??o ofertado em nossa plataforma, entenderemos que os respons??veis autorizaram, respondendo esses
                por toda e qualquer situa????o que advir, bem como pela compra.
                <br>3.8 N??o comentar ou enviar imagens nas avalia????es que possam ir de encontro com a ??tica e o
                respeito, ou que tenha cunho difamat??rio, ofensivo, de ??dio ou preconceituoso.
                <br>3.9 O primeiro login de acesso ser?? feito atrav??s de um link enviado para o seu e-mail cadastrado.
                <br>3.10 N??o fornecer qualquer informa????o falsa, fraudulenta ou que n??o seja correspondente aos seus
                dados.
                <br><strong>4. Das obriga????es do propriet??rio do e-commerce</strong>
                <br>4.1 Informar de forma ostensiva e verdadeira sobre as caracter??sticas e especifica????es do produto
                dispon??vel para venda de forma clara e completa. ( Ex: Cores, altura, material ou largura).
                <br>4.2 Enviar os produtos dentro do prazo estabelecido.
                <br>4.3 Disponibilizar uma plataforma segura.
                <br>4.4 Disponibilizar imagens, ??udios e v??deos informativos sobre os produtos ofertados, e condizentes
                com o que ser?? entregue ao cliente.
                <br>4.5 Emitir a nota fiscal do produto que ser?? enviado e envi??-la ao cliente junto do produto.
                <br>4.6 Informar como deve ocorrer o manuseio, a limpeza ou lavagem do produto e qualquer informa????o
                considerada relevante relacionada ao produto.
                <br><strong>5. Isen????o de responsabilidade</strong>
                <br>5.1 N??o nos responsabilizamos pelo mau uso ou manuseio errado do produto, bem como de qualquer dano
                que possa ocorrer na instala????o de qualquer produto adquirido em nossa plataforma.
                <br>5.2 Todos os produtos que vendemos est??o dentro dos padr??es e condi????es que vem de f??brica, do
                distribuidor ou da empresa que revendeu o produto.
                <br>5.3 Fornecemos todas as informa????es pertinentes relacionadas ao produto, bem como os mesmos v??o
                acompanhados de instru????es de uso e cuidados em suas caixas ou atrav??s de manual de instru????es.
                <br><strong>6. Da Propriedade intelectual</strong>
                <br>6.1 Todo o design e pagina????o s??o de propriedade do nosso website, e foram desenvolvidos por um
                prestador de servi??os que foi contratado para tal finalidade.
                <br>6.2 Toda imagem, ilustra????o, obras de arte, HTML, nomes comerciais, softwares ou v??deo
                disponibilizados em nossa plataforma por um dos gerenciadores da p??gina s??o de nossa propriedade.
                <br>6.2.1 As imagens e v??deos s??o meramente ilustrativas, pois dependendo do monitor ou da tela do
                aparelho eletr??nico o mesmo pode apresentar varia????o de cores ou tons.
                <br>6.3 A logo, a marca e toda a apar??ncia da webempresa/empresa s??o de nossa propriedade.
                <br>6.4 ?? vedada a c??pia sem autoriza????o de qualquer imagem, v??deo, design, ??udios, apar??ncia ou
                descri????es de produtos existentes em nossa web p??gina, sob pena se responder por san????es quem
                desobedecer.
                <br>6.5 N??o nos responsabilizamos por links externos que possam vir a aparecer em nossa p??gina.
                <br>6.5.1 H?? algumas ??reas que poder??o apresentar propagandas ou divulga????o de links, mas n??o temos
                qualquer tipo de rela????o, por isso muito cuidado ao navegar por essas p??ginas e ao fornecer os seus
                dados, pois navegar por essas p??ginas ?? responsabilidade do usu??rio/cliente.
                <br>6.6 Nada contido em nossa web p??gina garante o direito a concess??o de licen??a ou direito de uso sem
                o consentimento expresso de um dos gerenciadores da p??gina ou do propriet??rio da p??gina.
                <br>6.7 O consentimento de c??pia ou compartilhamento deve vir por escrito de forma clara e expressa.
                <br>6.8 ?? vedado compartilhar, copiar, plagiar ou disponibilizar qualquer conte??do, foto, v??deo ou ??udio
                encontrado em nosso site sem consentimento expresso.
                <br><strong>7. Formas de pagamento</strong>
                <br>7.1 As formas de pagamento aceitas em nosso e-commerce s??o cart??o de cr??dito e d??bito, ou boleto
                banc??rio.
                <br>7.2 O boleto banc??rio poder?? ser emitido no momento em que voc?? escolheu a op????o, preencheu os dados
                requisitados e gerou.
                <br>7.2.1 O boleto tem vencimento na data exposta no mesmo, n??o sendo aceito ap??s a data de vencimento.
                <br>7.2.2 Se o boleto vencer e o pagamento n??o tiver sido efetuado, o produto voltar?? a ficar dispon??vel
                para venda e ser?? necess??rio realizar uma nova compra para adquiri-lo.
                <br>7.3 O produto ser?? enviado assim que o pagamento for processado, registrado e confirmado em nossa
                plataforma.
                <br>7.4 Qualquer outra forma de pagamento n??o ?? aceita por nosso e-commerce.
                <br>7.5 Cupons de descontos s??o aceitos, desde que tenhamos disponibilizados, estando sujeitos a
                esgotarem ou terem vig??ncia cancelada a qualquer momento.
                <br>7.5 Se o cliente quiser parcelar o produto em mais vezes dever?? arcar com os juros da operadora.
                <br>7.6 Para solicitar o estorno entre em contato com a nossa Central de Atendimento ou SAC.
                <br><strong>8. Entrega e envio do produto</strong>
                <br>8.1 O produto ser?? enviado assim que o pagamento for confirmado, podendo ser enviado at?? 3 dias ap??s
                a confirma????o do pagamento.
                <br>8.2 Os custos de envio e entrega estar??o dispostos no momento em que voc?? estiver quase finalizando
                a compra, na aba de frete/entrega/envio, onde voc?? informar?? o seu endere??o e CEP.
                <br>8.3 O cliente pagar?? pela entrega e o envio do produto com faixas pr??-definidas, ou de acordo com o
                peso padr??o da categoria.
                <br><strong>9. Troca e devolu????o</strong>
                <br>9.1 O cliente poder?? devolver o produto ou trocar que foi adquirido em nosso e-commerce em at?? 7
                dias, seja qual for a raz??o, conforme a previs??o expressa no C??digo de Defesa do Consumidor em seu art.
                49.
                <br>9.1.1 Para que ocorra a troca ou a devolu????o ?? necess??rio que o produto esteja conforme foi
                entregue, com todos os acess??rios, manual e embalagem, caixa.
                <br>9.1.2 O produto que ser?? devolvido ou trocado n??o poder?? apresentar qualquer marca de uso, como o
                produto estar trincado, riscado ou apresentar sinais de quedas.
                <br>9.2 Se voc?? requisitou a troca do produto o novo ser?? enviado para o endere??o e voc?? ser?? notificado
                sobre o envio via e-mail.
                <br>9.3 Se voc?? solicitou o reembolso, a devolu????o do valor ocorrer?? da forma como foi efetuado o
                pagamento.
                <br>9.3.1 Se foi via cart??o de cr??dito ou d??bito o valor ser?? creditado ou debitado na fatura atual ou
                na seguinte do cart??o, pois informaremos a administradora do cart??o.
                <br>9.3.2 Se o pagamento foi feito via boleto banc??rio, o valor de reembolso ser?? restitu??do dentro de
                30 dias ??teis diretamente na conta que solicitaremos no momento de sua requisi????o de devolu????o.
                <br><strong>10. Pol??tica de Privacidade e Prote????o de Dados</strong>
                <br>10.1 Voc?? pode conferir a nossa pol??tica de privacidade no link de rodap??, onde informamos como
                ocorre a coleta e o tratamentos dos dados cadastrados em nosso site, bem como da navega????o.
                <br><strong>11. Do Foro</strong>
                <br>11. Fica eleito o foro da Cidade da nossa empresa, para dirimir quaisquer controv??rsias, d??vidas,
                desentendimentos, lit??gios ou quest??es advindas da rela????o cliente e e-commerce, mesmo que possa existir
                algum local, por mais privilegiado que possa ser.
                <br><strong>12. Do documento</strong>
                <br>12.1 Este documento foi feito pelo Advogado Diego Castro (OAB/PI 15.613) e foi modificado com
                permiss??o para uso neste site.
            </div>
            <div class="modal-footer">
                <button class="w-100 btn btn-blue" data-bs-toggle="modal" data-bs-target="#register">Voltar a
                    registrar</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (empty($_SESSION['user']) || $_SESSION['user']['type'] == 1): ?>
<!-- Carrinho -->
<div class="offcanvas offcanvas-start text-black rounded-end overflow-hidden" id="cart">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title"> <i class="fas fa-shopping-cart"></i> Carrinho</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <?php if (!empty($_SESSION['cart'])):
        foreach ($_SESSION['cart'] as $index => $item): ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-3" style="min-width: 70px;">
                    <img src="<?= $item['img'] ?>" class="img-fluid h-100 rounded-start" alt="...">
                </div>
                <div class="col-7">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= strlen($item['name']) > 17 ? substr($item['name'], 0, 17) . "..." : $item['name'] ?>
                        </h5>
                        <p class="card-text">R$: <?= str_replace(".", ",", $item['price']) ?>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <form method="GET">
                        <input class="form-control" type="number" step="1" min="0" name="quantity"
                            value="<?= $item['quantity'] ?>">
                        <button type="submit" name="index" value="<?= $index ?>"
                            class="btn btn-secondary w-100">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <h5>Vazio</h5>
        <p>Adicione itens para visualizar aqui!!</p>
        <?php endif; ?>
    </div>
    <div class="offcanvas-footer">
        <p class="fs-4 p-0 m-0 ms-3"><b>Total: R$
                <?php
    $total = 0;
    if (isset($_SESSION['cart']))
        foreach ($_SESSION['cart'] as $index => $item) {
            $total += $item['price'] * $item['quantity'];
        }
    echo "<span id=\"totalPrice\">" . $total . "</span>";
                ?>
            </b></p>
        <?php if (isset($_SESSION['user'])): ?>
        <form method="POST">
            <select class="form-select" name="discount" id="cupon">
                <option value="" selected>Selecione um cupom</option>
                <option value="10" <?php if ($total < 100) echo "disabled" ?>>Desconto de 10% para valores acima de
                    R$100
                </option>
                <option value="25" <?php if ($total < 200) echo "disabled" ?>>Desconto de 25% para valores acima de
                    R$200
                </option>
                <option value="40" <?php if ($total < 500) echo "disabled" ?>>Desconto de 40% para valores acima de
                    R$500
                </option>
            </select>
            <button type="submit" name="cart" value="confirm" class="btn btn-blue rounded-0 w-100" <?php if
            (empty($_SESSION['cart'])) echo "disabled" ?>>Finalizar compra</button>
        </form>
        <?php else: ?>
            <button class="btn btn-blue rounded-0 w-100" type="button" disabled>Realize login para finalizar a compra</button>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>