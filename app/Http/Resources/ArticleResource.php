<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources
 * @mixin Article
 */
class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'like_count' => $this->like_count,
            'views_count' => $this->views_count,
            'created_at' => $this->created_at,
            'tags' => $this->whenLoaded('tags', function () {
                return (TagResource::collection($this->tags));
            }),
            'comments' => $this->whenLoaded('comments', function () {
                return (CommentResource::collection($this->comments));
            }),
        ];
    }
}
