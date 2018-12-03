<table class="table-usta">
  <tr>
    <th width="50%">Material para aprobación</th>
    <th width="50%">Archivo ZIP</th>
  </tr>
  <tr>
    <td>
      <ul class="list-arrow">
      <?php for ($i = 0; $i<$totalRecursos; $i++): ?>
        <li><?php echo $consulta[$i]['nomAprobacion']; ?></li>
      <?php endFor ?> 
      </ul>
    </td>
     <td>
      <p><?php echo $consulta[0]['adjunto']; ?></p>
     </td>
  </tr>
</table>