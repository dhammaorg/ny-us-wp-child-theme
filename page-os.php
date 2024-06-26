<!-- note from JCH 1/8/24 - I've replaced the dhara version of this file with the dhara single.php code in order to undo the hard-coded template overide from the dhara theme. -->

<?php 
get_header();
if (is_restricted()) {
    show_404();
} else { 
?>
    <div id="page-<?php echo get_the_ID(); ?>-content" class="page-content news-item">
        <!--Begin Content-->
        <?php if (have_posts()) {
            while (have_posts()) : the_post(); ?>

                <h1 id="content-title"><?php the_title(); ?></h1>
                <?php the_content(__('(more...)')); ?>
                <?php echo wp_link_pages(); ?>
                <div class="post-metadata">
                    <hr />
                    <table class="post-metadata-table">
                        <tr>
                            <td class="post-metadata-label">Posted in:</td>
                            <td>
                                <img class="post-metadata-icon" width="14" height="14" 
                                     alt="" src="<?php bloginfo('template_directory'); ?>/images/postcategoryicon.png" /> <?php the_category(', ') ?> on <strong><?php the_time(get_option('date_format')); ?></strong>
                            </td>
                        </tr>
                        <?php previous_post_link("<tr><td class='post-metadata-label'>Previous:</td><td>%link</td></tr>"); ?>
                        <?php next_post_link("<tr><td class='post-metadata-label'>Next:</td><td>%link</td></tr>"); ?>
                    </table>
                    <hr />
                </div>
            <?php endwhile;
        } ?>
        <!--End Content-->	
    </div>
<?php
}
get_footer();
