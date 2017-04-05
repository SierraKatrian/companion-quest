<?php

class RuleBook {
	public function getRuleBook() {
		$query= "SELECT * FROM rulebooks";
		$dbc = new Dbconnect();
		$db = $dbc->getDb('companionq');
		$pdostmt = $db->prepare($query);
		$pdostmt->execute();
		$data = $pdostmt->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function showRuleBook($input) {
		$selected="";
		foreach($input as $item) {
			if(isset($_GET['advanced-search-submit'])) {
				if (isset($_GET['gametheme'])) {
					$selected = $_GET['gametheme'];
				};
			}

			foreach ($input as $items) {

				$checked="";

				if ($selected == $items->name) {
					$checked="selected";
				} else {
					$checked="";
				}
				echo "<option value=\"".$items->name."\"".$checked.">".$items->name;

			}

		}
	}
}

 ?>