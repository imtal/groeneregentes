<?php get_header(); ?>
<?php if( has_post_thumbnail() ): ?>
    <div id="top" class="w3-card-4 w3-round-xlarge w3-row w3-margin-bottom w3-margin-top wp3-panel">
    <?php echo the_post_thumbnail('full'); ?>
    </div>
<?php endif; ?>
<div id="main" class="w3-card-4 w3-row w3-margin-bottom w3-row-padding w3-round-xlarge wp3-panel w3-large">
<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div class="page w3-container w3-padding-32" id="page-<?php the_ID(); ?>">
        <h1><?php the_title(); ?></h1>
        <div class="entry">
        <br />
        <?php the_content(); ?>
        <br />
        <?php link_pages('<p><strong>Pagina\'s:</strong> ', '</p>', 'number'); ?>
        </div>
        <div>
        <!-- i><?php the_time('l j F Y') ?></i -->
        </div>
    </div>
    <?php endwhile; ?>
<?php else : ?>
    <div class="post" id="post-<?php the_ID(); ?>">
    Not Found
    </div>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
