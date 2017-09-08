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
    public function inject($dependency)
    {
        $this->db = $dependency["db"];
        return $this;
    }

    public function postItem($data = [])
    {
        $this->db->connect();

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

    public function getItems()
    {
        $this->db->connect();
        $sql = "SELECT * FROM `Reply`";

        $data = $this->db->executeFetchAll($sql);

        // Get image links
        foreach ($data as $post) {
            $post->avatarUrlReply = $this->getGravatar($post->authorReply);
        }

        return $data ?? [];
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
    private function getGravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}
