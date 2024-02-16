<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
// $route['tester'] = 'test/john';
$route['signup'] = 'SignupController/index';
$route['signup/register'] = 'SignupController/create_user';
$route['loginpage/login'] = 'LoginController/authenticate';
$route['login'] = 'LoginController/index';
$route['logout'] = 'LoginController/logout';

$route['dashboard'] = 'DashboardController/index';
$route['loginpage'] = 'LoginController/index';
$route['profile'] = 'ProfileController/index';
$route['profile/update'] = 'ProfileController/update_profile';

$route['profile/change_password'] = 'ProfileController/change_password';

$route['createstock'] = 'ProductController/index';
$route['viewstock'] = 'ViewStockController/index';
$route['createproduct'] = 'ProductController/create_product';

$route['viewallstaff'] = 'ViewStaffController/index';
$route['alldistributors'] = 'DistributorController/index';
$route['user/update_status'] =  'ViewStaffController/update_status';

$route['requestpage/show'] =  'RequestController/index'; //To show the stock request page 
$route['request/makerequest'] =  'RequestController/make_request'; //To make a new stock request
$route['requestpage/viewrequests'] =  'RequestController/viewrequests'; //shows all the available stock requests
$route['requestpage/myrequest'] =  'RequestController/distributorRequest'; //shows a list of requests made by the customer
$route['requestpage/request/details'] =  'RequestController/requestDetails'; //To see all the details of the request
$route['requestpage/response'] =  'RequestController/requestResponse'; //Staff clicks the reponse button to respond to a stock request
$route['requestpage/createresponse'] =  'RequestController/createResponse'; //staff response to request that will generate an invoice
$route['requestpage/viewresponse'] =  'RequestController/viewResponse'; //distributor sees the response of his reuest by the staff
$route['verify_transaction/(:any)'] = 'TransactionController/verifyTransaction/$1'; //redirects after a successful payment of stock


$route['addcategory'] = 'CategoryController/index';

$route['createcategory'] = 'CategoryController/create_category';






$route['translate_uri_dashes'] = FALSE;
