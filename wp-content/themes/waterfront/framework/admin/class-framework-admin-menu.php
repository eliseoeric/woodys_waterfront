<?php

class Framework_Admin_Menu {
	private $key = 'framework_options';

	private $metabox_id = 'framework_options_metabox';

	private $title = '';

	protected $options_page = '';

	protected $prefix = '_waterfront_';

	public function __construct()
	{
	    $this->title =  __('Waterfront Admin Settings', 'waterfront' );
	}

	public function init() {
		register_setting( $this->key, $this->key );
	}

	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Included CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	public function add_options_page_metabox() {
		// hook in the save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id' 			=> $this->metabox_id,
			'hookup' 		=> false,
			'cmb_styles' 	=> false,
			'show_on' 		=> array(
				// These are important, don't remove
				'key' => 'options-page',
				'value' =>	array( $this->key, )
			),
		) );

		// Set our CMB2 fields

		$cmb->add_field( array(
			'name' => __( 'Logo', 'waterfront' ),
			'desc'    => __( 'Upload an image or enter a URL', 'waterfront' ),
			'id'      => $this->prefix . 'logo',
			'type'    => 'file',
			// Optional:
			'options' => array(
				'url' => false, // Hide the text input for the url
				'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
			),
		) );

		$cmb->add_field( array(
			'name' => __( 'Frontpage Video URL', 'waterfront' ),
			'id'   => $this->prefix . 'video_url',
			'type' => 'text_url',
		) );

		$cmb->add_field( array(
			'name'    => __( 'GA ID', 'waterfront' ),
			'desc'    => __( 'Account ID for Google Analytics', 'waterfront' ),
			'id'      => $this->prefix . 'gaid',
			'type'    => 'text_small'
		) );

		$cmb->add_field( array(
			'name'    => __( 'Open Weather API Key', 'waterfront' ),
			'desc'    => __( 'API key used for Open Weather', 'waterfront' ),
			'id'      => $this->prefix . 'open_weather_api_key',
			'type'    => 'text'
		) );

//		$cmb->add_field( array(
//			'name' => __( 'Number of Footer Columns', 'waterfront' ),
//			'desc' => __( 'How Many', 'waterfront' ),
//			'id' => 'test_text',
//			'type' => 'text',
//			'default' => 'Default Text',
//		) );
	}

	public function settings_notices( $object_id, $updated ) {
		if( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'waterfront' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	public function __get( $field ) {
		// Allowed fields to retreive
		if( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}
}