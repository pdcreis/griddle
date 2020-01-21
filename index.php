<?php
   /*
    * Plugin Name: Griddle
    * Plugin URI: http://pedroreis.net/griddle
    * Description: ...
    * Version: 1.0
    * Author: Pedro Reis
    * Author URI: http://pedroreis.net
    * License: GPL2
    */



    /** 
     * 
     */

    function griddle_content() { ?>
        
        <?php if ( is_user_logged_in() && wp_get_current_user()->user_email == get_option( 'admin_email' ) ) : ?>
            <div class="griddle"></div>
            <a class="griddle-switch" href="#">
               <svg width="20" height="17.5" viewBox="0 0 20 17.5" xmlns="http://www.w3.org/2000/svg">
                    <path d="m18.1 0h-16.2c-1.1 0-1.9.8-1.9 1.9v13.8c0 1 .8 1.9 1.9 1.9h16.2c1 0 1.9-.8 1.9-1.9v-13.8c0-1.1-.8-1.9-1.9-1.9zm-9.3 15h-6.3v-10h6.2v10zm8.7 0h-6.2v-10h6.2z" fill="#666"/>
                </svg>
            </a>
        <?php endif; ?>

    <?php
    }
    
    add_action( 'wp_footer', 'griddle_content' );


    /**
     * Styles
     */

    function griddle_styles()
    {
        // Register the style like this for a plugin:
        wp_register_style( 'griddle-styles', plugins_url( '/style.css', __FILE__ ) );
     
        // For either a plugin or a theme, you can then enqueue the style:
        wp_enqueue_style( 'griddle-styles' );
    }

    add_action( 'wp_enqueue_scripts', 'griddle_styles' );


    /** 
     * Scripts
     */

    function griddle_scripts()
    {
        // Register the script like this for a plugin:
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3', true );
        wp_enqueue_script( 'jquery' );

        wp_enqueue_script( 'griddle-scripts', plugins_url( '/script.js', __FILE__ ), ['jquery'], null, true  );
    }
    
    add_action( 'wp_enqueue_scripts', 'griddle_scripts' );
