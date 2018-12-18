<?php

/**
 * Home
 */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/price', 'CommerceController@index')->name('welcome2');

Route::get('/search', 'SearchController@index');

Route::get('/news', 'HomeController@news')->name('news');

/**
 * Institutions
 */
Route::group(['prefix' => '/institutions/{institutionType}'], function() {

    /**
     * Real-time dropdown search
     */
    Route::get('/search', 'InstitutionsController@rtSearch');

    Route::get('', 'InstitutionsController@index')->name('institutions.index');
    Route::get('/infinite-scroll', 'InstitutionsController@infiniteScroll');

    Route::get('/{institution}', 'InstitutionsController@show')->name('institutions.show');
});

/**
 * Specialties
 */

Route::group(['namespace' => 'Specialty'], function () {

    /**
     * Specialty Direction Groups
     */

    Route::get('/specialties/directions/{direction}', 'SpecialtyDirectionsController@show')->name('specialties.directions.show');
    Route::get('/specialties/{institutionType}/directions', 'SpecialtyDirectionsController@index')->name('specialties.directions.index');

    /**
     * Specialties
     */
    Route::get('/specialties/{specialty}', 'SpecialtiesController@show')->name('specialties.show');

    Route::get('/specialties', 'SpecialtiesController@index')->name('specialties.index');

    /**
     * Specialty Institutions
     */

    Route::get('/{institutionType}-specialties/{specialty}', 'SpecialtyInstitutionsController@index')
        ->name('specialties.institutions.index');

});

/**
 * UNT
 */

Route::get('/ent', 'UNTController@index')->name('ent');

Route::get('/testent', function () {
    return view('UNT.testent');
});

/**
 * Subjects
 */

Route::get('/subjects/{subject}', 'SubjectsController@show')->name('subjects.show');

/**
 * Articles
 */

Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/articles/custom/{slug}', 'ArticlesController@showCustom')->name('articles.custom.show');


/**
 * Professions
 */

Route::group(['namespace' => 'Profession'], function () {

    Route::get('/professions/categories', function () {
        return view('professions.categories');
    });

    Route::get('/professions/categories/{category}', 'ProfessionsController@index')->name('professions.index');
    Route::get('/professions/{profession}', 'ProfessionsController@show')->name('professions.show');

    Route::get('/professions/lists/{list}', 'ProfessionListsController@show')->name('professions.lists.show');

});


/**
 * Feedback
 */

Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');
