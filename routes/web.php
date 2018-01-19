<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/git', function () {
    return view('welcome');
});

Route::get('{provider}/auth', [
    'uses' => 'SocialsController@auth',
    'as' => 'social.auth'

]);

Route::get('/{provider}/redirect', [
    'uses' => 'SocialsController@authCallback',
    'as' => 'social.callback',
]
);
 



Route::get('/forum', 'ForumsController@index')->name('forum');



Route::group(['middleware' => 'auth'],function(){
    
    Route::resource('channels','ChannelsController');

    Route::get('/discussions/create/new',[
            'uses' => 'DiscussionsController@create',
            'as' => 'discussions.create',
    ]);

    Route::post('/discussions/store',[
        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store',
    ]);

    Route::get('/discussions/edit/{id}',[
        'uses' => 'DiscussionsController@edit',
        'as' => 'discussions.edit',
    ]);

    Route::post('/discussions/update/{id}',[
        'uses' => 'DiscussionsController@update',
        'as' => 'discussions.update',
    ]);
    
    Route::post('discussion/reply/{id}',[
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply',

    ]);

    Route::get('reply/like/{replyId}',[
        'uses' => 'RepliesController@like',
        'as' => 'reply.like',
    ]);

    Route::get('reply/unlike/{replyId}',[
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike',
    ]);

    Route::get('replies/edit/{replyId}',[
        'uses' => 'RepliesController@edit',
        'as' => 'replies.edit',
    ]);

    Route::post('replies/update/{replyId}',[
        'uses' => 'RepliesController@update',
        'as' => 'replies.update',
    ]);

    Route::get('reply/mark-as-best/{replyId}',[
        'uses' => 'RepliesController@markAsBestAnwser',
        'as' => 'reply.mark_as_best',
    ]);

    Route::get('discussion/watch/{discussionId}',[
        'uses' => 'WatchersController@watch',
        'as' => 'discussion.watch',
    ]);

    Route::get('discussion/unwatch/{discussionId}',[
        'uses' => 'WatchersController@unwatch',
        'as' => 'discussion.unwatch',
    ]);

});


Route::get('channel/{slug}',[
    'uses' => 'ForumsController@channel',
    'as' => 'channel',
     
]);
 
Route::get('discussion/{slug}}',[
    'uses' => 'DiscussionsController@show',
    'as' => 'discussion',
]);




Auth::routes();