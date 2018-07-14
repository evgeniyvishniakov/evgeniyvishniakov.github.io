<?php
if( !defined( 'ABSPATH' ) )
    exit;

if( !class_exists( 'YITH_Category_Accordion_Widget' ) )
{
    class YITH_Category_Accordion_Widget extends  WP_Widget{

        public function __construct()
        {
            parent::__construct(
              'yith_wc_category_accordion',
               __('YITH WooCommerce Category Accordion', 'yith-woocommerce-category-accordion'),
               array(   'description'   =>  __('Show your categories in an accordion!', 'yith-woocommerce-category-accordion' ) )
            );
        }

        public function widget( $args, $instance ){


            $show_wc_category       =   $instance['show_wc_cat'] == 'on';
            $show_wc_sub_category   =   $instance['show_wc_subcat'] == 'on';
            $show_wp_category       =   $instance['show_wp_cat'] == 'on';
            $show_wp_sub_category   =   $instance['show_wp_subcat'] == 'on';

            $args_wc    =   array();
            $args_wp    =   array();

            if( $show_wc_category ){

                $args_wc['show_count']  =   0;
                $args_wc['hierarchical'] = 1;
                $args_wc['taxonomy'] = 'product_cat';
                $args_wc['hide_empty'] = false ;
                $args_wc['depth'] =   $show_wc_sub_category ?  0 : 1 ;
                $args_wc['title_li']                    = '';
            }

            if( $show_wp_category ) {
                $args_wp['show_count'] = 0;
                $args_wp['depth'] = $show_wp_sub_category ?  0 : 1;
                $args_wp['hierarchical'] = 1;
                $args_wp['title_li'] = '';
                $args_wp['hide_empty']  =   false;
            }

            echo $args['before_widget'];
            echo '<h3 class="ywcca_widget_title">'.$instance['title'].'</h3>';
            echo '<ul class="ywcca_category_accordion_widget" data-highlight_curr_cat="'.$instance['highlight_curr_cat'].'" data-show_collapse="'.$instance['show_collapse'].'">';

            if( $show_wc_category )
                wp_list_categories( apply_filters( 'ywcca_wc_product_categories_widget_args', $args_wc ) );
            if( $show_wp_category )
                wp_list_categories( apply_filters( 'ywcca_wp_product_categories_widget_args', $args_wp ) );

            echo '</ul>';
            echo $args['after_widget'];

        }

        public function form( $instance ){
            $default    =   array(
                'title'                 =>  '',
                'show_wc_cat'           =>  isset( $instance['show_wc_cat'] ) ? $instance['show_wc_cat'] : 'off',
                'show_wc_subcat'        =>  isset( $instance['show_wc_subcat'] ) ? $instance['show_wc_subcat'] : 'off',
                'show_wp_cat'           =>  isset( $instance['show_wp_cat'] ) ? $instance['show_wp_cat'] : 'off',
                'show_wp_subcat'        =>  isset( $instance['show_wp_subcat'] ) ? $instance['show_wp_subcat']: 'off',
                'highlight_curr_cat'    =>  isset( $instance['highlight_curr_cat'] ) ? $instance['highlight_curr_cat']: 'off',
                'show_collapse'         =>  isset( $instance['show_collapse'] ) ? $instance['show_collapse'] : 'off'
            );

           $instance    =   wp_parse_args( $instance, $default );
            ?>
            <p>
                <label for="<?php echo $this->get_field_id("title");?>"><?php _e('Title', 'yith-woocommerce-category-accordion');?></label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id("title");?>" name="<?php echo $this->get_field_name("title");?>" placeholder="<?php _e('Insert a title for the accordion menu', 'yith-woocommerce-category-accordion');?>" value="<?php echo $instance['title'];?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_wc_cat' ) );?>"><?php _e( 'Show WooCommerce Categories','yith-woocommerce-category-accordion' );?></label>
                <input type="checkbox" <?php checked( 'on', $instance['show_wc_cat'] );?> id="<?php echo esc_attr( $this->get_field_id( 'show_wc_cat' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'show_wc_cat' ) );?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_wc_subcat' ) );?>"><?php _e( 'Show WooCommerce Subcategories','yith-woocommerce-category-accordion' );?></label>
                <input type="checkbox" <?php checked( 'on', $instance['show_wc_subcat'] );?> id="<?php echo esc_attr( $this->get_field_id( 'show_wc_subcat' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'show_wc_subcat' ) );?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_wp_cat' ) );?>"><?php _e( 'Show WordPress Categories','yith-woocommerce-category-accordion' );?></label>
                <input type="checkbox" <?php checked( 'on', $instance['show_wp_cat'] );?> id="<?php echo esc_attr( $this->get_field_id( 'show_wp_cat' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'show_wp_cat' ) );?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_wp_subcat' ) );?>"><?php _e( 'Show WordPress Subcategories','yith-woocommerce-category-accordion' );?></label>
                <input type="checkbox" <?php checked( 'on', $instance['show_wp_subcat'] );?> id="<?php echo esc_attr( $this->get_field_id( 'show_wp_subcat' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'show_wp_subcat' ) );?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'highlight_curr_cat' ) );?>"><?php _e( 'Highlight the current category','yith-woocommerce-category-accordion' );?></label>
                <input type="checkbox" <?php checked( 'on', $instance['highlight_curr_cat'] );?> id="<?php echo esc_attr( $this->get_field_id( 'highlight_curr_cat' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'highlight_curr_cat' ) );?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_collapse' ) );?>"><?php _e( 'Closed accordion', 'yith-woocommerce-category-accordion' );?></label>
                <input type="checkbox" <?php checked( 'on', $instance['show_collapse'] );?> id="<?php echo esc_attr( $this->get_field_id( 'show_collapse' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'show_collapse' ) );?>">
            </p>
        <?php
        }


        public function update( $new_instance, $old_instance ){

            $instance   =   array();

            $instance['title']              =   isset( $new_instance['title'] ) ? $new_instance['title']    :   '';
            $instance['show_wc_cat']        =   isset( $new_instance['show_wc_cat'] ) ? $new_instance['show_wc_cat']    :   'off';
            $instance['show_wc_subcat']     =   isset( $new_instance['show_wc_subcat'] ) ? $new_instance['show_wc_subcat']    :   'off';
            $instance['show_wp_cat']        =   isset( $new_instance['show_wp_cat'] ) ? $new_instance['show_wp_cat']    :   'off';
            $instance['show_wp_subcat']     =   isset( $new_instance['show_wp_subcat'] ) ? $new_instance['show_wp_subcat']    :   'off';
            $instance['highlight_curr_cat'] =   isset( $new_instance['highlight_curr_cat'] ) ? $new_instance['highlight_curr_cat']    :   'off';
            $instance['show_collapse']      =   isset( $new_instance['show_collapse'] ) ? $new_instance['show_collapse'] : 'off';
            return $instance;
        }
    }
}