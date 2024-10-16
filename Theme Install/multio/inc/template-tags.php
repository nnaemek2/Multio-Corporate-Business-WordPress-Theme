<?php
/**
 * Custom template tags for this theme.
 *
 * @package Multio
 */

/**
 * Header layout
 **/
function multio_page_loading()
{
    $page_loading = multio_get_opt( 'show_page_loading', false );
    $loading_type = multio_get_opt( 'loading_type', 'style1');
    if($page_loading) { ?>
        <div id="ct-loadding" class="ct-loader <?php echo esc_attr($loading_type); ?>">
            <?php switch ( $loading_type )
            {
                case 'style2': ?>
                    <div class="ct-spinner2"></div>
                    <?php break;

                case 'style3': ?>
                    <div class="ct-spinner3">
                      <div class="double-bounce1"></div>
                      <div class="double-bounce2"></div>
                    </div>
                    <?php break;

                case 'style4': ?>
                    <div class="ct-spinner4">
                      <div class="rect1"></div>
                      <div class="rect2"></div>
                      <div class="rect3"></div>
                      <div class="rect4"></div>
                      <div class="rect5"></div>
                    </div>
                    <?php break;

                case 'style5': ?>
                    <div class="ct-spinner5">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                    <?php break;

                case 'style6': ?>
                    <div class="ct-cube-grid">
                      <div class="ct-cube ct-cube1"></div>
                      <div class="ct-cube ct-cube2"></div>
                      <div class="ct-cube ct-cube3"></div>
                      <div class="ct-cube ct-cube4"></div>
                      <div class="ct-cube ct-cube5"></div>
                      <div class="ct-cube ct-cube6"></div>
                      <div class="ct-cube ct-cube7"></div>
                      <div class="ct-cube ct-cube8"></div>
                      <div class="ct-cube ct-cube9"></div>
                    </div>
                    <?php break;

                case 'style7': ?>
                    <div class="ct-folding-cube">
                      <div class="ct-cube1 ct-cube"></div>
                      <div class="ct-cube2 ct-cube"></div>
                      <div class="ct-cube4 ct-cube"></div>
                      <div class="ct-cube3 ct-cube"></div>
                    </div>
                    <?php break;

                case 'style8': ?>
                    <div class="ct-loading-stairs">
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-ball"></div>
                    </div>
                    <?php break;

                case 'style9': ?>
                    <div class="ct-loading-square">
                        <div class="loading-square loading-state1"></div>
                        <div class="loading-square loading-state2"></div>
                        <div class="loading-square loading-state3"></div>
                        <div class="loading-square loading-state4"></div>
                    </div>
                    <?php break;

                case 'style10': ?>
                    <div class="ct-loading-square-two">
                        <div class="loading-square loading-state1"></div>
                        <div class="loading-square loading-state2"></div>
                        <div class="loading-square loading-state3"></div>
                        <div class="loading-square loading-state4"></div>
                    </div>
                    <?php break;

                case 'style11': ?>
                    <div class="ct-loading-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <?php break;

                default: ?>
                    <div class="loading-spin">
                        <div class="spinner">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                        <div class="spinner color-2" style="">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                    </div>
                    <?php break;
            } ?>
        </div>
    <?php }
}

/**
 * Header layout
 **/
function multio_header_layout()
{
    $header_layout = multio_get_opt( 'header_layout', '8' );
    $custom_header = multio_get_page_opt( 'custom_header', '0' );

    if ( is_page() && $custom_header == '1' )
    {
        $page_header_layout = multio_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
        if($header_layout == '0') {
            return;
        }
    }

    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Page title layout
 **/
function multio_footer()
{   
    if(is_404()) {
        return true;
    }
    $footer_layout = multio_get_opt( 'footer_layout', '1' );
    $custom_footer = multio_get_page_opt('custom_footer', 'false');
    $footer_layout_page = multio_get_page_opt('footer_layout');
    if($custom_footer) {
        $footer_layout = $footer_layout_page;
    }
    get_template_part( 'template-parts/footer-layout', $footer_layout );
}

/**
 * Set primary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function multio_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    elseif (is_singular('service')) :
        $sidebar_load = 'sidebar-service';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-9 col-lg-8 col-md-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-9 col-lg-8 col-md-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}

/**
 * Set secondary content class based on sidebar position
 * 
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function multio_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    elseif (is_singular('service')) :
        $sidebar_load = 'sidebar-service';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-4 col-md-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-4 col-md-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function multio_breadcrumb()
{
    if ( ! class_exists( 'CMS_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CMS_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="ct-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function multio_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'multio_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function multio_entry_excerpt( $length = 55 )
    {
        $cms_the_excerpt = get_the_excerpt();
        if(!empty($cms_the_excerpt)) {
            echo esc_html($cms_the_excerpt);
        } else {
            echo wp_kses_post(multio_get_the_excerpt( $length ));
        }
    }
endif;


function multio_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'multio_excerpt_more');

/**
 * Prints post edit link when applicable
 */
function multio_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                esc_attr__( 'Edit', 'multio' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="entry-edit-link"><i class="fa fa-edit"></i>',
        '</div>'
    );
}


/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function multio_posts_pagination( $query = null )
{
    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = get_query_var( 'paged' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = get_query_var( 'page' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<i class="fa fa-angle-left"></i>';
    $html_next = '<i class="fa fa-angle-right"></i>';
    $links = paginate_links( array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    ) );

    $template = '
    <nav class="navigation posts-pagination">
        <div class="posts-page-links">%2$s</div>
    </nav>';

    if ( $links )
    {
        printf(
            wp_kses_post($template),
            esc_attr__( 'Navigation', 'multio' ),
            wp_kses_post($links)
        );
    }
}

/**
 * Prints archive meta on blog
 */
if ( ! function_exists( 'multio_archive_meta' ) ) :
    function multio_archive_meta() {
        $archive_author_on = multio_get_opt( 'archive_author_on', true );
        $archive_categories_on = multio_get_opt( 'archive_categories_on', true );
        $archive_comments_on = multio_get_opt( 'archive_comments_on', true );
        $archive_date_on = multio_get_opt( 'archive_date_on', true );
        if($archive_author_on || $archive_comments_on || $archive_categories_on || $archive_date_on) : ?>
            <ul class="entry-meta">
                <?php if($archive_date_on) : ?>
                    <li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($archive_author_on) : ?>
                    <li class="item-author">
                        <i class="far fac-user"></i>
                        <?php echo esc_html__( 'By', 'multio' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($archive_categories_on) : ?>
                    <li class="item-category"><i class="far fac-list"></i><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                <?php endif; ?>
                <?php if($archive_comments_on) : ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><i class="far fac-comment"></i><?php echo comments_number(esc_attr__('No Comments', 'multio'),esc_attr__('1 Comment', 'multio'),esc_attr__('% Comments', 'multio')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints post meta on blog
 */
if ( ! function_exists( 'multio_post_meta' ) ) :
    function multio_post_meta() {
        $post_author_on = multio_get_opt( 'post_author_on', true );
        $post_categories_on = multio_get_opt( 'post_categories_on', true );
        $post_comments_on = multio_get_opt( 'post_comments_on', false );
        $post_date_on = multio_get_opt( 'post_date_on', true );
        if($post_author_on || $post_categories_on || $post_comments_on || $post_date_on) : ?>
            <ul class="entry-meta">
                <?php if($post_date_on) : ?>
                    <li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($post_author_on) : ?>
                    <li class="item-author">
                        <i class="far fac-user"></i>
                        <?php echo esc_html__( 'By', 'multio' ) ?>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($post_categories_on) : ?>
                    <li class="item-category"><i class="far fac-list"></i><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                <?php endif; ?>
                <?php if($post_comments_on) : ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><i class="far fac-comment"></i><?php echo comments_number(esc_attr__('No Comments', 'multio'),esc_attr__('1 Comment', 'multio'),esc_attr__('% Comments', 'multio')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(is_sticky()) { ?>
                    <li><?php echo esc_html__('Sticky', 'multio'); ?></li>
                <?php } ?>
            </ul>
    <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'multio_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function multio_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'multio').'</label>', ' ' );
        if ( $tags_list )
        {
            echo '<div class="entry-tags">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
        }
    }
endif;

/**
 * List socials share for post.
 */

// Get featured image
function multio_get_FB_image($post_ID) {
    $post_social_share_on = multio_get_opt( 'post_social_share_on', false );
    if($post_social_share_on) :
        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail');
            return $post_thumbnail_img[0];
        }
    endif;
}
 
// Get post excerpt
function multio_get_FB_description($post) {
    $post_social_share_on = multio_get_opt( 'post_social_share_on', false );
    if($post_social_share_on) :
        if ($post->post_excerpt) {
            return $post->post_excerpt;
        }
        else {
            // Post excerpt is not set, so we take first 55 words from post content
            $excerpt_length = 55;
            // Clean post content
            $text = str_replace("\r\n"," ", strip_tags(strip_shortcodes($post->post_content)));
            $words = explode(' ', $text, $excerpt_length + 1);
            if (count($words) > $excerpt_length) {
                array_pop($words);
                $excerpt = implode(' ', $words);
                return $excerpt;
            }
        }
    endif;
}

function multio_FB_header() {
    $post_social_share_on = multio_get_opt( 'post_social_share_on', false );
    if($post_social_share_on) :
        global $post;
        $post_description = multio_get_FB_description($post);
        $post_featured_image = multio_get_FB_image($post->ID);
        if ( (is_single()) AND ($post_featured_image) AND ($post_description) ) { ?>
            <meta name="title" content="<?php echo ''.$post->post_title; ?>" />
            <meta name="description" content="<?php echo ''.$post_description; ?>" />
            <link rel="image_src" href="<?php echo ''.$post_featured_image; ?>" />
        <?php }
    endif;
}
add_action('wp_head', 'multio_FB_header');

function multio_socials_share_default() { global $post; ?>
    <div class="entry-social">
        <a class="fb-social hover-effect" title="<?php echo esc_attr__('Facebook', 'multio'); ?>" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>&t=<?php echo urlencode($post->post_title); ?>"><i class="zmdi zmdi-facebook"></i></a>
        <a class="tw-social hover-effect" title="<?php echo esc_attr__('Twitter', 'multio'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
        <a class="g-social hover-effect" title="<?php echo esc_attr__('Google Plus', 'multio'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
        <a class="pin-social hover-effect" title="<?php echo esc_attr__('Pinterest', 'multio'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
    </div>
    <?php
}

/**
 * Footer Top
 */
function multio_footer_top() {
    $footer_top_column = multio_get_opt( 'footer_top_column' );
    $_class = "";

    switch ($footer_top_column){
        case '1':
            $_class = 'col-12';
            break;
        case '2':
            $_class = 'col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12';
            break;
        case '3':
            $_class = 'col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12';
            break;
        case '4':
            $_class = 'col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12';
            break;
    }

    for($i = 1 ; $i <= $footer_top_column ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-' . $i ) ){
            echo '<div class="ct-footer-item ' . esc_html($_class) . '">'; ?>
                <?php dynamic_sidebar( 'sidebar-footer-' . $i );
            echo "</div>";
        }
    }
}


/**
* Display navigation to next/previous post when applicable.
*/
function multio_post_nav_default() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="post-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="post-previous">
                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fa fa-angle-double-left"></i> <?php echo esc_html__('Previous Post', 'multio'); ?></a>
                </div>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="post-next">
                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Newer Post', 'multio'); ?> <i class="fa fa-angle-double-right"></i></a>
                </div>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Related Post
 */
function multio_related_post()
{
    global $post;
    $current_id = $post->ID;
    $posttags = get_the_category($post->ID);
    if (empty($posttags)) return;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }
    $post_number = '4';
    $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
    $post_related_post = multio_get_opt( 'post_related_post', false );
    if ($post_related_post && count($query_similar->posts) > 1) {
        ?>
        <div class="ct-related-post-wrap">
            <div class="container">
                <div class="ct-related-post">
                    <h3 class="section-title"><?php echo esc_html__('Similar Blog Posts', 'multio'); ?></h3>
                    <div class="ct-related-post-inner row">
                        <?php foreach ($query_similar->posts as $post):
                            $thumbnail_url = '';
                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'multio-medium', false);
                            endif;
                            if ($post->ID !== $current_id) : ?>
                                <div class="grid-item col-xl-4 col-lg-4 col-md-4">
                                    <div class="grid-item-inner">
                                        <?php if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                                            <div class="item-featured">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php the_title_attribute(); ?>" /></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="item-holder">
                                            <h3 class="item-title">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                            </h3>
                                            <div class="item-content">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words = 15, $more = null ); ?>
                                            </div>
                                            <div class="item-readmore">
                                                <a href="<?php echo esc_url( get_permalink()); ?>" ><?php echo esc_html__( 'Read more', 'multio' ) ?><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    wp_reset_postdata();
}

/**
 * Header Search Mobile
 */
function multio_header_mobile_search() { 
    $search_on = multio_get_opt( 'search_on', false ); 
    if($search_on) : ?>
        <div class="header-mobile-search">
            <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php esc_attr_e('Search...', 'multio'); ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit"><i class="far fac-search"></i></button>
            </form>
        </div>
<?php endif; }

/**
 * Header Search Popup
 */
function multio_popup_search()
{ 
    $search_on = multio_get_opt( 'search_on', false );
    $search_field_placeholder = multio_get_opt( 'search_field_placeholder' );
    if($search_on) : ?>
        <div class="ct-modal ct-search-popup">
            <div class="ct-close"></div>
            <div class="ct-modal-content">
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search Keywords...', 'multio'); } ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit"><i class="far fac-search"></i></button>
                </form>
                <div class="esc-search"><?php echo esc_html__( 'Press ESC key to close search', 'multio' ) ?></div>
            </div>
        </div>
    <?php endif; ?>
<?php }

/**
 * Page title layout
 **/
function multio_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Social Icon
 */
function multio_social_icon() {
    $social_facebook_url = multio_get_opt( 'social_facebook_url' );
    $social_twitter_url = multio_get_opt( 'social_twitter_url' );
    $social_inkedin_url = multio_get_opt( 'social_inkedin_url' );
    $social_instagram_url = multio_get_opt( 'social_instagram_url' );
    $social_google_url = multio_get_opt( 'social_google_url' );
    $social_skype_url = multio_get_opt( 'social_skype_url' );
    $social_pinterest_url = multio_get_opt( 'social_pinterest_url' );
    $social_vimeo_url = multio_get_opt( 'social_vimeo_url' );
    $social_youtube_url = multio_get_opt( 'social_youtube_url' );
    $social_yelp_url = multio_get_opt( 'social_yelp_url' );
    $social_tumblr_url = multio_get_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = multio_get_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fa fa-facebook-square"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fa fa-twitter-square"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fa fa-linkedin-square"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fa fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fa fa-google-plus-square"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fa fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fa fa-pinterest-square"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fa fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fa fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fa fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fa fa-tripadvisor"></i></a>';
    endif;
}

function multio_header_social_icon() {
    $social_facebook_url = multio_get_opt( 'social_facebook_url' );
    $social_twitter_url = multio_get_opt( 'social_twitter_url' );
    $social_inkedin_url = multio_get_opt( 'social_inkedin_url' );
    $social_instagram_url = multio_get_opt( 'social_instagram_url' );
    $social_google_url = multio_get_opt( 'social_google_url' );
    $social_skype_url = multio_get_opt( 'social_skype_url' );
    $social_pinterest_url = multio_get_opt( 'social_pinterest_url' );
    $social_vimeo_url = multio_get_opt( 'social_vimeo_url' );
    $social_youtube_url = multio_get_opt( 'social_youtube_url' );
    $social_yelp_url = multio_get_opt( 'social_yelp_url' );
    $social_tumblr_url = multio_get_opt( 'social_tumblr_url' );
    $social_tripadvisor_url = multio_get_opt( 'social_tripadvisor_url' );

    if(!empty($social_facebook_url)) :
        echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fa fa-facebook"></i></a>';
    endif;
    if(!empty($social_twitter_url)) :
        echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fa fa-twitter"></i></a>';
    endif;
    if(!empty($social_inkedin_url)) :
        echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    endif;
    if(!empty($social_instagram_url)) :
        echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fa fa-instagram"></i></a>';
    endif;
    if(!empty($social_google_url)) :
        echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    endif;
    if(!empty($social_skype_url)) :
        echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fa fa-skype"></i></a>';
    endif;
    if(!empty($social_pinterest_url)) :
        echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    endif;
    if(!empty($social_vimeo_url)) :
        echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fa fa-vimeo"></i></a>';
    endif;
    if(!empty($social_youtube_url)) :
        echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fa fa-youtube"></i></a>';
    endif;
    if(!empty($social_yelp_url)) :
        echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fa fa-yelp"></i></a>';
    endif;
    if(!empty($social_tumblr_url)) :
        echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fa fa-tumblr"></i></a>';
    endif;
    if(!empty($social_tripadvisor_url)) :
        echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fa fa-tripadvisor"></i></a>';
    endif;
}

/**
 * Header Search Mobile
 */
function multio_hidden_sidebar() { 
    $hidden_sidebar_on = multio_get_opt( 'hidden_sidebar_on', false );
    $logo_light = multio_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
    $logo_light_url = $logo_light['url'];
    if($hidden_sidebar_on && is_active_sidebar( 'sidebar-hidden' )) : ?>
        <div class="hidden-sidebar">
            <div class="ct-close hidden-sidebar-close"></div>
            <div class="hidden-sidebar-inner">
                <?php dynamic_sidebar('sidebar-hidden'); ?>
            </div>
        </div>
<?php endif; }


/**
 * Demo Bar
 */
function multio_demo_bar() { ?>
    <div class="ct-demo-bar">
        <div class="ct-demo-option">
            <a class="choose-demo" href="javascript:;">
                <span>Choose Theme Styling</span>
                <i class="fal fac-cog"></i>
            </a>
            <a href="https://casethemes.ticksy.com/submit/" target="_blank">
                <span>Submit a Ticket</span>
                <i class="fal fac-life-ring"></i>
            </a>
            <a href="https://themeforest.net/item/multio-multipurpose-wordpress-theme/23972214" target="_blank">
                <span>Purchase Theme</span>
                <i class="fal fac-shopping-cart"></i>
            </a>
        </div>
        <div class="ct-demo-bar-inner">
            <div class="ct-demo-bar-meta">
                <h4>Pre-Built Demos Collection</h4>
                <p>Multio comes with a beautiful collection of modern, easily importable, and highly customizable demo layouts. Any of which can be installed via one click.</p>
            </div>
            <div class="ct-demo-bar-list">
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo1.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Agency & Business</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo0.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Finance</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-finance" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo2.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Construction</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-construction" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo3.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Medical</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-medical" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo4.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Industrial</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-industrial" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo5.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Resume</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-resume" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo6.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Seo & Marketing</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-seo" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo7.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Spa</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-spa" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo8.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>App & Landing</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-app" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo9.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Gym</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/multio-gym" target="_blank">View Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

/**
 * Custom Widget Categories
 */
add_filter('wp_list_categories', 'multio_cat_count_span');
function multio_cat_count_span($output) {
    $dir = is_rtl() ? 'left' : 'right';
    $output = str_replace("\t", '', $output);
    $output = str_replace(")\n</li>", '</li>', $output);
    $output = str_replace('</a> (', ' <span class="count '.$dir.'">', $output);
    $output = str_replace("</li>", " </span></a></li>", $output);
    $output = str_replace("\n<ul", " </span></a>\n<ul", $output);
    return $output;
}


/**
 * Custom Widget Archive
 */
add_filter('get_archives_link', 'multio_archive_count_span');
function multio_archive_count_span($links) {
    $dir = is_rtl() ? 'left' : 'right';
    $links = str_replace('</a>&nbsp;(', ' <span class="count '.$dir.'">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}