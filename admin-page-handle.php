<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

 // Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'easy_business_hours';
  
    //
    // Create options
    CSF::createOptions( $prefix, array(
      'menu_title' => 'Easy Business Hours',
      'menu_slug'  => 'easy-business-hours',
      'menu_icon'=>'dashicons-clock',
      'framework_title'=> 'Easy Business Hours <small>by Kazi Mahmud Al Azad</small>',
      'footer_text'=> 'Thanks you for using this plugin.',
    ) );
  
    //
    // Create a section for Shortcode
    CSF::createSection( $prefix, array(
      'title'  => 'Shortcode',
      'fields' => array(
  
        //
        // A heading field for Shortcode 
        array(
            'id'         =>'opt-shortcode-text',
            'type'       => 'text',
            'title'      => 'Use this shortcode:',
            'default'    => '[custom-business-hours]',
            'attributes' => array(
              'readonly' => 'readonly',
            ),
        ),
  
      )
    ) );
  
    //
    // Create a section for Settings 
    CSF::createSection( $prefix, array(
      'title'  => 'Settings',
      'fields' => array(
        
        // Field for background color of calender
            array(
                'id'          => 'opt-color-calender',
                'type'        => 'background',
                'title'       => 'Calendar Background',
                'output'      => '.weekly-hours-calender',
                
            ),
            // Field for color of text
            array(
                'id'    => 'opt-color-text',
                'type'  => 'color',
                'title' => 'Text Color',
                'output' => '.weekly-hours-calender', 
            ),

        // Field for background color of active day    
            array(
                'id'          => 'opt-color-active-day',
                'type'        => 'color',
                'title'       => 'Active Day Background Color',
                'output'      => '.bhp-active-day',
                'output_mode' => 'background-color'
            ),


             // Field for color of text active day
             array(
                'id'    => 'opt-color-active-day-text',
                'type'  => 'color',
                'title' => 'Active Day Text Color',
                'output'=> '.bhp-active-day',
                'output_mode' => 'color'
            ),


        // weekly holyday selector

            array(
                'id'          => 'opt-weekly-off',
                'type'        => 'select',
                'title'       => 'Select Weekly Offday',
                'placeholder' => 'Select an option',
                'options'     => array(
                'option-1'  => 'Monday',
                'option-2'  => 'Tuesday',
                'option-3'  => 'Wednesday',
                'option-4'  => 'Thursday',
                'option-5'  => 'Friday',
                'option-6'  => 'Saturday',
                'option-7'  => 'Sunday',
                ),
                'default'     => 'option-7'
            ),

            // background color of weekly offday
            array(
                'id'          => 'opt-color-back-weekly-offday',
                'type'        => 'color',
                'title'       => 'Weekly Offday Background',
                'default'     => 'red',
                'output'      => '.weekly-offday',
                'output_mode' => 'background-color'
            ),

            // Field for color of text weekly offday
            array(
                'id'    => 'opt-color-text-weekly-offday',
                'type'  => 'color',
                'title' => 'Weekly Offday Text Color',
                'default'=> 'white',
                'output'      => '.weekly-offday',
                'output_mode' => 'color'
            ),

            // Monday working time setting

                  array(
                    'id'       => 'opt-monday-time',
                    'type'     => 'datetime',
                    'title'    => 'Monday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                     

                    ),
                  ),

        // Tuesday working time setting

                  array(
                    'id'       => 'opt-tuesday-time',
                    'type'     => 'datetime',
                    'title'    => 'Tuesday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                     

                    ),
                  ),
        // Wednesday working time setting        

                  array(
                    'id'       => 'opt-wednesday-time',
                    'type'     => 'datetime',
                    'title'    => 'Wednesday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                     

                    ),
                  ),
            // Thursday working time setting
                  array(
                    'id'       => 'opt-thursday-time',
                    'type'     => 'datetime',
                    'title'    => 'Thursday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                      'from'       => '09:00',
                      'to'         => '17:00',

                    ),
                  ),
            // Friday working time setting
                  array(
                    'id'       => 'opt-friday-time',
                    'type'     => 'datetime',
                    'title'    => 'Friday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                     

                    ),
                  ),
        // Saturday working time setting
                  array(
                    'id'       => 'opt-saturday-time',
                    'type'     => 'datetime',
                    'title'    => 'Saturday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                     

                    ),
                  ),
            // Sunday working time setting
                  array(
                    'id'       => 'opt-sunday-time',
                    'type'     => 'datetime',
                    'title'    => 'Sunday',
                    'subtitle' => '24-hour Time without PM:AM',
                    'from_to'   => true,
                    'text_from' => 'Opening Time',
                    'text_to'   => 'Closing Time',
                    'settings' => array(
                      'noCalendar' => true,
                      'enableTime' => true,
                      'dateFormat' => 'H:i',
                      'time_24hr'  => true,
                     

                    ),
                  ),




                
           
  
      )
    ) );
  
  }

  