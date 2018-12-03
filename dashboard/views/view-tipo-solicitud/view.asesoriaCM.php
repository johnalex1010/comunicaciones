<div class="table-responsive table-usta">
  <table class="table">
    <thead>
      <tr>
        <th>Temá central de la asesoría</th>
        <th>Lugar sugerido</th>
        <th>Fecha sugerida</th>
        <th>Hora sugerida</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $consulta['tema']; ?></td>
        <td>
          <?php
            if (!empty($consulta['lugar'])) {
              echo $consulta['lugar'];
            }else{
              echo "No hay lugar sugerido.";
            }
          ?>
        </td>
        <td>
      <?php
        if ($consulta['fechaACM'] == '0000-00-00') {
          echo "No hay fecha sugerida.";
        }elseif (!empty($consulta['fechaACM'])) {
          echo fecha($consulta['fechaACM']);
        }else{
          echo "No hay fecha sugerida.";
        }
      ?>
    </td>
    <td>
      <?php
        if ($consulta['horaACM'] == '00:00:00') {
           echo "No hay hora sugerida.";
        }elseif (!empty($consulta['horaACM'])) {
          echo doceHoras($consulta['horaACM']);
        }else{
          echo "No hay hora sugerida.";
        }
      ?>
    </td>
      </tr>
    </tbody>
  </table>
</div>