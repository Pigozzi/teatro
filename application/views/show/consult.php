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
                <h5 class="card-title"><?= $collegers->name; ?></h5>
            </div>
            <form action="<?= base_url('editar/bolsista/espetaculo/'.$collegers->id."/".$shows->id); ?>" method="POST">
                <div class="card-body">
                    <div class="form-row">
                        <?php foreach($colleger_shows as $colleger_show): ?>
                            <div class="form-group col-8">
                                <label for="show">Nome do Espetáculo</label>
                                <input name="show" type="text" value="<?= $colleger_show->name; ?>" class="form-control" disabled>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-4">
                                <label for="show_date">Data do Espetáculo</label>
                                <input name="show_date" type="text" value="<?=  date("d/m/Y", strtotime($colleger_show->date)); ?>" class="form-control" disabled>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-6">
                                <label for="entry">Entrada</label>
                                <input name="entry" type="text" value="<?= $colleger_show->entry; ?>" class="form-control">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group col-6">
                                <label for="departure">Saída</label>
                                <input name="departure" type="text" value="<?= $colleger_show->departure; ?>" class="form-control">
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="form-group col-12">
                                <label for="note">Comentário</label>
                                <textarea name="note" class="form-control"rows="3"><?= $colleger_show->note; ?></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="card-footer text-right bg-dark text-white">
                    <a href="<?= base_url('consultar/bolsista/'.$collegers->id); ?>" type="reset" class="btn btn-danger">
                        <span class="fa fa-ban"></span>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <span class="far fa-edit"></span>
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
