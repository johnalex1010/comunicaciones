<table class="table-usta">
  <tr>
    <th width="50%">URL donde se realizarán los cambios</th>
    <th width="50%">ZIP</th>
  </tr>
  <tr>
    <td><a href="<?php echo $consulta['urlAjuste'] ?>" target="_blank"><?php echo $consulta['urlAjuste'] ?></a></td>
    <td><?php echo $consulta['adjunto'] ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Descripción</th>
  </tr>
  <tr>
    <td>
      <?php
        if (!empty($consulta['descripcion'])) {
          echo $consulta['descripcion'];
        }else{
          echo "No hay descripcion";
        }
      ?>
    </td>
  </tr>
</table>