		<footer>

			<div class="container">

				<article>

					<div class="socials">

						<div class="icon">

							<a href="https://www.facebook.com/fotokabinans" target="blank"><i class="fa-brands fa-facebook-f"></i></a>

						</div>

						<div class="icon">

							<a href="https://www.instagram.com/selfi_kabina/" target="blank"><i class="fa-brands fa-instagram"></i></a>

						</div>

						<div class="icon">

							<a href="mailto:rezervacije@selfikabina.com"><i class="fa-regular fa-envelope"></i></a>

						</div>

					</div>

					<p>&copy;2017 - 2022 | <a href="<?php echo esc_url(home_url()); ?>">selfikabina.com</a>| all right reserved</p>

					<a href="#">Kontakt</a>

					<a href="tel:+38162780530">062/780-530</a>

				</article>

			</div>

		</footer>
	

		<!-- <script

			src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"

			integrity="sha512-zJYu9ICC+mWF3+dJ4QC34N9RA0OVS1XtPbnf6oXlvGrLGNB8egsEzu/5wgG90I61hOOKvcywoLzwNmPqGAdATA=="

			crossorigin="anonymous"

			referrerpolicy="no-referrer"

		></script>

		<script type="module" src="js/main.js"></script>

		<script src="js/slider.js" defer></script> -->
<!-- N8N -->
<link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/n8n-chat.css" rel="stylesheet" />

<script type="module">
  import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

  createChat({
    webhookUrl: 'https://n8n.srv947309.hstgr.cloud/webhook/dd4ecc19-51cc-4446-87dc-7152d2e8d4ee/chat',
    mode: 'window',
    loadPreviousSession: true,
    enableStreaming: true,   /* opcionalno – ako je omogućeno i u Chat Trigger-u */
    showWelcomeScreen: true,
    defaultLanguage: 'sr',
    initialMessages: [
      'Zdravo!',
      'Drago nam je se interesujete za Selfi Kabinu. Kako vam mogu pomoći? Za početak kada i gde se održava Vaš događaj?',
    ],
    i18n: {
      sr: {
        title: 'Selfi Savetnik',        /* prazno = nema velikog naslova */
        subtitle: 'Pitajte našeg AI asistenta sve što vas zanima u vezi sa Selfi Kabinom.',     /* prazno = nema podnaslova */
        // footer: '',
        getStarted: 'Započni razgovor',
        inputPlaceholder: 'Postavite pitanje…',
      },
    },
  });
</script>
<!-- <script type="module">
	import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

	createChat({
		webhookUrl: 'https://n8n.srv947309.hstgr.cloud/webhook/dd4ecc19-51cc-4446-87dc-7152d2e8d4ee/chat'
	});
</script> -->

<!-- N8N -->






        <?php wp_footer();?>

	</body>

</html>

