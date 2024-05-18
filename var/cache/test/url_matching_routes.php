<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
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
                .'|/api/(?'
                    .'|deck/draw/(\\d+)(*:30)'
                    .'|library/book/([^/]++)(*:58)'
                .')'
                .'|/card/deck/draw/(\\d+)(*:87)'
                .'|/library/book/(?'
                    .'|([^/]++)(*:119)'
                    .'|edit/([^/]++)(*:140)'
                    .'|update/([^/]++)(*:163)'
                    .'|delete/([^/]++)(*:186)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        30 => [[['_route' => 'api_deck_multi_draw', '_controller' => 'App\\Controller\\ApiCardController::apiMultiDraw'], ['num'], null, null, false, true, null]],
        58 => [[['_route' => 'api_library_isbn', '_controller' => 'App\\Controller\\ApiLibraryController::apiBookIsbn'], ['isbn'], null, null, false, true, null]],
        87 => [[['_route' => 'multi_draw', '_controller' => 'App\\Controller\\CardController::multiDraw'], ['num'], null, null, false, true, null]],
        119 => [[['_route' => 'read_one', '_controller' => 'App\\Controller\\LibraryController::readOne'], ['bookid'], null, null, false, true, null]],
        140 => [[['_route' => 'edit_book', '_controller' => 'App\\Controller\\LibraryController::updateFormBook'], ['bookid'], null, null, false, true, null]],
        163 => [[['_route' => 'update_book', '_controller' => 'App\\Controller\\LibraryController::updateBook'], ['bookid'], ['POST' => 0], null, false, true, null]],
        186 => [
            [['_route' => 'delete_book', '_controller' => 'App\\Controller\\LibraryController::deleteBook'], ['bookid'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
