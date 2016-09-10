<?php

class Gravity_Form_Handler {


	public function hooks() {

		add_filter( 'gform_pre_render', array( $this, 'ww_add_input_class' ) );

		add_filter( 'gform_submit_button', array( $this, 'ww_submit_button' ), 10, 2 );

		add_filter( 'gform_next_button', array( $this, 'ww_next_button' ), 10, 2 );

		add_filter( 'gform_previous_button', array( $this, 'ww_previous_button' ), 10, 2 );

		// add_filter( 'gform_field_choice_markup_pre_render', array( $this, 'ww_choice_markup' ), 10, 4 );

	}

	public function ww_add_input_class( $form ) {
		foreach( $form['fields'] as &$field ) {
			$class = 'input ';
			$field['size'] .= ' ' . $class;
		}

		return $form;
	}

	public function ww_submit_button( $button, $form ) {
		$button = "<div class='medium primary btn'>" . $button . '</div>';

		return $button;
	}

	public function ww_next_button( $button, $form ) {
		$button = "<div class='medium default btn'>" . $button . '</div>';

		return $button;
	}

	public function ww_previous_button( $button, $form ) {
		$button = "<div class='medium default btn'>" . $button . '</div>';

		return $button;
	}

	public function ww_choice_markup( $choice_markup, $choice, $field, $value ) {
		// dd($field);
		if( $field->get_input_type() == 'radio' ) {
			return "<li class='gchoice_{$field['formId']}_{$field['id']} field'><label class='radio' for='radio'><input name='radio' id='radio1' value='' type='radio'><span><i class='icon-dot'></i></span>Radio Button</label></li>";
		}
	}



}