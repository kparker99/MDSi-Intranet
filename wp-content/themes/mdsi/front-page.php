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
    <section class="grid dark-gray">
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

        <a href="<?php the_permalink() ?>" class="card shine slideR <?php echo $class; ?>">			
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(__('(more…)')); ?>
        </a>

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

    <section class="grid-4col">
        <div class="card-no-margin mid-gray span-2">	
            <h2>Meet MDSi</h2>		
            <?php
                echo do_shortcode( '[smartslider3 slider="2"]' );
            ?>
        </div>
        <div class="curve">
            <img src="wp-content\themes\mdsi\img\curves.svg" width="400" alt="">
        </div>
        <div class="card-no-margin sm dark-gray span-1">			
            <p>[add content]</p>
        </div>
        <div class="card-no-margin dark-gray span-1">
            <p>[add content]</p>
        </div>
        <div class="card-no-margin blue span-2">
            <h2>Calendar</h2>
                <?php 
                    // Ensure the global $post variable is in scope
                    global $post;
                    
                    // Retrieve the next 5 upcoming events
                    $events = tribe_get_events( [ 
                        'posts_per_page' => 5,
                        'start_date'     => 'now' 
                        ] );

                    foreach ( $events as $post ) {
                        setup_postdata( $post );
                        $title = $post->post_title;
                        // $start = tribe_get_start_date( $post );
                ?>
                        
                <a href="<?php echo tribe_get_event_link() ?>" class="cal-event">
                    <div class="cal-icon">
                        <i class="far fa-calendar-alt fa-2x"></i>
                    </div>
                    <div class="cal-desc">
                        <h3><?php echo $post->post_title; ?></h3>
                        <p><?php echo tribe_get_start_date( $post, false ); ?></p>
                    </div>
                </a>

                <?php
                    }
                ?>
        </div>
        <div class="card-no-margin md white span-2">
            <p>[add content]</p>
        </div>
    </section>
</main><!-- #main -->

<script src="wp-content\themes\mdsi\js\navigation.js"></script>