<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MDSi
 */

?>

<main>

    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>" class="non-active-page">Home</a> <span class="active-page"> > </span><a href="#" class="active-page"><?php the_title(); ?></a>
    </div>

    <section class="subpage">
        <h1><?php the_title( ) ?></h1>
        <?php the_content(); ?>
    </section>

</main>
	


