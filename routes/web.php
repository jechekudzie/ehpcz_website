<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Practitioner\PaymentsController;
use App\Http\Controllers\Practitioner\PractitionerApplicationsController;
use App\Http\Controllers\Practitioner\PractitionerContactController;
use App\Http\Controllers\Practitioner\PractitionerEmploymentController;
use App\Http\Controllers\Practitioner\PractitionerProfessionQualificationController;
use App\Http\Controllers\Practitioner\PractitionerProfessionRegisterController;
use App\Http\Controllers\Practitioner\PractitionersController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Practitioner\PractitionerProfessionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your website application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});


Route::get('/work', function () {

    Artisan::call('queue:listen --daemon');

    return "STARTED!";

});

Route::get('/', function () {
    return view('website.pages.home');
});

Route::get('/about-ehpcz', function () {
    return view('website.pages.about-us');
});

Route::get('/organizational-structure', function () {
    return view('website.pages.organizational');
});

Route::get('/core-function', function () {
    return view('website.pages.core-functions');
});

Route::get('/education-training', function () {
    return view('website.pages.education-training');
});

Route::get('/role-of-ehpcz', function () {
    return view('website.pages.role-ehpcz');
});

Route::get('/ehpcz-membership', function () {
    return view('website.pages.ehpcz-membership');
});

Route::get('/ehpcz-committees', function () {
    return view('website.pages.ehpcz-committees');
});

Route::get('/contact-ehpcz', function () {
    return view('website.pages.contact-us');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/mail-contact', [WebsiteController::class, 'emailContactForm']);

/*
|--------------------------------------------------------------------------
| Practitioners Routes
|--------------------------------------------------------------------------
*/
Route::resource('/practitioners', 'Practitioner\PractitionersController');

//Now add practitioner employment(s)
Route::get('/practitioners/employment/{practitioner}/index', [PractitionerEmploymentController::class, 'index']);
Route::get('/practitioners/employment/{practitioner}/create', [PractitionerEmploymentController::class, 'create']);
Route::post('/practitioners/employment/{practitioner}/store', [PractitionerEmploymentController::class, 'store']);
Route::get('/practitioners/employment/{practitionerEmployment}/edit', [PractitionerEmploymentController::class, 'edit']);
Route::patch('/practitioners/employment/{practitionerEmployment}/update', [PractitionerEmploymentController::class, 'update']);
Route::delete('/practitioners/employment/{practitionerEmployment}/destroy', [PractitionerEmploymentController::class, 'destroy']);

//Now add practitioner contact(s)
Route::get('/practitioners/contact/{practitioner}/index', [PractitionerContactController::class, 'index']);
Route::get('/practitioners/contact/{practitioner}/create', [PractitionerContactController::class, 'create']);
Route::post('/practitioners/contact/{practitioner}/store', [PractitionerContactController::class, 'store']);
Route::get('/practitioners/contact/{practitionerContact}/edit', [PractitionerContactController::class, 'edit']);
Route::patch('/practitioners/contact/{practitionerContact}/update', [PractitionerContactController::class, 'update']);
Route::delete('/practitioners/contact/{practitionerContact}/destroy', [PractitionerContactController::class, 'destroy']);

//Now add practitioner profession(s)
Route::get('/practitioners/professions/{practitioner}/index', [PractitionerProfessionsController::class, 'index']);
Route::get('/practitioners/professions/{practitioner}/create', [PractitionerProfessionsController::class, 'create']);
Route::post('/practitioners/professions/{practitioner}/store', [PractitionerProfessionsController::class, 'store']);
Route::get('/practitioners/professions/{practitionerProfession}/show', [PractitionerProfessionsController::class, 'show']);
Route::get('/practitioners/professions/{practitionerProfession}/edit', [PractitionerProfessionsController::class, 'edit']);
Route::patch('/practitioners/professions/{practitionerProfession}/update', [PractitionerProfessionsController::class, 'update']);
Route::patch('/practitioners/professions/{practitionerProfession}/destroy', [PractitionerProfessionsController::class, 'update']);

//Now add Practitioner Profession Register Category
Route::get('/practitioners/profession_register_categories/{practitionerProfession}/index', [PractitionerProfessionRegisterController::class, 'index']);
Route::get('/practitioners/profession_register_categories/{practitionerProfession}/create', [PractitionerProfessionRegisterController::class, 'create']);
Route::post('/practitioners/profession_register_categories/{practitionerProfession}/store', [PractitionerProfessionRegisterController::class, 'store']);
Route::get('/practitioners/profession_register_categories/{practitionerProfessionRegister}/show', [PractitionerProfessionRegisterController::class, 'show']);
Route::get('/practitioners/profession_register_categories/{practitionerProfessionRegister}/edit', [PractitionerProfessionRegisterController::class, 'edit']);
Route::patch('/practitioners/profession_register_categories/{practitionerProfessionRegister}/update', [PractitionerProfessionRegisterController::class, 'update']);
Route::patch('/practitioners/profession_register_categories/{practitionerProfessionRegister}/destroy', [PractitionerProfessionRegisterController::class, 'update']);


//Now add profession qualifications
Route::post('/practitioners/qualifications/{practitionerProfession}/store', [PractitionerProfessionQualificationController::class, 'store']);

//Now add profession qualifications
Route::get('/practitioners/applications/{practitioner}/index', [PractitionerApplicationsController::class, 'index']);

//Applications
Route::get('/practitioners/applications/{practitionerApplication}/show', [PractitionerApplicationsController::class, 'show']);
Route::get('/practitioners/applications/{practitionerApplication}/renewal', [PractitionerApplicationsController::class, 'renewal']);

//payments
Route::get('/practitioners/applications/{practitionerApplication}/registration_checkout', [PaymentsController::class, 'registration_checkout']);
Route::post('/practitioners/applications/{practitionerApplication}/payment', [PaymentsController::class, 'payment']);
Route::get('/practitioners/applications/{practitionerApplication}/check_payment', [PaymentsController::class, 'check_payment']);
Route::get('/practitioners/payments/{practitioner}/index', [PaymentsController::class, 'index']);

Route::get('/practitioners/certificates/{id}', [PractitionersController::class, 'getPractitionerCertificate']);


Route::get('/message/create', [PractitionersController::class, 'message_create']);
Route::post('/message/store', [PractitionersController::class, 'message_store']);


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|Utilities Routes
|--------------------------------------------------------------------------
*/

//professional qualification
Route::get('/admin/get_pq/{profession_id}', 'Practitioner\DynamicDataController@professionalQualifications');

Route::get('/admin/get_pq/{profession_id}/{pq_id}', 'Practitioner\DynamicDataController@professionalQualificationsEdit');
//
Route::get('/admin/get_ai/{professional_qualification_id}', 'Practitioner\DynamicDataController@accreditedInstitutions');
Route::get('/admin/get_ai/{professional_qualification_id}/{accreInst_id}', 'Practitioner\DynamicDataController@accreditedInstitutionsEdit');

//requirement categories
Route::resource('/admin/requirement_categories', 'Admin\RequirementCategoriesController');
Route::resource('/admin/register_categories', 'Admin\RegisterCategoriesController');

//Requirements
Route::get('/admin/requirements/{requirementCategory}/index', 'Admin\RequirementsController@index');
Route::get('/admin/requirements/{requirementCategory}/create', 'Admin\RequirementsController@create');
Route::post('/admin/requirements/{requirementCategory}/store', 'Admin\RequirementsController@store');

/*
|--------------------------------------------------------------------------
| Application Categories and Requirements section
|--------------------------------------------------------------------------
*/
Route::resource('/admin/professions', 'Admin\ProfessionsController');
//Profession fees
Route::get('/admin/profession_fees/{profession}/index', 'Admin\ProfessionFeesController@index');
Route::get('/admin/profession_fees/{profession}/create', 'Admin\ProfessionFeesController@create');
Route::post('/admin/profession_fees/{profession}/store', 'Admin\ProfessionFeesController@store');
Route::get('/admin/profession_fees/{professionFee}/edit', 'Admin\ProfessionFeesController@edit');
Route::patch('/admin/profession_fees/{professionFee}/update', 'Admin\ProfessionFeesController@update');

//Profession fees
Route::get('/admin/profession_cpds/{profession}/index', 'Admin\ProfessionCpdController@index');
Route::get('/admin/profession_cpds/{profession}/create', 'Admin\ProfessionCpdController@create');
Route::post('/admin/profession_cpds/{profession}/store', 'Admin\ProfessionCpdController@store');
Route::get('/admin/profession_cpds/{professionCpd}/edit', 'Admin\ProfessionCpdController@edit');
Route::patch('/admin/profession_cpds/{professionCpd}/update', 'Admin\ProfessionCpdController@update');

//Profession requirements
Route::get('/admin/profession_requirements/{profession}/index', 'Admin\ProfessionRequirementsController@index');
Route::get('/admin/profession_requirements/{profession}/create', 'Admin\ProfessionRequirementsController@create');
Route::post('/admin/profession_requirements/{profession}/store', 'Admin\ProfessionRequirementsController@store');

//Register requirements requirements
Route::get('/admin/register_requirements/{registerCategory}/index', 'Admin\RegisterRequirementController@index');
Route::get('/admin/register_requirements/{registerCategory}/create', 'Admin\RegisterRequirementController@create');
Route::post('/admin/register_requirements/{registerCategory}/store', 'Admin\RegisterRequirementController@store');
Route::get('/admin/register_requirements/{registerRequirement}/show', 'Admin\RegisterRequirementController@show');
Route::post('/admin/register_requirements/{registerRequirement}/destroy', 'Admin\RegisterRequirementController@destroy');

//Register conditions
Route::get('/admin/register_conditions/{registerCategory}/index', 'Admin\RegisterConditionController@index');
Route::get('/admin/register_conditions/{registerCategory}/create', 'Admin\RegisterConditionController@create');
Route::post('/admin/register_conditions/{registerCategory}/store', 'Admin\RegisterConditionController@store');
Route::get('/admin/register_conditions/{registerCondition}/edit', 'Admin\RegisterConditionController@edit');
Route::post('/admin/register_conditions/{registerCondition}/update', 'Admin\RegisterConditionController@update');
Route::get('/admin/register_conditions/{registerCondition}/show', 'Admin\RegisterConditionController@show');
Route::post('/admin/register_conditions/{registerCondition}/destroy', 'Admin\RegisterConditionController@destroy');

/*
|--------------------------------------------------------------------------
| Qualifications and accreditation section
|--------------------------------------------------------------------------
*/
Route::resource('/admin/qualifications', 'Admin\QualificationsController');
Route::resource('/admin/institutions', 'Admin\InstitutionsController');
//accredited institutions
Route::get('/admin/accredited_institutions/{institution}/index', 'Admin\AccreditedInstitutionsController@index');
Route::get('/admin/accredited_institutions/{institution}/create', 'Admin\AccreditedInstitutionsController@create');
Route::post('/admin/accredited_institutions/{institution}/store', 'Admin\AccreditedInstitutionsController@store');

/*
|--------------------------------------------------------------------------
| Application Categories and Requirements section
|--------------------------------------------------------------------------
*/
//Application categories
Route::resource('/admin/application_categories', 'Admin\ApplicationCategoriesController');

//Applications
Route::get('/admin/applications/{applicationCategory}/index', 'Admin\ApplicationsController@index');
Route::get('/admin/applications/{applicationCategory}/create', 'Admin\ApplicationsController@create');
Route::post('/admin/applications/{applicationCategory}/store', 'Admin\ApplicationsController@store');
Route::get('/admin/applications/{application}/edit', 'Admin\ApplicationsController@edit');
Route::patch('/admin/applications/{application}/update', 'Admin\ApplicationsController@update');

//Application requirements
Route::get('/admin/application_requirements/{application}/index', 'Admin\ApplicationRequirementsController@index');
Route::get('/admin/application_requirements/{application}/create', 'Admin\ApplicationRequirementsController@create');
Route::post('/admin/application_requirements/{application}/store', 'Admin\ApplicationRequirementsController@store');
Route::get('/admin/application_requirements/{applicationRequirement}/edit', 'Admin\ApplicationRequirementsController@edit');
Route::patch('/admin/application_requirements/{applicationRequirement}/update', 'Admin\ApplicationRequirementsController@update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
