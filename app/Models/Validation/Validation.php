<?php 

namespace App\Models\Validation;

use \PDO;

class Validation
{
	protected $db;

	public function __construct(PDO $db)
	{
		$this->db = $db;
	}

	public function vaidateUserId($userId)
	{
		$userId = (int) $userId;

		if (is_int($userId)) 
		{
			$user = $this->db->prepare("
				SELECT 
					user.user_id
					FROM user
					WHERE user.user_id = :userId
			");

			$user->bindValue(":userId", $userId, PDO::PARAM_INT);
			$user->execute();

			return ($user->rowCount() === 1) ? true : false;
		} 

		return false;
	}
}

