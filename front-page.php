<?php get_header(); ?>
<div id="top" class="w3-card-4 w3-round-xlarge w3-row w3-margin-top wp3-panel">
<img src="<?php bloginfo( 'template_directory' );?>/images/kracht.jpg" alt="kracht" class="wp-post-image">
</div>
<div id="berichten" class="w3-row">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="tile">
    <div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
	</div>
<?php   endwhile;?>
</div>
<?php get_footer(); ?>
