<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Only allow the title and article field to get updated via mass assignment
	protected $fillable = ["title", "article"];

		// plural, as an article can have multiple comments
	public function comments() // this is saying we want a comments property on our article - bc an art can have lots of comments
	{
	// use hasMany relationship method
	return $this->hasMany(Comment::class); // we're pointing this property Comment at the model class of Comment (:: = 'of the thing')
	}
	// use the belongsToMany() method again
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	// just accept an array of strings
	// we don't want to pass request in as there's no
	// reason models should know about about the request
	public function setTags(array $strings)
	{
		$tags = Tag::fromStrings($strings);
		// we're on an article instance, so use $this
		$this->tags()->sync($tags->pluck("id")->all());
		// return $this in case we want to chain
		return $this;
	}
}

