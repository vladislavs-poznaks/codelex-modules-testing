<?php

namespace App\Rover;

class Location
{
    const MOVE_DIFFS = [
        'n' => [
            'f' => [0, +1],
            'b' => [0, -1],
            'r' => [+1, 0],
            'l' => [-1, 0],
        ],
        's' => [
            'f' => [0, -1],
            'b' => [0, 1],
            'r' => [-1, 0],
            'l' => [+1, 0],
        ],
        'e' => [
            'f' => [1, 0],
            'b' => [-1, 0],
            'r' => [0, -1],
            'l' => [0, +1],
        ],
        'w' => [
            'f' => [-1, 0],
            'b' => [1, 0],
            'r' => [0, +1],
            'l' => [0, -1],
        ],
    ];

    private int $x;
    private int $y;

    private int $maxX;
    private int $maxY;

    public function __construct(int $x, int $y, int $maxX, int $maxY)
    {
        $this->x = $x;
        $this->y = $y;

        $this->maxX = $maxX;
        $this->maxY = $maxY;
    }

    public function move(string $move, string $orientation): void
    {
        if (isset(self::MOVE_DIFFS[$orientation][$move]) === false) {
            return;
        }

        [$deltaX, $deltaY] = self::MOVE_DIFFS[$orientation][$move];

        $this->x += $deltaX;
        $this->y += $deltaY;

        if ($this->y > $this->maxY) {
            $this->y = 0;
        }

        if ($this->y < 0) {
            $this->y = $this->maxY;
        }

        if ($this->x > $this->maxX) {
            $this->x = 0;
        }

        if ($this->x < 0) {
            $this->x = $this->maxX;
        }
    }

    public function getCoordinates(): array
    {
        return [$this->x, $this->y];
    }
}