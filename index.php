		<?php 
/**
Skrypt wczytywania id użytkownika, sprawdzania czy dana treść należy do tego użytkownia. Kod zwraca po sprawdzeniu daną treść w tym przypadku shortcode plugnu wordpress.
*/
			$content = get_the_excerpt();
			$author_id=$post->post_author;
			$id_autora = get_the_author_meta( 'ID' , $author_id );
			$id_zalogowanego = get_current_user_id();
			if ($id_autora == $id_zalogowanego) {
				echo '<h1>Przepraszamy ale niestety ten wpis należy do Ciebie i nie możesz otwierać tego filmu jako ty!</h1>';
			}
			else {
				echo do_shortcode( '[mycred_video id="'.$content.'"]' );

			}
		?>
			
			
			
			
			
			
		<?php get_header(); 
/**
Ten skrypt sprawdza ilość punktów użytkownika z plugin mycred wordpress, jeżeli użytkownik posiada więcej punktów - wyświetla treść.
*/

		?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			$c = 20;
			$d = do_shortcode( "[mycred_my_balance wrapper=0 title_el='' balance_el='']" );
			if ($d >= $c) {
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );
				
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
			}
			else {
				echo '<h1><b>Za mało punktów, minimum 20pkt!</b></h1>';
			}
		?>

		</main>
	</div>
</div>

<?php get_footer();