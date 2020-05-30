<div>	<?=form_open('', $attributes) ?>
					<?php
						$text_input = array(
							'name' => 'nombre',
							'id' => 'nombre',
							'value' => $nombre,
							'class' => 'form-control',
							'placeholder' => 'Nombre'
						);
						echo form_input($text_input);
					?>								
					<span class="help-block"><?php echo form_error('name', '<div class="text-error">', '</div>') ?></span>
				</div>
				<div>
					<?php
						$text_input = array(
							'name' => 'apellido',
							'id' => 'apellido',
							'value' => $apellido,
							'class' => 'form-control',
							'placeholder' => 'Apellido'
						);
						echo form_input($text_input);
					?>					
					<span class="help-block"><?php echo form_error('apellido', '<div class="text-error">', '</div>') ?></span>				
				</div>
				<div>
					<?php
						$text_input = array(
							'name' => 'email',
							'id' => 'email',
							'value' => $email,
							'class' => 'form-control',
							'placeholder' => 'Email'
						);
						echo form_input($text_input);
					?>					
					<span class="help-block"><?php echo form_error('email', '<div class="text-error">', '</div>') ?></span>				
				</div>