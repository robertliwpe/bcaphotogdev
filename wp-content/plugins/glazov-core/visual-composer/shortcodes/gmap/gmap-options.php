<?php
/**
 * Gmap - Shortcode Options
 */
add_action( 'init', 'glazov_gmap_vc_map' );
if ( ! function_exists( 'glazov_gmap_vc_map' ) ) {
  function glazov_gmap_vc_map() {
    vc_map( array(
      "name" => __( "Google Map", 'glazov-core'),
      "base" => "glzv_gmap",
      "description" => __( "Google Map Styles", 'glazov-core'),
      "icon" => "fa fa-map color-cadetblue",
      "category" => GlazovLib::glazov_cat_name(),
      "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "API KEY", 'glazov-core' ),
          "param_name"  => 'api_key',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter Map ID', 'glazov-core'),
          "param_name"  => "gmap_id",
          "value"       => "",
          "description" => __( 'Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong>', 'glazov-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter your Google Map API Key', 'glazov-core'),
          "param_name"  => "gmap_api",
          "value"       => "",
          "description" => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'glazov-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Map Settings", 'glazov-core' ),
          "param_name"  => 'map_settings',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Type', 'glazov-core' ),
          'value' => array(
            __( 'Select Type', 'glazov-core' ) => '',
            __( 'ROADMAP', 'glazov-core' ) => 'ROADMAP',
            __( 'SATELLITE', 'glazov-core' ) => 'SATELLITE',
            __( 'HYBRID', 'glazov-core' ) => 'HYBRID',
            __( 'TERRAIN', 'glazov-core' ) => 'TERRAIN',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_type',
          'description' => __( 'Select your google map type.', 'glazov-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Style', 'glazov-core' ),
          'value' => array(
            __( 'Select Style', 'glazov-core' ) => '',
            __( 'Gray Scale', 'glazov-core' ) => "gray-scale",
            __( 'Mid Night', 'glazov-core' ) => "mid-night",
            __( 'Blue Water', 'glazov-core' ) => 'blue-water',
            __( 'Light Dream', 'glazov-core' ) => 'light-dream',
            __( 'Pale Dawn', 'glazov-core' ) => 'pale-dawn',
            __( 'Apple Maps-esque', 'glazov-core' ) => 'apple-maps',
            __( 'Blue Essence', 'glazov-core' ) => 'blue-essence',
            __( 'Unsaturated Browns', 'glazov-core' ) => 'unsaturated-browns',
            __( 'Paper', 'glazov-core' ) => 'paper',
            __( 'Midnight Commander', 'glazov-core' ) => 'midnight-commander',
            __( 'Light Monochrome', 'glazov-core' ) => 'light-monochrome',
            __( 'Flat Map', 'glazov-core' ) => 'flat-map',
            __( 'Retro', 'glazov-core' ) => 'retro',
            __( 'becomeadinosaur', 'glazov-core' ) => 'becomeadinosaur',
            __( 'Neutral Blue', 'glazov-core' ) => 'neutral-blue',
            __( 'Subtle Grayscale', 'glazov-core' ) => 'subtle-grayscale',
            __( 'Ultra Light with Labels', 'glazov-core' ) => 'ultra-light-labels',
            __( 'Shades of Grey', 'glazov-core' ) => 'shades-grey',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_style',
          'description' => __( 'Select your google map style.', 'glazov-core' ),
          'dependency' => array(
            'element' => 'gmap_type',
            'value' => 'ROADMAP',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Height', 'glazov-core'),
          "param_name"  => "gmap_height",
          "value"       => "",
          "description" => __( "Enter the px value for map height. This will not work if you add this shortcode into the Map Tab shortcode.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Common Marker', 'glazov-core'),
          "param_name"  => "gmap_common_marker",
          "value"       => "",
          "description" => __( "Upload your custom marker.", 'glazov-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Enable & Disable", 'glazov-core' ),
          "param_name"  => 'enb_disb',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Scroll Wheel', 'glazov-core'),
          "param_name"  => "gmap_scroll_wheel",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Street View Control', 'glazov-core'),
          "param_name"  => "gmap_street_view",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Map Type Control', 'glazov-core'),
          "param_name"  => "gmap_maptype_control",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Map Markers
        array(
          "type"        => "notice",
          "heading"     => __( "Map Pins", 'glazov-core' ),
          "param_name"  => 'map_pins',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Locations', 'glazov-core' ),
          'param_name' => 'locations',
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'glazov-core' ),
              'param_name' => 'latitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'glazov-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'glazov-core' ),
              'param_name' => 'longitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'glazov-core' ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Custom Marker', 'glazov-core' ),
              'param_name' => 'custom_marker',
              "description" => __( "Upload your unique map marker if your want to differentiate from others.", 'glazov-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Heading', 'glazov-core' ),
              'param_name' => 'location_heading',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'glazov-core' ),
              'param_name' => 'location_text',
            ),

          )
        ),

        GlazovLib::vt_class_option(),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'glazov-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'glazov-core'),
        ),

      )
    ) );
  }
}
