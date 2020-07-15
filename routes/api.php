<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('budgets','BudgetController');
Route::resource('clubs','ClubController');
Route::resource('comments','CommentController');
Route::resource('document_categories','DocumentCategoryController');
Route::resource('documents','DocumentController');
Route::resource('attach_files','AttachFileController');
Route::resource('document_steps','DocumentStepController');
Route::resource('category_steps','CategoryStepController');
Route::resource('steps','StepController');
Route::resource('photos','PhotoController');
Route::resource('notifications','NotificationController');
Route::resource('organizations','OrganizationController');
Route::resource('organization_users','OrganizationUserController');
Route::resource('users','UserController');
Route::resource('user_data','UserDataController');

Route::get('user/{username}', 'UserController@getByUsername');
Route::get('organ_user/{user_id}', 'OrganizationUserController@getWithName');
Route::get('documentByOwnerId/{owner_id}', 'DocumentController@getDocumentListsByOwnerId');
Route::get('/getLecturer', 'UserDataController@getLecturer');

Route::post('file','DocumentController@uploadFile');



