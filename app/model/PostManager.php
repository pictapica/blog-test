<?php

require_once(MODEL . 'Manager.php');

class PostManager extends Manager {

    // récupérer tous les billets
    public function getPosts() {

        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') '
                . 'AS creation_date_fr,DATE_FORMAT(update_date,\'Le %d/%m/%Y à %Hh%i\')'
                . ' AS update_date_fr, (SELECT COUNT(*) FROM comments WHERE moderation = 0 '
                . 'AND post_id = post.id) AS counter FROM post ORDER BY creation_date DESC LIMIT 0, 20')
                or die('Impossible d\'effectuer la requête');

        return $req;
    }

    //récuperer tous les billets publiés
    public function publishedPosts() {
        $posts = array();

        $q = $this->_db->query('SELECT * FROM post WHERE published = 2');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    // récupérer les informations liées à un billet
    public function getPost($postId) {
        $req = $this->_db->prepare('SELECT id, title, user_id, content, ' .
                'DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') AS creation_date_fr '
                . 'FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    public function addPost(post $post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NOW(), 1 ) ');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':user_id', $post->getUserId(1));
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':published', $post->getpublished(1));
        $result = $req->execute();
        if ($result) {
            echo 'oui !!! Un nouveau chapitre !';
            //header (VIEW . 'backend/allPosts.php');
            
        }
    }

    public function updatePost(post $post) {
        $resultat = $this->_db->prepare('UPDATE post SET title = :title, user_id = 1, content=:content,'
                . 'update_date = :update_date WHERE :id = id');
        $resultat->bindValue(':title', $post->getTitle());
        $resultat->bindValue(':content', $post->getContent());
        $resultat->bindValue(':update_date', $post->getUpdateDate());
        $resultat->bindValue(':id', $post->getId());
        $resultat->execute();
    }

    public function deletePost($id) {
        $req = $this->_db->exec('DELETE FROM post WHERE :id=id');
        $resultat->binvalue(':id', $id);
        $resultat->execute();
    }

}
