

    <form  id="form" action ="<?php echo admin_url('admin-ajax.php')?>" method="POST">
	<?php wp_nonce_field( 'sub-action', 'nsub-nonce' ); ?>
                <input type="hidden" name="action_f" value="subForm_action" id="sub_action">
						<div class="input-group" data-verify="true">
							<label for="name">Ime</label>
							<input type="text" id="name" class="name" name="name" placeholder="Ime" />
						</div>
						<div class="input-group" data-verify="true">
							<label for="email">Email</label>
							<input type="email" id="email" class="email" name="email" placeholder="email" />
						</div>
						<div class="input-group" data-verify="true">
							<label for="tel">Telefon</label>
							<input type="text" id="tel" class="tel" name="tel" placeholder="Telefon" />
						</div>
						<div class="input-group" data-verify="true">
							<label for="date">Datum</label>
							<input
								type="date"
								id="date"
								class="date"
								placeholder="Datum vaseg dogadjaja"
								name="date" 
							/>
						</div>

						<div class="input-group" data-verify="true">
							<label for="date">Mesto</label>
							<input
								type="text"
								id="place"
								class="place"
								placeholder="Mesto odrzavanja"
								name="mesto"
							/>
						</div>
						<div class="input-group">
							<label for="date">Tip dogadjaja</label>

							<select name="event" id="event" data-verify="true">
								<option value="" selected disabled>Tip dogadjaja</option>
								<option value="vencanje">Vencanje</option>
								<option value="sajam">Sajam</option>
								<option value="rodjendan">Rodjendan</option>
								<option value="vencanje">Provatna proslava</option>
								<option value="rodjendan">Korporativna proslava</option>
								<option value="ostalo">Ostalo</option>
							</select>
						</div>
                        <input type="text" name='phone' class="check" value="">
						<div class="input-group" data-verify="true">
							<label for="msg">Poruka</label>
							<textarea
								name="msg"
								id="msg"
								cols="30"
								rows="10"
								placeholder="Vasa poruka"
							></textarea>
						</div>
						<button class="btn btn-red">Posalji</button>

					
					</form>
			