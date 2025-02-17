<?php

declare(strict_types=1);

namespace SwooleTW\Hyperf\View\Middleware;

use Hyperf\ViewEngine\Contract\FactoryInterface;
use Hyperf\ViewEngine\ViewErrorBag;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use SwooleTW\Hyperf\Session\Contracts\Session as SessionContract;

class ShareErrorsFromSession implements MiddlewareInterface
{
    public function __construct(
        protected SessionContract $session,
        protected FactoryInterface $view
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var ViewErrorBag $errors */
        $errors = $this->session->get('errors') ?: new ViewErrorBag();

        $this->view->share('errors', $errors);

        return $handler->handle($request);
    }
}
