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
                        'id'         => 'facebook', // Required
                        'label'      => __( 'Facebook', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
                    array(
                        'id'         => 'twitter', // Required
                        'label'      => __( 'Twitter', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
                    array(
                        'id'         => 'instagram', // Required
                        'label'      => __( 'Instagram', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
                    array(
                        'id'         => 'pinterest', // Required
                        'label'      => __( 'Pinterest', 'odin' ), // Required
                        'type'       => 'text', // Required
                    ),
					
					
				)
            ),
			
         )
    );
    
}

add_action( 'init', 'opcoes_tema', 1 );
?>