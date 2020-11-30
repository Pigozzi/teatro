<div class="row justify-content-center align-items-center">
    <div class="col-md-8 col-sm-12 col-lg-6 col-8">
        <div class="alert alert-success mt-3 text-center d-none" role="alert">
            <strong></strong>
            <button name="button" type="button" class="close" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card mt-3 no-border">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title"><?= $title; ?></h5>
            </div>
            <form id="form-colleger" action="<?= base_url('salvar/bolsista'); ?>" method="POST">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-lg-12">
                            <label for="colleger">Nome do Bolsista</label>
                            <input id="colleger" name="colleger" type="text" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>

                        <!-- <div class="form-group col-2">
                            <label for="hours">Horas</label>
                            <input name="hours" type="text" class="form-control" readonly value="00:00">
                        </div> -->

                        <div class="form-group col-8">
                            <label for="show">Nome do Espetáculo</label>
                            <input name="show" type="text" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-4">
                            <label for="show_date">Data do Espetáculo</label>
                            <input name="show_date" type="text" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-6">
                            <label for="entry">Entrada</label>
                            <input name="entry" type="text" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group col-6">
                            <label for="departure">Saída</label>
                            <input name="departure" type="text" class="form-control">
                            <span class="invalid-feedback"></span>
                        </div>

                        <div class="form-group col-12">
                            <label for="note">Comentário</label>
                            <textarea name="note" class="form-control" rows="3"></textarea>
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right bg-dark text-white">
                    <a href="<?= base_url('bolsistas'); ?>" class="btn btn-danger">
                        <span class="fa fa-ban"></span>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <span class="far fa-check-circle"></span>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
