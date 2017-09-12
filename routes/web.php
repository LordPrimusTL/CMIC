<?php
Route::get('/','UtilityController@index')->name('home');
Route::get('/login','UtilityController@login')->name('login');
Route::get('/logout','UtilityController@logout')->name('logout');
Route::get('/register','UtilityController@register')->name('register');
Route::get('/contact','UtilityController@contact')->name('contact');
Route::get('/about','UtilityController@about')->name('about');
Route::get('/listings','UtilityController@listings')->name('listings');
Route::get('/accountAct,{id}','UtilityController@accountActivation')->name('accAct');

Route::get('market','UserController@market')->name('user_market');
Route::get('market/view','UserController@marketView')->name('market_view');


//Validation Routes(Post)
Route::post('/login','ValidationController@login');
Route::post('/register','ValidationController@register');


Route::get('/file/get/{filename}','ValidationController@getFile')->name('file');
Route::get('/file/download/{filename}','ValidationController@DFile')->name('download');

Route::get('/user/news/view/{id}','UserController@news_view')->name('user_news_view');


//User Routes
Route::group(['prefix' => '/user/','middleware' => ['auth','UserAuth']],function ()
{

    Route::get('dashboard','UserController@dashboard')->name('user_dashboard');
    Route::get('investments','UserController@investments')->name('user_investment');
    Route::get('profile','UserController@profile')->name('user_profile');

    Route::get('cryptocurrency','UserController@crypto')->name('user_crypto');
    Route::get('investments','UserController@Invest')->name('invest');
    Route::get('investments/register/{id}','UserController@fInvestReg')->name('f_invest_reg');
    Route::get('investments/local','UserController@lInvest')->name('l_invest');
    Route::get('finance','UserController@finance')->name('fin_reg');
    Route::get('market/add','UserController@marketAdd')->name('market_add');
    Route::get('market/product/edit/{id}',['uses' => 'UserController@marketEdit'])->name('market_edit');
    Route::get('market/product/delete/{id}','UserController@marketDelete')->name('market_delete');
    Route::get('market/product/contact/{id}','UserController@marketContact')->name('market_contact');

    //User News

    Route::get('news','UserController@news')->name('user_news');
    //Finance
    Route::get('finance','UserController@finance')->name('user_finance');
    Route::get('finance/loans','UserController@loans')->name('user_loans');
    Route::get('finance/transactions','UserController@trans')->name('user_trans');
    Route::get('finance/earnings','UserController@earn')->name('user_earn');
    Route::get('finance/earnings/{id}','UserController@earn_id')->name('user_earn_id');

    //Deals
    Route::get('deals','UserController@deals')->name('user_deals');
    Route::get('deals/apply/{id}','UserController@dealsReg')->name('d_reg');

    //awards
    Route::get('awards','UserController@awards')->name('user_awards');

    //ICJL
    Route::get('international-contract-jobs','UserController@icj')->name('user_icj');


    //Validations
    Route::post('investments/register/{id}','ValidationController@AllReg')->name('invest_reg');
    Route::post('market/product/view','ValidationController@marketView')->name('market_view_post');
    Route::post('market/product/add','ValidationController@marketAdd')->name('market_add_post');
    Route::post('market/product/edit/{id}',['uses' => 'ValidationController@marketEdit'])->name('market_edit');
    Route::post('market/product/search','ValidationController@marketSearch')->name('market_search');
    Route::post('profile/edit','ValidationController@profileEdit')->name('user_profile_edit');
    Route::post('deals/register/{id}','ValidationController@dealsReg')->name('d_reg_post');


});

Route::group(['prefix' => '/admin/','middleware' => ['auth','AdminAuth']], function ()
{
    Route::get('dashboard','AdminController@dashboard')->name('admin_dash');
    Route::get('admin','AdminController@admin')->name('admin_admin');
    Route::get('admin/delete/{id}','AdminController@admin_delete')->name('admin_delete');

    //User
    Route::get('user/delete/{id}','AdminController@user_delete')->name('admin_user_delete');
    Route::get('user/view/{id}','AdminController@user_view')->name('admin_user_view');


    //Categories
    Route::get('categories','AdminController@cat')->name('admin_cat');
    Route::get('categories/delete/{id}','AdminController@cat_delete')->name('admin_cat_delete');

    //News
    Route::get('news','AdminController@news')->name('admin_news');
    Route::get('news/delete/{id}','AdminController@news_delete')->name('admin_news_delete');

    //Investment
    Route::get('investment/','AdminController@invest')->name('admin_inv');
    Route::get('investment/add','AdminController@invest_add')->name('admin_inv_add');
    Route::get('investment/edit/{id}','AdminController@invest_edit')->name('admin_inv_edit');
    Route::get('investment/tutorials/{id}','AdminController@invest_tut')->name('admin_inv_tut');
    Route::get('investment/tutorials/delete/{id}','AdminController@delete_tut')->name('admin_tut_delete');
    Route::get('investment/{id}/check-application','AdminController@invest_cr')->name('admin_inv_cr');
    Route::get('investment/delete/{id}','AdminController@invest_delete')->name('admin_inv_delete');



    //Investors
    Route::get('investors','Admincontroller@invs')->name('admin_invs');
    Route::get('investors/auth/{id}','Admincontroller@invs_auth')->name('admin_invs_auth');

    //Awards
    Route::get('awards','AdminController@awards')->name('admin_awards');
    Route::get('awards/suspended/{id}/{val}','AdminController@awards_sus')->name('admin_award_sus');
    Route::get('awards/delete/{id}','AdminController@awards_del')->name('admin_award_del');
    Route::get('awards/winner/{id}','AdminController@awards_win')->name('admin_award_add_winnner');
    Route::get('awards/winner/delete/{id}','AdminController@awards_win_del')->name('admin_award_wdel');


    //Deals
    Route::get('deals','AdminController@deals')->name('admin_deals');
    Route::get('deals/delete/{id}','AdminController@deals_del')->name('admin_deals_del');
    Route::get('deal/{id}/check-application','AdminController@deal_cr')->name('admin_d_cr');
    Route::get('deal_app','AdminController@dealApp')->name('admin_deals_app');
    Route::get('deal/auth/{id}','adminController@dealAuth')->name('admin_deal_auth');
    Route::get('deal/decline/{id}','adminController@dealDecline')->name('deal_decline');
    Route::get('deal/comp/{id}','adminController@dealCompleted')->name('deal_comp');


    //Transactions
    Route::get('transactions','AdminController@trans')->name('admin_trans');


    //Earnings
    Route::get('earnings','AdminController@earn')->name('admin_earn');
    Route::get('earnings/{id}','AdminController@earn_id')->name('admin_earn_id');

    //Errors
    Route::get('errors/','AdminController@error')->name('admin_errors');
    Route::get('errors/update/{id}','AdminController@errorEdit')->name('admin_error_edit');

    //Status
    Route::get('status/','AdminController@status')->name('admin_stat');
    Route::get('status/delete','AdminController@status_del')->name('admin_stat_delete');
    Route::get('status/add','AdminController@status')->name('admin_stat_add');


    //Market
    Route::get('market','AdminController@market')->name('admin_market');
    Route::get('market/delete/{id}','AdminController@market_del')->name('admin_market_delete');


    //Validations
    Route::post('investment/add','ValidationController@inv_add')->name('admin_inv_add');
    Route::post('investment/edit/{id}','ValidationController@invest_edit')->name('admin_inv_edit');
    Route::post('investment/local/edit/{id}','ValidationController@l_invest_edit')->name('admin_linv_edit');
    Route::post('investment/cyrptocurrency/edit/{id}','ValidationController@crypto_edit')->name('admin_crypto_edit');
    Route::post('user/upgrade/{id}','ValidationController@user_upgrade')->name('admin_user_upgrade');
    Route::post('investment/tutorials/{id}','ValidationController@invest_tut')->name('admin_inv_tut');
    Route::post('admin','ValidationController@addAdmin')->name('admin_admin');
    Route::post('news/add','ValidationController@news_add')->name('admin_news_add');
    Route::post('categories/add','ValidationController@cat_add')->name('admin_cat_add');
    Route::post('earnings/add','ValidationController@earn_add')->name('admin_earn_add');
    Route::post('awards/add','ValidationController@awards_add')->name('admin_awards_add');
    Route::post('deals/add','ValidationController@deals_add')->name('admin_deals_add');
    Route::post('awards/winner/add/{id}','ValidationController@awards_win_wadd')->name('admin_awards_wadd');




    //Search
    Route::post('user/search','ValidationController@userSearch')->name('admin_user_search');
    Route::post('news/search','ValidationController@newsSearch')->name('admin_news_search');
    Route::post('investment/search','ValidationController@invSearch')->name('admin_inv_search');
    Route::post('investors/search','ValidationController@invsSearch')->name('admin_invs_search');
    Route::post('transactions/search','ValidationController@transSearch')->name('admin_trans_search');
    Route::post('earnings/search','ValidationController@earnSearch')->name('admin_earn_search');
    Route::post('awards/search','ValidationController@awardSearch')->name('admin_award_search');
    Route::post('awards/deals','ValidationController@dealSearch')->name('admin_deal_search');

    //







});


Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/reg/delete/{id}','ValidationController@regDelete')->name('reg_delete');
});


Route::post('investment/search','ValidationController@dinvSearch')->name('inv_search');

