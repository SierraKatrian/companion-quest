<?php

class Avatar {
	private $userID;
	private $imgurl;
	private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

	public function setuserID() {
		if(!empty($_SESSION)) {
			$this->userID = $_SESSION['user']['id'];
		}
	}

	public function getAvatar() {
		$query="SELECT a.id,a.image_url FROM avatars a JOIN users u ON a.user_id = u.id WHERE u.id=:userId";
		$pdostmt =  $this->db->prepare($query);
		$pdostmt->bindValue(':userId', $this->userID, PDO::PARAM_STR);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll();
		return $data;
		
	}
	
	public function setUrl($imgurl) {
		$this->imgurl = $imgurl;
	}

	public function insertAvatar() {
		$query = "INSERT INTO avatars(user_id, image_url, displayed) VALUES (:userId, :imgUrl, 0)";
		$pdostmt =  $this->db->prepare($query);
		$pdostmt->bindValue(':userId', $this->userID);
		$pdostmt->bindValue(':imgUrl', $this->imgurl);
		$pdostmt->execute();
	}

	public function updateDisplayed($input) {
		$query="UPDATE avatars
				SET displayed = 0
				WHERE displayed = 1;";
		$pdostmt =  $this->db->prepare($query);
		$pdostmt->execute();

		$query2 = "UPDATE avatars
					SET displayed = 1
					WHERE id = :Id";
		$pdostmt2 =  $this->db->prepare($query2);
		$pdostmt2->bindValue(':Id', $input);
		$pdostmt2->execute();
	}

	public function getUserIcon() {
		$query ="SELECT image_url FROM avatars WHERE user_id=:userId AND displayed=1;";
		$pdostmt =  $this->db->prepare($query);
		$pdostmt->bindValue(':userId',$this->userID);
		$pdostmt->execute();
		$data = $pdostmt->fetch();
		return $data;
	}
}	

?>