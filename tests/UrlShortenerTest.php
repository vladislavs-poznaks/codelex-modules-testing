<?php


use App\UrlShortener\UrlService;
use PHPUnit\Framework\TestCase;

class UrlShortenerTest extends TestCase
{
    /** @test */
    public function it_should_be_able_to_shorten_multiple_urls()
    {
        $service = new UrlService();

        $longUrlOne = 'https://www.codelex.io/kontakti';
        $longUrlTwo = 'https://www.codelex.io/ievadnodarbibas';

        $shortUrlOne = $service->shorten($longUrlOne);
        $shortUrlTwo = $service->shorten($longUrlTwo);

        $this->assertEquals($longUrlOne, $service->translate($shortUrlOne));
        $this->assertEquals($longUrlTwo, $service->translate($shortUrlTwo));
    }

    /** @test */
    public function it_should_track_the_number_of_times_it_was_visited()
    {
        $service = new UrlService();

        $longUrl = 'https://www.codelex.io/kontakti';

        $shortUrl = $service->shorten($longUrl);

        $this->assertEquals(0, $service->visits($shortUrl));

        $service->translate($shortUrl);

        $this->assertEquals(1, $service->visits($shortUrl));

        $service->translate($shortUrl);
        $service->translate($shortUrl);
        $service->translate($shortUrl);

        $this->assertEquals(4, $service->visits($shortUrl));
    }
}
