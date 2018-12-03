<table class="table-usta">
  <tr>
    <th width="33.333%">Tipo de evento</th>
    <th width="33.333%">Nombre del evento</th>
    <th width="33.333%">Lugar del evento</th>
  </tr>
  <tr>
    <td><?php echo $consultaUno['tipoEvento'] ?></td>
    <td><?php echo $consultaUno['nombreEvento'] ?></td>
    <td><?php echo $consultaUno['lugar'] ?></td>
    
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="50%">Fecha inicio y fin del evento</th>
    <th width="25%">Hora del evento</th>
    <th width="25%">Número TIC</th>
  </tr>
  <tr>
    <td><?php echo fecha($consultaUno['fechaInicio']); ?> al <?php echo fecha($consultaUno['fechaFin']); ?></td>
    <td><?php echo doceHoras($consultaUno['hora']); ?></td>
    <td>
      <?php 
        if (!empty($consultaUno['numTIC'])) {
          echo $consultaUno['numTIC'];
        }else{
          echo "No se relaciona número de TIC.";
        }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="33.333%">Cubrimiento audiovisual</th>
    <th width="33.333%">Requerimiento web</th>
    <th width="33.333%">Justificación web</th>
  </tr>
  <tr>
    <td>
      <?php if ($totalCinco == 0): ?>
        <p>No hay requerimiento Audiovisual</p>
      <?php else: ?>
        <ul class="list-arrow">
          <?php for ($i=0; $i < $totalCinco; $i++): ?>
            <li><?php echo $consultaCinco[$i]['listAudioVisual'] ?></li>
          <?php endFor ?>
        </ul>
      <?php endif ?>
    </td>
    <?php
      if ($totalSeis == 0) {
        echo "<td>No hay requerimiento web</td>";
        echo "<td>No hay justificación web</td>";
      }else{
        echo "<td>".$consultaSeis[0]['tipoWeb']."</td>";
        if (!empty($consultaSeis[0]['justificacionWeb'])) {
           echo "<td>".$consultaSeis[0]['justificacionWeb']."</td>";
        }else{
          echo "<td>No hay justificación web.</td>";
        }
      }
    ?>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th width="75%">Piezas Impresas</th>
    <th width="25%">Piezas Digitales</th>
  </tr>
  <tr>
    <td>        
      <?php
        if ($totalOcho == 0) {
          echo "No hay piezas impresas";
        }else{
      ?>
        <table class="table-usta">
         <tr>
           <th width="30%">Tipo de pieza</th>
           <th width="30%">Tipo de acabados</th>
           <th width="30%">Tipo de papel</th>
           <th width="10%">Cantidad</th>
         </tr>
         <?php for ($i =0; $i<$totalOcho; $i++) : ?>
          <tr>
           <td><?php echo $consultaOcho[$i]['listPiezaImp'] ?></td>
           <td><?php echo $consultaOcho[$i]['listAcabadoImp'] ?></td>
           <td><?php echo $consultaOcho[$i]['listPapelImp'] ?></td>
           <td><?php echo $consultaOcho[$i]['cantidad'] ?></td>
         </tr>
         <?php endFor ?>
       </table>
      <?php
        }
      ?>       
    </td>
    <td>
      <?php
      if ($totalSiete == 0 ) {
        echo "No hay piezas digitales";
      }else{
        echo "<ul class='list-arrow'>";
        for ($i=0; $i<$totalSiete; $i++){
          echo "<li>".$consultaSiete[$i]['listPiezaDig']."</li>";
        }
        echo "</ul>";
      }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>
    <th>Lineamientos gráficos</th>
  </tr>
  <tr>
    <td>
      <?php 
        if (!empty($consultaUno['txtLineamientos'])) {
          echo $consultaUno['txtLineamientos'];
        }else{
          echo "No se relacionan líneamientos gráficos.";
        }
      ?>
    </td>
  </tr>
</table>
<br>
<table class="table-usta">
  <tr>    
    <th width="33.333%">Colores sugeridos</th>
    <th width="33.333%">Público Objetivo</th>
    <th width="33.333%">Documentos Adjuntos</th>
  </tr>
  <tr>
    <td>
      <ul class="list-arrow">
        <?php for ($i=0; $i<$totalDos; $i++): ?>
          <li style="color: <?php echo $consultaDos[$i]['color'] ?> "><?php echo $consultaDos[$i]['color'] ?></li>
        <?php endFor ?>
      </ul>
    </td>
    <td>
      <?php if ($totalTres == 0): ?>
        <p>No hay público objetivo</p>
      <?php else: ?>
        <ul class="list-arrow">
          <?php for ($i=0; $i < $totalTres; $i++): ?>
            <li><?php echo $consultaTres[$i]['listPublico'] ?></li>
          <?php endFor ?>
        </ul>
      <?php endif ?>
    </td>
    <td>
      <?php if ($totalCuatro == 0): ?>
        <p>No hay adjuntos</p>
      <?php else: ?>
        <ul class="list-arrow">
          <li><b>Convenciones</b></li>
          <li>IE: Información adicional del Evento</li>
          <li>IW: Información para Web del Evento</li>
          <li>PR: Presupuesto</li>
        </ul>
        <ul class="list-arrow">
          <?php for ($i=0; $i < $totalCuatro; $i++): ?>
            <li><b>Adjunto:</b> <?php echo $consultaCuatro[$i]['adjunto'] ?></li>
          <?php endFor ?>
        </ul>
      <?php endif ?>  
    </td>
  </tr>
</table>