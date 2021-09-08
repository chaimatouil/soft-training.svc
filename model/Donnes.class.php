<?php

class Donnes
{
    private $connexion;


    function __construct()
    {
        $var = "mysql:host=" . HOST . ";db_name=" . DB_NAME;


        try {
            $this->connexion = new PDO($var, DB_USER, DB_PASSWORD);
            //echo "connexion réussie";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /*-la methode createUser sert a creer un utilisateur dans notre base de donnees 
      -on a ajouter un parametre $user de type UserEntity (classe qu'on a deja creer ) qui presente notre utilisateur
      -la variable $sql sert a stocker une requete qui sert  ajouter chaque nouveau utilisateur a notre table `customers`
      -Si les donnes pour la table `customers` sont entrees juste alors il y retour "true" d'ou l'enregistrement des donnees fonctionne normalemnet 
    sinon "False" echec sinon "Null" declenchement d'exception 
    
    */
    function createUser(UserEntity $user)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`customers` (nom_societe,abreviations,adresse,tel,email,secteur)
        VALUES (:nom_societe,:abreviations,:adresse,:tel,:email,:secteur)";
        try {
            $result = $this->connexion->prepare($sql);
            $data = $result->execute(array(
                ':nom_societe' => $user->getNom_societe(),
                ':abreviations' => $user->getAbreviations(),
                ':adresse' => $user->getAdresse(),
                ':tel' => $user->getTel(),
                ':email' => $user->getEmail(),
                ':secteur' => $user->getSecteur()
            ));
            if ($data) {
                return $this->connexion->lastInsertId();
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /*-creation d'une methode 'createProduct' qui sert a ajouter chaque nouveau produit dans notre base de donnees
    -meme variable loacales qu'on a utlisee avec la methode precedente*/
    function createProduct(ProductEntity $product)
    {
        $sql = "INSERT INTO " . DB_NAME . ".`products`(`name`, `doamine realise`, `tache realisee`, `image`) 
        VALUES (:name,:doamine realise,:tache realisee,:image)";
        try {
            $result = $this->connexion->prepare($sql);
            $data = $result->execute(array(
                ':name' => $product->getName(),
                ':doamine realise' => $product->getDomaine_realise(),
                ':tache realisee' => $product->getTache_realisee(),
                ':image' => $product->getImage()
            ));
            if ($data) {
                return $this->connexion->lastInsertId();
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }

    /*-getUser une methode qui permet de recupere ou de lire et afficher les utlisateurs 
       -c'est une VOID qui ne prend pas un parametre
       -on va creer une variabe de type ARRAY un tableau qui stocke ou contenir tous les donnees d'un utilisateurs si les donnees sont saisies corrctement
       alors elle va lire ses donnees si non return "false" sinon elle va retourner null d'ou c le declenchement d'exception*/
    function getUsers()
    {
        $sql = "SELECT * FROM " . DB_NAME . ".`customers`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $users = [];

            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                $user = new UserEntity();
                $user->setIdUser($data->idUser);
                $user->setNom_societe($data->Nom_societe);
                $user->setAbreviations($data->Abreviations);
                $user->setAdresse($data->Adresse);
                $user->setTel($data->Tel);
                $user->setEmail($data->Email);
                $user->setSecteur($data->Secteur);
                $user->setCreatedAt($data->createdat);

                $users[] = $user;
            }

            if ($users) {
                return $users;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }



    /*-Une methode "getProducts()pour recuperer les produits dans la base de donnees 
        -on a declare une variable dse type ARRAY ; un tebleau contenant les produits"*/
    function getProduct()
    {
        $sql = "SELECT * FROM " . DB_NAME . ".`products`";
        //echo  $sql;exit();
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $products = [];

            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                $product = new ProductEntity();
                $product->setIdProduct($data->id);
                $product->setName($data->name);
                $product->setDomaine_realise($data->domaine_realise);
                $product->setTache_realisee($data->tache_realisee);
                $product->setImage($data->image);
                $product->setCreatedAt($data->createdat);

                $products[] = $product;
            }

            if ($products) {
                return $products;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
    function getProductById($id)
    {
        $sql = "SELECT * FROM " . DB_NAME . ".`products` WHERE id=:id";
        //echo  $sql;exit();
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(":id", $id));


            if ($var) {
                $data = $result->fetch(PDO::FETCH_OBJ);
                $product = new ProductEntity();
                $product->setIdProduct($data->id);
                $product->setName($data->name);
                $product->setDomaine_realise($data->domaine_realise);
                $product->setTache_realisee($data->tache_realisee);
                $product->setImage($data->image);
                $product->setCreatedAt($data->createdat);
            }
            if ($product) {
                return $product;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }


    /*
    -Creation d'une nethode "updatUsers" qui permet de mettre a jour les donnees d'un utlitsateur dans bd
    -On l'a donnees commes parametre UserEntity $user un objet qui decrit un user
    -Return "True" ->mise a jour reussie
    -Return "False" -> echec de mise a jour
    -Null-> Exception declenchee
    **/
    function updateUsers(UserEntity $user)
    {
        $sql = "UPDATE " . DB_NAME . ".`customers` SET ";
        try {
            $sql .= " Nom_societe = '" . $user->getNom_societe() . "',";
            $sql .= " Abreviations = '" . $user->getAbreviations() . "',";
            $sql .= " Adresse = '" . $user->getAdresse() . "',";
            $sql .= " Tel = '" . $user->getTel() . "',";
            $sql .= " Email = '" . $user->getEmail() . "',";
            $sql .= " Secteur = '" . $user->getSecteur() . "',";

            $sql .= " WHERE id=" . $user->getIdUser();

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();
            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
    /*
    -Creation d'une methode "updateProduct" pour la mise a jour des donnees d'un produit
    -$product un objet qui decrit un produit 
    */
    function updateProduct(ProductEntity $product)
    {
        $sql = "UPDATE " . DB_NAME . ".`products` SET `name`=:name,`domaine realise`=:domaine realise,`tache realisee`=:tache realisee,`image`=:image WHERE id=:id";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':id' => $product->getIdproduct(),
                ':name' => $product->getName(),
                ':domaine_realise' => $product->getDomaine_realise(),
                ':tache_realisee' => $product->getTache_realisee(),
                ':image' => $product->getImage()

            ));
            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
    /*
    -Creation d'une methode "deleteUsers" qui permet de supprimer un user dans une bd 
    -$user decrit un user
    -Return "True" -> suppression reussie
    -Return "False" -> echec de suppression 
    -NULL-> Exception declenchee 
    */
    function deleteUsers(UserEntity $user)
    {
        $sql = "DELETE FROM " . DB_NAME . ".`customers` WHERE id=" . $user->getIdUser();

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();
            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
    /*
    -Creation d'une methode "deleteProduct" qui permet de supprimer un produit dans une bd 
    -$produit decrit un produit
    -Return "True" -> suppression reussie
    -Return "False" -> echec de suppression 
    -NULL-> Exception declenchee 
    */
    function deleteProduct(ProductEntity $product)
    {
        $sql = "DELETE FROM " . DB_NAME . ".`products` WHERE id=" . $product->getIdProduct();

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();
            if ($var) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $th) {
            return NULL;
        }
    }
}