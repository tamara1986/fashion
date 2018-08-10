
<div class="poruke">
	<table class="table table-hover mt-1">
		<thead>
			<tr>
				<th colspan="2" style="text-align: center;">Poruke</th>
				
				
			</tr>
		</thead>
		<tbody>
		<?php
			$brojac=0;
				foreach ($this->data['content'] as $poruke) {
					?>
					<tr style="cursor: pointer;" onclick="document.location.href='<?php echo ROOT_URL.'Poruke/razgovor/'.$poruke['id']; ?>'">
						<td><?php echo ++$brojac; ?></td>
						<td><?php echo ucfirst($poruke['first_name']).' '.ucfirst($poruke['last_name']); ?></td>
						
					</tr>
					<?php
				}
			 ?>
			
		</tbody>
	</table>
	



</div>
