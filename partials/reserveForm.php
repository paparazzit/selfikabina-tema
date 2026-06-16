
		<section class="reservation" id="reservation">
			<div class="container">
				<div class="close_form">
					<span></span>
					<span></span>
				</div>
				<hgroup>
					<h2>Rezervacija</h2>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
				</hgroup>
				<form action="<?php echo admin_url('admin-ajax.php')?>" id="reserve_form">
				<?php wp_nonce_field( 'sub-action', 'nsub-nonce' ); ?>
                <input type="hidden" name="action_f" value="subForm_action" id="sub_action">

					<div class="input-group">
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
							name ='date'
							placeholder="Datum vaseg dogadjaja"
						/>
					</div>

					<div class="input-group" data-verify="true">
						<label for="date">Mesto</label>
						<input
							type="text"
							id="place"
							class="place"
							placeholder="Mesto odrzavanja"
                            name='mesto'
						/>
					</div>
					<div class="input-group" data-verify="true">
						<label for="paket_select">Paket</label>

						<select name="paket" id="paket_select" value="">
							<option value="" selected disabled>Paket</option>
							<option value="basic">Basic</option>
							<option value="my_party">My Party</option>
							<option value="iParty">iParty</option>
							<option value="rodjendan">Rodjendan</option>
						</select>
					</div>
					<div class="input-group" data-verify="true">
						<label for="date">Tip dogadjaja</label>

						<select name="event" id="event">
							<option value="" selected disabled>Tip dogadjaja</option>
							<option value="vencanje">Vencanje</option>
							<option value="sajam">Sajam</option>
							<option value="rodjendan">Rodjendan</option>
							<option value="vencanje">Provatna proslava</option>
							<option value="rodjendan">Korporativna proslava</option>
							<option value="ostalo">Ostalo</option>
						</select>
					</div>
					<input type="text" name="phone" class='check' value=''>
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
			</div>
		</section>