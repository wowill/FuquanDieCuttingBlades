<?php get_header(); ?>
<?php do_action('samatex_enovathemes_title_section'); ?>
<?php $total_results = $wp_query->found_posts; ?>
<div id="et-content" class="content et-clearfix padding-true search-page">
    <div class="container et-clearfix">

        <div class="tech-page-search-form">
            <?php echo get_search_form(); ?>
        </div>
        <div class="search-results-title">
            <?php echo esc_attr($total_results).esc_html__(' search results for', 'samatex').' <strong><i>"'.get_search_query().'</i></strong>"'; ?>
        </div>
        <div class="search-posts">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php $post_type = get_post_type( get_the_ID() ); ?>

                    <article <?php post_class('search-term') ?> id="post-<?php the_ID(); ?>">
                        <div class="post-body">

                            <?php if ( '' != the_title_attribute( 'echo=0' ) ): ?>
                                <h4 class="post-title entry-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Go to", 'samatex').' '.the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            <?php endif; ?>
                            <?php if ( '' != get_the_excerpt() ): ?>
                            <div class="post-excerpt"><?php echo samatex_enovathemes_excerpt(250); ?></div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="post-read-more search-button et-button small"><?php echo esc_html__("Read more", 'samatex'); ?><span class="screen-reader-text"> <?php the_title();?></span></a>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php samatex_enovathemes_post_nav_num('general'); ?>
            <?php else : ?>
                <div class="suggestions">
                    <p><strong><?php echo esc_html__('Suggestions:', 'samatex'); ?></strong></p>
                    <ol>
                        <li><?php echo esc_html__('Make sure that all words are spelled correctly', 'samatex'); ?></li>
                        <li><?php echo esc_html__('Try different keywords', 'samatex'); ?></li>
                        <li><?php echo esc_html__('Try more general keywords', 'samatex'); ?></li>
                        <li><?php echo esc_html__('Try fewer keywords', 'samatex'); ?></li>
                    </ol>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>