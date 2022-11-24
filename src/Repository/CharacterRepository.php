<?php

namespace App\Repository;

use App\Model\Entity\Character;
use App\Repository\DB\DB;
use Yosymfony\Toml\Toml;
use PDO;

class CharacterRepository 
{
    private const CONFIG_PATH = '../config/config.toml';

    public function create(array $characterData): Character 
    {
        $this->saveDB($characterData);

        return new Character($characterData);
    }

    public function getAll()
    {
        $result = [];

        foreach ($this->getDB() as $charactersData) {
            $result[] = new Character($charactersData);
        }

        return $result;
    }

    public function getRandomCharacter()
    {
        $randomId = rand(1, 1574);

        $cfg = Toml::ParseFile(self::CONFIG_PATH);
        $db = new DB($cfg);
        $connection = $db->connectDB();

        $character = $connection->prepare('SELECT * FROM characters WHERE id=:id');
        $character->bindValue(':id', $randomId, PDO::PARAM_INT);
        $character->execute();

        $hero = new Character($character->fetch(PDO::FETCH_ASSOC));

        return $hero;
    }

    private function getDB() 
    {
        $cfg = Toml::ParseFile(self::CONFIG_PATH);
        $db = new DB($cfg);
        $connection = $db->connectDB();

        $messages = $connection->query('SELECT * FROM characters')->fetchAll(PDO::FETCH_ASSOC);

        return $messages ?? [];
    }

    private function saveDB($data) 
    {
        $cfg = Toml::ParseFile(self::CONFIG_PATH);
        $db = new DB($cfg);
        $connection = $db->connectDB();

        $statement = $connection->prepare('INSERT INTO characters(marvel_id) VALUES (:marvel_id)');
        $statement->bindParam('marvel_id', $data['marvel_id']);
        $statement->execute();
    }
}