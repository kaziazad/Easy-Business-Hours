<?php
/**
 * Plugin Name: Easy Business Hours
 * Description: 'Easy Business hours' is a simple solution for displaying the opening hours or the working hours of a Business on your website.
 * Plugin URI:  https://github.com/kaziazad/Easy-Business-Hours.git
 * Version:     1.0.1
 * Author:      Kazi Mahmud Al Azad
 * Author URI:  https://github.com/kaziazad
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bh-pro
 * Domain Path: /languages
 * Elementor tested up to: 3.8.1
 * Elementor Pro tested up to: 3.5.0
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once dirname( __FILE__ ) .'/inc/codestar-framework-master/codestar-framework.php';
require_once dirname( __FILE__ ) .'/admin-page-handle.php';

final class Easy_Business_Hours{

    public function __construct(){
        add_action('wp_enqueue_scripts', array( $this,'business_hours_style'));
    }

    function business_hours_style(){
       
        wp_enqueue_style('oh-fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
        wp_enqueue_style('oh-customstyle', plugins_url('/assets/css/style.css',__FILE__));

    }

    // admin page handle


    function shortcode_for_business_hours(){
        add_shortcode('custom-business-hours',array($this,'easy_business_hours'));
    }

    // shortcode opening-hours-footer start

    function easy_business_hours(){
        ob_start();
        $currentday = date("l");
        $sunday =" ";
        $monday =" ";
        $tuesday =" ";
        $wednesday =" ";
        $thursday =" ";
        $friday =" ";
        $saturday =" ";
        if($currentday=='Sunday'){
            $sunday = ' bhp-active-day';
        }elseif ($currentday=='Monday') {
            $monday =' bhp-active-day';
        }elseif ($currentday=='Tuesday') {
            $tuesday =' bhp-active-day';
        }elseif ($currentday=='Wednesday') {
            $wednesday =' bhp-active-day';
        }elseif ($currentday=='Thursday') {
            $thursday =' bhp-active-day';
        }elseif ($currentday=='Friday') {
            $friday =' bhp-active-day';
        }elseif ($currentday=='Saturday') {
            $saturday =' bhp-active-day';
        }


        
        // Get options
        $options = get_option( 'easy_business_hours' ); // unique id of the framework

        $weekly_off_day= $options['opt-weekly-off']; // id of the field

        $sunday_off =" ";
        $monday_off =" ";
        $tuesday_off =" ";
        $wednesday_off =" ";
        $thursday_off =" ";
        $friday_off =" ";
        $saturday_off =" ";
        if($weekly_off_day=='option-7'){
            $sunday_off = ' weekly-offday';
        }elseif ($weekly_off_day=='option-1') {
            $monday_off =' weekly-offday';
        }elseif ($weekly_off_day=='option-2') {
            $tuesday_off =' weekly-offday';
        }elseif ($weekly_off_day=='option-3') {
            $wednesday_off =' weekly-offday';
        }elseif ($weekly_off_day=='option-4') {
            $thursday_off =' weekly-offday';
        }elseif ($weekly_off_day=='option-5') {
            $friday_off =' weekly-offday';
        }elseif ($weekly_off_day=='option-6') {
            $saturday_off =' weekly-offday';
        }elseif ($weekly_off_day=='default') {
            $saturday_off =' ';
        }



        ?>
    
        <!-- html markup for calender start -->
        <div class="weekly-hours-calender">
            <table>
                <tr class="table-row <?php echo esc_attr($monday) . esc_attr($monday_off); ?>">
                    <td>Monday</td>
                    <td><?php if(isset($options['opt-monday-time']['from']) && isset($options['opt-monday-time']['to'])){
                        echo esc_html($options['opt-monday-time']['from']) . "-" . esc_html($options['opt-monday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>
                <tr class="table-row <?php echo esc_attr($tuesday) . esc_attr($tuesday_off); ?>">
                    <td>Tuesday</td>
                    <td><?php if(isset($options['opt-tuesday-time']['from']) && isset($options['opt-tuesday-time']['to'])){
                        echo esc_html($options['opt-tuesday-time']['from']) . "-" . esc_html($options['opt-tuesday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>

                <tr class="table-row <?php echo esc_attr($wednesday) . esc_attr($wednesday_off); ?>">
                    <td>Wednesday</td>
                    <td><?php if(isset($options['opt-wednesday-time']['from']) && isset($options['opt-wednesday-time']['to'])){
                        echo esc_html($options['opt-wednesday-time']['from']) . "-" . esc_html($options['opt-wednesday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>

                <tr class="table-row <?php echo esc_attr($thursday) . esc_attr($thursday_off); ?>">
                    <td>Thursday</td>
                    <td><?php if(isset($options['opt-thursday-time']['from']) && isset($options['opt-thursday-time']['to'])){
                        echo esc_html($options['opt-thursday-time']['from']) . "-" . esc_html($options['opt-thursday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>
                <tr class="table-row <?php echo esc_attr($friday) . esc_attr($friday_off); ?>">
                    <td>Friday</td>
                    <td><?php if(isset($options['opt-friday-time']['from']) && isset($options['opt-friday-time']['to'])){
                        echo esc_html($options['opt-friday-time']['from']) . "-" . esc_html($options['opt-friday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>

                <tr class="table-row <?php echo esc_attr($saturday) . esc_attr($saturday_off); ?>">
                    <td>Saturday</td>
                    <td><?php if(isset($options['opt-saturday-time']['from']) && isset($options['opt-saturday-time']['to'])){
                        echo esc_html($options['opt-saturday-time']['from']) . "-" . esc_html($options['opt-saturday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>

                <tr class="table-row <?php echo esc_attr($sunday) . esc_attr($sunday_off); ?>">
                    <td>Sunday</td>
                    <td><?php if(isset($options['opt-sunday-time']['from']) && isset($options['opt-sunday-time']['to'])){
                        echo esc_html($options['opt-sunday-time']['from']) . "-" . esc_html($options['opt-sunday-time']['to']);
                    }else{
                        echo "09:00-17:00";
                    }
                    
                    ?></td>
                </tr>
            </table>
        </div>

    <!-- html markup for calender end -->
        <?php
        return ob_get_clean();
    }

    // shortcode opening-hours-footer end


}



if(class_exists('Easy_Business_Hours')){
    $opening_hours = new Easy_Business_Hours;
    $opening_hours->shortcode_for_business_hours();

 }


