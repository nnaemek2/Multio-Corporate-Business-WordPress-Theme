<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Multio
 */

get_header(); 

$description_404_page = multio_get_opt( 'description_404_page' );
$btn_text_404_page = multio_get_opt( 'btn_text_404_page' );
?>

    <div class="container content-container">
        <div class="row">
            <div id="primary" class="col-12">
                <main id="main" class="site-main">
                    <div class="error404-inner">
                        <span>404</span>
                        <p>
                            <?php if(!empty($description_404_page)) { 
                                echo esc_attr($description_404_page); 
                            } else { 
                                echo esc_html__('The page requested couldnt be found. This could be a spelling error in the URL or a removed page. ', 'multio'); 
                            } ?>
                        </p>
                        <a class="btn btn-default" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if(!empty($btn_text_404_page)) { echo esc_attr($btn_text_404_page); } else { echo esc_html__('Back To Home', 'multio'); } ?>
                        </a>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>

<?php
get_footer();
