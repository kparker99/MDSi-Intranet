<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays the front page only.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MDSi
 */

    get_header();
?>

<main>
    <!-- Announcements -->
    <div class="line">
        <img src="wp-content\themes\mdsi\img\dot-line.svg" width="50" alt="line">
    </div>
    <section class="grid">
        <?php 
            $count = 1;

            $the_query = new WP_Query(  'posts_per_page=3' );
            while ($the_query -> have_posts()) : $the_query -> the_post();

            // class logic
            $class='';
            if ( $count == 1 ) { $class = 'blue first'; };
            if ( $count == 2 ) { $class = 'light-gray second'; };
            if ( $count == 3 ) { $class = 'light-gray third'; };
        ?>

        <div class="card slideR <?php echo $class; ?>">			
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(__('(more…)')); ?>
            <div class="experiment-link"><a href="<?php the_permalink() ?>" class="btn">More</a></div>
        </div>

        <?php 
            // Repeat the process and reset once it hits the limit
            $count++;
            endwhile;
            wp_reset_postdata();
        ?>
    </section> <!-- Announcements -->

    <div class="white-lines">
        <img src="wp-content\themes\mdsi\img\white-dot-line.svg" width="500" alt="white-lines">
    </div>

    <section class="grid-4col light-gray">
        <div class="card-no-margin mid-gray md">	
            <h2>Meet MDSi</h2>		
            <?php
                echo do_shortcode( '[smartslider3 slider="2"]' );
            ?>
        </div>
        <div class="curve">
            <img src="wp-content\themes\mdsi\img\curves.svg" width="400" alt="">
        </div>
        <div class="sm">
            <br>
        </div>
        <div class="card-no-margin blue sm">
            <h2>Calendar</h2>
            <?php echo do_shortcode( '[wp_events col="1" posts_per_page="3"]' ) ?>
            <div>
                <a href="https://west.exch081.serverdata.net/owa/calendar/92cb0289b03b44a0bf6c4755282decc2@mdsiinc.com/22ab49d212484fddb68e943e0c62108e6340050310078740805/calendar.html">
                    More Events
                </a>
            </div>
        </div>
        <div class="sm">			
            <br>
        </div>
        <div class="card-no-margin blue md">
            <h2>Today in MDSi</h2>
        </div>
        <div class="card-no-margin sm dark">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>            
            <br>
            <br>
            <br>
            <br>
        </div>
    </section>
</main><!-- #main -->

<script src="wp-content\themes\mdsi\js\navigation.js"></script>