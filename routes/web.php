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

Route::get('home', function () {
    return view('welcome');
});


Route::get('presentation', function () {
    return view('presentation');
});

Route::get('mot du president', function () {
    return view('mot_du_president');
});

Route::get('historique', function () {
    return view('historique');
});

Route::get('les organes', function () {
    return view('les_organes');
});

Route::get('partenaires', function () {
    return view('partenaires');
});

Route::get('contacts', function () {
    return view('contacts');
});

Route::get('education environnementale', function () {
    return view('edu_env');
});


Route::get('pepiniere d\'arbres et sylviculture', function () {
    return view('pepiniere');
});


Route::get('valorisation de la biodiversité', function () {
    return view('valorisation');
});


Route::get('rehabilitation et conservation des sols', function () {
    return view('conservation_sols');
});


Route::get('maraichage', function () {
    return view('maraichage');
});


Route::get('alphabetisation-gouvernance locale', function () {
    return view('gouvernance');
});


Route::get('rapports annuels', function () {
    return view('rapports_annuels');
});


Route::get('rapports de projet', function () {
    return view('rapports_projet');
});

Route::get('rapports de consultation', function () {
    return view('rapports_consultation');
});

Route::get('rapports de formation', function () {
    return view('rapports_formation');
});

Route::get('discours et intervention sur les medias', function () {
    return view('discours_medias');
});

Route::get('etudes et recherches', function () {
    return view('etudes_recherches');
});

Route::get('projets finis', function () {
    return view('projets_finis');
});

Route::get('projets en cours', function () {
    return view('projets_en_cours');
});

Route::get('projets prevus', function () {
    return view('projets_prevus');
});

Route::get('carte des sites d\'intervention', function () {
    return view('cartes_inter');
});

Route::get('actualites', function () {
    return view('actualites');
});

Route::get('agenda', function () {
    return view('agenda');
});

Route::get('bulletins trimestriels', function () {
    return view('bulletins_trimestriels');
});

Route::get('phototheque', function () {
    return view('phototheque');
});

Route::get('videotheque', function () {
    return view('videotheque');
});


Route::get('forum', function () {
    return view('forum');
});