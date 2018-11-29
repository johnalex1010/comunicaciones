<div class="table-responsive table-usta">
	<table class="table">
		<thead>
			<tr>
				<th>Nombre Solicitante</th>
				<th>Correo Solicitante</th>
				<th>Facultad / Dependencia Solicitante</th>
				<th>Numero Contacto Solicitante</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo utf8_encode($ts['nombre']); ?></td>
				<td><?php echo utf8_encode($ts['email']); ?></td>
				<td><?php echo utf8_encode($ts['facDep']); ?></td>
				<td><?php echo utf8_encode($ts['telefono']); ?></td>
			</tr>
		</tbody>
	</table>
</div>