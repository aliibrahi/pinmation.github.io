<?php
/*
 * Page Name: PHP
 */

use WPCoder\Dashboard\Field;

defined( 'ABSPATH' ) || exit;
?>

    <h4>
        <span class="codericon codericon-filetype-php"></span>
		<?php esc_html_e( 'PHP Code', 'wpcoder' ); ?>
    </h4>

    <div class="wowp-field is-full wowp-code-nav">
        <ol id="phpNavigationMenu" class="wowp-php-nav-menu"></ol>
        <span class="button-editor" id="phpnav">Add NAV Comment</span>
    </div>

<?php Field::textarea( 'php_code' ); ?>

    <div class="wowp-notification -warning">
        Please input only the PHP content, omitting the <code>php</code> tag
    </div>

<?php


