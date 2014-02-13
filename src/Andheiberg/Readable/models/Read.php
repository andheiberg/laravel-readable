<?php namespace Andheiberg\Readable\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Read extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reads';

	/**
	 * The attributes that can be set with Mass Assignment.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id'];

	/**
	 * Readable relationship
	 *
	 * @var \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function readable()
    {
        return $this->morphTo();
    }

}