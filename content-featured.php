<?php $format = get_post_format(); ?>
<?php $archive_year  = get_the_time('Y'); ?>
<?php $archive_month = get_the_time('m'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('type-entry featured-item'); ?>>

    <a href="<?php the_permalink(); ?>" class="type-entry-clickable"></a>

    <h3 class="type-entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        <?php if (has_excerpt()) : ?>
            <span class="type-entry-excerpt">
                <?php if (has_category('quotes')) : ?> 
                    <i class="fas fa-briefcase"></i>
                <?php elseif (has_category('books-documents')) : ?> 
                    <i class="fas fa-book"></i>
                <?php else : ?>
                    <i class="fas fa-external-link-alt"></i>
                <?php endif; ?>
                <?php echo get_the_excerpt(); ?>
            </span>
        <?php endif; ?>
    </h3>

    <?php if (has_post_thumbnail()) : ?>
        <div class="type-entry-thumbnail">
            <a href="<?php the_permalink(); ?>" aria-label="Read More">
                <?php if (has_category('quotes')) : ?><i class="fas fa-quote-left"></i><?php endif; ?>
                <?php the_post_thumbnail('ufotimeline-small'); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="type-entry-thumbnail-empty">
            <a href="<?php the_permalink(); ?>" aria-label="Read More">
                <?php if (has_category('uncategorized')) : ?><i class="fas fa-plus"></i><?php endif; ?>
                <?php if (has_category('news')) : ?><i class="fas fa-newspaper"></i><?php endif; ?>
                <?php if (has_category('documentaries')) : ?><i class="fas fa-film"></i><?php endif; ?>
                <?php if (has_category('famous-cases')) : ?><i class="fas fa-star"></i><?php endif; ?>
                <?php if (has_category('sightings')) : ?><i class="fas fa-eye"></i><?php endif; ?>
                <?php if (has_category('books-documents')) : ?><i class="fas fa-book"></i><?php endif; ?>
                <?php if (has_category('spotlight')) : ?><i class="fas fa-fire"></i><?php endif; ?>
                <?php if (has_category('quotes')) : ?><i class="fas fa-quote-left"></i><?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="type-entry-bottom group">

        <div class="type-entry-date-year">
            <a href="<?php echo get_year_link($archive_year); ?>"><?php the_time('Y'); ?></a>
        </div>

        <div class="clear"></div>

        <div class="type-entry-bottom-bottom group">

            <div class="type-entry-date">
                <a href="<?php echo get_month_link($archive_year, $archive_month); ?>" title="Archive for <?php the_time('F Y'); ?>">
                    <i class="fas fa-clock"></i><?php the_time('M d'); ?>
                </a>
            </div>

            <?php if (has_category()) : ?>
                <div class="type-entry-category group">
                    <?php
                    // Kategori ID'si 7 olanları hariç tut
                    $categories = get_the_category();
                    foreach ($categories as $category) {
                        if ($category->term_id != 7) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a> ';
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if (comments_open()) : ?>
                <?php $number = get_comments_number(); ?>
                <?php if ($number > 0) : ?>
                    <a class="type-entry-comments" href="<?php comments_link(); ?>">
                        <i class="fas fa-comment"></i><span><?php comments_number('0', '1', '%'); ?></span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>

        </div>

    </div>

</article>
