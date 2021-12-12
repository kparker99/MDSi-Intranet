<?php
/**
 * The template for displaying IT subpage
 *
 * This is the template that displays the IT subpage only.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MDSi
 */

    get_header();
?>

<main>

    <div class="breadcrumb">
        <a href="#" class="non-active-page">Home</a> <span class="active-page"> > </span><a href="#" class="active-page"><?php the_title(); ?></a>
    </div>

    <section class="subpage">
        <a href="<?php echo tribe_get_event_link() ?>" class="cal-event">
            <div class="cal-icon">
                <i class="far fa-calendar-alt fa-2x"></i>
            </div>
            <div class="cal-desc">
                <h3><?php echo $post->post_title; ?></h3>
                <p><?php echo tribe_get_start_date( $post, false ); ?></p>
            </div>
        </a>
    </div>

</main>