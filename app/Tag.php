<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // don't need timestamps
	// no idea why this one is public
	public $timestamps = false;

	// using the belongsToMany() method
	// as it's a many-to-many relationship
	public function articles()
	{
	return $this->belongsToMany(Article::class);
	}

	// accepts the array of strings from the request
	public static function fromStrings(array $strings)
	{
		// turns into a collection and maps over
		return collect($strings)->map(function ($string) {
		// remove any blank spaces either side
		$clean = trim($string);
		// then call the make method
		return static::make($clean);
	});
	}
	// a method that takes a string and either
	// returns the existing tag from the database
	// or creates a new one if it doesn't exist
	private static function make($string)
	{
		// check if tag already exists
		// will be either a Tag object or null
		$exists = Tag::where("name", $string)->first();
		// if tag exists return it, otherwise create a new one
		return $exists ? $exists : Tag::create(["name" => $string]);
	}

	// name should be fillable
	protected $fillable = ["name"];
}



