<?php


use App\Rover\MarsRover;
use PHPUnit\Framework\TestCase;

class MarsRoverTest extends TestCase
{
    /** @test */
    public function it_moves_forward_one_tile_when_facing_north()
    {
        $rover = new MarsRover([25, 25], 'n', [100, 100]);

        $rover->move('f');

        $this->assertEquals([25, 26], $rover->getLocation());
    }

    /** @test */
    public function it_moves_forward_one_tile_when_facing_south()
    {
        $rover = new MarsRover([25, 25], 's', [100, 100]);

        $rover->move('f');

        $this->assertEquals([25, 24], $rover->getLocation());
    }

    /** @test */
    public function it_moves_forward_one_tile_when_facing_east()
    {
        $rover = new MarsRover([25, 25], 'e', [100, 100]);

        $rover->move('f');

        $this->assertEquals([26, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_forward_one_tile_when_facing_west()
    {
        $rover = new MarsRover([25, 25], 'w', [100, 100]);

        $rover->move('f');

        $this->assertEquals([24, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_backwards_one_tile_when_facing_north()
    {
        $rover = new MarsRover([25, 25], 'n', [100, 100]);

        $rover->move('b');

        $this->assertEquals([25, 24], $rover->getLocation());
    }

    /** @test */
    public function it_moves_backwards_one_tile_when_facing_south()
    {
        $rover = new MarsRover([25, 25], 's', [100, 100]);

        $rover->move('b');

        $this->assertEquals([25, 26], $rover->getLocation());
    }

    /** @test */
    public function it_moves_backwards_one_tile_when_facing_east()
    {
        $rover = new MarsRover([25, 25], 'e', [100, 100]);

        $rover->move('b');

        $this->assertEquals([24, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_backwards_one_tile_when_facing_west()
    {
        $rover = new MarsRover([25, 25], 'w', [100, 100]);

        $rover->move('r');

        $this->assertEquals([25, 26], $rover->getLocation());
    }

    /** @test */
    public function it_moves_right_one_tile_when_facing_north()
    {
        $rover = new MarsRover([25, 25], 'n', [100, 100]);

        $rover->move('r');

        $this->assertEquals([26, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_right_one_tile_when_facing_south()
    {
        $rover = new MarsRover([25, 25], 's', [100, 100]);

        $rover->move('r');

        $this->assertEquals([24, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_right_one_tile_when_facing_east()
    {
        $rover = new MarsRover([25, 25], 'e', [100, 100]);

        $rover->move('r');

        $this->assertEquals([25, 24], $rover->getLocation());
    }

    /** @test */
    public function it_moves_right_one_tile_when_facing_west()
    {
        $rover = new MarsRover([25, 25], 'w', [100, 100]);

        $rover->move('r');

        $this->assertEquals([25, 26], $rover->getLocation());
    }

    /** @test */
    public function it_moves_left_one_tile_when_facing_north()
    {
        $rover = new MarsRover([25, 25], 'n', [100, 100]);

        $rover->move('l');

        $this->assertEquals([24, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_left_one_tile_when_facing_south()
    {
        $rover = new MarsRover([25, 25], 's', [100, 100]);

        $rover->move('l');

        $this->assertEquals([26, 25], $rover->getLocation());
    }

    /** @test */
    public function it_moves_left_one_tile_when_facing_east()
    {
        $rover = new MarsRover([25, 25], 'e', [100, 100]);

        $rover->move('l');

        $this->assertEquals([25, 26], $rover->getLocation());
    }

    /** @test */
    public function it_moves_left_one_tile_when_facing_west()
    {
        $rover = new MarsRover([25, 25], 'w', [100, 100]);

        $rover->move('l');

        $this->assertEquals([25, 24], $rover->getLocation());
    }

    /** @test */
    public function it_wraps_around_grid_on_upper_side()
    {
        $rover = new MarsRover([50, 100], 'n', [100, 100]);

        $rover->move('f');

        $this->assertEquals([50, 0], $rover->getLocation());
    }

    /** @test */
    public function it_wraps_around_grid_on_bottom_side()
    {
        $rover = new MarsRover([50, 0], 's', [100, 100]);

        $rover->move('f');

        $this->assertEquals([50, 100], $rover->getLocation());
    }

    /** @test */
    public function it_wraps_around_grid_on_right_side_or_east_side()
    {
        $rover = new MarsRover([100, 50], 'e', [100, 100]);

        $rover->move('f');

        $this->assertEquals([0, 50], $rover->getLocation());
    }

    /** @test */
    public function it_wraps_around_grid_on_left_side_or_west_side()
    {
        $rover = new MarsRover([0, 50], 'w', [100, 100]);

        $rover->move('f');

        $this->assertEquals([100, 50], $rover->getLocation());
    }

    /** @test */
    public function it_follows_a_sequence()
    {
        $rover = new MarsRover([50, 50], 'n', [100, 100]);

        $rover->move('ffrfrrllblbb');

        $this->assertEquals([50, 50], $rover->getLocation());
    }

    /** @test */
    public function it_follows_an_uppercase_sequence()
    {
        $rover = new MarsRover([50, 50], 'n', [100, 100]);

        $rover->move(strtoupper('ffrfrrllblbb'));

        $this->assertEquals([50, 50], $rover->getLocation());
    }

    /** @test */
    public function it_deals_with_uppercase_directions()
    {
        $rover = new MarsRover([50, 50], 'N', [100, 100]);

        $rover->move('ffrfrrllblbb');

        $this->assertEquals([50, 50], $rover->getLocation());

        $rover = new MarsRover([50, 50], 'S', [100, 100]);

        $rover->move('ffrfrrllblbb');

        $this->assertEquals([50, 50], $rover->getLocation());

        $rover = new MarsRover([50, 50], 'W', [100, 100]);

        $rover->move('ffrfrrllblbb');

        $this->assertEquals([50, 50], $rover->getLocation());

        $rover = new MarsRover([50, 50], 'E', [100, 100]);

        $rover->move('ffrfrrllblbb');

        $this->assertEquals([50, 50], $rover->getLocation());
    }

    /** @test */
    public function it_sets_direction_as_north_if_unknown()
    {
        $rover = new MarsRover([50, 50], 't', [100, 100]);

        $rover->move('f');

        $this->assertEquals([50, 51], $rover->getLocation());
    }

    /** @test */
    public function it_follows_an_invalid_sequence_correctly()
    {
        $rover = new MarsRover([50, 50], 'n', [100, 100]);

        $rover->move('ffrfrrllblbbEse1144":');

        $this->assertEquals([50, 50], $rover->getLocation());
    }
}
