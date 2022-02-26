<?php 
namespace ElementsKit_Lite\Modules\Controls;

defined( 'ABSPATH' ) || exit;

class Widget_Area_Utils{

	function init(){
		add_action('elementor/editor/after_enqueue_styles', array( $this, 'modal_content' ) );

		add_action( 'wp_ajax_ekit_widgetarea_content', [ $this, 'ekit_widgetarea_content' ] );
		add_action( 'wp_ajax_nopriv_ekit_widgetarea_content', [ $this, 'ekit_widgetarea_content' ] );
	}

	public function ekit_widgetarea_content() {
		if ( !wp_verify_nonce($_POST['nonce'], 'ekit_pro') ) wp_die();

		$post_id = intval( $_POST[ 'post_id' ] );
		
		if ( isset( $post_id ) ) {
			$elementor = \Elementor\Plugin::instance();
			echo str_replace( '#elementor', '', \ElementsKit_Lite\Utils::render_tab_content( $elementor->frontend->get_builder_content_for_display( $post_id ), $post_id ) );
		} else {
			echo esc_html__( 'Click here to add content.', 'elementskit-lite' );
		}
		
		wp_die();
	}

	public function modal_content() { 
		ob_start(); ?>
		<div class="widgetarea_iframe_modal">
			<?php include 'widget-area-modal.php'; ?>
		</div>
		<?php
			$output = ob_get_contents();
			ob_end_clean();
	
			echo \ElementsKit_Lite\Utils::render($output);
	}

	public static function parse($content, $widget_key, $index = 1, $isAjax = ''){
		$key = ($content == '') ? $widget_key : $content;
		$extract_key = explode('***', $key);
		$extract_key = $extract_key[0];
		ob_start(); ?>

		<div class="widgetarea_warper widgetarea_warper_editable" data-elementskit-widgetarea-key="<?php echo esc_attr($extract_key); ?>"  data-elementskit-widgetarea-index="<?php echo esc_attr($index); ?>">
			<div class="widgetarea_warper_edit" data-elementskit-widgetarea-key="<?php echo esc_attr($extract_key); ?>" data-elementskit-widgetarea-index="<?php echo esc_attr($index); ?>">
				<i class="eicon-edit" aria-hidden="true"></i>
				<span class="elementor-screen-only"><?php esc_html_e('Edit', 'elementskit-lite'); ?></span>
			</div>

			<?php
 				$builder_post_title = 'dynamic-content-widget-' . $extract_key . '-' . $index;
				$builder_post = get_page_by_title($builder_post_title, OBJECT, 'elementskit_content');
				$elementor = \Elementor\Plugin::instance();

				if ( $isAjax === 'yes' ) {
					$post_id = isset( $builder_post->ID ) ? $builder_post->ID : '';
					echo '<div class="elementor-widget-container" data-ajax-post-id="'. $post_id .'"></div>';
				} else {
				?>
					<div class="elementor-widget-container">
						<?php
							if ( isset( $builder_post->ID ) ) {
								echo str_replace('#elementor', '', \ElementsKit_Lite\Utils::render_tab_content($elementor->frontend->get_builder_content_for_display( $builder_post->ID ), $builder_post->ID)); 
							} else {
								echo esc_html__('Click here to add content.', 'elementskit-lite');
							}
						?>
					</div>
				<?php
				}
			?>
		</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}