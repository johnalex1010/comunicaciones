<table class="table-usta">
  <tr>
    <th width="50%">Documento Word</th>
    <th width="50%">Imagen</th>
  </tr>
  <tr>
  	<?php for ($i = 0; $i<2; $i++): ?>
  		<td><?php echo $consulta[$i]['adjunto']; ?></td>
  	<?php endFor ?>    
  </tr>
</table>