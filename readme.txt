=== Swap Short URL IDN ===
Plugin Name: Swap Short URL IDN
Plugin URI:  https://github.com/idkisdc/SwapShortURL-IDN
Description: Compatibility with Internationalized Domain Names (IDN)
Version:     1.00 b
Author:      idkisdc - http://0by.Cc/

THIS PLUGIN REQUIRES YOURLS 1.5.1-beta AT LEAST.
ONLY WORKS WITH "YOURLS SWAP SHORT URL" PLUGIN. IF MAIN URL IS ALSO AN IDN WILL STILL NEED "YOURLS IDN"

This is a clone os Ozh's plugin to provide IDN support to YOURLS_SHORT_URL instead of YOURLS_SITE for the Swap Short Yourls Plugin both can be run in tandem if needed.
== Installation ==

* Create a directory named 'swapshorturl-idn/' into your 'user/plugins/' directory
* Upload all files contained in this archive into that newly created directory
* Head to your YOURLS admin area and the Plugins management page, then activate
  the Yourls Swap Short URL IDN plugin.
    
== Configuration ==

Before you activate the plugin, you must ensure that your config.php is correct.

The constant YOURLS_SHORT_URL must be set to your domain with ACE (Punnycode) notation.
It must not contain any UTF8 or funky character.

For instance, if your Short URL is:
      http://héhé.com
You must have:
      define('YOURLS_SHORT_URL', 'http://xn--hh-bjab.com');
	  
To convert from IDN to ACE (or Punnycode, the one that starts with xn--), you can
use a tool like http://www.idnstuff.com/ or http://mct.verisign-grs.com/or http://mct.verisign-grs.com/