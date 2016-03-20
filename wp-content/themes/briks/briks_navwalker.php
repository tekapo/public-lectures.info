<?php 
class briks_bootstrap_navwalker extends Walker_Nav_Menu {



 /*

   * @see Walker::start_lvl()

   * @since 3.0.0

   *

   * @param string $output Passed by reference. Used to append additional content.

   * @param int $depth Depth of page. Used for padding.

  */

  function start_lvl( &$output, $depth=0,$args=array()) {

   $indent = str_repeat( "\t", $depth );

   $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";  

  }






  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

   global $wp_query;

   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';




   if (strcasecmp($item->title, 'divider') == 0) {

    // Item is a Divider

    $output .= $indent . '<li class="divider">';

   } else if (strcasecmp($item->title, 'divider-vertical') == 0) {

    // Item is a Vertical Divider

    $output .= $indent . '<li class="divider-vertical">';

   } else if (strcasecmp($item->title, 'nav-header') == 0) {

    // Item is a Header

    $output .= $indent . '<li class="nav-header">' . esc_attr( $item->attr_title );

   } else {



    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $classes[] = ($item->current) ? 'active' : '';

    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );



    if ($args->has_children && $depth > 0) {

     $class_names .= '  dropdown';

    } else if($args->has_children && $depth === 0) {

     $class_names .= ' dropdown';

    }



    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';



    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';



    $output .= $indent . '<li' . $id . $value . $class_names .'>';

             if($args->has_children && $depth === 0 && $class_names='dropdown') 

    {

     $attributes = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

     $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

     $attributes .= ! empty( $item->url )        ? ' href="#"' : '';

     $attributes .= ($args->has_children)      ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';

     $item_output = $args->before;

    }

    else

    {

     $attributes = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

     $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

     $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

     $attributes .= ($args->has_children)      ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';



     $item_output = $args->before;

             }

    

    if(! empty( $item->attr_title )){

     $item_output .= '<a'. $attributes .'><i class="' . esc_attr( $item->attr_title ) . '"></i>&nbsp;';

    } else {

     $item_output .= '<a'. $attributes .'>';

    }



    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    $item_output .= ($args->has_children && $depth == 0) ? ' <span class="caret"></span></a>' : '</a>';

    $item_output .= $args->after;



    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

   }

  }



  /*

   * Traverse elements to create list from elements.

   *

   * Display one element if the element doesn't have any children otherwise,

   * display the element and its children. Will only traverse up to the max

   * depth and no ignore elements under that depth. 

   *

   * This method shouldn't be called directly, use the walk() method instead.

   *

   * @see Walker::start_el()

   * @since 2.5.0

   *

   * @param object $element Data object

   * @param array $children_elements List of elements to continue traversing.

   * @param int $max_depth Max depth to traverse.

   * @param int $depth Depth of current element.

   * @param array $args

   * @param string $output Passed by reference. Used to append additional content.

   * @return null Null on failure with no changes to parameters.

   */



  function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

         if ( !$element ) {

             return;

         }



         $id_field = $this->db_fields['id'];



         //display this element

         if ( is_object( $args[0] ) ) {

            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

         }



         parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

     }

}
?>