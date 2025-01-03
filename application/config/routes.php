<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'user';
$route['about'] = 'user/about';
$route['user'] = 'user/index';
$route['index'] = 'user/index';
$route['download'] = 'user/download';
$route['contactus'] = 'user/contactus';
$route['terms'] = 'user/terms';
$route['privacy'] = 'user/privacy';
$route['refund_policy'] = 'user/refund_policy';
$route['profile'] = 'user/profile';
$route['home'] = 'user/home';
$route['home/(:num)'] = 'user/home/$1';
$route['searchprofiles'] = 'user/searchprofiles';
$route['search_profile'] = 'user/search_profile';
$route['explore'] = 'user/explore';
$route['user_chat'] = 'user/user_chat';
$route['userchat/(:num)'] = 'user/userchat/$1';
$route['settings'] = 'user/settings';
$route['disabilityprofiles'] = 'user/disabilityprofiles';
$route['disabilityprofiles/(:num)'] = 'user/disabilityprofiles/$1';
$route['orphan_or_poor_profiles'] = 'user/orphan_or_poor_profiles';
$route['orphan_or_poor_profiles/(:num)'] ='user/orphan_or_poor_profiles/$1';
$route['help_support'] = 'user/help_support';
$route['feedback'] = 'user/feedback';
$route['upgradeto_premium'] = 'user/upgradeto_premium';
$route['upgradeto_premium/(:num)'] = 'user/upgradeto_premium/$1';
$route['change_password'] = 'user/change_password';
$route['view_allnotifications2'] = 'user/view_allnotifications2';
$route['congratulations'] = 'user/congratulations';
$route['singleprofile/(:num)'] = 'user/singleprofile/$1';
$route['payment_methods'] = 'user/payment_methods';
$route['search_profile_common'] = 'user/search_profile_common';
$route['search_profile_common/(:num)']='user/search_profile_common/$1';
$route['search_profile_advanced'] = 'user/search_profile_advanced';
$route['search_profile_id'] = 'user/search_profile_id';
$route['featured_profiles'] = 'user/featured_profiles';
$route['logout'] = 'user/logout';
$route['logn'] = 'user/logn';
// $route['muslim_matrimony'] = 'user/muslim_matrimony';
$route['apps_download'] = 'user/apps_list';
$route['apps_store'] = 'user/apps_store';


$route['muslim_matrimony'] = 'user/matrimony';

// Registration Steps
$route['registration_step1']='user/registration_step1';
$route['registration_steptwo']='user/registration_steptwo';
$route['registration_stepthree']='user/registration_stepthree';
$route['registration_stepfour']='user/registration_stepfour';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Landing Page Happynikah
// $route['landing'] = 'user/happynikah_landing';

// GotoNikah
$route['gotonikah'] = 'user/gotonikah';
$route['about_gotonikah'] = 'user/about_gotonikah';
$route['download_gotonikah'] = 'user/download_gotonikah';
$route['contactus_gotonikah'] = 'user/contactus_gotonikah';


// Landing Page Gotonikah
$route['gotonikah_landing'] = 'user/gotonikah_landing';



