<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less')
        ->jsDirectory(__DIR__.'/js/dist/forum'),

    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->Emoticons->add(':)', '🙂');
            $config->Emoticons->add(':D', '😃');
            $config->Emoticons->add(':P', '😛');
            $config->Emoticons->add(':(', '🙁');
            $config->Emoticons->add(':|', '😐');
            $config->Emoticons->add(';)', '😉');
            $config->Emoticons->add(':\'(', '😢');
            $config->Emoticons->add(':O', '😮');
            $config->Emoticons->add('>:(', '😡');
        }),

    new Extend\Locales(__DIR__.'/locale'),

    (new Extend\Settings)
        ->serializeToForum('flarum-emoji.cdn', 'flarum-emoji.cdn')
        ->default('flarum-emoji.cdn', 'https://cdn.jsdelivr.net/gh/twitter/twemoji@[version]/assets/'),
];
