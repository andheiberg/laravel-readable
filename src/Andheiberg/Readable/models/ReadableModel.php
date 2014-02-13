<?php namespace Andheiberg\Readable\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ReadableModel extends Eloquent {

	use Andheiberg\Readable\Traits\IsReadable;

}