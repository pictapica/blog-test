<?php

require_once(MODEL . 'Manager.php');
require_once(MODEL . 'Post.php');

class PostManager extends Manager {

    // Récupère tous les billets publiés par ordre decroissant 
    public function getPosts() {
        $posts = array();
        
        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, creation_date,update_date, (SELECT COUNT(*) FROM comments WHERE '
                . ' post_id = post.id) AS counter FROM post WHERE published = 2 ORDER BY creation_date DESC LIMIT 0, 9');
        while ($data = $req->fetch(PDO::FETCH_ASSOC)){
            $posts[] = new Post($data);
        }
        return $posts;
    }

    // Récupère tous les billets
    public function getAllPosts() {

        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') '
                . 'AS creation_date_fr,DATE_FORMAT(update_date,\'Le %d/%m/%Y à %Hh%i\')'
                . ' AS update_date_fr, published FROM post ORDER BY creation_date DESC');

        return $req;
    }

    //Récupère les informations liées à un billet
    public function getPost($postId) {
        $req = $this->_db->prepare('SELECT id, title, user_id, content, ' .
                'DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') AS creation_date_fr '
                . 'FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    // Enregistre un chapitre comme brouillon
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
            echo 'Chapitre enregistré comme brouillon !';
        }
    }

    //Publie un chapitre
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
            echo 'Chapitre publié !';
        }
    }

    //Passe un chapitre enregistré comme brouillon en chapitre publié
    public function publiChapter($post) {
        $req = $this->_db->exec('UPDATE post SET published = 2 WHERE id =' . $post->_id);
        $req->closeCursor();
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
