<?php

namespace Alvo\Comment;

use \Anax\Database\ActiveRecordModel;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comment";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $text;
    public $heading;
    public $created;
    public $tags;
    public $userId;



    public function getAllComments()
    {
        return $this->db->connect()
                    ->select()
                    ->from($this->tableName)
                    ->where("deleted IS NULL")
                    ->execute()
                    ->fetchAllClass(get_class($this));
    }



    public function getComment($id)
    {
        return $this->find("id", $id);
    }
}
