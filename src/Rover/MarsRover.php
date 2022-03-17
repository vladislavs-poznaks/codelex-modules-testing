<?php

namespace App\Rover;

class MarsRover
{
    const VALID_ORIENTATIONS = ['n', 's', 'w', 'e'];

    private Location $location;
    private string $orientation;

    public function __construct(array $location, string $orientation, array $grid)
    {
        $this->location = new Location(...$location, ...$grid);
        in_array(strtolower($orientation), self::VALID_ORIENTATIONS)
            ? $this->orientation = $orientation
            : $this->orientation = 'n';
    }

    public function move(string $sequence): void
    {
        $moves = str_split(strtolower($sequence));

        foreach ($moves as $move) {
            $this->location->move($move, $this->orientation);
        }
    }

    public function getLocation(): array
    {
        return $this->location->getCoordinates();
    }
}