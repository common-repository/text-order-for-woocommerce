<?php
/*
Plugin Name: Text order for Woocommerce
Description: Plugin to change the order in which the products appear and the text in the categories and on the main page
Version: 1.0
Author: Zuriñe Martín
Author email: zumargon@gmail.com

This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/


add_action('woocommerce_archive_description', 'zuri_change_order_text_product', 2 );
function zuri_change_order_text_product(){
    if( is_home() || is_front_page() || is_product_category() ) :
        remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
        remove_action( 'woocommerce_archive_description','woocommerce_product_archive_description',10);
        add_action( 'woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description', 5 );
        add_action( 'woocommerce_after_main_content', 'woocommerce_product_archive_description', 5 );
    endif;
}



function zuri_thanks_donate($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ENWQTLS22XZ6N&source=url" target="_blank">' . __('Donate', 'my-plugin-textdomain') . '</a>';
    }

    return $links;
}
add_filter( 'plugin_row_meta', 'zuri_thanks_donate', 10, 2 );
