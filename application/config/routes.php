<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "index";
$route['admin'] = "admin/index";
$route['404_override'] = '';

//////////////////////////////////////////////////////////////////
$route['admin/general/home'] = "admin/general/index/home";

$route['admin/general/ourTeam'] = "admin/general/index/ourTeam";
$route['admin/general/partnersContent'] = "admin/general/index/partnersContent";
$route['admin/general/aboutContent'] = "admin/general/index/aboutContent";
$route['admin/general/coursesContent'] = "admin/general/index/coursesContent";
$route['admin/general/packagesContent'] = "admin/general/index/packagesContent";
$route['admin/general/applyContent'] = "admin/general/index/applyContent";
$route['admin/general/galleryContent'] = "admin/general/index/galleryContent";
$route['admin/general/albumsContent'] = "admin/general/index/albumsContent";
$route['admin/general/videosContent'] = "admin/general/index/videosContent";
$route['admin/general/contactContent'] = "admin/general/index/contactContent";
$route['admin/general/feedbackContent'] = "admin/general/index/feedbackContent";
$route['admin/general/blogContent'] = "admin/general/index/blogContent";
$route['admin/general/newsContent'] = "admin/general/index/newsContent";
$route['admin/general/eventsContent'] = "admin/general/index/eventsContent";

$route['admin/tags/blog'] = "admin/tags/index/blog";

$route['admin/rssFeeds/page'] = "admin/rssFeeds/index";
$route['admin/rssFeeds/page/(:num)'] = "admin/rssFeeds/index/$1";

//Front end
$route['courses/(:num)'] = "courses/view/$1";
$route['courses/page'] = "courses/index";
$route['courses/page/(:num)'] = "courses/index/$1";
$route['courses/category/(:num)'] = "courses/index/category/$1";
$route['courses/category/(:num)/page'] = "courses/index/category/$1";
$route['courses/category/(:num)/page/(:num)'] = "courses/index/category/$1/$2";

//search courses
$route['courses/search/page'] = "courses/search";
$route['courses/search/page/(:num)'] = "courses/search/$1";
$route['courses/search/category/(:num)'] = "courses/search/category/$1";
$route['courses/search/category/(:num)/page'] = "courses/search/category/$1";
$route['courses/search/category/(:num)/page/(:num)'] = "courses/search/category/$1/$2";


$route['packages/(:num)'] = "packages/index/$1";
$route['gallery/(:any)/(:num)'] = "gallery/view/$1/$2";
$route['gallery/(:any)'] = "gallery/index/$1";

$route['blog/(:num)'] = "blog/view/$1";
$route['blog/page'] = "blog/index";
$route['blog/page/(:num)'] = "blog/index/$1";
$route['blog/t/(:num)'] = "blog/search/tag/$1";
$route['blog/t/(:num)/page'] = "blog/search/tag/$1";
$route['blog/t/(:num)/page/(:num)'] = "blog/search/tag/$1/$2";

$route['news/(:num)'] = "news/view/$1";
$route['news/page'] = "news/index";
$route['news/page/(:num)'] = "news/index/$1";

$route['events/(:num)'] = "events/view/$1";
$route['events/page'] = "events/index";
$route['events/page/(:num)'] = "events/index/$1";
/* End of file routes.php */
/* Location: ./application/config/routes.php */