<?php

namespace Components\Views\Home;

use Components\Models\PostModel;
use Viewi\Components\BaseComponent;
use Viewi\Components\Http\HttpClient;
use Viewi\Components\Http\Message\Response;

class HomePage extends BaseComponent
{
    public string $title = 'Viewi - Reactive application for PHP';

    public ?PostModel $post = null;

    public function __construct(private HttpClient $http)
    {
    }

    public function init()
    {
        $this->http->get('/api/posts/5')->then(function (PostModel $data) {
            $this->post = $data;
        }, function (Response $response) {
            echo $response->body;
        });
    }
}
