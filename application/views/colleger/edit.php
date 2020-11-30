<div class="row justify-content-center align-items-center">
    <div class="col-6">
        <?php if($this->session->flashdata('danger')): ?>
            <div class="alert alert-danger mt-3 text-center" role="alert">
                <strong><?= $this->session->flashdata('danger'); ?></strong>
                <button name="button" type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card mt-3 no-border">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title"><?= $title; ?></h5>
            </div>
            <form action="<?php echo base_url('editar/bolsista/'.$colleger->id); ?>" method="post">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="colleger">Nome do Bolsista</label>
                            <input name="colleger" type="text" value="<?= $colleger->name; ?>" class="form-control">
                            <span class="invalid-feedback">Nome inválido, digite somente letras.</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right bg-dark text-white">
                    <a href="<?= base_url('bolsistas'); ?>" class="btn btn-danger">
                        <span class="fa fa-ban"></span>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-edit"></span>
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
