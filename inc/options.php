<?php 
function opcoes_tema() {

    $settings = new Odin_Theme_Options(
        'odin-settings', // Slug/ID of the Settings Page (Required)
        'Opções do tema', // Settings page name (Required)
        'manage_options' // Page capability (Optional) [default is manage_options]
    );

    $settings->set_tabs(
        array(
            
			array(
                'id' => 'odin_general', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Home', 'odin' ), // Settings tab title (Required)
            ),
			
           
        )
    );

    $settings->set_fields(
        array(
			
            'odin_general_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'odin_general', // Tab ID/Slug (Required)
                'title' => __( 'Configurações do tema', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
					array(
                        'id'         => 'slider_2', // Required
                        'label'      => __( 'Texto do Slider 2', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
                    array(
                        'id'         => 'slider_3', // Required
                        'label'      => __( 'Texto do Slider 3', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					
					
				)
            ),
			
         )
    );
    
}

add_action( 'init', 'opcoes_tema', 1 );
?>