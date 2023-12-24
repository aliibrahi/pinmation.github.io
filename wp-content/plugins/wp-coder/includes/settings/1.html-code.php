<?php
/*
 * Page Name: HTML
 */

use WPCoder\Dashboard\Field;

defined( 'ABSPATH' ) || exit;
?>

    <h4>
        <span class="codericon codericon-filetype-html"></span>
		<?php
		esc_html_e( 'HTML Code', 'wpcoder' ); ?>
    </h4>

    <div class="wowp-field is-full wowp-code-nav">
        <ol id="htmlNavigationMenu" class="wowp-php-nav-menu"></ol>
        <span class="button-editor" id="htmlnav">Add NAV Comment</span>
    </div>

<?php Field::textarea( 'html_code' ); ?>

    <div class="wowp-notification -info">
        Please provide only the inner HTML content, excluding the <code>html</code> and <code>body</code> tags. The page
        already contains these tags, and your code will be inserted within the <code>body</code> tag directly.
    </div>

<?php

