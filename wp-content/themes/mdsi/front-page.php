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

    <section class="grid-4col light-gray">
        <div class="card-no-margin mid-gray md">			
            <?php
                echo do_shortcode( '[smartslider3 slider="2"]' );
            ?>
        </div>
        <div class="sm">
            <br>
        </div>
        <div class="card-no-margin blue sm">
            <ul>
                <li>November 1, 2021</li>
                <li>November 3, 2021</li>
                <li>November 21, 2021</li>
                <li>November 24, 2021</li>
                <li>December 19, 2021</li>
            </ul>
        </div>
        <div class="card-no-margin dark sm">			
            <br>
        </div>
        <div class="card-no-margin blue sm">
            <br>
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
        </div>
    </section>

    <section class="white">
        <div class="card-no-margin x-lg blue">
            <div class="card white">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>
</main><!-- #main -->

<script src="wp-content\themes\mdsi\js\navigation.js"></script>