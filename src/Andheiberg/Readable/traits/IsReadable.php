<?php namespace Andheiberg\Messenger\Traits;

trait IsReadable
{
	/**
	 * Reads relationship
	 *
	 * @var \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function reads()
	{
		return $this->morphMany('Andheiberg\Readable\Models\Read', 'readable');
	}

	/**
	 * Mark a resource as read
	 *
	 * @var void
	 */
	public function markAsRead()
	{
		$read = $this->reads()->where('reads.user_id', \Auth::user()->id)->count();

		if ( ! $read)
		{
			$this->reads()->save(Read::create(['user_id' => \Auth::user()->id]));
		}
	}

	/**
	 * Mark a resource as unread
	 *
	 * @var void
	 */
	public function markAsUnread()
	{
		$reads = $this->reads()->where('reads.user_id', \Auth::user()->id)->delete();
	}

	/**
	 * Limit query to read resources
	 *
	 * @var void
	 */
	public function scopeRead($query, $user_id = null)
	{
		$user_id = $user_id ?: \Auth::user()->id;
		
		return $query->whereIn('id', function($query) use ($user_id) {
			return $query->from('reads')
			->where('reads.readable_type', get_class($this))
			->where('reads.user_id', $user_id)
			->lists('reads.readable_id');
		});
	}

	/**
	 * Limit query to unread resources
	 *
	 * @var void
	 */
	public function scopeUnread($query, $user_id = null)
	{
		$user_id = $user_id ?: \Auth::user()->id;

		return $query->whereNotIn('id', function($query) use ($user_id) {
			return $query->from('reads')
			->where('reads.readable_type', get_class($this))
			->where('reads.user_id', $user_id)
			->lists('reads.readable_id');
		});
	}
}