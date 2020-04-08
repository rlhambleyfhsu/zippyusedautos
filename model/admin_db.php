 <?php
function add_admin($username, $password) {
 global $db;
 $hash = password_hash($password, PASSWORD_DEFAULT);
 $query = 'INSERT INTO administrators (username, password)
           VALUES (:username, :password)';
 $statement = $db->prepare($query);
 $statement->bindValue(':username', $username);
 $statement->bindValue(':password', $hash);
 $statement->execute();
 $statement->closeCursor();
}
function check_username($username) {
 global $db;
 $query = 'SELECT * FROM administrators WHERE username = :username';
 $statement = $db->prepare($query);
 $statement->bindValue(':username', $username);
 $statement->execute();
 $test = $statement->fetch();
 $statement->closeCursor();
 if ($test) {
   return false;
 }
 else { return true;}
}
function is_valid_admin_login($username, $password) {
 global $db;
 $query = 'SELECT password FROM administrators
           WHERE username = :username';
 $statement = $db->prepare($query);
 $statement->bindValue(':username', $username);
 $statement->execute();
 $row = $statement->fetch();
 $statement->closeCursor();
 $hash='';
 if (!empty($row['password'])) {
   $hash = $row['password'];
 }
 return password_verify($password, $hash);
}
?>
