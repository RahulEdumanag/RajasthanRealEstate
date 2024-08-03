<?php

use App\Http\Controllers\Backend\Admin\ImageController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

// Clear Cache route
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return response()->json(['status' => 'success']);
});

// Delete routes
Route::delete('backups/delete/{file_name}', 'BackupController@delete');
Route::delete('/admin/user/{id}', 'UserController@destroy')->name('admin.user.destroy');
 
// Resources routes
Route::resources([
    'adminMenu' => 'AdminMenuController',
    'adminMenuAllotment' => 'AdminMenuAllotmentController',
    'announcement' => 'AnnouncementController',
    'covid' => 'CovidController',
    'blog' => 'BlogController',
    'clientMaster' => 'ClientMasterController',
    'clients' => 'ClientsController',
    'contacts' => 'ContactsController',

     'dashboard' => 'DashboardController',
    'empRegistration' => 'EmpRegistrationController',
    'error' => 'ErrorController',
    'errorsView' => 'ErrorViewController',
    'event' => 'EventController',
    'facility' => 'FacilityController',
    'faq' => 'FaqController',
    'gallery' => 'GalleryController',
    'galleryCategory' => 'GalleryCategoryController',
    'healthCheckup' => 'HealthCheckupController',
    'login' => 'LoginController',
    'loginPower' => 'LoginPowerController',
    'menu' => 'MenuController',
    'page' => 'PageController',
    'pageCategory' => 'PageCategoryController',
    'package' => 'PackageController',
    'registration' => 'RegistrationController',
    'service' => 'ServiceController',
    'slider' => 'SliderController',
    'horoscope' => 'HoroscopeController',
    'social' => 'SocialController',
    'submenu' => 'SubMenuController',
    'team' => 'TeamController',
    'testimonial' => 'TestimonialController',
    'user' => 'UserController',
    'usefulLink' => 'UsefulLinkController',
    'webInfo' => 'WebInfoController',
    'websiteHelp' => 'WebsiteHelpController',
    'personalinfo' => 'PersonalinfoController',
    'plancategory' => 'PlanCategoryController',
    'plan' => 'PlanController',
    'productcategory' => 'ProductCategoryController',
    'product' => 'ProductController',
    'newsletter' => 'NewsletterController',
    'settings' => 'SettingController',
    'setting' => 'SettingController',
    'master' => 'MasterController',
    'submaster' => 'SubMasterController',
    'contactCategory' => 'ContactCategoryController',
    'enquirie' => 'EnquirieController',
    'metaTags' => 'MetaTagsController',
    'imgsize' => 'ImgsizeController',
    'counselling' => 'CounsellingController',
    'expiryPeriod' => 'ExpiryPeriodController',
    'state' => 'StateController',
    'city' => 'CityController',
    'property' => 'PropertyController',
    'propertyType' => 'PropertyTypeController',
    'propertyFeatures' => 'PropertyFeaturesController',
    'area' => 'AreaController',
    'propertyListing' => 'PropertyListingController',
]);
Route::post('/admin/slider/updateOrder', 'SliderController@updateOrder')->name('admin.slider.updateOrder');

// Active and Inactive Status get routes
$controllers = [
    'LoginPowerController' => 'loginPower',
    'GalleryCategoryController' => 'galleryCategory',
    'ServiceController' => 'service',
    'HealthCheckupController' => 'healthCheckup',
    'AdminMenuController' => 'adminMenu',
    'AdminMenuAllotmentController' => 'adminMenuAllotment',
    'EventController' => 'event',
    'FaqController' => 'faq',
    'AnnouncementController' => 'announcement',
    'RegistrationController' => 'registration',
    'EmpRegistrationController' => 'empRegistration',
    'TeamController' => 'team',
    'PackageController' => 'package',
    'FacilityController' => 'facility',
    'GalleryController' => 'gallery',
    'PageCategoryController' => 'pageCategory',
    'PageController' => 'page',
    'MenuController' => 'menu',
    'SubMenuController' => 'submenu',
    'TestimonialController' => 'testimonial',
    'SliderController' => 'slider',
    'HoroscopeController' => 'horoscope',
    'UsefulLinkController' => 'usefulLink',
    'UserController' => 'user',
    'SocialController' => 'social',
    'ClientsController' => 'clients',
    'WebsiteHelpController' => 'websiteHelp',
    'ClientMasterController' => 'clientMaster',
    'WebInfoController' => 'webInfo',
    'ContactsController' => 'contacts',

     'ErrorViewController' => 'errorsView',
    'AdminController' => 'profile',
    'PersonalinfoController' => 'personalinfo',
    'PlanCategoryController' => 'plancategory',
    'PlanController' => 'plan',
    'ProductCategoryController' => 'productcategory',
    'ProductController' => 'product',
    'NewsletterController' => 'newsletter',
    'SettingController' => 'settings',

    'MasterController' => 'master',
    'SubMasterController' => 'submaster',
    'ImgsizeController' => 'imgsize',
    'DashboardController' => 'home',
    'EnquirieController' => 'enquirie',
    'ContactCategoryController' => 'contactCategory',
    'MetaTagsController' => 'metaTags',
    'ImgsizeController' => 'imgsize',
    'CounsellingController' => 'counselling',
    'ExpiryPeriodController' => 'expiryPeriod',
    'StateController' => 'state',
    'CityController' => 'city',
    'PropertyController' => 'property',
    'PropertyTypeController' => 'propertyType',
    'PropertyFeaturesController' => 'propertyFeatures',
    'AreaController' => 'area',
    'PropertyListingController' => 'propertyListing',
];

// Active and Inactive Status get routes
foreach ($controllers as $controller => $uriSegment) {
    Route::get("/$uriSegment/active/{id}", "$controller@active");
    Route::get("/$uriSegment/inactive/{id}", "$controller@inactive");
}

// Others get routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'AdminController@profile')->name('profile');

// Post routes
Route::post('admin/images/upload', [ImageController::class, 'upload'])->name('admin.images.upload');

// Post session routes
Route::post('/set-session-variable', function () {
    $selectedValue = request('selectedValue');

    if ($selectedValue == 1) {
        session()->forget('selectedValue');
    } else {
        session(['selectedValue' => $selectedValue]);
    }

    return response()->json(['status' => 'success']);
});
Route::get('/admin/propertyListing/{propertyId}', 'PropertyListingController@show')->name('admin.propertyListing.show');

// Test routes

//   Route::resource('empRegistration', 'EmpRegistrationController')->parameters([
//       'empRegistration' => 'hashedId',
//   ]);

// Route::resource('slider', 'SliderController')->parameters([
//     'slider' => 'hashedId',
// ]);

// Inactive Status get routes
// Route::get('/loginPower/inactive/{id}', 'LoginPowerController@inactive');
// Route::get('/guest/inactive/{id}', 'GuestController@inactive');
// Route::get('/rooms/inactive/{id}', 'RoomsController@inactive');
// Route::get('/galleryCategory/inactive/{id}', 'GalleryCategoryController@inactive');
// Route::get('/service/inactive/{id}', 'ServiceController@inactive');
// Route::get('/healthCheckup/inactive/{id}', 'HealthCheckupController@inactive');
// Route::get('/adminMenu/inactive/{id}', 'AdminMenuController@inactive');
// Route::get('/adminMenuAllotment/inactive/{id}', 'AdminMenuAllotmentController@inactive');
// Route::get('/event/inactive/{id}', 'EventController@inactive');
// Route::get('/faq/inactive/{id}', 'FaqController@inactive');
// Route::get('/announcement/inactive/{id}', 'AnnouncementController@inactive');
// Route::get('/registration/inactive/{id}', 'RegistrationController@inactive');
// Route::get('/empRegistration/inactive/{id}', 'EmpRegistrationController@inactive');
// Route::get('/team/inactive/{id}', 'TeamController@inactive');
// Route::get('/package/inactive/{id}', 'PackageController@inactive');
// Route::get('/facility/inactive/{id}', 'FacilityController@inactive');
// Route::get('/gallery/inactive/{id}', 'GalleryController@inactive');
// Route::get('/pageCategory/inactive/{id}', 'PageCategoryController@inactive');
// Route::get('/page/inactive/{id}', 'PageController@inactive');
// Route::get('/menu/inactive/{id}', 'MenuController@inactive');
// Route::get('/submenu/inactive/{id}', 'SubMenuController@inactive');
// Route::get('/errorsView/inactive/{id}', 'ErrorViewController@inactive');
// Route::get('/contact/inactive/{id}', 'ContactController@inactive');
// Route::get('/webInfo/inactive/{id}', 'WebInfoController@inactive');
// Route::get('/websiteHelp/inactive/{id}', 'WebsiteHelpController@inactive');
// Route::get('/clients/inactive/{id}', 'ClientsController@inactive');
// Route::get('/user/inactive/{id}', 'UserController@inactive');
// Route::get('/social/inactive/{id}', 'SocialController@inactive');
// Route::get('/slider/inactive/{id}', 'SliderController@inactive');
// Route::get('/testimonial/inactive/{id}', 'TestimonialController@inactive');
// Route::get('/usefulLink/inactive/{id}', 'UsefulLinkController@inactive');
// Route::get('/clientMaster/inactive/{id}', 'ClientMasterController@inactive');

// Active status routes
// Route::get('/loginPower/active/{id}', 'LoginPowerController@active');
// Route::get('/guest/active/{id}', 'GuestController@active');
// Route::get('/rooms/active/{id}', 'RoomsController@active');
// Route::get('/galleryCategory/active/{id}', 'GalleryCategoryController@active');
// Route::get('/service/active/{id}', 'ServiceController@active');
// Route::get('/healthCheckup/active/{id}', 'HealthCheckupController@active');
// Route::get('/adminMenu/active/{id}', 'AdminMenuController@active');
// Route::get('/adminMenuAllotment/active/{id}', 'AdminMenuAllotmentController@active');
// Route::get('/event/active/{id}', 'EventController@active');
// Route::get('/faq/active/{id}', 'FaqController@active');
// Route::get('/announcement/active/{id}', 'AnnouncementController@active');
// Route::get('/registration/active/{id}', 'RegistrationController@active');
// Route::get('/empRegistration/active/{id}', 'EmpRegistrationController@active');
// Route::get('/team/active/{id}', 'TeamController@active');
// Route::get('/package/active/{id}', 'PackageController@active');
// Route::get('/facility/active/{id}', 'FacilityController@active');
// Route::get('/gallery/active/{id}', 'GalleryController@active');
// Route::get('/pageCategory/active/{id}', 'PageCategoryController@active');
// Route::get('/page/active/{id}', 'PageController@active');
// Route::get('/menu/active/{id}', 'MenuController@active');
// Route::get('/submenu/active/{id}', 'SubMenuController@active');
// Route::get('/testimonial/active/{id}', 'TestimonialController@active');
// Route::get('/slider/active/{id}', 'SliderController@active');
// Route::get('/usefulLink/active/{id}', 'UsefulLinkController@active');
// Route::get('/user/active/{id}', 'UserController@active');
// Route::get('/social/active/{id}', 'SocialController@active');
// Route::get('/clients/active/{id}', 'ClientsController@active');
// Route::get('/websiteHelp/active/{id}', 'WebsiteHelpController@active');
// Route::get('/clientMaster/active/{id}', 'ClientMasterController@active');
// Route::get('/webInfo/active/{id}', 'WebInfoController@active');
// Route::get('/contact/active/{id}', 'ContactController@active');
// Route::get('/errorsView/active/{id}', 'ErrorViewController@active');
