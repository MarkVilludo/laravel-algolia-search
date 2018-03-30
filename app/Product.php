<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    /**
	 * Set the index of algolia
	 */
	public function searchableAs()
	{
		return 'advance_search';
    }
    
    /**
     * Set array to persisted to its search index
     */
    public function toSearchableArray()
	{
		$array = $this->toArray();
		return $array;
	}
}