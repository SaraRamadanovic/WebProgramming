<?php
require '../vendor/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=localhost:3306;dbname=iwp','root',''));

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /stars', function(){
    $cars = Flight::db()->query('SELECT * FROM stars', PDO::FETCH_ASSOC)->fetchAll();
    Flight::json($cars);
});

Flight::route('POST /stars', function(){
    $request = Flight::request()->data->getData();
    if (isset($request['id']) && $request['id'] !=''){
      $update = "UPDATE stars SET question = :question, answer_one = :answer_one, answer_two = :answer_two,
          answer_three = :answer_three, answer_four = :answer_four, answer_correct = :answer_correct WHERE id =:id";
      $stmt= Flight::db()->prepare($update);
      $stmt->execute($request);
      Flight::json(['message' => "Star ".$request['question']." has been updated successfully"]);
    }else{
      unset($request['id']);
      $insert = "INSERT INTO stars (question, answer_one, answer_two, answer_three, answer_four, answer_correct) VALUES(:question, :answer_one, :answer_two, :answer_three, :answer_four, :answer_correct)";
      $stmt= Flight::db()->prepare($insert);
      $stmt->execute($request);
      Flight::json(['message' => "Star ".$request['question']." has been added successfully"]);
    }
});

Flight::route('DELETE /stars/@id', function($id){
  $query = "DELETE FROM stars WHERE id = :id";
  $stmt= Flight::db()->prepare($query);
  $stmt->execute(['id' => $id]);
  Flight::json(['message' => "Star has been deleted successfully"]);
});



Flight::route('GET /stars/@id', function($id){
  $query = "SELECT * FROM stars WHERE id = :id";
  $stmt= Flight::db()->prepare($query);
  $stmt->execute(['id' => $id]);
  $star = $stmt->fetch(PDO::FETCH_ASSOC);
  Flight::json($star);
});


// ############################################################

Flight::route('GET /planets', function(){
    $cars = Flight::db()->query('SELECT * FROM planets', PDO::FETCH_ASSOC)->fetchAll();
    Flight::json($cars);
});

Flight::route('POST /planets', function(){
    $request = Flight::request()->data->getData();
    if (isset($request['id']) && $request['id'] !=''){
      $update = "UPDATE planets SET question = :question, answer_one = :answer_one, answer_two = :answer_two,
          answer_three = :answer_three, answer_four = :answer_four, answer_correct = :answer_correct WHERE id =:id";
      $stmt= Flight::db()->prepare($update);
      $stmt->execute($request);
      Flight::json(['message' => "Planet ".$request['question']." has been updated successfully"]);
    }else{
      unset($request['id']);
      $insert = "INSERT INTO planets (question, answer_one, answer_two, answer_three, answer_four, answer_correct) VALUES(:question, :answer_one, :answer_two, :answer_three, :answer_four, :answer_correct)";
      $stmt= Flight::db()->prepare($insert);
      $stmt->execute($request);
      Flight::json(['message' => "Planet ".$request['question']." has been added successfully"]);
    }
});

Flight::route('DELETE /planets/@id', function($id){
  $query = "DELETE FROM planets WHERE id = :id";
  $stmt= Flight::db()->prepare($query);
  $stmt->execute(['id' => $id]);
  Flight::json(['message' => "Planet has been deleted successfully"]);
});



Flight::route('GET /planets/@id', function($id){
  $query = "SELECT * FROM planets WHERE id = :id";
  $stmt= Flight::db()->prepare($query);
  $stmt->execute(['id' => $id]);
  $planet = $stmt->fetch(PDO::FETCH_ASSOC);
  Flight::json($planet);
});

// ####################################################

Flight::route('GET /cosmos', function(){
    $cars = Flight::db()->query('SELECT * FROM cosmos', PDO::FETCH_ASSOC)->fetchAll();
    Flight::json($cars);
});

Flight::route('POST /cosmos', function(){
    $request = Flight::request()->data->getData();
    if (isset($request['id']) && $request['id'] !=''){
      $update = "UPDATE cosmos SET question = :question, answer_one = :answer_one, answer_two = :answer_two,
          answer_three = :answer_three, answer_four = :answer_four, answer_correct = :answer_correct WHERE id =:id";
      $stmt= Flight::db()->prepare($update);
      $stmt->execute($request);
      Flight::json(['message' => "Cosmos ".$request['question']." has been updated successfully"]);
    }else{
      unset($request['id']);
      $insert = "INSERT INTO cosmos (question, answer_one, answer_two, answer_three, answer_four, answer_correct) VALUES(:question, :answer_one, :answer_two, :answer_three, :answer_four, :answer_correct)";
      $stmt= Flight::db()->prepare($insert);
      $stmt->execute($request);
      Flight::json(['message' => "Cosmos ".$request['question']." has been added successfully"]);
    }
});

Flight::route('DELETE /cosmos/@id', function($id){
  $query = "DELETE FROM cosmos WHERE id = :id";
  $stmt= Flight::db()->prepare($query);
  $stmt->execute(['id' => $id]);
  Flight::json(['message' => "Cosmos has been deleted successfully"]);
});



Flight::route('GET /cosmos/@id', function($id){
  $query = "SELECT * FROM cosmos WHERE id = :id";
  $stmt= Flight::db()->prepare($query);
  $stmt->execute(['id' => $id]);
  $cosmos = $stmt->fetch(PDO::FETCH_ASSOC);
  Flight::json($cosmos);
});

Flight::start();


?>
