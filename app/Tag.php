<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public $timestamps = false;

	public function articles()
	{
	return $this->belongsToMany(Article::class);
	}

	public static function fromStrings(array $strings)
	{
		return collect($strings)->map(function ($string) {
		$clean = trim($string);
		return static::make($clean);
	});
	}

	private static function make($string)
	{
		$exists = Tag::where("name", $string)->first();
		return $exists ? $exists : Tag::create(["name" => $string]);
	}

	protected $fillable = ["name"];
}



