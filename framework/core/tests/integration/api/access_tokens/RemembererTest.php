<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\Tests\integration\api\access_tokens;

use Carbon\Carbon;
use Flarum\Http\AccessToken;
use Flarum\Testing\integration\RetrievesAuthorizedUsers;
use Flarum\Testing\integration\TestCase;
use PHPUnit\Framework\Attributes\Test;

class RemembererTest extends TestCase
{
    use RetrievesAuthorizedUsers;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->prepareDatabase([
            AccessToken::class => [
                ['token' => 'a', 'user_id' => 1, 'last_activity_at' => Carbon::parse('2021-01-01 02:00:00'), 'type' => 'session'],
                ['token' => 'b', 'user_id' => 1, 'last_activity_at' => Carbon::parse('2021-01-01 02:00:00'), 'type' => 'session_remember'],
            ],
        ]);
    }

    #[Test]
    public function non_remember_tokens_cannot_be_used()
    {
        $this->populateDatabase();

        Carbon::setTestNow('2021-01-01 02:30:00');

        $response = $this->send(
            $this->request('GET', '/api')->withCookieParams([
                'flarum_remember' => 'a',
            ])
        );

        Carbon::setTestNow();

        $data = json_decode($response->getBody(), true);
        $this->assertFalse($data['data']['attributes']['canSearchUsers']);
    }

    #[Test]
    public function expired_tokens_cannot_be_used()
    {
        $this->populateDatabase();

        Carbon::setTestNow('2027-01-01 02:30:00');

        $response = $this->send(
            $this->request('GET', '/api')->withCookieParams([
                'flarum_remember' => 'b',
            ])
        );

        Carbon::setTestNow();

        $data = json_decode($response->getBody(), true);
        $this->assertFalse($data['data']['attributes']['canSearchUsers']);
    }

    #[Test]
    public function valid_tokens_can_be_used()
    {
        $this->populateDatabase();

        Carbon::setTestNow('2021-01-01 02:30:00');

        $response = $this->send(
            $this->request('GET', '/api')->withCookieParams([
                'flarum_remember' => 'b',
            ])
        );

        Carbon::setTestNow();

        $data = json_decode($response->getBody(), true);
        $this->assertTrue($data['data']['attributes']['canSearchUsers']);
    }
}
