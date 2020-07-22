<?php

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/guideline', 'Frontend\PagesController@paper_submission_guideline')->name('paper_submission_guideline');
Route::get('/about-us', 'Frontend\PagesController@about_us')->name('about_us');
Route::get('/contact-us', 'Frontend\PagesController@contact_us')->name('contact_us');
Route::get('/article-processing-charge', 'Frontend\PagesController@apc')->name('apc');
Route::get('/open-access-policy', 'Frontend\PagesController@open_access')->name('open_access');
Route::get('/terms-and-condition', 'Frontend\PagesController@terms_condition')->name('terms_condition');
Route::get('/privacy-policy', 'Frontend\PagesController@privacy_policy')->name('privacy_policy');
Route::get('/refund-policy', 'Frontend\PagesController@refund_policy')->name('refund_policy');

//========================== Feedback ======================================
Route::get('user-feedback', 'Frontend\UserFeedbackController@create')->name('create.feedback');
Route::post('user-feedback-store', 'Frontend\UserFeedbackController@store')->name('store.feedback');

Route::get('/information-for-authors', 'Frontend\PagesController@authors')->name('authors');
Route::get('/information-for-editors', 'Frontend\PagesController@editors')->name('editors');
Route::get('/faq', 'Frontend\PagesController@faq')->name('faq');
Route::get('/aim-and-scope', 'Frontend\PagesController@aim_and_scope')->name('aim_and_scope');

Route::get('/article/{url}', 'Frontend\PagesController@single_article')->name('single_article');
Route::any('/search-article', 'Frontend\PagesController@article_search_result')->name('article_search_result');

Route::get('/announcements', 'Frontend\PagesController@announcements')->name('news_announcements');
Route::get('/announcements/{id}', 'Frontend\PagesController@single_announcement')->name('single_announcement');
Route::get('/testimonials', 'Frontend\PagesController@testimonials')->name('testimonials');

Auth::routes();

//======================================== Registration route==================================
Route::get('author/register', 'Author\AuthorRegisterController@index')->name('authorregister');
Route::get('author/login', 'Author\AuthorRegisterController@login')->name('authorlogin');
Route::get('author/registration/verification', 'Auth\RegisterController@authormailverification')->name('authormailverification');
Route::get('author-registration-verification-done/{token}/{id}', 'Auth\RegisterController@authormailverificationdone')->name('authormailverificationdone');
Route::resource('registration', 'Author\AuthorRegisterController');

//======================================== Admin route==================================
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // ======================= Email Send ========================
    Route::resource('email-excel', 'EmailExcelController');
    Route::get('email-excel-sent','EmailExcelController@sent')->name('sentmail');
    Route::post('email-excel-send','EmailExcelController@send')->name('send');
    Route::get('email-excel-resend','EmailExcelController@resend')->name('resend');
    Route::get('email-excel-truncate','EmailExcelController@truncate')->name('truncate');

    //===================== Paypal ==========================
    Route::get('show-payment-paypal', 'ShowpaymentController@showpayment')->name('showpayment');
    Route::put('publish/{id}', 'ShowpaymentController@publish')->name('publish');
    Route::put('unpublish/{id}', 'ShowpaymentController@unpublish')->name('unpublish');

    //===================== Bank ============================
    Route::get('show-payment-bank', 'ShowpaymentController@bankpayment')->name('bankpayment');
    Route::put('bank-publish/{id}', 'ShowpaymentController@bankpublish')->name('bankpublish');
    Route::put('bank-unpublish/{id}', 'ShowpaymentController@bankunpublish')->name('bankunpublish');
    Route::put('bank-payment-ok/{id}', 'ShowpaymentController@bankpaymentok')->name('bankpaymentok');
    Route::put('bank-payment-not-ok/{id}', 'ShowpaymentController@bankpaymentnotok')->name('bankpaymentnotok');

    //===================== Stripe =================================
    Route::get('show-payment-stripe', 'ShowpaymentController@stripepayment')->name('stripepayment');
    Route::put('stripe-publish/{id}', 'ShowpaymentController@spublish')->name('spublish');
    Route::put('stripe-unpublish/{id}', 'ShowpaymentController@sunpublish')->name('sunpublish');

    //========================================================================================

    Route::get('custom-payment-paypal', 'ShowpaymentController@custompayment')->name('custompayment');

    
    Route::resource('about-us', 'AboutController');
    Route::resource('faq', 'FaqController');
    Route::resource('apc', 'ArticleProcessingChargeController');
    Route::resource('category', 'CategoryController');

    Route::resource('terms', 'TermController');
    Route::resource('privacy', 'PrivacyController');
    Route::resource('openAccess', 'OpenAccessController');
    Route::resource('contact', 'ContactController');
    
    Route::resource('user-feedback', 'UserFeedbackController');
    Route::put('feedback-show/{id}', 'UserFeedbackController@feedback_show_admin')->name('feedback_show_admin');

    Route::resource('user-message', 'UserMessageController');
    Route::put('message-show/{id}', 'UserMessageController@message_show_admin')->name('message_show_admin');


    Route::resource('announcement', 'AnnouncementsController');
    Route::resource('submission-timer', 'SubmissionTimerController');

    Route::resource('editor-panel', 'EditorController');
    Route::resource('subscriber', 'SubscribeController');
    Route::resource('certifications', 'CertificationController');
    Route::resource('testimonial','TestimonialController');

    //From Author
    Route::resource('author-submission', 'SubmissionreceiveController');
    Route::get('author-submission-accepted', 'SubmissionreceiveController@accepted')->name('paperaccepted');
    Route::get('author-submission-reject', 'SubmissionreceiveController@reject')->name('paperreject');
    Route::get('author-submission-pending', 'SubmissionreceiveController@pending')->name('paperpending');
    Route::get('author-submission-paid', 'SubmissionreceiveController@paid')->name('paperpaid');
    Route::get('author-submission-published', 'SubmissionreceiveController@published')->name('paperpublished');
    Route::put('author-submission-approved/{id}', 'SubmissionreceiveController@approved')->name('approved');
    Route::put('author-submission-customaccept/{id}', 'SubmissionreceiveController@customaccept')->name('customaccept');
    Route::delete('author-submission-rejected/{id}', 'SubmissionreceiveController@rejected')->name('rejected');
    Route::resource('show-author', 'ShowuserController');
    Route::get('upload-agreement/{id}', 'SubmissionreceiveController@uploadagreement')->name('uploadagreement');
    Route::post('upload-now', 'SubmissionreceiveController@uploadnow')->name('uploadnow');
    Route::get('edit-agreement/{id}', 'SubmissionreceiveController@editagreement')->name('editagreement');
    Route::post('edit-now/{id}', 'SubmissionreceiveController@editnow')->name('editnow');

    Route::get('auto-published/{id}', 'SubmissionreceiveController@autoPublished')->name('autoPublished');
    Route::get('auto-unpublished/{id}', 'SubmissionreceiveController@autoUnpublished')->name('autoUnpublished');
});

//======================================== Author route==================================
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('submission-guideline', 'DashboardController@submission_guideline')->name('submission_guideline');
    Route::resource('profile', 'ProfileController');
    Route::resource('paper-submission', 'SubmitController');
    Route::get('paper-submission-rejected', 'SubmitController@reject')->name('paperreject');
    Route::get('paper-submission-pending', 'SubmitController@pending')->name('paperpending');
    Route::get('paper-submission-accepted', 'SubmitController@accepted')->name('paperaccepted');
    Route::get('paper-submission-paid', 'SubmitController@paid')->name('paperpaid');
    Route::get('paper-submission-published', 'SubmitController@published')->name('paperpublished');

    Route::get('upload-agreement/{id}', 'SubmitController@uploadagreement')->name('uploadagreement');
    Route::post('upload-now', 'SubmitController@uploadnow')->name('uploadnow');

    Route::any('cate_id_selector', 'SubmitController@cate_id_selector')->name('cate_id_selector');

    Route::post('pay-agreement', 'SubmitController@payagreement')->name('payagreement');
    Route::put('edit-pay-agreement', 'SubmitController@editpayagreement')->name('editpayagreement');
    //================ Paypal =====================
    Route::get('pay/{id}', 'PaymentController@pay')->name('pay');
    Route::get('custom-pay/{id}', 'PaymentController@custom_pay')->name('custom_pay');
    Route::post('pay-post', 'PaymentController@paypost')->name('paypost');

    //=================== Stripe ==================
    Route::post('authstripe', 'PaymentController@stripepost')->name('stripepost');
    //=================== Custom payment ==================
    Route::post('/stripe-custom-payment', 'PaymentController@stripe_custom')->name('stripe_custom');
    Route::post('/paypal-custom-payment', 'PaymentController@paypal_custom')->name('paypal_custom');
});

//========================== Social Authentication ======================================
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/collback', 'AuthController@handleProviderCallback');


//========================== Feedback ======================================
Route::get('user-feedback', 'Frontend\UserFeedbackController@create')->name('create.feedback');
Route::post('user-feedback-store', 'Frontend\UserFeedbackController@store')->name('store.feedback');
Route::post('contact-sent', 'Frontend\UserFeedbackController@contact_sent')->name('contact_sent');

Route::post('view_count_submit', 'Frontend\UserFeedbackController@view_count_submit');
Route::any('subscribe', 'Frontend\UserFeedbackController@subscribe')->name('subscribe');



