<?php get_header(); ?>


<div class="container BlogListingContainer">
    <h3 class="BlogsListingRecentPosts">Recent posts</h3>
        <div class="row">
            <?php if(have_posts()) : while(have_posts()) : the_post() ?>
                <div class="col-md-4 BlogListingImgCols">
                    <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <a href="<?php the_permalink(); ?>"><img src="<?= $feat_image ?>" alt="BlogListing" class="BlogListingImg"></a>
                    <h4><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h4>
                    <?php 
                        $tags = wp_get_post_tags($post->ID); 
                        $tags_num = count(wp_get_post_tags($post->ID));
                    ?>
                    <?php if($tags_num >= 1) : ?>
                        <a href="<?= get_category_link($tags[0]->name) ?>" class="btn btn-default BlogListingImgTags pull-left"><?= $tags[0]->name; ?></a>
                    <?php endif;?>
                    <?php if($tags_num >= 2) : ?>
                        <a href="" class="btn btn-default BlogListingImgTags pull-right">+<?= $tags_num - 1 ?> more</a>
                    <?php endif;?>
                </div>
            <?php endwhile; ?>
                <?php 
                    $max = $wp_query->max_num_pages;
                    $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1; 
                ?>
                <div class="col-md-12"><div class="col-md-4 col-md-offset-4 clearfix"><?php next_posts_link( 'LOAD MORE' ); ?></div></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>