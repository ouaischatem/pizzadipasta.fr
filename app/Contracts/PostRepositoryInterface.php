<?php

namespace App\Contracts;

interface PostRepositoryInterface
{
    /**
     * Récupère tous les postes en fonction de leur visibilité
     *
     * @param bool $onlyVisiblePosts
     */
    public function getAllPosts($onlyVisiblePosts);

    /**
     * Récupère un poste par son id
     *
     * @param int $id
     */
    public function getPostById($id);

    /**
     * Crée un nouveau poste avec les données fournies
     *
     * @param array $data
     */
    public function createPost($data);

    /**
     * Met à jour un poste en fonction de son id en utilisant les données fournies
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updatePost($id, $data): bool;

    /**
     * Supprime un poste par son id
     *
     * @param int $id
     */
    public function deletePost($id);

    /**
     * Récupère le nombre de postes
     *
     * @return int
     */
    public function getPostsCount(): int;
}
