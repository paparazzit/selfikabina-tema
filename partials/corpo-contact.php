<section class="sk-corp-contact sk-section sk-section--dark" aria-labelledby="sk-corp-contact-title">
    <div class="sk-container sk-container--lg">
        <div class="sk-corp-contact__grid">
            <div class="sk-corp-contact__content">
                <span class="sk-eyebrow">Kontakt za firme</span>
                <h2 id="sk-corp-contact-title">Planirate korporativni događaj?</h2>
                <p>
                    Pošaljite nam osnovne informacije i predložićemo vam aktivaciju koja najbolje odgovara tipu događaja,
                    broju gostiju i prostoru.
                </p>

                <div class="sk-corp-contact__highlights" aria-label="Prednosti Selfi Kabine za korporativne događaje">
                    <span>Brendirane fotografije</span>
                    <span>Online galerija</span>
                    <span>Operater na licu mesta</span>
                </div>
            </div>

            <form id="form" class="sk-corp-contact__form" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="POST">
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
                    <label for="place">Mesto</label>
                    <input
                        type="text"
                        id="place"
                        class="place"
                        placeholder="Mesto odrzavanja"
                        name="mesto"
                    />
                </div>

                <div class="input-group" data-verify="true">
                    <label for="event">Tip dogadjaja</label>
                    <select name="event" id="event">
                        <option value="" selected disabled>Tip dogadjaja</option>
                        <option value="promocija">Promocija</option>
                        <option value="sajam">Sajam</option>
                        <option value="godisnjica">Godišnjica</option>
                        <option value="korpo_proslava">Korporativna proslava</option>
                        <option value="ostalo">Ostalo</option>
                    </select>
                </div>

                <input type="text" name="phone" class="check" value="" tabindex="-1" autocomplete="off">

                <div class="input-group input-group--full" data-verify="true">
                    <label for="msg">Poruka</label>
                    <textarea
                        name="msg"
                        id="msg"
                        cols="30"
                        rows="7"
                        placeholder="Ukratko opišite događaj, broj gostiju ili šta vam je važno za aktivaciju"
                    ></textarea>
                </div>

                <button class="btn btn-red sk-corp-contact__submit">Posalji upit</button>
            </form>
        </div>
    </div>
</section>
