<?php

require_once(MODEL . 'Manager.php');
require_once(MODEL . 'Post.php');

class PostManager extends Manager {

    // Récupère tous les billets par ordre decroissant 
    public function getPosts() {

        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') '
                . 'AS creation_date_fr,DATE_FORMAT(update_date,\'Le %d/%m/%Y à %Hh%i\')'
                . ' AS update_date_fr, (SELECT COUNT(*) FROM comments WHERE moderation = 0 '
                . 'AND post_id = post.id) AS counter FROM post ORDER BY creation_date DESC LIMIT 0, 20');

        return $req;
    }

    // Récupèrer tous les billets
    public function getAllPosts() {

        $req = $this->_db->query('SELECT id, title, user_id, left(content, 220)'
                . ' as extrait, content, DATE_FORMAT(creation_date, \'Le %d/%m/%Y à %Hh%i\') '
                . 'AS creation_date_fr,DATE_FORMAT(update_date,\'Le %d/%m/%Y à %Hh%i\')'
                . ' AS update_date_fr, published FROM post ORDER BY creation_date DESC');

        //print_r($req);
        print "test";

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

    
    /**
     * Ajoute un brouillon 
     * @param Post $post
     * 
     */
    public function addPost(Post $post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NULL, 1 ) ');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':content', $post->getContent());
        $result = $req->execute();
        
        if ($result) {
            echo 'Chapitre enregistré comme brouillon !';
        }
        
        $post->hydrate([
            'id' => $this->_db->lastInsertId(),
        ]);
        header (VIEW . 'backend/allPosts.php');
    }

    
    /**
     * Ajoute un chapitre
     * @param Post $post
     * 
     */
    public function publishPost(Post $post) {
        $req = $this->_db->prepare('INSERT INTO post(title, user_id, content, '
                . 'creation_date, update_date, published) '
                . 'VALUES(:title, 1, :content, NOW(), NULL, 2 ) ');
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':user_id', $post->getUserId(1));
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':published', $post->getpublished(2));
        $result = $req->execute();
        if ($result) {
            echo 'Un nouveau chapitre publié!';
            
        }
        /**$post->hydrate([
            'id' => $this->_db->lastInsertId(),
        ]);**/
        header (VIEW . 'backend/allPosts.php');
    }
    
    //Modifie un chapitre
    public function updatePost(Post $post, $getId, $published) {
        $req = $this->_db->prepare('UPDATE post SET title = :title, user_id = 1, content=:content,'
                . 'update_date = :update_date published = :published WHERE id = :id');
        $req->execute(array(
        'title'=> $title,
        'content'=> $content,
       'update_date'=> date(DATE_W3C),
        'published'=> $published,
        'id'=> $id));
        $req->closeCursor();
    }

    //Efface un chapitre
    public function deletePost($getId) {
        $resultat = $this->_db->exec('DELETE FROM post WHERE id= :id');
        $resultat->bindValue(':id', $id);
        $resultat->execute();
    }

}
