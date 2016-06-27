<?php

namespace Matriphe\Bfs;

use SplQueue;

/*
 * A simple iterative Breadth-First Search implementation.
 * http://en.wikipedia.org/wiki/Breadth-first_search
 */
class Bfs 
{
    protected $queue;
    
    public function __construct()
    {
        $this->queue = new SplQueue();
    }
    
    /**
     * Check if nodes are connected.
     *
     * 1. Start with a node, enqueue it and mark it visited.
     * 2. Do this while there are nodes on the queue:
     *     a. dequeue next node.
     *     b. if it's what we want, return true!
     *     c. search neighbours, if they haven't been visited,
     *        add them to the queue and mark them visited.
     *  3. If we haven't found our node, return false.
     * 
     * @access public
     * @param array $graph
     * @param mixed $start
     * @param mixed $end
     * @return bool
     */
    function isConnected($graph, $start, $end) 
    {
        $this->queue->enqueue($start);
        $visited = [$start];
    
        while ($this->queue->count() > 0) {
            $node = $this->queue->dequeue();
    
            // We've found what we want
            if ($node === $end) {
                return true;
            }
    
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    // Mark neighbour visited
                    $visited[] = $neighbour;
    
                    // Enqueue node
                    $this->queue->enqueue($neighbour);
                }
            };
        }
    
        return false;
    }
    
    /**
     * Get shortes path.
     *
     * Same as isConnected() except instead of returning a bool, it returns a path.
     * Implemented by enqueuing a path, instead of a node, for each neighbour.
     * 
     * @access public
     * @param array $graph
     * @param mixed $start
     * @param mixed $end
     * @return void
     */
    function getPath($graph, $start, $end) 
    {
        $this->queue = new SplQueue();
        
        // Enqueue the path
        $this->queue->enqueue([$start]);
        $visited = [$start];
    
        while ($this->queue->count() > 0) {
            $path = $this->queue->dequeue();
    
            # Get the last node on the path
            # so we can check if we're at the end
            $node = $path[sizeof($path) - 1];
            
            if ($node === $end) {
                return $path;
            }
    
            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;
    
                    # Build new path appending the neighbour then and enqueue it
                    $new_path = $path;
                    $new_path[] = $neighbour;
    
                    $this->queue->enqueue($new_path);
                }
            };
        }
    
        return false;
    }
}


