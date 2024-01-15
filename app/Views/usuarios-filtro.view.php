<!--Inicio HTML -->
<div class="row">       
        <?php
        if($_ENV['app.debug'] & isset($_GET)){
            ?>
            <div class="col-12">
                <div class="alert alert-info">
                    <?php var_dump($_GET); ?>
                </div>
            </div>
    <?php
        }
        ?>
        <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="">                
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="id_rol">Rol:</label>
                                <select name="id_rol" id="id_rol" class="form-control" data-placeholder="Rol">
                                    <option value="">-</option>
                                    <?php foreach($roles as $rol){ ?>
                                    <option value="<?php echo $rol['id_rol']; ?>" <?php echo (isset($_GET['id_rol']) && $rol['id_rol'] == $_GET['id_rol']) ? 'selected' : ''; ?>><?php echo ucfirst($rol['nombre_rol']); ?></option>
                                    <?php
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>                                                
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">                     
                        <a href="/usuarios" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>
                        <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>    
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">UsuariosW</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <table id="tabladatos" class="table table-striped">                    
                    <thead>
                        <tr>
                            <th>Nombre usuario</th>
                            <th>Rol</th>
                            <th>Salario bruto</th>
                            <th>Retención</th>                                                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($usuarios as $u){
                        ?>
                        <tr class="<?php echo $u['activo'] == 0 ? 'table-danger' : ''; ?>">
                            <td><?php echo $u['username']; ?></td>
                            <td><?php echo $u['rol']; ?></td>
                            <td><?php echo number_format($u['salarioBruto'], 2, ',', '.'); ?></td>
                            <td><?php echo $u['retencionIRPF']; ?>%</td>                          
                        </tr>                    
                        <?php
                        }
                        ?>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>                        
</div>
<!--Fin HTML -->