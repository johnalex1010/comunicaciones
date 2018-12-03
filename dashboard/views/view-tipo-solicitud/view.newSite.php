<table class="table-usta">
  <tr>
    <th width="33.333%">Nombre del evento</th>
    <th width="33.333%">Sugerencia de Subdominio</th>
    <th width="33.333%">Zip con contenido web</th>
  </tr>
  <tr>
    <td><?php echo $consulta['nombreWeb']; ?></td>
    <td>
      <?php
        if (!empty($consulta['subdominio'])) {
          echo $consulta['subdominio'];
        }else{
          echo "No hay subdominio sugerido";
        }
      ?>
    </td>
    <td><?php echo $consulta['adjunto']; ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Motívo</th>
  </tr>
  <tr>
    <td><?php echo $consulta['justificacion']; ?></td>
  </tr>
</table>