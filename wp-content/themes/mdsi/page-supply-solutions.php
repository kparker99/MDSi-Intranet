<?php
/**
 * The template for displaying Supply Chain Solutions subpage
 *
 * This is the template that displays the Supply Chain Solutions subpage only.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MDSi
 */

    get_header();
?>

<main>

    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>" class="non-active-page">Home</a> <span class="active-page"> > </span><a href="#" class="active-page"><?php the_title(); ?></a>
    </div>

    <section class="subpage">
        <h1><?php the_title( ) ?></h1>
        <iframe src=https://view.monday.com/embed/1592348788-35a4bb8262da6a928f98ff8dcf250b4e?r=use1 width=770 height=500 style="border: 0; box-shadow: 5px 5px 56px 0px rgba(0,0,0,0.25);"></iframe>
        <?php the_content(); ?>
    </section>

</main>