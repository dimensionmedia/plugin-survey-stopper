<?php

namespace Plugin_Survey_Stopper\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Plugin_Survey_Stopper\Admin\Plugins;

class Admin_Container {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct(){

		$plugins	= new Plugins();

	}

}