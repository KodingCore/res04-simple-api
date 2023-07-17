<?php
        

class UserManager extends AbstractManager {

   public function getAllUsers() : array {
      $query = $this->db->prepare('SELECT * FROM users');
      $query->execute();
      $users = $query->fetchAll(PDO::FETCH_ASSOC);
      $usersTab = [];
		foreach($users as $user) {
         $userInstance = new User(
            $user['first_name'],
            $user['last_name'],
            $user['email']
         );
         $userInstance->setId($user['id']);
			array_push($usersTab,$user);
		}
		return $usersTab;
   }
   public function getUserById(int $id) : User {
		$query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		$userInstance = new User(
         $user['first_name'],
         $user['last_name'],
         $user['email']
      );
      $userInstance->setId($user['id']);
      return $userInstance;
	}
   public function getUserByEmail(string $email) : User {
		$query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
		$parameters = [
			'email' => $email
		];
		$query->execute($parameters);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		$userInstance = new User(
         $user['first_name'],
         $user['last_name'],
         $user['email']
      );
      $userInstance->setId($user['id']);
      return $userInstance;
	}
   public function insertUser(User $user) : User {
      $query = $this->db->prepare('
			INSERT INTO users (first_name, last_name, email)
			VALUES (:firstname, :lastname, :email)
		');
		$parameters = [
			'firstname' => $user->getFirstName(),
			'lastname' => $user->getLastName(),
			'email' => $user->getEmail()
		];
		$query->execute($parameters);

      $user = $this->getUserByEmail($user->getEmail());
      return $user;
   }
   public function editUser(User $user) {
		$query = $this->db->prepare('
			UPDATE users
			SET first_name = :firstname,
			last_name = :lastname,
			email = :email
			WHERE id = :id
		');
		$parameters = [
			'firstname' => $user->getFirstName(),
			'lastname' => $user->getLastName(),
			'email' => $user->getEmail(),
			'id' => $user->getId()
		];
		$query->execute($parameters);
	}
   public function deleteUser(User $user) : void {
      $query = $this->db->prepare('
         DELETE FROM users
         WHERE users.id = :id
      ');
      $parameters = [
         'id' => $user->getId()
      ];
      $query->execute($parameters);
   }
}