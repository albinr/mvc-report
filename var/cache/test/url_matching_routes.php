<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/blackjack/setup' => [[['_route' => 'api_blackjack_setup', '_controller' => 'App\\Controller\\ApiBlackJackController::apiGameSetup'], null, ['POST' => 0], null, false, false, null]],
        '/proj/api/blackjack' => [[['_route' => 'api_blackjack_status', '_controller' => 'App\\Controller\\ApiBlackJackController::apiGameStatus'], null, ['GET' => 0], null, false, false, null]],
        '/proj/api/blackjack/hit' => [[['_route' => 'api_blackjack_hit', '_controller' => 'App\\Controller\\ApiBlackJackController::apiGameHit'], null, null, null, false, false, null]],
        '/proj/api/blackjack/stand' => [[['_route' => 'api_blackjack_stand', '_controller' => 'App\\Controller\\ApiBlackJackController::apiGameStand'], null, null, null, false, false, null]],
        '/proj/api/blackjack/deck' => [[['_route' => 'api_blackjack_deck', '_controller' => 'App\\Controller\\ApiBlackJackController::apiGameDeck'], null, null, null, false, false, null]],
        '/api/deck' => [[['_route' => 'api_deck', '_controller' => 'App\\Controller\\ApiCardController::apiDeck'], null, ['GET' => 0], null, false, false, null]],
        '/api/deck/shuffle' => [[['_route' => 'api_deck_shuffle', '_controller' => 'App\\Controller\\ApiCardController::apiDeckShuffle'], null, ['POST' => 0], null, false, false, null]],
        '/api/deck/draw' => [[['_route' => 'api_deck_draw', '_controller' => 'App\\Controller\\ApiCardController::apiDraw'], null, ['POST' => 0], null, false, false, null]],
        '/api' => [[['_route' => 'api', '_controller' => 'App\\Controller\\ApiController::api'], null, null, null, false, false, null]],
        '/api/quote' => [[['_route' => 'quote', '_controller' => 'App\\Controller\\ApiController::apiQuote'], null, null, null, false, false, null]],
        '/api/library/books' => [[['_route' => 'api_library', '_controller' => 'App\\Controller\\ApiLibraryController::apiLibrary'], null, null, null, false, false, null]],
        '/proj/blackjack' => [[['_route' => 'blackjack_home', '_controller' => 'App\\Controller\\BlackJackController::home'], null, null, null, false, false, null]],
        '/proj/blackjack/start' => [[['_route' => 'blackjack_start', '_controller' => 'App\\Controller\\BlackJackController::start'], null, ['POST' => 0], null, false, false, null]],
        '/proj/blackjack/game' => [[['_route' => 'blackjack_game', '_controller' => 'App\\Controller\\BlackJackController::game'], null, null, null, false, false, null]],
        '/proj/blackjack/hit' => [[['_route' => 'blackjack_hit', '_controller' => 'App\\Controller\\BlackJackController::hit'], null, null, null, false, false, null]],
        '/proj/blackjack/stand' => [[['_route' => 'blackjack_stand', '_controller' => 'App\\Controller\\BlackJackController::stand'], null, null, null, false, false, null]],
        '/proj/blackjack/create_player_form' => [[['_route' => 'black_jack_create_player_form', '_controller' => 'App\\Controller\\BlackJackController::createPlayerForm'], null, null, null, false, false, null]],
        '/blackjack/player/create' => [[['_route' => 'black_jack_create_player', '_controller' => 'App\\Controller\\BlackJackController::createPlayer'], null, ['POST' => 0], null, false, false, null]],
        '/card' => [[['_route' => 'card', '_controller' => 'App\\Controller\\CardController::card'], null, null, null, false, false, null]],
        '/card/deck' => [[['_route' => 'deck', '_controller' => 'App\\Controller\\CardController::deck'], null, null, null, false, false, null]],
        '/card/deck/shuffle' => [[['_route' => 'shuffle', '_controller' => 'App\\Controller\\CardController::shuffle'], null, null, null, false, false, null]],
        '/card/deck/draw' => [[['_route' => 'draw', '_controller' => 'App\\Controller\\CardController::draw'], null, null, null, false, false, null]],
        '/library' => [[['_route' => 'library', '_controller' => 'App\\Controller\\LibraryController::index'], null, null, null, false, false, null]],
        '/library/create' => [[['_route' => 'create', '_controller' => 'App\\Controller\\LibraryController::createFormBook'], null, null, null, false, false, null]],
        '/library/create/book' => [[['_route' => 'create_book', '_controller' => 'App\\Controller\\LibraryController::createBook'], null, ['POST' => 0], null, false, false, null]],
        '/library/books' => [[['_route' => 'read_many', '_controller' => 'App\\Controller\\LibraryController::readMany'], null, null, null, false, false, null]],
        '/proj' => [[['_route' => 'proj_home', '_controller' => 'App\\Controller\\ProjController::home'], null, null, null, false, false, null]],
        '/proj/about' => [[['_route' => 'proj_about', '_controller' => 'App\\Controller\\ProjController::about'], null, null, null, false, false, null]],
        '/proj/api' => [[['_route' => 'proj_api', '_controller' => 'App\\Controller\\ProjController::apiBlackJack'], null, null, null, false, false, null]],
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
                .'|/proj/blackjack/player/delete/([^/]++)(*:104)'
                .'|/card/deck/draw/(\\d+)(*:133)'
                .'|/library/book/(?'
                    .'|([^/]++)(*:166)'
                    .'|edit/([^/]++)(*:187)'
                    .'|update/([^/]++)(*:210)'
                    .'|delete/([^/]++)(*:233)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        30 => [[['_route' => 'api_deck_multi_draw', '_controller' => 'App\\Controller\\ApiCardController::apiMultiDraw'], ['num'], null, null, false, true, null]],
        58 => [[['_route' => 'api_library_isbn', '_controller' => 'App\\Controller\\ApiLibraryController::apiBookIsbn'], ['isbn'], null, null, false, true, null]],
        104 => [[['_route' => 'black_jack_delete_player', '_controller' => 'App\\Controller\\BlackJackController::deletePlayer'], ['playerid'], ['POST' => 0], null, false, true, null]],
        133 => [[['_route' => 'multi_draw', '_controller' => 'App\\Controller\\CardController::multiDraw'], ['num'], null, null, false, true, null]],
        166 => [[['_route' => 'read_one', '_controller' => 'App\\Controller\\LibraryController::readOne'], ['bookid'], null, null, false, true, null]],
        187 => [[['_route' => 'edit_book', '_controller' => 'App\\Controller\\LibraryController::updateFormBook'], ['bookid'], null, null, false, true, null]],
        210 => [[['_route' => 'update_book', '_controller' => 'App\\Controller\\LibraryController::updateBook'], ['bookid'], ['POST' => 0], null, false, true, null]],
        233 => [
            [['_route' => 'delete_book', '_controller' => 'App\\Controller\\LibraryController::deleteBook'], ['bookid'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
