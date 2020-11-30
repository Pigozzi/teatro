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
            <form action="<?php echo base_url('editar/espetaculo/'.$show->id); ?>" method="post">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="show">Nome do Espetáculo</label>
                            <input name="show" type="text" value="<?= $show->name; ?>" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-4">
                            <label for="show_date">Data do Espetáculo</label>
                            <input name="show_date" type="text" value="<?= date("d/m/Y", strtotime($show->date)); ?>" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right bg-dark text-white">
                    <a href="<?= base_url('espetaculos'); ?>" class="btn btn-danger">
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
