<table class="table-usta">
  <tr>
    <th>Nombre de la campaña</th>
  </tr>
  <tr>
    <td><?php echo $consultaUno[0]['nombreCam'] ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="50%">Justificación de la campaña</th>
    <th width="50%">Objetivo de la campaña</th>
  </tr>
  <tr>
    <td><?php echo $consultaUno[0]['justificacion'] ?></td>
    <td><?php echo $consultaUno[0]['objetivo'] ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="50%">Descripción de la campaña</th>
    <th width="50%">Palabras clave de la campaña</th>
  </tr>
  <tr>
    <td><?php echo $consultaUno[0]['descripcion'] ?></td>
    <td>
      <?php
        if (!empty($consultaUno[0]['palabrasClaves'])) {
          echo $consultaUno[0]['palabrasClaves'];
        }else{
          echo "No hay palabras claves";
        }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="33.333%">Imagenes de referencia</th>
    <th width="33.333%">Fecha inicio de la campaña</th>
    <th width="33.333%">Fecha fin de la campaña</th>
  </tr>
  <tr>
    <td>
      <?php
      if (!empty($consultaDos['adjunto'])) {
        echo $consultaDos['adjunto'];
      }else{
        echo "No hay adjuntos.";
      }
      ?></td>
    <td><?php echo fecha($consultaUno[0]['fechaHoraIni']) ?></td>
    <td><?php echo fecha($consultaUno[0]['fechaHoraFin']) ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Público objetivo</th>
  </tr>
  <tr>
    <td>
      <ul class="list-arrow">
        <?php for ($i = 0; $i<$totalDos; $i++): ?>
          <li><?php echo $consultaUno[$i]['listPublico']; ?></li>
        <?php endFor ?>
      </ul>
    </td>
  </tr>
</table>