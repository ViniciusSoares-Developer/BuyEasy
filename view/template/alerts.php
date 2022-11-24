
<?php if($alert):?>
    <div>
        <?php if ($alert == 'textForm'): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Texto invalido!</strong> Foi inserido um caractere invalido.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'typeInvalid'): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Tipo invalido!</strong> Foi inserido um caractere invalido.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'confirm'): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> Dados de confirmação incompativel
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'password'): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Sem permissão!</strong> Senha digitada não é valida
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'errorL'): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Não foi possivel conectar!</strong> conta inexistente ou dados inseridos invalidos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'errorR'): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Não foi possivel registrar a conta!</strong> conta ja criada ou dados inseridos invalidos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'erroredu'): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Error ao editar a conta!</strong> Não foi possivel realizar a edição, tente novamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'addP' && User::accessSeller()): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Erro ao registrar produto!</strong> Verifique os dados inseridos e tente novamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif ($alert == 'editP' && User::accessSeller()): ?>
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Erro ao editar produto!</strong> Verifique os dados inseridos e tente novamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>