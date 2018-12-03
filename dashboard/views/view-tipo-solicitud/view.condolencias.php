<table  class="table-usta">
  <tr>
    <th width="33.333%">Nombre del administrativo o estudiante</th>
    <th width="33.333%">Cargo</th>
    <th width="33.333%">Faculad / Dependencia</th>
  </tr>
  <tr>
    <td><?php echo $consulta['nombreDoliente'] ?></td>
    <td><?php echo $consulta['cargoDoliente'] ?></td>
    <td><?php echo $consulta['facDep'] ?></td>
  </tr>
</table>

<br>

<table class="table-usta">
  <tr>
    <th width="33.333%">Nombre Fallecido</th>
    <th width="33.333%">Parentesco</th>
    <th width="33.333%">Lugar de velación</th>
  </tr>
  <tr>
    <td><?php echo $consulta['nombreFallecido'] ?></td>
    <td>
      <?php
        if (!empty($consulta['parentesco'])) {
          echo $consulta['parentesco'];
        }else{
          echo "No hay parentesco";
        }        
      ?>      
    </td>
    <td>
      <?php
        if (!empty($consulta['lugarVelacion'])) {
          echo $consulta['lugarVelacion'];
        }else{
          echo "No hay lugar de velacion";
        }        
      ?>      
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="50%">Fecha de velación</th>
    <th width="50%">Hora de velación</th>
  </tr>
  <tr>
    <td>
      <?php
        if (!empty($consulta['fechaVelacion'])) {
          echo fecha($consulta['fechaVelacion']);
        }else{
          echo "No hay fecha de velación";
        }        
      ?>      
    </td>
    <td>
      <?php
        if (!empty($consulta['horaVelacion'])) {
          echo doceHoras($consulta['horaVelacion']);
        }else{
          echo "No hay hora de velacion";
        }
      ?>      
    </td>
  </tr>
</table>
