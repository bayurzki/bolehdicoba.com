<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

// require_once( BASEPATH .'database/DB'. EXT );
// $db =& DB();
// $query = $db->get( 'news_post' );
// $result = $query->result();

$route['default_controller'] = 'webpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin';
$route['admin/component/(:any)/(:num)'] = 'admin/component/$1/$2';

$route['bdd-webinar-2021'] = 'webpage/event1';

$route['about'] = 'webpage/about';
$route['what-we-do'] = 'webpage/whatWeDo';
$route['links'] = 'webpage/linkttree';
$route['case-study'] = 'webpage/caseStudy';
$route['case-study/(:any)/(:any)/(:num)'] = 'post/getPost/$1/$3';


// foreach( $result as $row ){
// 	$route[$row->link] = 'frontend/porto_category/'.$row->id_porto_cat;
// }

$route['sitemap\.xml'] = 'sitemap';
$route['sitemap/pages\.xml'] = 'sitemap/pages';
$route['sitemap/news\.xml'] = 'sitemap/news';
$route['all-links'] = 'sitemap/all_link';

$route['news-and-update'] = 'webpage/newsAndUpdate';
$route['news-and-update/(:any)/(:any)/(:num)'] = 'post/getNews/$1/$3';
// $route['recently-news/(:any)/(:num)'] = 'post/getNews/$1/$3';
// $route['bite-size-knowledge/(:any)/(:num)'] = 'post/getNews/$1/$3';
// $route['digital-campaign/(:any)/(:num)'] = 'post/getNews/$1/$3';
