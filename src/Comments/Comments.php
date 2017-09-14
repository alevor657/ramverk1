<?php

namespace Anax\Comments;

class Comments
{
    /**
     * Inject dependencies.
     *
     * @param array $dependency key/value array with dependencies.
     *
     * @return self
     */
    public function inject($dependencies = [])
    {
        if (!$dependencies) {
            return;
        }

        foreach ($dependencies as $name => $dep) {
            $this->{$name} = $dep;
        }

        return $this;
    }

    /**
     * Post a post to database
     * @param  array  $data populated form data
     * @return void
     */
    public function postItem($data = [])
    {
        if ($data["submit"]) {
            $this->editItem($data);
            return;
        }

        $this->db->connect();

        // var_dump($data);
        // exit;

        $sql = "INSERT INTO
        Reply
        (textReply, authorReply, headingReply)
        VALUES (?, ?, ?)";

        $params = [
            $data["text"],
            $data["email"],
            $data["heading"]
        ];

        $this->db->execute($sql, $params);
    }

    /**
     * Retrive all posts from database
     * @return array posts data
     */
    public function getItems()
    {
        $this->db->connect();
        $sql = "SELECT * FROM `Reply`";

        $data = $this->db->executeFetchAll($sql);

        // Get image links
        foreach ($data as $post) {
            $post->avatarUrlReply = $this->getGravatar($post->authorReply);
            $post->textReply = $this->textfilter->parse($post->textReply, ["markdown"])->text;
        }

        return $data ?? [];
    }

    public function getItem($id)
    {
        $this->db->connect();
        $sql = "SELECT * FROM `Reply` WHERE idReply = ?";

        $params[] = $id;
        $data = $this->db->executeFetch($sql, $params);
        return $data;
    }

    public function delteItem($id)
    {
        $this->db->connect();
        $sql = "DELETE FROM Reply WHERE idReply=?";

        $params[] = $id;
        $this->db->execute($sql, $params);
    }

    public function editItem($data)
    {
        $this->db->connect();
        $sql = "UPDATE Reply
        SET
            textReply = ?,
            authorReply = ?,
            headingReply = ?
        WHERE
            idReply = ?
        ";

        $params = [
            $data["text"],
            $data["email"],
            $data["heading"],
            $data["submit"]
        ];

        $this->db->execute($sql, $params);
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    private function getGravatar($email, $sss = 80, $ddd = 'mm', $rrr = 'g', $img = false, $atts = array())
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$sss&d=$ddd&r=$rrr";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val) {
                $url .= ' ' . $key . '="' . $val . '"';
            }
            $url .= ' />';
        }
        return $url;
    }
}
