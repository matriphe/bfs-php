<?php

use Matriphe\Bfs\Bfs;

class BFSTest extends PHPUnit_Framework_TestCase
{
    protected $bfs;
    
    public function __construct()
    {
        $this->bfs = new BFS();
    }
    
    public function testBFS()
    {
        $Graph = [
            'A' => ['B', 'C'],
            'B' => ['A', 'D'],
            'D' => ['B'],
            'C' => ['A',],
        ];

        $this->assertTrue($this->bfs->isConnected($Graph, 'A', 'D'));
        $this->assertFalse($this->bfs->isConnected($Graph, 'A', 'F'));
    }

    public function testBFSPath()
    {
        $Graph = [
            'A' => ['B', 'C'],
            'B' => ['A', 'D'],
            'D' => ['B', 'E'],
            'C' => ['A', 'E'],
            'E' => ['C', 'B', 'D'],
        ];

        $this->assertEquals($this->bfs->getPath($Graph, 'A', 'D'), ['A', 'B', 'D']);
        $this->assertEquals($this->bfs->getPath($Graph, 'A', 'E'), ['A', 'C', 'E']);
        $this->assertFalse($this->bfs->getPath($Graph, 'A', 'F'));
    }
}
