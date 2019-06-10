<?php

//return the welcome page
Route::get('/', function () {
    return view('welcome');
});

//return the home page
Route::get('/home', 'HomeController@index');

//Authentication (login,register,...) routes
Auth::routes();

//USER ROUTES
Route::group(['prefix'=>'stud','middleware'=>'auth'], function(){
//playexam routes:
    Route::get('/exams', 'User\ExamController@exams');
    Route::get('/exam/{id}', 'User\ExamController@showexam');
    Route::post('/exam/showresult', 'User\ExamController@showresult');
//myExam routes:
    Route::get('/my_exams', 'User\ExamController@MyExams');
    Route::post('/delete_userexam', 'User\ExamController@DelUserExams');
//Profile routes:
    Route::get('/profile', 'User\ExamController@Profile');
    Route::post('/update_profile', 'User\ExamController@UpdateProfile');

});

//ADMIN ROUTES
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
//manage exams routes:
    Route::get('/manage_users', 'Admin\ManageController@AllUsers');
    Route::get('/edit_user/{uid}', 'Admin\ManageController@EditUser');
    Route::post('/update_user', 'Admin\ManageController@UpdateUser');
    Route::post('/delete_user/{uid}', 'Admin\ManageController@DelUsers');
//manage exams routes:
    Route::get('/manage_exams', 'Admin\ManageController@AllExams');
    Route::post('/add_exam', 'Admin\ManageController@AddExams');
    Route::get('/edit_exam/{eid}', 'Admin\ManageController@EditExam');
    Route::post('/update_exam', 'Admin\ManageController@UpdateExam');
    Route::post('/delete_exam/{eid}', 'Admin\ManageController@DelExams');
//manage questions routes:
    Route::get('/manage_questions', 'Admin\ManageController@SelQuestExam');
    Route::get('/manage_questions/{eid}', 'Admin\ManageController@AllQuestions');
    Route::post('/add_question', 'Admin\ManageController@AddQuestions');
    Route::post('/delete_question/{qid}/exam/{eid}', 'Admin\ManageController@DelQuestion');
    Route::get('/edit_question/{qid}/exam/{eid}', 'Admin\ManageController@Editquestion');
    Route::post('/update_question', 'Admin\ManageController@UpdateQuestion');
});