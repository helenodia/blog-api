<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ["title", "article"];

	public function comments() 
	{
	return $this->hasMany(Comment::class); 
	}
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function setTags(array $strings)
	{
		$tags = Tag::fromStrings($strings);
		$this->tags()->sync($tags->pluck("id")->all());
		return $this;
	}
}

