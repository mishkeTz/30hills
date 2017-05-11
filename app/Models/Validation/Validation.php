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

		if (filter_var($userId, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1 ]])) 
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

