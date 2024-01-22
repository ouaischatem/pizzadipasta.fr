<?php

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostRepository implements PostRepositoryInterface
{

    public function createPost($data)
    {
        $post = new Post($data);
        $post->save();
    }

    public function updatePost($id, $data): bool
    {
        $post = $this->getPostById($id);

        if (!$post) {
            return false;
        }

        $post->update($data);
        return true;
    }

    public function getPostById($id)
    {
        return Post::find($id);
    }

    public function deletePost($id)
    {
        $post = $this->getPostById($id);

        if (!$post) {
            return;
        }

        Storage::delete($post->image);
        $post->delete();
    }

    public function getPostsCount(): int
    {
        return $this->getAllPosts(false)->count();
    }

    public function getAllPosts($onlyVisiblePosts)
    {
        $query = $onlyVisiblePosts ? Post::visible() : Post::query();

        if ($onlyVisiblePosts) {
            return $query->latest('created_at');
        }

        return $query->latest('created_at')->get();
    }
}
