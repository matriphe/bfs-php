# Matriphe/Bfs

A very simple [breadth-first search](http://en.wikipedia.org/wiki/Breadth-first_search) implementation written in PHP. Forked from [lextoumbourou/bfs-php](https://github.com/lextoumbourou/bfs-php) and added some steroid.

Requires PHP 5.4+

## Installation

Add this repository on your `composer.json` since this library is not registered in Packagist (yet).

```json
    "repositories":
    [
        {
            "type": "vcs",
            "url": "https://github.com/matriphe/bfs-php.git"
        }
    ]
```

And then add `"matriphe/bfs": "dev-master"` in your `require` section in your `composer.json`, or simply run this command:

```sh
composer require "matriphe/bfs":"dev-master"
```

Make sure you defien your package minimum compatibility is `dev`.

## Code Example

```php
<? 

use Matriphe\Bfs\Bfs;

$bfs = new Bfs();

$graph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'D'],
    'D' => ['B'],
    'C' => ['A',],
];

// Check connection from $start_node to $end_node.
// Return true if there's a connected path and return false otherwise.
// bool $is_connected = $bfs->isConnected(array $graph, mixed $start_node, mixed $end_node);
$is_connected = $bfs->isConnected($graph, 'A', 'D'); // return true
$is_connected = $bfs->isConnected($graph, 'A', 'F'); // return false

// Get path as an array if there's a connection between $start_node and $end_node.
// Otherwise will return false.
// array $bfs->getPath(array $graph, mixed $start_node, mixed $end_node)
$path = $bfs->getPath($Graph, 'A', 'D'); // return ['A', 'B', 'D']
$path = $bfs->getPath($Graph, 'A', 'E'); // return ['A', 'C', 'E']
$path = $bfs->getPath($Graph, 'A', 'F'); // return false
```

## Tests

Just run this command

```sh
vendor/bin/phpunit
```

## License

MIT
