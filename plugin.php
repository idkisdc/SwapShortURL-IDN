<?php
/*
Plugin Name: Swap Short URL IDN
Plugin URI: https://github.com/idkisdc/SwapShortURL-IDN
Description: Provides Swap Short URL plugin Compatibility with Internationalized Domain Names (IDN)
Version:     1.00 a
Author: idkisdc
Author URI: http://0by.Cc/

Thanks to contributors of the Issue #331 and to Bruno Kerouanton for their input and help
See http://code.google.com/p/yourls/issues/detail?id=331

This is a clone os Ozh's plugin to provide IDN support to YOURLS_SHORT_URL instead of YOURLS_SITE for the Swap Short Yourls Plugin
*/

// Load & instantiate the IDN library
yourls_add_action( 'plugins_loaded', 'zcc_ssuidn_load' );
function zcc_ssuidn_load() {
	require_once ( dirname( __FILE__ ).'/IDNA3.php' );
	$idn = Net_IDNA3::getInstance();
	$idn->setParams( 'utf8', true );
	define( 'YOURLS_SHORT_IDN', $idn->decode( YOURLS_SHORT_URL ) ); // eg http://héhé.net
}

// For the display
yourls_add_filter( 'table_add_row', 'zcc_ssuidn_ace2idn' );
yourls_add_filter( 'table_edit_row', 'zcc_ssuidn_ace2idn' );
yourls_add_filter( 'html_title', 'zcc_ssuidn_ace2idn' );
yourls_add_filter( 'html_link', 'zcc_ssuidn_ace2idn' );
yourls_add_filter( 'bookmarklet_jsonp', 'zcc_ssuidn_ace2idn' );
function zcc_ssuidn_ace2idn( $text ) {
	if( strpos( $text, YOURLS_SHORT_URL ) !== false ) {
		$text = str_replace( YOURLS_SHORT_URL, YOURLS_SHORT_IDN, $text );
	}
	return $text;
}

// For the Share Box
yourls_add_filter( 'share_box_data', 'zcc_ssuidn_sharebox' );
function zcc_ssuidn_sharebox( $in ) {
	$in['share'] = zcc_ssuidn_ace2idn( $in['share'] );
	$in['shorturl'] = zcc_ssuidn_ace2idn( $in['shorturl'] );
	return $in;
}
