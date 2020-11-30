<div class="row justify-content-center align-items-center">
    <div class="col-10">
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success mt-3 text-center" role="alert">
                <strong><?= $this->session->flashdata('success'); ?></strong>
                <button name="button" type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
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
                <div class="row">
                    <?php foreach ($collegers as $colleger): ?>
                        <div class="col-9">
                            <h5 class="card-title"><?= $colleger->name; ?><h5>
                        </div>
                        <div class="col-3">
                            <h5 class="text-right"><i>Total de horas: </i><?= $colleger->hours; ?></h5>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="<?= base_url('bolsistas');?>" class="btn btn-primary mb-3 no-border">
                Voltar
            </a>
            <div class="card-body">
                <table id="listar" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Espetáculo</th>
                            <th>Data</th>
                            <th>Entrada</th>
                            <th>Saída</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($shows)): ?>
                            <?php foreach ($shows as $show): ?>
                            <tr>
                                <td><?= $show->name; ?></td>
                                <td><?= date("d/m/Y", strtotime($show->date)); ?></td>
                                <td><?= $show->entry; ?></td>
                                <td><?= $show->departure; ?></td>
                                <td>
                                    <a title="Consultar comentário" href="consultar/bolsista/espetaculo/<?= $colleger->id."/".$show->id; ?>" class="btn btn-success">
                                        <span class="fa fa-search"></span>
                                    </a>
                                    <a title="Excluir espetáculo" href="excluir/bolsista/espetaculo/<?= $colleger->id."/".$show->id; ?>" class="btn btn-danger">
                                        <span class="fa fa-times"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
