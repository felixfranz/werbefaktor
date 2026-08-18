<?php
/**
 * Template part for displaying page content in page-glossar.php
 *
 */
?>
<section class="glossar-container  gap-m">


<?php
$ranges = [
    'A–D' => ['A', 'B', 'C', 'D'],
    'E–F' => ['E', 'F'],
    'G–J' => ['G', 'H', 'I', 'J'],
    'K–N' => ['K', 'L', 'M', 'N'],
    'O–R' => ['O', 'P', 'Q', 'R'],
    'S–V' => ['S', 'T', 'U', 'V'],
    'W–Z' => ['W', 'X', 'Y', 'Z'],
];

$query = new WP_Query([
    'post_type'        => 'glossar',
    'posts_per_page'   => -1,
    'orderby'          => 'title',
    'order'            => 'ASC',
    'suppress_filters' => false,
]);

$posts = $query->posts;

foreach ($ranges as $range_name => $letters) :

    $range_posts = [];

    foreach ($posts as $post) {
        $first_letter = strtoupper(mb_substr(get_the_title($post), 0, 1));

        if (in_array($first_letter, $letters)) {
            $range_posts[] = $post;
        }
    }

    // Don't output empty ranges
    if (empty($range_posts)) {
        continue;
    }
    ?>

    <div class="glossar-range">

        <h3><?php echo esc_html($range_name); ?></h3>

        <div class="glossar-list">

            <?php foreach ($range_posts as $post) : ?>

                <article class="glossar-item">
                    <a href="<?php echo esc_url(get_permalink($post)); ?>">
                        <?php echo esc_html(get_the_title($post)); ?>
                    </a>
                </article>

            <?php endforeach; ?>

        </div>

    </div>

<?php endforeach; ?>
</section>


