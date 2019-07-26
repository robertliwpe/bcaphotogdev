<?php
/* ==============================================
  Try to remove default template
=============================================== */
add_filter( 'vc_load_default_templates', 'glazov_template_modify_array' );
function glazov_template_modify_array($data) {
    return array(); // This will remove all default templates
}

/* ==============================================
  Create Custom Template in Visual Composer
=============================================== */

/* Example Page Template */
if( ! function_exists( 'glazov_vc_example_page_template' ) ) {

  add_filter( 'vc_load_default_templates', 'glazov_vc_example_page_template' );
  function glazov_vc_example_page_template($data) {
    $template               = array();
    $template['name']       = __( 'Example Page Template', 'glazov-core' );
    $template['content']    = <<<CONTENT
[vc_row][/vc_row]
CONTENT;
    array_unshift($data, $template);
    return $data;
  }

}