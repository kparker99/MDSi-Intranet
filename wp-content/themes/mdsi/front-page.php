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
            <!-- <a href="<?php the_permalink() ?>" class="btn dark-gray">More</a> -->
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
            <ul>    

                <?php // Let's get the data we need to loop through below
                //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'event',
                    'posts_per_page' => '5',
                    'post_status'  =>  'publish',
                    'order' => 'ASC',
                );
                $event_query = new WP_Query( $args ); ?>


                <?php if ( $event_query->have_posts() ) : ?>

                    <!-- pagination here -->

                    <!-- the loop -->
                    <?php while ( $event_query->have_posts() ) : $event_query->the_post(); ?>

                <li>
                <div class="featured_tag"></div>


                <?php if ( '' != get_the_post_thumbnail() ) { ?>
                <a class="post_img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('event-thumbnail'); ?>
                </a>
                <?php } else { ?>
                <a class="post_img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <img src="http://aishaarab.com/wp-content/uploads/2014/08/DefaultEvent-125x75.png" alt="" />
                </a>
                <?php } ?>

                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

                <p class="timing"> 
                <span>Start Date: </span><?php meta('event-start-date'); ?><br>
                <span>End Date: </span><?php meta('event-end-date'); ?><br>
                <span>Time: </span><?php meta('event_time'); ?><br>
                </p>

                <p class="address"><span>Location :</span> <br><?php meta('event_address'); ?>, <?php meta('event_city'); ?>, <?php meta('event_state'); ?>, <?php meta('event_country'); ?></p>
                <div class="clear"></div>
                <p class="bottom">
                <a class="read_more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
                </p>

                </li>


                <!-- #post-<?php the_ID(); ?> -->

                <?php endwhile; else: ?>  
                <p> 
                    <?php _e('No upcoming events'); ?>  
                </p>  
                <?php endif; ?> <?php //wp_reset_query(); ?>


                </ul>
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