<div class="container-fluid">
    <div class="row align-items-center justify-content-center full-height">
    	<div class="col-12 col-sm-9 col-md-6 col-xl-4">
    		<form action="#" method="POST">
    			<div class="card no-border">
    				<div class="card-header bg-dark text-white">
    					<h3 class="text-center">Teatro Mario Covas</h3>
    				</div>
    				<div class="card-body">
                        <div class="form-row justify-content-center">
        					<div class="form-group col-12">
        						<input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
        					</div>
        					<div class="form-group col-12">
        						<input type="password" name="senha" class="form-control" placeholder="Senha" required>
        					</div>
                        </div>
                        <!-- <a href="recuperar">Esqueceu a senha?</a> -->
    				</div>
    				<div class="card-footer bg-dark text-white">
                        <a href="bolsistas" class="btn btn-primary float-right">
                            <span class="fa fa-sign-in-alt"></span>
                            Acessar
                        </a>
    					<!-- <button type="submit" class="btn btn-success float-right">
    						<span class="fa fa-sign-in-alt"></span>
    						Acessar
    					</button> -->
    					<p>Esqueceu a senha? <a href="#">Clique aqui.</a></p>
    				</div>
    			</div>
    		</form>
    		<?php if($this->session->flashdata('erro')): ?>
    			<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                    <?php echo $this->session->flashdata('erro'); ?>
            		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                	    <span aria-hidden="true">&times;</span>
                	</button>
    			</div>
    		<?php endif; ?>
    	</div>
    </div>
</div>
