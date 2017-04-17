<?php

class Game
{
    private $userId;
    private $gameId;
    private $gameName;
    private $language;
    private $maxPlayers;
    private $status;
    private $rulebook;
    private $userName;
    
     public function setId($value) {
        $this->user_id = $value;
    }
    
    public function getId() {
        return $this->user_id;
    }

    public function setName($value) {
        $this->game_name = $value;
    }

    public function getName() {
        return $this->game_name;
    }

    public function setLanguage($value) {
        $this->lang = $value;
    }

    public function getLanguage() {
        return $this->lang;
    }

	public function setPlayers($value) {
        $this->max_players = $value;
    }
    
    public function getPlayers() {
        return $this->max_players;
    }

	public function setRulebook($value) {
        $this->name = $value;
    }

    public function getRulebook() {
        return $this->name;
    }
    
    public function setStatus($value) {
        $this->game_status = $value;
    }

    public function getStatus() {
        return $this->game_status;
    }
    
     public function setGm($value) {
        $this->user_name = $value;
    }
    
    public function getGm() {
        return $this->user_name;
    }
    
     public function setGameId($value) {
        $this->id = $value;
    }
    
    public function getGameId() {
        return $this->id;
    }
    
    public function setPermission($value) {
        $this->permission = $value;
    }
    
    public function getPermission() {
        return $this->permission;
    }
    
}