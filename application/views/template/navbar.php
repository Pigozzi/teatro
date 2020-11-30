<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url('bolsistas');?>">Teatro Mario Covas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('cadastrar/bolsista');?>">
                    <span class="fa fa-user-plus"></span>
                    Cadastrar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('bolsistas');?>">
                    <span class="fa fa-search"></span>
                    Bolsistas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('espetaculos');?>">
                    <span class="fa fa-search"></span>
                    Espetáculos
                </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a id="navDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-cog"></span>
                    Opções
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navDropdown">
                    <button data-target="#alterar_senha" data-toggle="modal" class="dropdown-item">
                        Alterar senha
                    </button>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('/'); ?>" class="dropdown-item btn-exit">Sair</a>
                </div>
            </li> -->
        </ul>
    </div>
</nav>
<div class="container-fluid">
