<?php

require_once(MODEL . 'Manager.php');
require_once(MODEL . 'Post.php');

class PostManager extends Manager {

    // Récupère tous les billets par ordre decroissant 
    public function getPosts() {

        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') '
                . 'AS creation_date_fr,DATE_FORMAT(update_date,\'Le %d/%m/%Y à %Hh%i\')'
                . ' AS update_date_fr, (SELECT COUNT(*) FROM comments WHERE '
                . ' post_id = post.id) AS counter FROM post ORDER BY creation_date DESC LIMIT 0, 9');

        return $req;
    }

    // Récupèrer tous les billets
    public function getAllPosts() {

        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') '
                . 'AS creation_date_fr,DATE_FORMAT(update_date,\'Le %d/%m/%Y à %Hh%i\')'
                . ' AS update_date_fr, published FROM post ORDER BY creation_date DESC');

        return $req;
    }

    //Récupère tous les billets publiés
    public function publishedPosts($data) {
        $publiposts = array();

        $q = $this->_db->query('SELECT * FROM post WHERE published = 2');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $publiposts[] = new Post($data);
        }
        return $publiposts;
    }

    /**
     * Récupèrer les informations liées à un billet
     * @param type $postId
     * @return type
     * 
     */
    public function getPost($postId) {
        $req = $this->_db->prepare('SELECT id, title, user_id, content, ' .
                'DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') AS creation_date_fr '
                . 'FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    // Enregistrer un chapitre comme brouillon
    public function addPost($post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NOW(), 1 ) ');
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $result = $req->execute();

        $post->hydrate([
            'id' => $this->_db->lastInsertId(),
        ]);

        if ($result) {
            echo 'Chapitre enregistré comme brouillon !';
        }
    }

    //
    public function publishPost($post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NOW(), 2 ) ');

        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $result = $req->execute();

        $post->hydrate([
            'id' => $this->_db->lastInsertId(),
        ]);
        if ($result) {
            'Chapitre publié !';
        }
    }

    //Modifie un chapitre
    public function updatePost($post, $getId, $published) {
        $req = $this->_db->prepare('UPDATE post SET title = :title, content=:content,'
                . 'update_date = :update_date published = :published WHERE id =' . $getId);
        $req->execute(array(
            'title' => $title,
            'content' => $content,
            'update_date' => date(DATE_W3C),
            'published' => $published,
            'id' => $id));
        $req->closeCursor();
    }

    //Efface un chapitre
    public function deletePost($post) {
        $this->_db->exec('DELETE  FROM post WHERE post.id=' . $post->_id());
    }

}
