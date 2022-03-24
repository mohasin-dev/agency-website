<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes(['register' => false, 'confirm' => false, 'verify' => false]);

// Routes for frontend
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/news', [App\Http\Controllers\Frontend\PageController::class, 'news'])->name('news');
Route::get('/event', [App\Http\Controllers\Frontend\PageController::class, 'event'])->name('event');
Route::get('/blog', [App\Http\Controllers\Frontend\PageController::class, 'blog'])->name('blog');
Route::get('/staff', [App\Http\Controllers\Frontend\PageController::class, 'staff'])->name('staff');
Route::get('/overseas-job', [App\Http\Controllers\Frontend\PageController::class, 'overseasJob'])->name('overseas.job');
Route::get('/overseas-job/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'overseasJobDetails'])->name('overseas.job.details');
Route::get('/hazz-package', [App\Http\Controllers\Frontend\PageController::class, 'hazzPackage'])->name('hazz.package');
Route::get('/hazz-package/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'hazzPackageDetails'])->name('hazz.package.details');
Route::get('/tour-package', [App\Http\Controllers\Frontend\PageController::class, 'TourPackage'])->name('tour.package');
Route::get('/tour-package/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'TourPackageDetails'])->name('tour.package.details');
Route::get('/gamca', [App\Http\Controllers\Frontend\PageController::class, 'gamca'])->name('gamca');
Route::get('/gamca/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'gamcaDetails'])->name('gamca.details');
Route::get('/org-contact', [App\Http\Controllers\Frontend\PageController::class, 'orgContact'])->name('org.contact');
Route::get('/org-contact/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'orgContactDetails'])->name('org.contact.details');
Route::get('/news/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'newsDetails'])->name('news.details');
Route::get('/event/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'eventDetails'])->name('event.details');
Route::get('/blog/details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'blogDetails'])->name('blog.details');
Route::get('/project/{id}/{type}', [App\Http\Controllers\Frontend\PageController::class, 'project'])->name('project');
Route::get('/project-details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'projectDetails'])->name('project.details');
Route::get('/land-owner', [App\Http\Controllers\Frontend\PageController::class, 'landOwner'])->name('land.owner');
Route::get('/client-requirements', [App\Http\Controllers\Frontend\PageController::class, 'clientRequirements'])->name('client.requirements');
Route::get('/contact-us', [App\Http\Controllers\Frontend\PageController::class, 'contactUs'])->name('contact.us');
Route::get('/about-us/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'aboutUs'])->name('about.us');
Route::get('/career', [App\Http\Controllers\Frontend\PageController::class, 'career'])->name('career');
Route::get('/career-details/{id}/{title}', [App\Http\Controllers\Frontend\PageController::class, 'careerDetails'])->name('career.details');
Route::post('/contact-us', [App\Http\Controllers\Frontend\PageController::class, 'storeContactUs'])->name('contact.us.store');
Route::post('/client-requirements', [App\Http\Controllers\Frontend\PageController::class, 'storeClientRequirement'])->name('client.requirement.store');
Route::post('/land-owner', [App\Http\Controllers\Frontend\PageController::class, 'storelandOwner'])->name('land.owner.store');
Route::get('/photo-gallery', [App\Http\Controllers\Frontend\PageController::class, 'photoGallery'])->name('photo.gallery');
Route::get('/agent', [App\Http\Controllers\Frontend\PageController::class, 'agent'])->name('agent');
Route::post('/agent', [App\Http\Controllers\Frontend\PageController::class, 'storeAgent'])->name('agent.store');
Route::get('/labar-diary', [App\Http\Controllers\Frontend\PageController::class, 'labarDiary'])->name('labar.diary');
// Country Routes
Route::get('/country/details/{id}', [App\Http\Controllers\Frontend\PageController::class, 'countryDetails'])->name('country.details');

// Routes for backend
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Backend\UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\Backend\UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/change-password', [App\Http\Controllers\Backend\ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/password/update', [App\Http\Controllers\Backend\ChangePasswordController::class, 'update'])->name('password.update');

    Route::resource('user', App\Http\Controllers\Backend\UserController::class);
    Route::resource('blog', App\Http\Controllers\Backend\BlogController::class);
    Route::resource('news', App\Http\Controllers\Backend\NewsController::class);
    Route::resource('testimonial', App\Http\Controllers\Backend\TestimonialController::class);
    Route::resource('career', App\Http\Controllers\Backend\CareerController::class);
    Route::resource('about', App\Http\Controllers\Backend\AboutUsController::class);
    Route::resource('slider', App\Http\Controllers\Backend\SliderController::class);
    Route::resource('setting', App\Http\Controllers\Backend\SettingController::class);
    Route::resource('photo-gallery', App\Http\Controllers\Backend\PhotoGalleryController::class);
    Route::resource('staff', App\Http\Controllers\Backend\StaffController::class);
    Route::resource('labar-diary', App\Http\Controllers\Backend\LabarDiaryController::class);
    Route::resource('country', App\Http\Controllers\Backend\CountryController::class);
    Route::resource('overseas-job', App\Http\Controllers\Backend\OverseasJobController::class);
    Route::resource('hazz-package', App\Http\Controllers\Backend\HazzPackageController::class);
    Route::resource('ticketing', App\Http\Controllers\Backend\TicketingController::class);
    Route::resource('gamca', App\Http\Controllers\Backend\GamcaController::class);
    Route::resource('org-contact', App\Http\Controllers\Backend\OrgContactController::class);

    Route::get('contact-us/status-update/{contact}', [App\Http\Controllers\Backend\ContactUsController::class, 'updateStatus'])->name('contact.us.status.update');
    Route::get('contact-us', [App\Http\Controllers\Backend\ContactusController::class, 'index'])->name('contact.us.index');
    Route::get('agent', [App\Http\Controllers\Backend\AgentController::class, 'index'])->name('agent.index');
    Route::get('agent/status-update/{agent}', [App\Http\Controllers\Backend\AgentController::class, 'updateStatus'])->name('agent.status.update');

    Route::post('blog/file-upload', [App\Http\Controllers\Backend\BlogController::class, 'fileUpload'])->name('blog.file.Upload');
    Route::post('news/file-upload', [App\Http\Controllers\Backend\NewsController::class, 'fileUpload'])->name('news.file.Upload');
    Route::post('about/file-upload', [App\Http\Controllers\Backend\AboutUsController::class, 'fileUpload'])->name('about.file.Upload');
    Route::post('overseas-job/file-upload', [App\Http\Controllers\Backend\OverseasJobController::class, 'fileUpload'])->name('overseas.job.file.Upload');
    Route::post('hazz-package/file-upload', [App\Http\Controllers\Backend\HazzPackageController::class, 'fileUpload'])->name('hazz.package.file.Upload');
    Route::post('ticketing/file-upload', [App\Http\Controllers\Backend\TicketingController::class, 'fileUpload'])->name('ticketing.file.Upload');
    Route::post('gamca/file-upload', [App\Http\Controllers\Backend\GamcaController::class, 'fileUpload'])->name('gamca.file.Upload');
    Route::post('org-contact/file-upload', [App\Http\Controllers\Backend\OrgContactController::class, 'fileUpload'])->name('org.contact.file.Upload');
});

// Add Section Routes

Route::get('/details', function () {
    return view('detailpage');
});
