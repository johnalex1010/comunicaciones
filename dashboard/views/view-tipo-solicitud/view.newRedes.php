<table class="table-usta">
  <tr>
    <th>Tipo de red social</th>
  </tr>
  <tr>
    <td>
      <ul class="list-arrow">
        <?php for ($i = 0; $i<$totalTres; $i++): ?>
          <li><?php echo $consultaTres[$i]['redSocial']; ?></li>
        <?php endFor ?>
      </ul>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Nombre de perfil (sugerido)</th>
    <th>Correo personal para asociar al Fanpage</th>
    <th>Adj Img</th>
  </tr>
  <tr>
    <td>
      <?php
        if (!empty($consultaUno['nomPerfil'])) {
          echo $consultaUno['nomPerfil'];
        }else{
          echo "No hay nombre de perfil sugerido.";
        }
      ?>
    </td>
    <td><?php echo $consultaUno['emailPersonal']; ?></td>
    <td>
      <?php
        if ($totalDos == 0) {
           echo "No hay adjuntos.";
        }else{
          echo $consultaDos['adjunto'];
        }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Descripción para asociar al perfil</th>
  </tr>
  <tr>
    <td><?php echo $consultaUno['descripcion']; ?></td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Telefono de contacto</th>
    <th>Dirección y/o Ubicación</th>
    <th>Correo de contacto</th>
  </tr>
  <tr>
    <td><?php echo $consultaUno['telPerfil']; ?></td>
    <td><?php echo $consultaUno['direccion']; ?></td>
    <td><?php echo $consultaUno['emailPerfil']; ?></td>
  </tr>
</table>