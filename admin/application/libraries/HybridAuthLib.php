<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/third_party/hybridauth/Hybrid/Auth.php';

class HybridAuthLib extends Hybrid_Auth
{
	function __construct($config = array())
	{
		$ci =& get_instance();
		$ci->load->helper('url_helper');

		$config['base_url'] = site_url((config_item('index_page') == '' ? SELF : '').$config['base_url']);
<<<<<<< HEAD
		$config['base_url'] = site_url('index.php/personalityquiz/endpoint');
=======
>>>>>>> fcf8922906a9eb74ba6715850cefceae8e8e8f28

		parent::__construct($config);

		log_message('debug', 'HybridAuthLib Class Initalized');
	}

	/**
	 * @deprecated
	 */
	public static function serviceEnabled($service)
	{
		return self::providerEnabled($service);
	}

	public static function providerEnabled($provider)
	{
		return isset(parent::$config['providers'][$provider]) && parent::$config['providers'][$provider]['enabled'];
	}
	
	/* added by dedirome */
	function get_session_data()
	{
		return Hybrid_Auth::getSessionData();
	}
	
	function get_access_token()
	{
		return Hybrid_Provider_Adapter::getAccessToken();
	}
	
	function get_connected_providers()
	{
		return Hybrid_Auth::getConnectedProviders();
	}
	
	function logout_provider()
	{
		return Hybrid_Auth::logoutAllProviders();
	}
	/* end added */
}

/* End of file HybridAuthLib.php */
/* Location: ./application/libraries/HybridAuthLib.php */