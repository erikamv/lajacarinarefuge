<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');
    Route::get('/users', 'Admin\UserController@getUsers');


    //ModuleUsers
    Route::get('/users/{status}', 'Admin\UserController@getUsers')->name('users');
    Route::get('/users/{id}/edit', 'Admin\UserController@getUsersEdit')->name("usersEdit");
    Route::post('/users/{id}/edit', 'Admin\UserController@postUsersEdit')->name("usersEdit");
    Route::get('/users/{id}/banned', 'Admin\UserController@getUsersBanned')->name("usersBanned");
    Route::get('/users/{id}/permissions', 'Admin\UserController@getUsersPermissions')->name("usersPermissions");
    Route::post('/users/{id}/permissions', 'Admin\UserController@postUsersPermissions')->name("usersPermissions");


    //ModuleProducts
    Route::get('/products/{status}', 'Admin\ProductController@getHome')->name('products');
    Route::get('/products/add', 'Admin\ProductController@getProductsAdd')->name('productsAdd');
    Route::post('/products/add', 'Admin\ProductController@postProducts')->name('productsAdd');
    Route::get('/products/{id}/edit', 'Admin\ProductController@getProductEdit')->name('productsEdit');
    Route::post('/products/{id}/edit', 'Admin\ProductController@productEdit')->name('productsEdit');
    //Route::get('/products/{id}/gallery/add', 'Admin\ProductController@productGalleryAdd');
    Route::post('/products/{id}/gallery/add', 'Admin\ProductController@productGalleryAdd')->name('productsGallery');
    Route::get('/products/{id}/{gid}/delete', 'Admin\ProductController@productGalleryDelete')->name('productsGallery');
    Route::get('/products/{id}/delete', 'Admin\ProductController@getProductDelete')->name('productsDelete');
    

    //ModuleCategories
    Route::get('/categories', 'Admin\CategoryController@getHome')->name('categories');
    Route::get('/categories/add', 'Admin\CategoryController@getCategoriesAdd')->name('categoriesAdd');
    Route::post('/categories/add', 'Admin\CategoryController@postCategory')->name('categoriesAdd');
    Route::get('/categories/{id}/edit', 'Admin\CategoryController@getCategoryEdit')->name('categoriesEdit');
    Route::post('/categories/{id}/edit', 'Admin\CategoryController@categoryEdit')->name('categoriesEdit');
    Route::get('/categories/modal-delete-{{id}}', 'Admin\CategoryController@getCategoryDelete')->name('categoriesDelete');
    //Route::post('/categories/#modal', 'Admin\CategoryController@getCategoryDelete');


    //ModuleAnimals
    Route::get('/animals', 'Admin\AnimalController@getHome')->name('animals');
    Route::get('/animals/add', 'Admin\AnimalController@getAnimalsAdd')->name('animalsAdd');
    Route::post('/animals/add', 'Admin\AnimalController@postAnimals')->name('animalsAdd');
    Route::get('/animals/{id}/edit', 'Admin\AnimalController@getAnimalEdit')->name('animalsEdit');
    Route::post('/animals/{id}/edit', 'Admin\AnimalController@animalEdit')->name('animalsEdit');
    Route::get('/animals/{id}/delete}', 'Admin\AnimalController@getAnimalDelete')->name('animalsDelete');

    //ModulePublications
    Route::get('/publications', 'Admin\PublicationController@getHome')->name('publications');
    Route::get('/publications/add', 'Admin\PublicationController@getPublicationsAdd')->name('publicationsAdd');
    Route::post('/publications/add', 'Admin\PublicationController@postPublication')->name('publicationsAdd');
    Route::get('/publications/{id}/edit', 'Admin\PublicationController@getPublicationEdit')->name('publicationsEdit');
    Route::post('/publications/{id}/edit', 'Admin\PublicationController@publicationEdit')->name('publicationsEdit');
    Route::get('/publications/modal-delete-{{id}}', 'Admin\PublicationController@getPublicationDelete')->name('publicationsDelete');
    //Route::post('/categories/#modal', 'Admin\CategoryController@getCategoryDelete');
    
    //ModuleSolicitudes
    
    //Voluntarios
    Route::get('/volunteers/{status}', 'VolunteersController@getVolunteerHome')->name('volunteer');
    Route::get('/volunteers/{id}/edit', 'VolunteersController@getVolunteerEdit')->name("volunteerEdit");
    Route::post('/volunteers/{id}/edit', 'VolunteersController@postVolunteerEdit')->name("volunteerEdit");
    Route::get('/volunteers/{id}/delete', 'VolunteersController@getVolunteerDelete')->name("volunteerDelete");
    Route::get('/volunteers/{id}/active', 'VolunteersController@getVolunteerActive')->name("volunteerActive");
    Route::post('/volunteers/{id}/active', 'VolunteersController@postVolunteerActive')->name("volunteerActive");

    //Adopciones
    Route::get('/adoptions/{status}', 'AdoptionController@getAdoptionHome')->name('adoption');
    Route::get('/adoptions/{id}/edit', 'AdoptionController@getAdoptionEdit')->name("adoptionEdit");
    Route::post('/adoptions/{id}/edit', 'AdoptionController@postAdoptionEdit')->name("adoptionEdit");
    Route::get('/adoptions/{id}/delete', 'AdoptionController@getAdoptionDelete')->name("adoptionDelete");
    Route::get('/adoptions/{id}/active', 'AdoptionController@getAdoptionActive')->name("adoptionActive");
    Route::post('/adoptions/{id}/active', 'AdoptionController@postAdoptionActive')->name("adoptionActive");

    //HogarTemporal
    Route::get('/homes/{status}', 'HomesController@getTemporalHome')->name('home');
    Route::get('/homes/{id}/edit', 'HomesController@getHomesEdit')->name("homeEdit");
    Route::post('/homes/{id}/edit', 'HomesController@postHomesEdit')->name("homeEdit");
    Route::get('/homes/{id}/delete', 'HomesController@getHomesDelete')->name("homeDelete");
    Route::get('/homes/{id}/active', 'HomesController@getHomesActive')->name("homeActive");
    Route::post('/homes/{id}/active', 'HomesController@postHomesActive')->name("homeActive");

    //Colaboradores
    Route::get('/collaborators/{status}', 'CollaboratorController@getCollaborator')->name('collaborator');
    Route::get('/collaborators/{id}/edit', 'CollaboratorController@getCollaboratorEdit')->name("collaboratorEdit");
    Route::post('/collaborators/{id}/edit', 'CollaboratorController@postCollaboratorEdit')->name("collaboratorEdit");
    Route::get('/collaborators/{id}/delete', 'CollaboratorController@getCollaboratorDelete')->name("collaboratorDelete");
    Route::get('/collaborators/{id}/active', 'CollaboratorController@getCollaboratorActive')->name("collaboratorActive");
    Route::post('/collaborators/{id}/active', 'CollaboratorController@postCollaboratorActive')->name("collaboratorActive");
/*
    //Padrinos
    Route::get('/homes/{status}', 'HomesController@getTemporalHome')->name('home');
    Route::get('/homes/{id}/edit', 'HomesController@getHomesEdit')->name("homeEdit");
    Route::post('/homes/{id}/edit', 'HomesController@postHomesEdit')->name("homeEdit");
    Route::get('/homes/{id}/delete', 'HomesController@getHomesDelete')->name("homeDelete");
    Route::get('/homes/{id}/active', 'HomesController@getHomesActive')->name("homeActive");
    Route::post('/homes/{id}/active', 'HomesController@postHomesActive')->name("homeActive");


    //Adopciones
    Route::get('/adoptions/{status}', 'AdoptionController@getAdoptionHome')->name('adoption');
    Route::get('/homes/{id}/edit', 'HomesController@getHomesEdit')->name("homeEdit");
    Route::post('/homes/{id}/edit', 'HomesController@postHomesEdit')->name("homeEdit");
    Route::get('/homes/{id}/delete', 'HomesController@getHomesDelete')->name("homeDelete");
    Route::get('/homes/{id}/active', 'HomesController@getHomesActive')->name("homeActive");
    Route::post('/homes/{id}/active', 'HomesController@postHomesActive')->name("homeActive");
   */    
});

?>