<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('budgets','BudgetController');
Route::resource('user_data','UserDataController');
Route::resource('clubs','ClubController');
Route::resource('comments','CommentController');
Route::resource('document_category','DocumentCategoryController');
Route::resource('documents','DocumentController');
Route::resource('document_file','DocumentFileController');
Route::resource('document_step','DocumentStepController');
Route::resource('steps','StepController');
Route::resource('photos','PhotoController');
Route::resource('notifications','NotificationController');
Route::resource('organizations','OrganizationController');
Route::resource('organization_user','OrganizationUserController');
Route::resource('permissions','PermissionController');
Route::resource('permission_role','PermissionRoleController');
Route::resource('roles','RoleController');
Route::resource('role_user','RoleUserController');
Route::resource('users','UserController');
Route::resource('user_data','UserDataController');

Route::get('userByUsername/{username}', 'UserController@getByUsername');
