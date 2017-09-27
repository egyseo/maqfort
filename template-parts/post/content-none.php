
	<div class="container container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<header>
					<h1><?php esc_html_e( 'Nothing Found!', 'maqfort' ); ?></h1>
				</header>
        <section>
          <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

              <p><?php printf( wp_kses( __( 'Preparado para criar  a sua primeira publicação? <a href="%1$s">Comece aqui</a>.', 'maqfort' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

            <?php elseif ( is_search() ) : ?>

              <p><?php esc_html_e( 'Desculpe, não encontramos nada com os seus termos de pesquisa. Por favor tente de novo com novos termos', 'maqfort' ); ?></p>
              <?php
                get_search_form();

            else : ?>

              <p><?php esc_html_e( 'Parece que não conseguimos encontrar o que procura. Talvez pesquisar ajude.', 'maqfort' ); ?></p>
              <?php
                get_search_form();

            endif;
          ?>
        </section>
			</div>
		</div>
	</div>
