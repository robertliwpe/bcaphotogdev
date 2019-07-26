<?php

/**
 * Menu Extension
 * Add subtitle
 *
 * @package umbrella
 */
class nk_walker extends Walker_Nav_Menu {


    function isset_item( $item ) {
        return isset( $item->title );
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        // Add classname if has submenu
        $attributes = '';

        if ( array_search( 'current-menu-item', $classes ) !== false ) {
            $classes[] = 'active';
        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        if ( $this->isset_item( $item ) ) {
            $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
        }

        $attributes .= ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

        $prepend = '';
        $append = '';
        $subtitle = ! empty( $item->description ) ? $item->description : '';

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
         * Filter a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string $title The menu item's title.
         * @param object $item The current menu item.
         * @param array $args An array of {@see wp_nav_menu()} arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = '';
        if ( is_object( $args ) ) {
            $item_output .= $args->before;
            $item_output .= '<a' . $attributes . '><span>';
            $item_output .= $args->link_before;
            $item_output .= $prepend . $title . $append;
            $item_output .= $subtitle . $args->link_after;
            $item_output .= '</span></a>';
            $item_output .= $args->after;
        }

        if ( $this->isset_item( $item ) ) {
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( $this->isset_item( $item ) ) {
            $output .= '</li>';
        }
    }

    // change markup for submenus
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '';
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '';
    }
}
