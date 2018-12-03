<table class="table-usta">
  <tr>
    <th width="50%" >Documento para envío de correos institucionales</th>
   <?php for ($i = 0; $i<1; $i++): ?>
  		<td width="50%"><?php echo $consulta[$i]['adjunto']; ?></td>
  	<?php endFor ?> 
  </tr>	
</table>