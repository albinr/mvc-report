<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/deck' => [[['_route' => 'api_deck', '_controller' => 'App\\Controller\\ApiCardController::apiDeck'], null, ['GET' => 0], null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api_deck_shuffle', '_controller' => 'App\\Controller\\ApiCardController::apiDeckShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api_deck_draw', '_controller' => 'App\\Controller\\ApiCardController::apiDraw'], null, ['POST' => 0], null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\ApiController::api'], null, null, null, false, false, null]],
        '/api/quote' => [[['_route' => 'quote', '_controller' => 'App\\Controller\\ApiController::apiQuote'], null, null, null, false, false, null]],
        '/api/library/books' => [[['_route' => 'api_library', '_controller' => 'App\\Controller\\ApiLibraryController::apiLibrary'], null, null, null, false, false, null]],
        '/card' => [[['_route' => 'card', '_controller' => 'App\\Controller\\CardController::card'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'deck', '_controller' => 'App\\Controller\\CardController::deck'], null, null, null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'shuffle', '_controller' => 'App\\Controller\\CardController::shuffle'], null, null, null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'draw', '_controller' => 'App\\Controller\\CardController::draw'], null, null, null, false, false, null]],
        '/library' => [[['_route' => 'library', '_controller' => 'App\\Controller\\LibraryController::index'], null, null, null, false, false, null]],
        '/library/create' => [[['_route' => 'create', '_controller' => 'App\\Controller\\LibraryController::createFormBook'], null, null, null, false, false, null]],
        '/library/create/book' => [[['_route' => 'create_book', '_controller' => 'App\\Controller\\LibraryController::createBook'], null, ['POST' => 0], null, false, false, null]],
        '/library/books' => [[['_route' => 'read_many', '_controller' => 'App\\Controller\\LibraryController::readMany'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\ReportController::home'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'about', '_controller' => 'App\\Controller\\ReportController::about'], null, null, null, false, false, null]],
        '/report' => [[['_route' => 'report', '_controller' => 'App\\Controller\\ReportController::report'], null, null, null, false, false, null]],
        '/lucky' => [[['_route' => 'lucky', '_controller' => 'App\\Controller\\ReportController::lucky'], null, null, null, false, false, null]],
        '/metrics' => [[['_route' => 'metrics', '_controller' => 'App\\Controller\\ReportController::metrics'], null, null, null, false, false, null]],
        '/session' => [[['_route' => 'session', '_controller' => 'App\\Controller\\ReportController::session'], null, null, null, false, false, null]],
        '/session/delete' => [[['_route' => 'session_delete', '_controller' => 'App\\Controller\\ReportController::sessionDelete'], null, null, null, false, false, null]],
        '/game' => [[['_route' => 'game', '_controller' => 'App\\Controller\\TwentyOneController::home'], null, null, null, false, false, null]],
        '/game/start' => [[['_route' => 'game_start', '_controller' => 'App\\Controller\\TwentyOneController::start'], null, null, null, false, false, null]],
        '/game/hit' => [[['_route' => 'game_hit', '_controller' => 'App\\Controller\\TwentyOneController::hit'], null, null, null, false, false, null]],
        '/game/stand' => [[['_route' => 'game_stand', '_controller' => 'App\\Controller\\TwentyOneController::stand'], null, null, null, false, false, null]],
        '/game/doc' => [[['_route' => 'game_doc', '_controller' => 'App\\Controller\\TwentyOneController::doc'], null, null, null, false, false, null]],
        '/api/game' => [[['_route' => 'api_game_status', '_controller' => 'App\\Controller\\TwentyOneController::apiGameStatus'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/(?'
                    .'|deck/draw/(\\d+)(*:225)'
                    .'|library/book/([^/]++)(*:254)'
                .')'
                .'|/card/deck/draw/(\\d+)(*:284)'
                .'|/library/book/(?'
                    .'|([^/]++)(*:317)'
                    .'|edit/([^/]++)(*:338)'
                    .'|update/([^/]++)(*:361)'
                    .'|delete/([^/]++)(*:384)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        225 => [[['_route' => 'api_deck_multi_draw', '_controller' => 'App\\Controller\\ApiCardController::apiMultiDraw'], ['num'], null, null, false, true, null]],
        254 => [[['_route' => 'api_library_isbn', '_controller' => 'App\\Controller\\ApiLibraryController::apiBookIsbn'], ['isbn'], null, null, false, true, null]],
        284 => [[['_route' => 'multi_draw', '_controller' => 'App\\Controller\\CardController::multiDraw'], ['num'], null, null, false, true, null]],
        317 => [[['_route' => 'read_one', '_controller' => 'App\\Controller\\LibraryController::readOne'], ['bookid'], null, null, false, true, null]],
        338 => [[['_route' => 'edit_book', '_controller' => 'App\\Controller\\LibraryController::updateFormBook'], ['bookid'], null, null, false, true, null]],
        361 => [[['_route' => 'update_book', '_controller' => 'App\\Controller\\LibraryController::updateBook'], ['bookid'], ['POST' => 0], null, false, true, null]],
        384 => [
            [['_route' => 'delete_book', '_controller' => 'App\\Controller\\LibraryController::deleteBook'], ['bookid'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
