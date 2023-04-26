<?php

require_once('api/api.php');

require_once __DIR__.'/router.php';

#region ROUTES APPLICATION

  // Accueil
  get('/', 'views/index.php');

  // Routes axes
  get('/axe/$id', 'views/axe.php');

  // Routes entreprises
  get('/company/$id', 'views/company.php');
  post('/company/$id', 'views/company.php');

#endregion


#region ROUTES API
get('/api/test', function(){
  $api = new API();
  echo $api->test();
});

get('/api/axes', function(){
  $api = new API();
  echo $api->axes();
});

get('/api/axe/$id', function($id){
  $api = new API();
  echo $api->axe($id);
});

get('/api/companies', function(){
  $api = new API();
  echo $api->companies();
});

get('/api/company/$id', function($id){
  $api = new API();
  echo $api->company($id);
});


#endregion

  // 404 Not Found
  any('/404','views/404.php');
