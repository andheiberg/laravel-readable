#Laravel Readable
Make eloquent models readable

## Introduction
For cases where you would like multiple users to be able to mark something as read. In some cases a read_at column can easily be added to a resource table to store similar information, this package is for cases where this is not practical.
##Overview
A reads table is created to keep track of read resources.

##Installation

* Add `"andheiberg/readable": "dev-master"` to your composer.json
* Run `composer update`
* Run `php artisan migrate --package="andheiberg/readable"`
* Add `use \Andheiberg\Readable\Traits\IsReadable;` inside every model you want to be readable

## Usage

Congratulations! Now you can use read resources.

### Examples
Now you can use it like a pro.

```php
    /**
     * Mark a resource as read
     *
     * @var void
     */
    public function markAsRead()

    /**
     * Mark a resource as unread
     *
     * @var void
     */
    public function markAsUnread()

    /**
     * Limit query to read resources
     *
     * @var void
     */
    public function scopeRead($query, $user_id = null)

    /**
     * Limit query to unread resources
     *
     * @var void
     */
    public function scopeUnread($query, $user_id = null)
```

```php
    Post::find(1)->markAsRead();
```

