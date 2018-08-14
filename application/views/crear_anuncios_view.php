<?php 
    if(empty($_SESSION['info_user']))
    {
        redirect('Home');
    }

    plantilla_usuarios::iniciar($categorias); 
    $paso = (isset($paso)) ? $paso : 0 ;
    $progreso = (isset($progreso)) ? $progreso : 15 ;
?>

<style>
    .margenTPA{
        margin-top:20px;
    }    

    .colorLetras{
        color: black!important;
    }

    .eliminar{
        font-weight:bold;
    }

</style>

<div class="container">
    
    <h1 class="text-center margenTPA"> Publicar mi anuncio </h1>

    <div class="progress margenTPA">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progreso; ?>%"></div>
    </div>

    <h6 class=" text-right margenTPA">Cada anuncio tendrá una vigencia de 45 días.</h6>    

    <?php
        if($paso === 0)
        {
    ?>
        <!-- SELECT CATEGORIAS -->
        <form action="<?php echo base_url() ?>Anuncios/subCategoria" method="post" class="margenTPA">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Selecciona una categoría</label>
                <select class="form-control" id="exampleFormControlSelect1" name="categoria_id">
                    <?php
                        if(isset($categorias))
                        {
                            foreach ($categorias as $categoria) 
                            {
                    ?>
                        <option value="<?php echo $categoria->id; ?>"> <?php echo $categoria->nombre; ?> </option>
                    <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-dark" style="float:right;"> Mostrar subcategorías </button>
        </form>
    <?php
        }    
    ?>    

    <!-- SELECCIONAR  SUBCATEGORIA PASO 1 -->
    <?php
        if($paso === 1)
        {
    ?>
        <!-- SELECT SUBCATEGORIAS --> <br>
        <?php
            if(isset($sub_categorias))
            {
        ?>
            <form action="<?php echo base_url() ?>Anuncios/formulario" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Selecciona una subcategoría</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="data_sub_categoria">
                        <?php
                            if(isset($sub_categorias))
                            {
                                foreach ($sub_categorias as $sub_categoria) 
                                {
                        ?>
                            <option value="<?php echo $sub_categoria->id; ?>"> <?php echo $sub_categoria->nombre; ?> </option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-dark" style="float:right;"> Continuar </button>
                <a class="btn btn-dark" href="<?php echo base_url(); ?>Anuncios" style='float:right; margin-right: 10px;' role="button">Volver</a> 
            </form>
        <?php 
            }
        ?>

    <?php
        }   
    ?>
    <!-- FIN SELECCIONAR CATEGORIA / SUBCATEGORIA PASO 1 -->

    <!-- LLENAR FORMULARIO -->
    <?php
        if($paso === 2)
        {
            if(isset($subCategoria_data))
            {
                if(isset($categoria_data))
                {
    ?>                        
                    <table class="table table-striped table-dark table-hover margenTPA">
                        <thead>
                            <tr>
                                <th>Categoría</th>
                                <th>Subcategoría</th>
                                <th> Acción </th>
                            </tr>
                        </thead>

                        <form name="formularioAnuncios" action="<?php echo base_url()?>Anuncios/detalles" method="post" enctype="multipart/form-data">             

                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1" name="id_categoria">
                                        <option value="<?php echo $categoria_data[0]->id; ?>" <?php echo  set_select('id_categoria', set_value($categoria_data[0]->id, @$anuncio[0]->idcategoria), TRUE); ?>> <?php echo $categoria_data[0]->nombre;?> </option>
                                        <!-- <?php
                                            if(isset($categorias))
                                            {
                                                foreach ($categorias as $categoria) 
                                                {
                                                    if($categoria_data[0]->id == $categoria->id)
                                                    {
                                                        continue;
                                                    }
                                                    else
                                                    {
                                        ?>
                                            <option value="<?php echo $categoria->id; ?>"> <?php echo $categoria->nombre; ?> </option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?> -->
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1" name="id_subcategoria">
                                        <option value="<?php echo $subCategoria_data[0]->id; ?>" <?php echo  set_select('id_subcategoria', set_value($subCategoria_data[0]->id, @$anuncio[0]->id_subcategoria), TRUE); ?>> <?php echo $subCategoria_data[0]->nombre;?> </option>
                                        <?php
                                            if(isset($sub_categorias_t))
                                            {
                                                foreach ($sub_categorias_t as $sub_categoria) 
                                                {
                                                    if($subCategoria_data[0]->id == $sub_categoria->id)
                                                    {
                                                        continue;
                                                    }
                                                    else
                                                    {
                                        ?>
                                            <option value="<?php echo $sub_categoria->id; ?>"> <?php echo $sub_categoria->nombre; ?> </option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td> <a href="<?php echo base_url(); ?>Anuncios" class="btn btn-primary"> Volver</a> </td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 class="margenTPA">Detalles</h4>                         
    <?php                    
                    switch ($categoria_data[0]->nombre) 
                    {
                        case 'Accesorios':

                            # Configuracion de los helpers

                            $nombre_categoria_hidden = array('nombre_categoria'  => $categoria_data[0]->nombre);
                            $anuncio_a_editar_hidden = array('id_anuncio_hidden'  => @$anuncio[0]->id);

                            $celular = array(
                                'type'  => 'text',
                                'name'  => 'celular',
                                'id'    => 'celular',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('celular', @$anuncio[0]->celular)
                            );
                        
                            $telefono = array(
                                'type'  => 'text',
                                'name'  => 'telefono',
                                'id'    => 'telefono',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('telefono', @$anuncio[0]->telefono)
                            );

                            $accesorio = array(
                                'type'  => 'text',
                                'name'  => 'accesorio',
                                'id'    => 'accesorio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('accesorio', @$anuncio[0]->accesorio)
                            );

                            $marca = array(
                                'type'  => 'text',
                                'name'  => 'marca',
                                'id'    => 'marca',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('marca', @$anuncio[0]->marca)
                            );

                            $modelo = array(
                                'type'  => 'text',
                                'name'  => 'modelo',
                                'id'    => 'modelo',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('modelo', @$anuncio[0]->modelo)
                            );

                            $precio = array(
                                'type'  => 'number',
                                'name'  => 'precio',
                                'id'    => 'precio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('precio', @$anuncio[0]->precio)
                            );

                            $titulo_anuncio = array(
                                'type'  => 'text',
                                'name'  => 'titulo_anuncio',
                                'id'    => 'titulo_anuncio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('titulo_anuncio', @$anuncio[0]->titulo_anuncio)
                            );

                            $descripcion = array(
                                'type'  => 'text',
                                'name'  => 'descripcion',
                                'id'    => 'descripcion',
                                'rows'  =>  '3',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('descripcion', @$anuncio[0]->descripcion)
                            );

                            $accion = (@$anuncio[0]->id !== null) ? 'Editar' : 'Continuar' ;

        ?>                            
                            <!-- Categoria / Subcategoria -->
                            <?php 
                                echo form_hidden($nombre_categoria_hidden);
                                echo form_hidden($anuncio_a_editar_hidden);
                            ?>

                            <!-- Provincias -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="provincia">Provincia</label>
                                </div>
                                <select class="custom-select" name="provincia" id="provincia" required="true">
                                    <option <?php echo  set_select('provincia', set_value('provincia', @$anuncio[0]->provincia), TRUE); ?> > <?php if(@$anuncio[0]->provincia == ""){ echo ""; } else { echo @$anuncio[0]->provincia; } ?> </option>
                                    <option <?php echo  set_select('provincia', 'Azua'); ?> >Azua</option>
                                    <option <?php echo  set_select('provincia', 'Bahoruco'); ?> >Bahoruco</option>
                                    <option <?php echo  set_select('provincia', 'Dajabón'); ?> >Dajabón</option>
                                    <option <?php echo  set_select('provincia', 'Distrito Nacional'); ?> >Distrito Nacional</option>
                                    <option <?php echo  set_select('provincia', 'Duarte'); ?> >Duarte</option>
                                    <option <?php echo  set_select('provincia', 'Elías Piña'); ?> >Elías Piña</option>
                                    <option <?php echo  set_select('provincia', 'El Seibo'); ?> >El Seibo</option>
                                    <option <?php echo  set_select('provincia', 'Espaillat'); ?> >Espaillat</option>
                                    <option <?php echo  set_select('provincia', 'Hato Mayor'); ?> >Hato Mayor</option>
                                    <option <?php echo  set_select('provincia', 'Hermanas Mirabal'); ?> >Hermanas Mirabal</option>
                                    <option <?php echo  set_select('provincia', 'Independencia'); ?> >Independencia</option>
                                    <option <?php echo  set_select('provincia', 'La Altagracia'); ?> >La Altagracia</option>
                                    <option <?php echo  set_select('provincia', 'La Romana'); ?> >La Romana</option>
                                    <option <?php echo  set_select('provincia', 'La Vega'); ?> >La Vega</option>
                                    <option <?php echo  set_select('provincia', 'María Trinidad Sánchez'); ?> >María Trinidad Sánchez</option>
                                    <option <?php echo  set_select('provincia', 'Monseñor Nouel'); ?> >Monseñor Nouel</option>
                                    <option <?php echo  set_select('provincia', 'Monte Cristi'); ?> >Monte Cristi</option>
                                    <option <?php echo  set_select('provincia', 'Monte Plata'); ?> >Monte Plata</option>
                                    <option <?php echo  set_select('provincia', 'Pedernales'); ?> >Pedernales</option>
                                    <option <?php echo  set_select('provincia', 'Peravia'); ?> >Peravia</option>
                                    <option <?php echo  set_select('provincia', 'Puerto Plata'); ?> >Puerto Plata</option>
                                    <option <?php echo  set_select('provincia', 'Samaná'); ?> >Samaná</option>
                                    <option <?php echo  set_select('provincia', 'San Cristóbal'); ?> >San Cristóbal</option>
                                    <option <?php echo  set_select('provincia', 'San José de Ocoa'); ?> >San José de Ocoa</option>
                                    <option <?php echo  set_select('provincia', 'San Juan'); ?> >San Juan</option>
                                    <option <?php echo  set_select('provincia', 'San Pedro de Macorís'); ?> >San Pedro de Macorís</option>
                                    <option <?php echo  set_select('provincia', 'Sánchez Ramírez'); ?> >Sánchez Ramírez</option>
                                    <option <?php echo  set_select('provincia', 'Santiago'); ?> >Santiago</option>
                                    <option <?php echo  set_select('provincia', 'Santiago Rodríguez'); ?> >Santiago Rodríguez</option>
                                    <option <?php echo  set_select('provincia', 'Santo Domingo'); ?> >Santo Domingo</option>   
                                    <option <?php echo  set_select('provincia', 'Valverde'); ?> >Valverde</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('provincia') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('provincia') ."</div>";
                                }
                            ?>

                            <!-- Celular -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="celular">Celular</label>
                                </div>
                                <?php echo form_input($celular); ?>
                            </div>
                            <?php 
                                if(form_error('celular') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('celular') ."</div>";
                                }
                            ?>
                            
                            <!-- Telefono -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="telefono">Teléfono</label>
                                </div>
                                <?php echo form_input($telefono); ?>
                            </div>
                            <?php 
                                if(form_error('telefono') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('telefono') ."</div>";
                                }
                            ?>

                            <!-- Accesorio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="accesorio">Accesorio</label>
                                </div>
                                <?php echo form_input($accesorio); ?>
                            </div>
                            <?php 
                                if(form_error('accesorio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('accesorio') ."</div>";
                                }
                            ?>

                            <!-- Marca -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="marca">Marca</label>
                                </div>
                                <?php echo form_input($marca); ?>
                            </div>
                            <?php 
                                if(form_error('marca') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('marca') ."</div>";
                                }
                            ?>
                            
                            <!-- Modelo -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="modelo">Modelo</label>
                                </div>
                                <?php echo form_input($modelo); ?>
                            </div>
                            <?php 
                                if(form_error('modelo') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('modelo') ."</div>";
                                }
                            ?>

                            <!-- Accion -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="accion">Acción</label>
                                </div>
                                <select class="custom-select" name="accion" id="accion" required="true">
                                    <option <?php echo  set_select('accion', set_value('accion', @$anuncio[0]->accion), TRUE); ?> > <?php if(@$anuncio[0]->accion == ""){ echo ""; } else { echo @$anuncio[0]->accion; } ?> </option>
                                    <option <?php echo  set_select('accion', 'Vender'); ?> >Vender</option>
                                    <option <?php echo  set_select('accion', 'Comprar'); ?> >Comprar</option>
                                    <option <?php echo  set_select('accion', 'Alquilar'); ?> >Alquilar</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('accion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('accion') ."</div>";
                                }
                            ?>

                            <!-- Moneda -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="moneda">Moneda</label>
                                </div>
                                <select class="custom-select" name="moneda" id="moneda" required="true">
                                    <option <?php echo  set_select('moneda', set_value('moneda', @$anuncio[0]->moneda), TRUE); ?> > <?php if(@$anuncio[0]->moneda == ""){ echo ""; } else { echo @$anuncio[0]->moneda; } ?> </option>
                                    <option <?php echo  set_select('moneda', 'RD$'); ?> >RD$</option>
                                    <option <?php echo  set_select('moneda', 'US$'); ?> >US$</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('moneda') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('moneda') ."</div>";
                                }
                            ?>

                            <!-- Precio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="precio">Precio</label>
                                </div>
                                <?php echo form_input($precio); ?>
                            </div>
                            <?php 
                                if(form_error('precio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('precio') ."</div>";
                                }
                            ?>

                            <!-- Titulo anuncio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="titulo_anuncio">Título del anuncio</label>
                                </div>
                                <?php echo form_input($titulo_anuncio); ?>
                            </div>
                            <?php 
                                if(form_error('titulo_anuncio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('titulo_anuncio') ."</div>";
                                }
                            ?>

                            <!-- Descripcion -->
                            <?php 
                                echo form_label('Descripción', 'descripcion');
                                echo form_textarea($descripcion) . "<br/>"; 
                                if(form_error('descripcion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('descripcion') ."</div>";
                                }
                            ?>

                            <hr/>
                            
                            <!-- Imagen -->
                            <label for="exampleFormControlFile1">Selecciona las imagenes</label>
                            <input class="form-control-file" accept="image/*" id="exampleFormControlFile1" type="file" name="file[]" multiple>
        <?php
                            break; 
                        case 'Bicicletas':
                                
                            # Configuracion de los helpers

                            $nombre_categoria_hidden = array('nombre_categoria'  => $categoria_data[0]->nombre);
                            $anuncio_a_editar_hidden = array('id_anuncio_hidden'  => @$anuncio[0]->id);

                            $celular = array(
                                'type'  => 'text',
                                'name'  => 'celular',
                                'id'    => 'celular',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('celular', @$anuncio[0]->celular)
                            );
                        
                            $telefono = array(
                                'type'  => 'text',
                                'name'  => 'telefono',
                                'id'    => 'telefono',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('telefono', @$anuncio[0]->telefono)
                            );

                            $modelo = array(
                                'type'  => 'text',
                                'name'  => 'modelo',
                                'id'    => 'modelo',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('modelo', @$anuncio[0]->modelo)
                            );

                            $precio = array(
                                'type'  => 'number',
                                'name'  => 'precio',
                                'id'    => 'precio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('precio', @$anuncio[0]->precio)
                            );

                            $titulo_anuncio = array(
                                'type'  => 'text',
                                'name'  => 'titulo_anuncio',
                                'id'    => 'titulo_anuncio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('titulo_anuncio', @$anuncio[0]->titulo_anuncio)
                            );

                            $descripcion = array(
                                'type'  => 'text',
                                'name'  => 'descripcion',
                                'id'    => 'descripcion',
                                'rows'  =>  '3',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('descripcion', @$anuncio[0]->descripcion)
                            );

                            $accion = (@$anuncio[0]->id !== null) ? 'Editar' : 'Continuar' ;
        ?>                            

                            <!-- Categoria / Subcategoria -->
                            <?php 
                                echo form_hidden($nombre_categoria_hidden);
                                echo form_hidden($anuncio_a_editar_hidden);
                            ?>

                            <!-- Provincias -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="provincia">Provincia</label>
                                </div>
                                <select class="custom-select" name="provincia" id="provincia" required="true">
                                    <option <?php echo  set_select('provincia', set_value('provincia', @$anuncio[0]->provincia), TRUE); ?> > <?php if(@$anuncio[0]->provincia == ""){ echo ""; } else { echo @$anuncio[0]->provincia; } ?> </option>
                                    <option <?php echo  set_select('provincia', 'Azua'); ?> >Azua</option>
                                    <option <?php echo  set_select('provincia', 'Bahoruco'); ?> >Bahoruco</option>
                                    <option <?php echo  set_select('provincia', 'Dajabón'); ?> >Dajabón</option>
                                    <option <?php echo  set_select('provincia', 'Distrito Nacional'); ?> >Distrito Nacional</option>
                                    <option <?php echo  set_select('provincia', 'Duarte'); ?> >Duarte</option>
                                    <option <?php echo  set_select('provincia', 'Elías Piña'); ?> >Elías Piña</option>
                                    <option <?php echo  set_select('provincia', 'El Seibo'); ?> >El Seibo</option>
                                    <option <?php echo  set_select('provincia', 'Espaillat'); ?> >Espaillat</option>
                                    <option <?php echo  set_select('provincia', 'Hato Mayor'); ?> >Hato Mayor</option>
                                    <option <?php echo  set_select('provincia', 'Hermanas Mirabal'); ?> >Hermanas Mirabal</option>
                                    <option <?php echo  set_select('provincia', 'Independencia'); ?> >Independencia</option>
                                    <option <?php echo  set_select('provincia', 'La Altagracia'); ?> >La Altagracia</option>
                                    <option <?php echo  set_select('provincia', 'La Romana'); ?> >La Romana</option>
                                    <option <?php echo  set_select('provincia', 'La Vega'); ?> >La Vega</option>
                                    <option <?php echo  set_select('provincia', 'María Trinidad Sánchez'); ?> >María Trinidad Sánchez</option>
                                    <option <?php echo  set_select('provincia', 'Monseñor Nouel'); ?> >Monseñor Nouel</option>
                                    <option <?php echo  set_select('provincia', 'Monte Cristi'); ?> >Monte Cristi</option>
                                    <option <?php echo  set_select('provincia', 'Monte Plata'); ?> >Monte Plata</option>
                                    <option <?php echo  set_select('provincia', 'Pedernales'); ?> >Pedernales</option>
                                    <option <?php echo  set_select('provincia', 'Peravia'); ?> >Peravia</option>
                                    <option <?php echo  set_select('provincia', 'Puerto Plata'); ?> >Puerto Plata</option>
                                    <option <?php echo  set_select('provincia', 'Samaná'); ?> >Samaná</option>
                                    <option <?php echo  set_select('provincia', 'San Cristóbal'); ?> >San Cristóbal</option>
                                    <option <?php echo  set_select('provincia', 'San José de Ocoa'); ?> >San José de Ocoa</option>
                                    <option <?php echo  set_select('provincia', 'San Juan'); ?> >San Juan</option>
                                    <option <?php echo  set_select('provincia', 'San Pedro de Macorís'); ?> >San Pedro de Macorís</option>
                                    <option <?php echo  set_select('provincia', 'Sánchez Ramírez'); ?> >Sánchez Ramírez</option>
                                    <option <?php echo  set_select('provincia', 'Santiago'); ?> >Santiago</option>
                                    <option <?php echo  set_select('provincia', 'Santiago Rodríguez'); ?> >Santiago Rodríguez</option>
                                    <option <?php echo  set_select('provincia', 'Santo Domingo'); ?> >Santo Domingo</option>   
                                    <option <?php echo  set_select('provincia', 'Valverde'); ?> >Valverde</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('provincia') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('provincia') ."</div>";
                                }
                            ?>

                            <!-- Celular -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="celular">Celular</label>
                                </div>
                                <?php echo form_input($celular); ?>
                            </div>
                            <?php 
                                if(form_error('celular') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('celular') ."</div>";
                                }
                            ?>
                            
                            <!-- Telefono -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="telefono">Teléfono</label>
                                </div>
                                <?php echo form_input($telefono); ?>
                            </div>
                            <?php 
                                if(form_error('telefono') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('telefono') ."</div>";
                                }
                            ?>

                            <!-- Marca -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="marca">Marca</label>
                                </div>
                                <select class="custom-select" name="marca" id="marca" required="true">
                                    <option <?php echo  set_select('marca', set_value('marca', @$anuncio[0]->marca), TRUE); ?> > <?php if(@$anuncio[0]->marca == ""){ echo ""; } else { echo @$anuncio[0]->marca; } ?> </option>
                                    <option <?php echo  set_select('marca', 'BH'); ?> >BH</option>
                                    <option <?php echo  set_select('marca', 'Bianchi'); ?> >Bianchi</option>
                                    <option <?php echo  set_select('marca', 'BMC'); ?> >BMC</option>
                                    <option <?php echo  set_select('marca', 'Cannondale'); ?> >Cannondale</option>
                                    <option <?php echo  set_select('marca', 'Carolina'); ?> >Carolina</option>
                                    <option <?php echo  set_select('marca', 'Cervelo'); ?> >Cervelo</option>
                                    <option <?php echo  set_select('marca', 'Colnago'); ?> >Colnago</option>
                                    <option <?php echo  set_select('marca', 'Cube'); ?> >Cube</option>
                                    <option <?php echo  set_select('marca', 'Cyfac'); ?> >Cyfac</option>
                                    <option <?php echo  set_select('marca', 'Diamondback'); ?> >Diamondback</option>
                                    <option <?php echo  set_select('marca', 'Eagle'); ?> >Eagle</option>
                                    <option <?php echo  set_select('marca', 'Ellsworth'); ?> >Ellsworth</option>
                                    <option <?php echo  set_select('marca', 'Felt'); ?> >Felt</option>
                                    <option <?php echo  set_select('marca', 'Fuji'); ?> >Fuji</option>
                                    <option <?php echo  set_select('marca', 'Gary Fisher'); ?> >Gary Fisher</option>
                                    <option <?php echo  set_select('marca', 'Giant'); ?> >Giant</option>
                                    <option <?php echo  set_select('marca', 'Gt'); ?> >Gt</option>
                                    <option <?php echo  set_select('marca', 'Hasa'); ?> >Hasa</option>
                                    <option <?php echo  set_select('marca', 'Hoffman'); ?> >Hoffman</option>
                                    <option <?php echo  set_select('marca', 'Huffy'); ?> >Huffy</option>
                                    <option <?php echo  set_select('marca', 'Hussar'); ?> >Hussar</option>
                                    <option <?php echo  set_select('marca', 'Iron Horse'); ?> >Iron Horse</option>
                                    <option <?php echo  set_select('marca', 'Jamis'); ?> >Jamis</option>
                                    <option <?php echo  set_select('marca', 'Julen'); ?> >Julen</option>
                                    <option <?php echo  set_select('marca', 'Klein'); ?> >Klein</option>
                                    <option <?php echo  set_select('marca', 'Kona'); ?> >Kona</option>
                                    <option <?php echo  set_select('marca', 'KTM'); ?> >KTM</option>
                                    <option <?php echo  set_select('marca', 'Lapierre'); ?> >Lapierre</option>
                                    <option <?php echo  set_select('marca', 'LeMond'); ?> >LeMond</option>
                                    <option <?php echo  set_select('marca', 'Litespeed'); ?> >Litespeed</option>
                                    <option <?php echo  set_select('marca', 'Look'); ?> >Look</option>
                                    <option <?php echo  set_select('marca', 'Marin'); ?> >Marin</option>
                                    <option <?php echo  set_select('marca', 'Merida'); ?> >Merida</option>
                                    <option <?php echo  set_select('marca', 'Mongoose'); ?> >Mongoose</option>
                                    <option <?php echo  set_select('marca', 'Montecci'); ?> >Montecci</option>
                                    <option <?php echo  set_select('marca', 'Motobecane'); ?> >Motobecane</option>
                                    <option <?php echo  set_select('marca', 'Niner'); ?> >Niner</option>
                                    <option <?php echo  set_select('marca', 'Peugeot'); ?> >Peugeot</option>
                                    <option <?php echo  set_select('marca', 'Pilot'); ?> >Pilot</option>
                                    <option <?php echo  set_select('marca', 'Pinarello'); ?> >Pinarello</option>
                                    <option <?php echo  set_select('marca', 'Raleigh'); ?> >Raleigh</option>
                                    <option <?php echo  set_select('marca', 'Ridley'); ?> >Ridley</option>
                                    <option <?php echo  set_select('marca', 'Salsa'); ?> >Salsa</option>
                                    <option <?php echo  set_select('marca', 'Santa Cruz'); ?> >Santa Cruz</option>
                                    <option <?php echo  set_select('marca', 'Scapin'); ?> >Scapin</option>
                                    <option <?php echo  set_select('marca', 'Schwinn'); ?> >Schwinn</option>
                                    <option <?php echo  set_select('marca', 'Scott'); ?> >Scott</option>
                                    <option <?php echo  set_select('marca', 'Specialized'); ?> >Specialized</option>
                                    <option <?php echo  set_select('marca', 'Trek'); ?> >Trek</option>
                                    <option <?php echo  set_select('marca', 'Wilier'); ?> >Wilier</option>
                                    <option <?php echo  set_select('marca', 'Yeti'); ?> >Yeti</option>
                                    <option <?php echo  set_select('marca', 'Otras'); ?> >Otras</option>
                        

                                </select>
                            </div>
                            <?php 
                                if(form_error('marca') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('marca') ."</div>";
                                }
                            ?>
                            
                            <!-- Modelo -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="modelo">Modelo</label>
                                </div>
                                <?php echo form_input($modelo); ?>
                            </div>
                            <?php 
                                if(form_error('modelo') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('modelo') ."</div>";
                                }
                            ?>

                            <!-- Tamaño del aro -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="size_aro">Tamaño del aro</label>
                                </div>
                                <select class="custom-select" name="size_aro" id="size_aro" required="true">
                                    <option <?php echo  set_select('size_aro', set_value('size_aro', @$anuncio[0]->size_aro), TRUE); ?> > <?php if(@$anuncio[0]->size_aro == ""){ echo ""; } else { echo @$anuncio[0]->size_aro; } ?> </option>
                                    <option <?php echo  set_select('size_aro', '12 Pulgadas'); ?> >12 Pulgadas</option>
                                    <option <?php echo  set_select('size_aro', '16 Pulgadas'); ?> >16 Pulgadas</option>
                                    <option <?php echo  set_select('size_aro', '20 Pulgadas'); ?> >20 Pulgadas</option>
                                    <option <?php echo  set_select('size_aro', '24 Pulgadas'); ?> >24 Pulgadas</option>
                                    <option <?php echo  set_select('size_aro', '26 Pulgadas'); ?> >26 Pulgadas</option>
                                    <option <?php echo  set_select('size_aro', '29 Pulgadas'); ?> >29 Pulgadas</option>
                                    <option <?php echo  set_select('size_aro', '700c'); ?> >700c</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('size_aro') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('size_aro') ."</div>";
                                }
                            ?>

                            <!-- Tamaño del cuadro -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="size_cuadro">Tamaño del cuadro</label>
                                </div>
                                <select class="custom-select" name="size_cuadro" id="size_cuadro" required="true">
                                    <option <?php echo  set_select('size_cuadro', set_value('size_cuadro', @$anuncio[0]->size_cuadro), TRUE); ?> > <?php if(@$anuncio[0]->size_cuadro == ""){ echo ""; } else { echo @$anuncio[0]->size_cuadro; } ?> </option>
                                    <option <?php echo  set_select('size_cuadro', 'Desconocido'); ?> >Desconocido</option>
                                    <option <?php echo  set_select('size_cuadro', 'Niños'); ?> >Niños</option>
                                    <option <?php echo  set_select('size_cuadro', 'XS'); ?> >XS</option>
                                    <option <?php echo  set_select('size_cuadro', 'S'); ?> >S</option>
                                    <option <?php echo  set_select('size_cuadro', 'M'); ?> >M</option>
                                    <option <?php echo  set_select('size_cuadro', 'L'); ?> >L</option>
                                    <option <?php echo  set_select('size_cuadro', 'XL'); ?> >XL</option>
                                    <option <?php echo  set_select('size_cuadro', 'XXL'); ?> >XXL</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('size_cuadro') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('size_cuadro') ."</div>";
                                }
                            ?>

                            <!-- Accion -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="accion">Acción</label>
                                </div>
                                <select class="custom-select" name="accion" id="accion" required="true">
                                    <option <?php echo  set_select('accion', set_value('accion', @$anuncio[0]->accion), TRUE); ?> > <?php if(@$anuncio[0]->accion == ""){ echo ""; } else { echo @$anuncio[0]->accion; } ?> </option>
                                    <option <?php echo  set_select('accion', 'Vender'); ?> >Vender</option>
                                    <option <?php echo  set_select('accion', 'Comprar'); ?> >Comprar</option>
                                    <option <?php echo  set_select('accion', 'Alquilar'); ?> >Alquilar</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('accion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('accion') ."</div>";
                                }
                            ?>

                            <!-- Moneda -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="moneda">Moneda</label>
                                </div>
                                <select class="custom-select" name="moneda" id="moneda" required="true">
                                    <option <?php echo  set_select('moneda', set_value('moneda', @$anuncio[0]->moneda), TRUE); ?> > <?php if(@$anuncio[0]->moneda == ""){ echo ""; } else { echo @$anuncio[0]->moneda; } ?> </option>
                                    <option <?php echo  set_select('moneda', 'RD$'); ?> >RD$</option>
                                    <option <?php echo  set_select('moneda', 'US$'); ?> >US$</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('moneda') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('moneda') ."</div>";
                                }
                            ?>

                            <!-- Precio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="precio">Precio</label>
                                </div>
                                <?php echo form_input($precio); ?>
                            </div>
                            <?php 
                                if(form_error('precio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('precio') ."</div>";
                                }
                            ?>

                            <!-- Titulo anuncio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="titulo_anuncio">Título del anuncio</label>
                                </div>
                                <?php echo form_input($titulo_anuncio); ?>
                            </div>
                            <?php 
                                if(form_error('titulo_anuncio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('titulo_anuncio') ."</div>";
                                }
                            ?>

                            <!-- Descripcion -->
                            <?php 
                                echo form_label('Descripción', 'descripcion');
                                echo form_textarea($descripcion) . "<br/>"; 
                                if(form_error('descripcion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('descripcion') ."</div>";
                                }
                            ?>

                            <hr/>
                            
                            <!-- Imagen -->
                            <label for="exampleFormControlFile1">Selecciona las imagenes</label>
                            <input class="form-control-file" accept="image/*" id="exampleFormControlFile1" type="file" name="file[]" multiple>
                <?php    
                            break;
                        case 'Componentes':

                            # Configuracion de los helpers

                            $nombre_categoria_hidden = array('nombre_categoria'  => $categoria_data[0]->nombre);
                            $anuncio_a_editar_hidden = array('id_anuncio_hidden'  => @$anuncio[0]->id);

                            $celular = array(
                                'type'  => 'text',
                                'name'  => 'celular',
                                'id'    => 'celular',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('celular', @$anuncio[0]->celular)
                            );
                        
                            $telefono = array(
                                'type'  => 'text',
                                'name'  => 'telefono',
                                'id'    => 'telefono',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('telefono', @$anuncio[0]->telefono)
                            );

                            $modelo = array(
                                'type'  => 'text',
                                'name'  => 'modelo',
                                'id'    => 'modelo',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('modelo', @$anuncio[0]->modelo)
                            );

                            $precio = array(
                                'type'  => 'number',
                                'name'  => 'precio',
                                'id'    => 'precio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('precio', @$anuncio[0]->precio)
                            );

                            $titulo_anuncio = array(
                                'type'  => 'text',
                                'name'  => 'titulo_anuncio',
                                'id'    => 'titulo_anuncio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('titulo_anuncio', @$anuncio[0]->titulo_anuncio)
                            );

                            $descripcion = array(
                                'type'  => 'text',
                                'name'  => 'descripcion',
                                'id'    => 'descripcion',
                                'rows'  =>  '3',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('descripcion', @$anuncio[0]->descripcion)
                            );

                            $accion = (@$anuncio[0]->id !== null) ? 'Editar' : 'Continuar' ;
                    ?>

                            <!-- Categoria / Subcategoria -->
                            <?php 
                                echo form_hidden($nombre_categoria_hidden);
                                echo form_hidden($anuncio_a_editar_hidden);
                            ?>

                            <!-- Provincias -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="provincia">Provincia</label>
                                </div>
                                <select class="custom-select" name="provincia" id="provincia" required="true">
                                    <option <?php echo  set_select('provincia', set_value('provincia', @$anuncio[0]->provincia), TRUE); ?> > <?php if(@$anuncio[0]->provincia == ""){ echo ""; } else { echo @$anuncio[0]->provincia; } ?> </option>
                                    <option <?php echo  set_select('provincia', 'Azua'); ?> >Azua</option>
                                    <option <?php echo  set_select('provincia', 'Bahoruco'); ?> >Bahoruco</option>
                                    <option <?php echo  set_select('provincia', 'Dajabón'); ?> >Dajabón</option>
                                    <option <?php echo  set_select('provincia', 'Distrito Nacional'); ?> >Distrito Nacional</option>
                                    <option <?php echo  set_select('provincia', 'Duarte'); ?> >Duarte</option>
                                    <option <?php echo  set_select('provincia', 'Elías Piña'); ?> >Elías Piña</option>
                                    <option <?php echo  set_select('provincia', 'El Seibo'); ?> >El Seibo</option>
                                    <option <?php echo  set_select('provincia', 'Espaillat'); ?> >Espaillat</option>
                                    <option <?php echo  set_select('provincia', 'Hato Mayor'); ?> >Hato Mayor</option>
                                    <option <?php echo  set_select('provincia', 'Hermanas Mirabal'); ?> >Hermanas Mirabal</option>
                                    <option <?php echo  set_select('provincia', 'Independencia'); ?> >Independencia</option>
                                    <option <?php echo  set_select('provincia', 'La Altagracia'); ?> >La Altagracia</option>
                                    <option <?php echo  set_select('provincia', 'La Romana'); ?> >La Romana</option>
                                    <option <?php echo  set_select('provincia', 'La Vega'); ?> >La Vega</option>
                                    <option <?php echo  set_select('provincia', 'María Trinidad Sánchez'); ?> >María Trinidad Sánchez</option>
                                    <option <?php echo  set_select('provincia', 'Monseñor Nouel'); ?> >Monseñor Nouel</option>
                                    <option <?php echo  set_select('provincia', 'Monte Cristi'); ?> >Monte Cristi</option>
                                    <option <?php echo  set_select('provincia', 'Monte Plata'); ?> >Monte Plata</option>
                                    <option <?php echo  set_select('provincia', 'Pedernales'); ?> >Pedernales</option>
                                    <option <?php echo  set_select('provincia', 'Peravia'); ?> >Peravia</option>
                                    <option <?php echo  set_select('provincia', 'Puerto Plata'); ?> >Puerto Plata</option>
                                    <option <?php echo  set_select('provincia', 'Samaná'); ?> >Samaná</option>
                                    <option <?php echo  set_select('provincia', 'San Cristóbal'); ?> >San Cristóbal</option>
                                    <option <?php echo  set_select('provincia', 'San José de Ocoa'); ?> >San José de Ocoa</option>
                                    <option <?php echo  set_select('provincia', 'San Juan'); ?> >San Juan</option>
                                    <option <?php echo  set_select('provincia', 'San Pedro de Macorís'); ?> >San Pedro de Macorís</option>
                                    <option <?php echo  set_select('provincia', 'Sánchez Ramírez'); ?> >Sánchez Ramírez</option>
                                    <option <?php echo  set_select('provincia', 'Santiago'); ?> >Santiago</option>
                                    <option <?php echo  set_select('provincia', 'Santiago Rodríguez'); ?> >Santiago Rodríguez</option>
                                    <option <?php echo  set_select('provincia', 'Santo Domingo'); ?> >Santo Domingo</option>   
                                    <option <?php echo  set_select('provincia', 'Valverde'); ?> >Valverde</option>
                                </select>
                            </div>

                            <?php 
                                if(form_error('provincia') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('provincia') ."</div>";
                                }
                            ?>

                            <!-- Celular -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="celular">Celular</label>
                                </div>
                                <?php echo form_input($celular); ?>
                            </div>
                            <?php 
                                if(form_error('celular') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('celular') ."</div>";
                                }
                            ?>
                            
                            <!-- Telefono -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="telefono">Teléfono</label>
                                </div>
                                <?php echo form_input($telefono); ?>
                            </div>
                            <?php 
                                if(form_error('telefono') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('telefono') ."</div>";
                                }
                            ?>
                            
                            <!-- Tipo -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="tipo">Tipo</label>
                                </div>
                                <select class="custom-select" name="tipo" id="tipo" required="true">
                                    <option <?php echo  set_select('tipo', set_value('tipo', @$anuncio[0]->tipo), TRUE); ?> > <?php if(@$anuncio[0]->tipo == ""){ echo ""; } else { echo @$anuncio[0]->tipo; } ?> </option>
                                    <option <?php echo  set_select('tipo', 'BMX'); ?> >BMX</option>
                                    <option <?php echo  set_select('tipo', 'Chopper'); ?> >Chopper</option>
                                    <option <?php echo  set_select('tipo', 'Mountain bike / MTB'); ?> >Mountain bike / MTB</option>
                                    <option <?php echo  set_select('tipo', 'Mujeres'); ?> >Mujeres</option>
                                    <option <?php echo  set_select('tipo', 'Niños'); ?> >Niños</option>
                                    <option <?php echo  set_select('tipo', 'Urbana'); ?> >Urbana</option>
                                    <option <?php echo  set_select('tipo', 'Recumbente'); ?> >Recumbente</option>
                                    <option <?php echo  set_select('tipo', 'Ruta'); ?> >Ruta</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('marca') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('marca') ."</div>";
                                }
                            ?>

                            <!-- Marca -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="marca">Marca</label>
                                </div>
                                <select class="custom-select" name="marca" id="marca" required="true">
                                    <option <?php echo  set_select('marca', set_value('marca', @$anuncio[0]->marca), TRUE); ?> > <?php if(@$anuncio[0]->marca == ""){ echo ""; } else { echo @$anuncio[0]->marca; } ?> </option>
                                    <option <?php echo  set_select('marca', 'BH'); ?> >BH</option>
                                    <option <?php echo  set_select('marca', 'Bianchi'); ?> >Bianchi</option>
                                    <option <?php echo  set_select('marca', 'BMC'); ?> >BMC</option>
                                    <option <?php echo  set_select('marca', 'Cannondale'); ?> >Cannondale</option>
                                    <option <?php echo  set_select('marca', 'Carolina'); ?> >Carolina</option>
                                    <option <?php echo  set_select('marca', 'Cervelo'); ?> >Cervelo</option>
                                    <option <?php echo  set_select('marca', 'Colnago'); ?> >Colnago</option>
                                    <option <?php echo  set_select('marca', 'Cube'); ?> >Cube</option>
                                    <option <?php echo  set_select('marca', 'Cyfac'); ?> >Cyfac</option>
                                    <option <?php echo  set_select('marca', 'Diamondback'); ?> >Diamondback</option>
                                    <option <?php echo  set_select('marca', 'Eagle'); ?> >Eagle</option>
                                    <option <?php echo  set_select('marca', 'Ellsworth'); ?> >Ellsworth</option>
                                    <option <?php echo  set_select('marca', 'Felt'); ?> >Felt</option>
                                    <option <?php echo  set_select('marca', 'Fuji'); ?> >Fuji</option>
                                    <option <?php echo  set_select('marca', 'Gary Fisher'); ?> >Gary Fisher</option>
                                    <option <?php echo  set_select('marca', 'Giant'); ?> >Giant</option>
                                    <option <?php echo  set_select('marca', 'Gt'); ?> >Gt</option>
                                    <option <?php echo  set_select('marca', 'Hasa'); ?> >Hasa</option>
                                    <option <?php echo  set_select('marca', 'Hoffman'); ?> >Hoffman</option>
                                    <option <?php echo  set_select('marca', 'Huffy'); ?> >Huffy</option>
                                    <option <?php echo  set_select('marca', 'Hussar'); ?> >Hussar</option>
                                    <option <?php echo  set_select('marca', 'Iron Horse'); ?> >Iron Horse</option>
                                    <option <?php echo  set_select('marca', 'Jamis'); ?> >Jamis</option>
                                    <option <?php echo  set_select('marca', 'Julen'); ?> >Julen</option>
                                    <option <?php echo  set_select('marca', 'Klein'); ?> >Klein</option>
                                    <option <?php echo  set_select('marca', 'Kona'); ?> >Kona</option>
                                    <option <?php echo  set_select('marca', 'KTM'); ?> >KTM</option>
                                    <option <?php echo  set_select('marca', 'Lapierre'); ?> >Lapierre</option>
                                    <option <?php echo  set_select('marca', 'LeMond'); ?> >LeMond</option>
                                    <option <?php echo  set_select('marca', 'Litespeed'); ?> >Litespeed</option>
                                    <option <?php echo  set_select('marca', 'Look'); ?> >Look</option>
                                    <option <?php echo  set_select('marca', 'Marin'); ?> >Marin</option>
                                    <option <?php echo  set_select('marca', 'Merida'); ?> >Merida</option>
                                    <option <?php echo  set_select('marca', 'Mongoose'); ?> >Mongoose</option>
                                    <option <?php echo  set_select('marca', 'Montecci'); ?> >Montecci</option>
                                    <option <?php echo  set_select('marca', 'Motobecane'); ?> >Motobecane</option>
                                    <option <?php echo  set_select('marca', 'Niner'); ?> >Niner</option>
                                    <option <?php echo  set_select('marca', 'Peugeot'); ?> >Peugeot</option>
                                    <option <?php echo  set_select('marca', 'Pilot'); ?> >Pilot</option>
                                    <option <?php echo  set_select('marca', 'Pinarello'); ?> >Pinarello</option>
                                    <option <?php echo  set_select('marca', 'Raleigh'); ?> >Raleigh</option>
                                    <option <?php echo  set_select('marca', 'Ridley'); ?> >Ridley</option>
                                    <option <?php echo  set_select('marca', 'Salsa'); ?> >Salsa</option>
                                    <option <?php echo  set_select('marca', 'Santa Cruz'); ?> >Santa Cruz</option>
                                    <option <?php echo  set_select('marca', 'Scapin'); ?> >Scapin</option>
                                    <option <?php echo  set_select('marca', 'Schwinn'); ?> >Schwinn</option>
                                    <option <?php echo  set_select('marca', 'Scott'); ?> >Scott</option>
                                    <option <?php echo  set_select('marca', 'Specialized'); ?> >Specialized</option>
                                    <option <?php echo  set_select('marca', 'Trek'); ?> >Trek</option>
                                    <option <?php echo  set_select('marca', 'Wilier'); ?> >Wilier</option>
                                    <option <?php echo  set_select('marca', 'Yeti'); ?> >Yeti</option>
                                    <option <?php echo  set_select('marca', 'Otras'); ?> >Otras</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('marca') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('marca') ."</div>";
                                }
                            ?>

                            <!-- Modelo -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="modelo">Modelo</label>
                                </div>
                                <?php echo form_input($modelo); ?>
                            </div>
                            <?php 
                                if(form_error('modelo') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('modelo') ."</div>";
                                }
                            ?>

                            <!-- Accion -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="accion">Acción</label>
                                </div>
                                <select class="custom-select" name="accion" id="accion" required="true">
                                    <option <?php echo  set_select('accion', set_value('accion', @$anuncio[0]->accion), TRUE); ?> > <?php if(@$anuncio[0]->accion == ""){ echo ""; } else { echo @$anuncio[0]->accion; } ?> </option>
                                    <option <?php echo  set_select('accion', 'Vender'); ?> >Vender</option>
                                    <option <?php echo  set_select('accion', 'Comprar'); ?> >Comprar</option>
                                    <option <?php echo  set_select('accion', 'Alquilar'); ?> >Alquilar</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('accion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('accion') ."</div>";
                                }
                            ?>

                            <!-- Moneda -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="moneda">Moneda</label>
                                </div>
                                <select class="custom-select" name="moneda" id="moneda" required="true">
                                    <option <?php echo  set_select('moneda', set_value('moneda', @$anuncio[0]->moneda), TRUE); ?> > <?php if(@$anuncio[0]->moneda == ""){ echo ""; } else { echo @$anuncio[0]->moneda; } ?> </option>
                                    <option <?php echo  set_select('moneda', 'RD$'); ?> >RD$</option>
                                    <option <?php echo  set_select('moneda', 'US$'); ?> >US$</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('moneda') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('moneda') ."</div>";
                                }
                            ?>

                            <!-- Precio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="precio">Precio</label>
                                </div>
                                <?php echo form_input($precio); ?>
                            </div>
                            <?php 
                                if(form_error('precio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('precio') ."</div>";
                                }
                            ?>

                            <!-- Titulo anuncio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="titulo_anuncio">Título del anuncio</label>
                                </div>
                                <?php echo form_input($titulo_anuncio); ?>
                            </div>
                            <?php 
                                if(form_error('titulo_anuncio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('titulo_anuncio') ."</div>";
                                }
                            ?>

                            <!-- Descripcion -->
                            <?php 
                                echo form_label('Descripción', 'descripcion');
                                echo form_textarea($descripcion) . "<br/>"; 
                                if(form_error('descripcion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('descripcion') ."</div>";
                                }
                            ?>

                            <hr/>
                            
                            <!-- Imagen -->
                            <label for="exampleFormControlFile1">Selecciona las imagenes</label>
                            <input class="form-control-file" accept="image/*" id="exampleFormControlFile1" type="file" name="file[]" multiple>
                <?php
                            break;
                        case 'Servicios':
                            
                            # Configuracion de los helpers

                            $nombre_categoria_hidden = array('nombre_categoria'  => $categoria_data[0]->nombre);
                            $anuncio_a_editar_hidden = array('id_anuncio_hidden'  => @$anuncio[0]->id);

                            $celular = array(
                                'type'  => 'text',
                                'name'  => 'celular',
                                'id'    => 'celular',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('celular', @$anuncio[0]->celular)
                            );
                        
                            $telefono = array(
                                'type'  => 'text',
                                'name'  => 'telefono',
                                'id'    => 'telefono',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('telefono', @$anuncio[0]->telefono)
                            );


                            $precio = array(
                                'type'  => 'number',
                                'name'  => 'precio',
                                'id'    => 'precio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('precio', @$anuncio[0]->precio)
                            );

                            $titulo_anuncio = array(
                                'type'  => 'text',
                                'name'  => 'titulo_anuncio',
                                'id'    => 'titulo_anuncio',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('titulo_anuncio', @$anuncio[0]->titulo_anuncio)
                            );

                            $descripcion = array(
                                'type'  => 'text',
                                'name'  => 'descripcion',
                                'id'    => 'descripcion',
                                'rows'  =>  '3',
                                'class' => 'form-control',
                                'required'  => 'true',
                                'value' => set_value('descripcion', @$anuncio[0]->descripcion)
                            );

                            $accion = (@$anuncio[0]->id !== null) ? 'Editar' : 'Continuar' ;
                    ?>

                            <!-- Categoria / Subcategoria -->
                            <?php 
                                echo form_hidden($nombre_categoria_hidden);
                                echo form_hidden($anuncio_a_editar_hidden);
                            ?>

                            <!-- Provincias -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="provincia">Provincia</label>
                                </div>
                                <select class="custom-select" name="provincia" id="provincia" required="true">
                                    <option <?php echo  set_select('provincia', set_value('provincia', @$anuncio[0]->provincia), TRUE); ?> > <?php if(@$anuncio[0]->provincia == ""){ echo ""; } else { echo @$anuncio[0]->provincia; } ?> </option>
                                    <option <?php echo  set_select('provincia', 'Azua'); ?> >Azua</option>
                                    <option <?php echo  set_select('provincia', 'Bahoruco'); ?> >Bahoruco</option>
                                    <option <?php echo  set_select('provincia', 'Dajabón'); ?> >Dajabón</option>
                                    <option <?php echo  set_select('provincia', 'Distrito Nacional'); ?> >Distrito Nacional</option>
                                    <option <?php echo  set_select('provincia', 'Duarte'); ?> >Duarte</option>
                                    <option <?php echo  set_select('provincia', 'Elías Piña'); ?> >Elías Piña</option>
                                    <option <?php echo  set_select('provincia', 'El Seibo'); ?> >El Seibo</option>
                                    <option <?php echo  set_select('provincia', 'Espaillat'); ?> >Espaillat</option>
                                    <option <?php echo  set_select('provincia', 'Hato Mayor'); ?> >Hato Mayor</option>
                                    <option <?php echo  set_select('provincia', 'Hermanas Mirabal'); ?> >Hermanas Mirabal</option>
                                    <option <?php echo  set_select('provincia', 'Independencia'); ?> >Independencia</option>
                                    <option <?php echo  set_select('provincia', 'La Altagracia'); ?> >La Altagracia</option>
                                    <option <?php echo  set_select('provincia', 'La Romana'); ?> >La Romana</option>
                                    <option <?php echo  set_select('provincia', 'La Vega'); ?> >La Vega</option>
                                    <option <?php echo  set_select('provincia', 'María Trinidad Sánchez'); ?> >María Trinidad Sánchez</option>
                                    <option <?php echo  set_select('provincia', 'Monseñor Nouel'); ?> >Monseñor Nouel</option>
                                    <option <?php echo  set_select('provincia', 'Monte Cristi'); ?> >Monte Cristi</option>
                                    <option <?php echo  set_select('provincia', 'Monte Plata'); ?> >Monte Plata</option>
                                    <option <?php echo  set_select('provincia', 'Pedernales'); ?> >Pedernales</option>
                                    <option <?php echo  set_select('provincia', 'Peravia'); ?> >Peravia</option>
                                    <option <?php echo  set_select('provincia', 'Puerto Plata'); ?> >Puerto Plata</option>
                                    <option <?php echo  set_select('provincia', 'Samaná'); ?> >Samaná</option>
                                    <option <?php echo  set_select('provincia', 'San Cristóbal'); ?> >San Cristóbal</option>
                                    <option <?php echo  set_select('provincia', 'San José de Ocoa'); ?> >San José de Ocoa</option>
                                    <option <?php echo  set_select('provincia', 'San Juan'); ?> >San Juan</option>
                                    <option <?php echo  set_select('provincia', 'San Pedro de Macorís'); ?> >San Pedro de Macorís</option>
                                    <option <?php echo  set_select('provincia', 'Sánchez Ramírez'); ?> >Sánchez Ramírez</option>
                                    <option <?php echo  set_select('provincia', 'Santiago'); ?> >Santiago</option>
                                    <option <?php echo  set_select('provincia', 'Santiago Rodríguez'); ?> >Santiago Rodríguez</option>
                                    <option <?php echo  set_select('provincia', 'Santo Domingo'); ?> >Santo Domingo</option>   
                                    <option <?php echo  set_select('provincia', 'Valverde'); ?> >Valverde</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('provincia') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('provincia') ."</div>";
                                }
                            ?>

                            <!-- Celular -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="celular">Celular</label>
                                </div>
                                <?php echo form_input($celular); ?>
                            </div>
                            <?php 
                                if(form_error('celular') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('celular') ."</div>";
                                }
                            ?>
                            
                            <!-- Telefono -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="telefono">Teléfono</label>
                                </div>
                                <?php echo form_input($telefono); ?>
                            </div>
                            <?php 
                                if(form_error('telefono') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('telefono') ."</div>";
                                }
                            ?>

                            <!-- Accion -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="accion">Acción</label>
                                </div>
                                <select class="custom-select" name="accion" id="accion" required="true">
                                    <option <?php echo  set_select('accion', set_value('accion', @$anuncio[0]->accion), TRUE); ?> > <?php if(@$anuncio[0]->accion == ""){ echo ""; } else { echo @$anuncio[0]->accion; } ?> </option>
                                    <option <?php echo  set_select('accion', 'Vender'); ?> >Vender</option>
                                    <option <?php echo  set_select('accion', 'Comprar'); ?> >Comprar</option>
                                    <option <?php echo  set_select('accion', 'Alquilar'); ?> >Alquilar</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('accion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('accion') ."</div>";
                                }
                            ?>

                            <!-- Moneda -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="moneda">Moneda</label>
                                </div>
                                <select class="custom-select" name="moneda" id="moneda" required="true">
                                    <option <?php echo  set_select('moneda', set_value('moneda', @$anuncio[0]->moneda), TRUE); ?> > <?php if(@$anuncio[0]->moneda == ""){ echo ""; } else { echo @$anuncio[0]->moneda; } ?> </option>
                                    <option <?php echo  set_select('moneda', 'RD$'); ?> >RD$</option>
                                    <option <?php echo  set_select('moneda', 'US$'); ?> >US$</option>
                                </select>
                            </div>
                            <?php 
                                if(form_error('moneda') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('moneda') ."</div>";
                                }
                            ?>

                            <!-- Precio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="precio">Precio</label>
                                </div>
                                <?php echo form_input($precio); ?>
                            </div>
                            <?php 
                                if(form_error('precio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('precio') ."</div>";
                                }
                            ?>

                            <!-- Titulo anuncio -->
                            <div class="input-group mb-3 margenTPA">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="titulo_anuncio">Título del anuncio</label>
                                </div>
                                <?php echo form_input($titulo_anuncio); ?>
                            </div>
                            <?php 
                                if(form_error('titulo_anuncio') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('titulo_anuncio') ."</div>";
                                }
                            ?>

                            <!-- Descripcion -->
                            <?php 
                                echo form_label('Descripción', 'descripcion');
                                echo form_textarea($descripcion) . "<br/>"; 
                                if(form_error('descripcion') != '')
                                {
                                    echo "<div class='alert alert-warning' style='padding-bottom:0;' role='alert'>". form_error('descripcion') ."</div>";
                                }
                            ?>

                            <hr/>
                            
                            <!-- Imagen -->
                            <label for="exampleFormControlFile1">Selecciona las imagenes</label>
                            <input class="form-control-file" accept="image/*" id="exampleFormControlFile1" type="file" name="file[]" multiple>
                <?php
                            break;
                    }
                ?>
                    <!-- muestra de las imagenes -->
                    <?php
                        if(isset($imagenes_guardadas))
                        {
                    ?>
                        <h4 class="margenTPA"> Imagenes subidas </h4>
                        <h6> Selecciona las imagenes que desees eliminar: </h6>

                        <?php
                            $contador = 1;
                            foreach ($imagenes_guardadas as $imagen) 
                            {
                        ?>
                                <div class="form-check">
                                    <input name="imagen_id<?php echo $imagen->id; ?>" class="form-check-input position-static" type="checkbox" id="<?php echo $imagen->id; ?>" value="<?php echo $imagen->id; ?>" aria-label="...">
                                    <label class="form-check-label" for="<?php echo $imagen->id; ?>">Imagen: <b> <?php echo $contador; ?> </b> </label>
                                </div>
                        <?php 
                                $contador++;
                            }
                        ?>

                        <h6> Estas son las imagenes con la numeracion correspondiente: </h6>

                        <div class="margenTPA"></div>
                        <div class="row">                            
                    <?php
                            $contador = 1;
                            foreach ($imagenes_guardadas as $imagen) 
                            {
                    ?>
                                <div class="card text-white bg-dark mb-3" style="max-width: 18rem; margin-left:40px;">
                                    <div id="<?php echo $imagen->id; ?>" class="card-header text-center eliminar"> <?php echo $contador; ?> </div>
                                    <div class="card-body">
                                        <img src="<?php echo base_url(); ?>/images/<?php echo $imagen->imagen; ?>" class="img-thumbnail" style="max-height: 9rem;" alt="<?php echo $imagen->imagen;?>">
                                    </div>
                                </div>                              
                    <?php
                            $contador++;
                            }
                        }
                    ?>
                        </div>
                    
                    <br/>

                    <div class="container">
                        <div class="alert alert-dark margenTPA" role="alert" style='padding-bottom:0;'>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="destacar" value="si" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    Su anuncio aparecerá como Anuncios Destacados con deslizador en la parte superior de la primera página. <br/>
                                    <b>Listado Destacado US$ 2.00</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="margenTPA"></div>
                    
                    <div class="container">
                        <input class='btn btn-dark' style='float:right;' name="submit" type="submit" value="<?php echo $accion; ?>" id="enviar">
                    </div>
                    
                    </form>

                    <br><br>

                    <?php 
                        if(isset($error_al_subir_imagen))
                        {
                    ?>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_al_subir_imagen; ?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
    <?php
                }
            }
        }    
    ?>
    <!-- FIN DE LLENAR FORMULARIO -->
    
    <!-- REVISAR ANUNCIO -->
    <?php 
        if($paso === 3)
        {
            if(isset($anuncio_insertado))
            {
                if(isset($categoria_x))
                {
                    switch ($categoria_x)
                    {
                        case 'Accesorios':     
    ?>
                            <div class="card bg-light mb-3 margenTPA">
                                <div class="card-header">Mi anuncio</div>
                                <div class="card-body">
                                    <h5 class="card-title">Revisa que la información esté como deseas</h5>
                                    
                                    <!-- CASO CATEGORIA ACCESORIOS -->

                                    <div class="alert alert-light" role="alert">
                                        
                                        <p class="card-text colorLetras text-center">
                                            <b>Categoría:</b> <?php echo $categoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Subcategoría:</b> <?php echo $subcategoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio_insertado[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio_insertado[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio_insertado[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Accesorio:</b> <?php echo $anuncio_insertado[0]->accesorio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Marca:</b> <?php echo $anuncio_insertado[0]->marca; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Modelo:</b> <?php echo $anuncio_insertado[0]->modelo; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio_insertado[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio_insertado[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio_insertado[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio_insertado[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio_insertado[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tarifa:</b> <?php $t = ($anuncio_insertado[0]->destacar == 'si') ? '2.00 US$' : '0.00 US$' ; echo $t ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio_insertado[0]->fecha_de_fin)); ?>
                                        </p>

                                        <div class="alert alert-info text-center colorLetras" role="alert">
                                            <b>Autorizo a C-APP a borrar mis anuncios:</b>
                                            <br/>
                                            Si estoy repitiendo el mismo anuncio varias veces. <br/>
                                            Si coloco este anuncio en una categoría incorrecta. <br/>
                                            Si el contenido de este anuncio es inapropiado. <br/>
                                            Si tengo más de una cuenta. <br/>
                                        </div>
                                        
                                        <a href="<?php echo base_url()?>Anuncios/detalles/<?php echo $anuncio_insertado[0]->id; ?>/<?php echo $categoria_a_mostrar[0]->nombre; ?>/" style="color:black;" class="btn btn-outline-info">Editar</a>
                                        <a href="<?php echo base_url()?>Anuncios/fin/" style="float:right; color:black;" class="btn btn-outline-info">Continuar</a>
                                        
                                    </div>
                                </div>
                            </div>
    <?php
                            break;    
                        case 'Bicicletas':
    ?>
                            <div class="card bg-light mb-3 margenTPA">
                                <div class="card-header">Mi anuncio</div>
                                <div class="card-body">
                                    <h5 class="card-title">Revisa que la información esté como deseas</h5>
                                    
                                    <!-- CASO CATEGORIA ACCESORIOS -->

                                    <div class="alert alert-light" role="alert">
                                        
                                        <p class="card-text colorLetras text-center">
                                            <b>Categoría:</b> <?php echo $categoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Subcategoría:</b> <?php echo $subcategoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio_insertado[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio_insertado[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio_insertado[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Marca:</b> <?php echo $anuncio_insertado[0]->marca; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tamaño del aro:</b> <?php echo $anuncio_insertado[0]->size_aro; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tamaño del cuadro:</b> <?php echo $anuncio_insertado[0]->size_cuadro; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio_insertado[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio_insertado[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio_insertado[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio_insertado[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio_insertado[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tarifa:</b> <?php $t = ($anuncio_insertado[0]->destacar == 'si') ? '2.00 US$' : '0.00 US$' ; echo $t ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio_insertado[0]->fecha_de_fin)); ?>
                                        </p>

                                        <div class="alert alert-info text-center colorLetras" role="alert">
                                            <b>Autorizo a C-APP a borrar mis anuncios:</b>
                                            <br/>
                                            Si estoy repitiendo el mismo anuncio varias veces. <br/>
                                            Si coloco este anuncio en una categoría incorrecta. <br/>
                                            Si el contenido de este anuncio es inapropiado. <br/>
                                            Si tengo más de una cuenta. <br/>
                                        </div>
                                        
                                        <a href="<?php echo base_url()?>Anuncios/detalles/<?php echo $anuncio_insertado[0]->id; ?>/<?php echo $categoria_a_mostrar[0]->nombre; ?>/" style="color:black;" class="btn btn-outline-info">Editar</a>
                                        <a href="<?php echo base_url()?>Anuncios/fin/" style="float:right; color:black;" class="btn btn-outline-info">Continuar</a>
                                        
                                    </div>
                                </div>
                            </div>
    <?php
                            break;
                        case 'Componentes':
    ?>
                            <div class="card bg-light mb-3 margenTPA">
                                <div class="card-header">Mi anuncio</div>
                                <div class="card-body">
                                    <h5 class="card-title">Revisa que la información esté como deseas</h5>
                                    
                                    <!-- CASO CATEGORIA ACCESORIOS -->

                                    <div class="alert alert-light" role="alert">
                                        
                                        <p class="card-text colorLetras text-center">
                                            <b>Categoría:</b> <?php echo $categoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Subcategoría:</b> <?php echo $subcategoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio_insertado[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio_insertado[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio_insertado[0]->telefono; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tipo:</b> <?php echo $anuncio_insertado[0]->tipo; ?>
                                        </p>


                                        <p class="card-text colorLetras text-center">
                                            <b>Marca:</b> <?php echo $anuncio_insertado[0]->marca; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio_insertado[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio_insertado[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio_insertado[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio_insertado[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio_insertado[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tarifa:</b> <?php $t = ($anuncio_insertado[0]->destacar == 'si') ? '2.00 US$' : '0.00 US$' ; echo $t ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio_insertado[0]->fecha_de_fin)); ?>
                                        </p>

                                        <div class="alert alert-info text-center colorLetras" role="alert">
                                            <b>Autorizo a C-APP a borrar mis anuncios:</b>
                                            <br/>
                                            Si estoy repitiendo el mismo anuncio varias veces. <br/>
                                            Si coloco este anuncio en una categoría incorrecta. <br/>
                                            Si el contenido de este anuncio es inapropiado. <br/>
                                            Si tengo más de una cuenta. <br/>
                                        </div>
                                        
                                        <a href="<?php echo base_url()?>Anuncios/detalles/<?php echo $anuncio_insertado[0]->id; ?>/<?php echo $categoria_a_mostrar[0]->nombre; ?>/" style="color:black;" class="btn btn-outline-info">Editar</a>
                                        <a href="<?php echo base_url()?>Anuncios/fin/" style="float:right; color:black;" class="btn btn-outline-info">Continuar</a>
                                        
                                    </div>
                                </div>
                            </div>
    <?php                                                        
                            break;
                        case 'Servicios':
    ?>
                            <div class="card bg-light mb-3 margenTPA">
                                <div class="card-header">Mi anuncio</div>
                                <div class="card-body">
                                    <h5 class="card-title">Revisa que la información esté como deseas</h5>
                                    
                                    <!-- CASO CATEGORIA ACCESORIOS -->

                                    <div class="alert alert-light" role="alert">
                                        
                                        <p class="card-text colorLetras text-center">
                                            <b>Categoría:</b> <?php echo $categoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Subcategoría:</b> <?php echo $subcategoria_a_mostrar[0]->nombre; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Provincia:</b> <?php echo $anuncio_insertado[0]->provincia; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Celular:</b> <?php echo $anuncio_insertado[0]->celular; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Teléfono:</b> <?php echo $anuncio_insertado[0]->telefono; ?>
                                        </p>
                                        <p class="card-text colorLetras text-center">
                                            <b>Acción:</b> <?php echo $anuncio_insertado[0]->accion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Moneda:</b> <?php echo $anuncio_insertado[0]->moneda; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Precio:</b> <?php echo $anuncio_insertado[0]->precio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Título del anuncio:</b> <?php echo $anuncio_insertado[0]->titulo_anuncio; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Descripción:</b> <?php echo $anuncio_insertado[0]->descripcion; ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Tarifa:</b> <?php $t = ($anuncio_insertado[0]->destacar == 'si') ? '2.00 US$' : '0.00 US$' ; echo $t ?>
                                        </p>

                                        <p class="card-text colorLetras text-center">
                                            <b>Fecha en que se desactivará el anuncio:</b> <?php echo date("d-m-Y",strtotime($anuncio_insertado[0]->fecha_de_fin)); ?>
                                        </p>

                                        <div class="alert alert-info text-center colorLetras" role="alert">
                                            <b>Autorizo a C-APP a borrar mis anuncios:</b>
                                            <br/>
                                            Si estoy repitiendo el mismo anuncio varias veces. <br/>
                                            Si coloco este anuncio en una categoría incorrecta. <br/>
                                            Si el contenido de este anuncio es inapropiado. <br/>
                                            Si tengo más de una cuenta. <br/>
                                        </div>
                                        
                                        <a href="<?php echo base_url()?>Anuncios/detalles/<?php echo $anuncio_insertado[0]->id; ?>/<?php echo $categoria_a_mostrar[0]->nombre; ?>/" style="color:black;" class="btn btn-outline-info">Editar</a>
                                        <a href="<?php echo base_url()?>Anuncios/fin/" style="float:right; color:black;" class="btn btn-outline-info">Continuar</a>
                                        
                                    </div>
                                </div>
                            </div>
    <?php                    
                            break;
                    }
                }
            }
        }
    ?>
    <!-- FIN REVISAR ANUNCIO -->

    <!-- FIN -->
    <?php 
        if($paso === 4)
        {
    ?>
        <div class="jumbotron">
            <h1 class="display-4 text-center"> <b>¡Muy bien!</b> </h1>
            <hr class="my-4">
            <p class="lead" style='float:right;'>
                ¡Tu anuncio se ha agregado correctamente!
            </p>
            <br/><br/>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>" style='float:right;' role="button">Ir al inicio</a> 
            <br/><br/>           
        </div>
    <?php
        } 
    ?>
    <!-- FIN DEL FIN -->

    <br><br><br>
</div>