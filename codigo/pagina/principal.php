<?php include 'clecar_login.php'; ?>
﻿<!-- PAGINA INICIAL-->
<div class="jumbotron">
    <div class="row">
        <div class="col-md-8 colunm">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-lg col-md-12"> Corrida </button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-lg col-md-12"> Agendar Corrida </button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-lg col-md-12"> Rotas </button>
                    </div>
                </div>
				<div class="row">
				</div>
            </div>
        </div>
       <?php include 'login.php'; ?>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
    <?php include 'mapa_view.php'; ?>
    </div>
</div>
