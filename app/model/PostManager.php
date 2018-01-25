<?php

require_once(MODEL . 'Manager.php');
require_once(MODEL . 'Post.php');

class PostManager extends Manager {

//Recovers all PUBLISHED tickets in descending order 
    public function getPosts() {
        $posts = array();
        
        $req = $this->_db->query('SELECT id, title, user_id, left(content, 270)'
                . ' as excerpt, content, creation_date AS date, (SELECT COUNT(*) FROM comments WHERE '
                . ' post_id = post.id) AS nbcomment FROM post WHERE published = 2 ORDER BY creation_date DESC LIMIT 0, 20');
        while ($data = $req->fetch(PDO::FETCH_ASSOC)){
            $posts[] = new Post($data);
        }
        return $posts;

    }

// Get all the tickets.
    public function getAllPosts() {
        $posts = array();
        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as excerpt, content, creation_date AS date, update_date AS updatedate, published FROM post ORDER BY creation_date DESC');
    while ($data = $req->fetch(PDO::FETCH_ASSOC)){
            $posts[] = new Post($data);
        }
        return $posts;
    }

//Retrieves information related to a ticket
    public function getPost($postId) {
        $req = $this->_db->prepare('SELECT id, title, user_id, content, ' .
                'DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') AS creation_date_fr '
                . 'FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

// Saves a chapter as a draft
    public function addPost($post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NOW(), 1 ) ');
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $result = $req->execute();

        $post->hydrate([
            'id' => $this->_db->lastInsertId(),
            'user_id' => 1,
            'published' => 1
        ]);
        if ($result) {
            echo '';
        }
    }

//Publish a chapter
    public function publishPost($post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NOW(), 2 ) ');
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $result = $req->execute();

        $post->hydrate([
            'id' => $this->_db->lastInsertId(),
            'user_id' => 1,
            'published' => 2
        ]);

        if ($result) {
            echo '';
        }
    }

//Skip a chapter saved as a published chapter draft
    public function publiPost($id ) {
        $req = $this->_db->prepare('UPDATE post SET published = 2 WHERE id ='.$id);
        $req->execute(array(
            'published' => 2));
        
    }

    
//Modify a chapter
    public function updatePost($title, $content, $id) {
        $req = $this->_db->prepare('UPDATE post SET title = :title, content=:content,'
                . 'update_date = NOW()  WHERE id = :id');
        $req->execute(array(
            'title' => $title,
            'content' => $content,
            'id' =>$id));
            
    }

//Delete a chapter
    public function deletePost($id) {
        $this->_db->exec('DELETE  FROM post WHERE post.id='.$id);
        
    }

}
