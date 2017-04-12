SELECT user_games.*, users.user_name, characters.name, roles.role_name FROM user_games
JOIN users ON user_games.user_id = users.id
JOIN characters ON characters.games_id = user_games.games_id
JOIN roles ON roles.roles_id = characters.roles_id
WHERE user_games.games_id = 3 AND characters.users_id = user_games.user_id
