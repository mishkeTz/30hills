<?php 

namespace App\Controllers;

use App\Core\Controller;

class Home extends Controller
{
	/**
	 * Unose se podaci iz JSON fajla u bazu - POKRECE SE SAMO JEDNOM
	 */
	public function insertAllUsers()
	{
		$insertAllUsersModel = $this->model("Insert");

		$insertAllUsersModel->insertAllUsers();
	}

	/**
	 * home/users
	 * Prikazujemo sve korisnike
	 */
	public function users()
	{
		$userModel = $this->model("User");
		$users = $userModel->getAllUsers();

		$this->view('_template/_header');

		$this->view('home/users', [
			'users' => $users
		]);

		$this->view('_template/_footer');
	}

	/**
	 * Proveravamo da li postoji korisnik sa tim ID-em u bazi i da li je $userId INT
	 * Prikazujemo podatke o izabranom user-u
	 * @param  [int] $userId [ID user-a]
	 */
	public function user($userId = 1)
	{
		$validator = $this->validator();

		if (!$validator->vaidateUserId($userId))
		{
			$this->view('_template/_header');

			$this->view('error/404', [
				'errorMessage' => "User doesn't exist"
			]);

			$this->view('_template/_footer');
			die();
		}

		$userModel = $this->model("User");

		$user = $userModel->getUser($userId);
		$userFriends = $userModel->getUserFriends($userId);
		$friendsOfFriends = $userModel->getFriendsOfFriends($userId);

		$this->view('_template/_header');

		$this->view('home/user', [
			'user' => $user,
			'userFriends' => $userFriends,
			'friendsOfFriends' => $friendsOfFriends
		]);

		$this->view('_template/_footer');

	}
	
}


