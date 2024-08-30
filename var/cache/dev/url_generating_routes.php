<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'api_blackjack_setup' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameSetup'], [], [['text', '/proj/api/blackjack/setup']], [], [], []],
    'api_blackjack_status' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameStatus'], [], [['text', '/proj/api/blackjack/status']], [], [], []],
    'api_blackjack_hit' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameHit'], [], [['text', '/proj/api/blackjack/hit']], [], [], []],
    'api_blackjack_stand' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameStand'], [], [['text', '/proj/api/blackjack/stand']], [], [], []],
    'api_blackjack_deck' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameDeck'], [], [['text', '/proj/api/blackjack/deck']], [], [], []],
    'api_deck' => [[], ['_controller' => 'App\\Controller\\ApiCardController::apiDeck'], [], [['text', '/api/deck']], [], [], []],
    'api_deck_shuffle' => [[], ['_controller' => 'App\\Controller\\ApiCardController::apiDeckShuffle'], [], [['text', '/api/deck/shuffle']], [], [], []],
    'api_deck_draw' => [[], ['_controller' => 'App\\Controller\\ApiCardController::apiDraw'], [], [['text', '/api/deck/draw']], [], [], []],
    'api_deck_multi_draw' => [['num'], ['_controller' => 'App\\Controller\\ApiCardController::apiMultiDraw'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/api/deck/draw']], [], [], []],
    'api' => [[], ['_controller' => 'App\\Controller\\ApiController::api'], [], [['text', '/api']], [], [], []],
    'quote' => [[], ['_controller' => 'App\\Controller\\ApiController::apiQuote'], [], [['text', '/api/quote']], [], [], []],
    'api_library' => [[], ['_controller' => 'App\\Controller\\ApiLibraryController::apiLibrary'], [], [['text', '/api/library/books']], [], [], []],
    'api_library_isbn' => [['isbn'], ['_controller' => 'App\\Controller\\ApiLibraryController::apiBookIsbn'], [], [['variable', '/', '[^/]++', 'isbn', true], ['text', '/api/library/book']], [], [], []],
    'blackjack_home' => [[], ['_controller' => 'App\\Controller\\BlackJackController::home'], [], [['text', '/proj/blackjack']], [], [], []],
    'blackjack_start' => [[], ['_controller' => 'App\\Controller\\BlackJackController::start'], [], [['text', '/proj/blackjack/start']], [], [], []],
    'blackjack_game' => [[], ['_controller' => 'App\\Controller\\BlackJackController::game'], [], [['text', '/proj/blackjack/game']], [], [], []],
    'blackjack_hit' => [[], ['_controller' => 'App\\Controller\\BlackJackController::hit'], [], [['text', '/proj/blackjack/hit']], [], [], []],
    'blackjack_stand' => [[], ['_controller' => 'App\\Controller\\BlackJackController::stand'], [], [['text', '/proj/blackjack/stand']], [], [], []],
    'black_jack_create_player_form' => [[], ['_controller' => 'App\\Controller\\BlackJackController::createPlayerForm'], [], [['text', '/proj/blackjack/create_player_form']], [], [], []],
    'black_jack_create_player' => [[], ['_controller' => 'App\\Controller\\BlackJackController::createPlayer'], [], [['text', '/blackjack/player/create']], [], [], []],
    'black_jack_delete_player' => [['playerid'], ['_controller' => 'App\\Controller\\BlackJackController::deletePlayer'], [], [['variable', '/', '[^/]++', 'playerid', true], ['text', '/proj/blackjack/player/delete']], [], [], []],
    'card' => [[], ['_controller' => 'App\\Controller\\CardController::card'], [], [['text', '/card']], [], [], []],
    'deck' => [[], ['_controller' => 'App\\Controller\\CardController::deck'], [], [['text', '/card/deck']], [], [], []],
    'shuffle' => [[], ['_controller' => 'App\\Controller\\CardController::shuffle'], [], [['text', '/card/deck/shuffle']], [], [], []],
    'draw' => [[], ['_controller' => 'App\\Controller\\CardController::draw'], [], [['text', '/card/deck/draw']], [], [], []],
    'multi_draw' => [['num'], ['_controller' => 'App\\Controller\\CardController::multiDraw'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'library' => [[], ['_controller' => 'App\\Controller\\LibraryController::index'], [], [['text', '/library']], [], [], []],
    'create' => [[], ['_controller' => 'App\\Controller\\LibraryController::createFormBook'], [], [['text', '/library/create']], [], [], []],
    'create_book' => [[], ['_controller' => 'App\\Controller\\LibraryController::createBook'], [], [['text', '/library/create/book']], [], [], []],
    'read_one' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::readOne'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book']], [], [], []],
    'read_many' => [[], ['_controller' => 'App\\Controller\\LibraryController::readMany'], [], [['text', '/library/books']], [], [], []],
    'edit_book' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::updateFormBook'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book/edit']], [], [], []],
    'update_book' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::updateBook'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book/update']], [], [], []],
    'delete_book' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::deleteBook'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book/delete']], [], [], []],
    'proj_home' => [[], ['_controller' => 'App\\Controller\\ProjController::home'], [], [['text', '/proj']], [], [], []],
    'proj_about' => [[], ['_controller' => 'App\\Controller\\ProjController::about'], [], [['text', '/proj/about']], [], [], []],
    'proj_about_database' => [[], ['_controller' => 'App\\Controller\\ProjController::aboutDatabase'], [], [['text', '/proj/about/database']], [], [], []],
    'proj_api' => [[], ['_controller' => 'App\\Controller\\ProjController::apiBlackJack'], [], [['text', '/proj/api']], [], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\ReportController::home'], [], [['text', '/']], [], [], []],
    'about' => [[], ['_controller' => 'App\\Controller\\ReportController::about'], [], [['text', '/about']], [], [], []],
    'report' => [[], ['_controller' => 'App\\Controller\\ReportController::report'], [], [['text', '/report']], [], [], []],
    'lucky' => [[], ['_controller' => 'App\\Controller\\ReportController::lucky'], [], [['text', '/lucky']], [], [], []],
    'metrics' => [[], ['_controller' => 'App\\Controller\\ReportController::metrics'], [], [['text', '/metrics']], [], [], []],
    'session' => [[], ['_controller' => 'App\\Controller\\ReportController::session'], [], [['text', '/session']], [], [], []],
    'session_delete' => [[], ['_controller' => 'App\\Controller\\ReportController::sessionDelete'], [], [['text', '/session/delete']], [], [], []],
    'game' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::home'], [], [['text', '/game']], [], [], []],
    'game_start' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::start'], [], [['text', '/game/start']], [], [], []],
    'game_hit' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::hit'], [], [['text', '/game/hit']], [], [], []],
    'game_stand' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::stand'], [], [['text', '/game/stand']], [], [], []],
    'game_doc' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::doc'], [], [['text', '/game/doc']], [], [], []],
    'api_game_status' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::apiGameStatus'], [], [['text', '/api/game']], [], [], []],
    'App\Controller\ApiBlackJackController::apiGameSetup' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameSetup'], [], [['text', '/proj/api/blackjack/setup']], [], [], []],
    'App\Controller\ApiBlackJackController::apiGameStatus' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameStatus'], [], [['text', '/proj/api/blackjack/status']], [], [], []],
    'App\Controller\ApiBlackJackController::apiGameHit' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameHit'], [], [['text', '/proj/api/blackjack/hit']], [], [], []],
    'App\Controller\ApiBlackJackController::apiGameStand' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameStand'], [], [['text', '/proj/api/blackjack/stand']], [], [], []],
    'App\Controller\ApiBlackJackController::apiGameDeck' => [[], ['_controller' => 'App\\Controller\\ApiBlackJackController::apiGameDeck'], [], [['text', '/proj/api/blackjack/deck']], [], [], []],
    'App\Controller\ApiCardController::apiDeck' => [[], ['_controller' => 'App\\Controller\\ApiCardController::apiDeck'], [], [['text', '/api/deck']], [], [], []],
    'App\Controller\ApiCardController::apiDeckShuffle' => [[], ['_controller' => 'App\\Controller\\ApiCardController::apiDeckShuffle'], [], [['text', '/api/deck/shuffle']], [], [], []],
    'App\Controller\ApiCardController::apiDraw' => [[], ['_controller' => 'App\\Controller\\ApiCardController::apiDraw'], [], [['text', '/api/deck/draw']], [], [], []],
    'App\Controller\ApiCardController::apiMultiDraw' => [['num'], ['_controller' => 'App\\Controller\\ApiCardController::apiMultiDraw'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/api/deck/draw']], [], [], []],
    'App\Controller\ApiController::api' => [[], ['_controller' => 'App\\Controller\\ApiController::api'], [], [['text', '/api']], [], [], []],
    'App\Controller\ApiController::apiQuote' => [[], ['_controller' => 'App\\Controller\\ApiController::apiQuote'], [], [['text', '/api/quote']], [], [], []],
    'App\Controller\ApiLibraryController::apiLibrary' => [[], ['_controller' => 'App\\Controller\\ApiLibraryController::apiLibrary'], [], [['text', '/api/library/books']], [], [], []],
    'App\Controller\ApiLibraryController::apiBookIsbn' => [['isbn'], ['_controller' => 'App\\Controller\\ApiLibraryController::apiBookIsbn'], [], [['variable', '/', '[^/]++', 'isbn', true], ['text', '/api/library/book']], [], [], []],
    'App\Controller\BlackJackController::home' => [[], ['_controller' => 'App\\Controller\\BlackJackController::home'], [], [['text', '/proj/blackjack']], [], [], []],
    'App\Controller\BlackJackController::start' => [[], ['_controller' => 'App\\Controller\\BlackJackController::start'], [], [['text', '/proj/blackjack/start']], [], [], []],
    'App\Controller\BlackJackController::game' => [[], ['_controller' => 'App\\Controller\\BlackJackController::game'], [], [['text', '/proj/blackjack/game']], [], [], []],
    'App\Controller\BlackJackController::hit' => [[], ['_controller' => 'App\\Controller\\BlackJackController::hit'], [], [['text', '/proj/blackjack/hit']], [], [], []],
    'App\Controller\BlackJackController::stand' => [[], ['_controller' => 'App\\Controller\\BlackJackController::stand'], [], [['text', '/proj/blackjack/stand']], [], [], []],
    'App\Controller\BlackJackController::createPlayerForm' => [[], ['_controller' => 'App\\Controller\\BlackJackController::createPlayerForm'], [], [['text', '/proj/blackjack/create_player_form']], [], [], []],
    'App\Controller\BlackJackController::createPlayer' => [[], ['_controller' => 'App\\Controller\\BlackJackController::createPlayer'], [], [['text', '/blackjack/player/create']], [], [], []],
    'App\Controller\BlackJackController::deletePlayer' => [['playerid'], ['_controller' => 'App\\Controller\\BlackJackController::deletePlayer'], [], [['variable', '/', '[^/]++', 'playerid', true], ['text', '/proj/blackjack/player/delete']], [], [], []],
    'App\Controller\CardController::card' => [[], ['_controller' => 'App\\Controller\\CardController::card'], [], [['text', '/card']], [], [], []],
    'App\Controller\CardController::deck' => [[], ['_controller' => 'App\\Controller\\CardController::deck'], [], [['text', '/card/deck']], [], [], []],
    'App\Controller\CardController::shuffle' => [[], ['_controller' => 'App\\Controller\\CardController::shuffle'], [], [['text', '/card/deck/shuffle']], [], [], []],
    'App\Controller\CardController::draw' => [[], ['_controller' => 'App\\Controller\\CardController::draw'], [], [['text', '/card/deck/draw']], [], [], []],
    'App\Controller\CardController::multiDraw' => [['num'], ['_controller' => 'App\\Controller\\CardController::multiDraw'], ['num' => '\\d+'], [['variable', '/', '\\d+', 'num', true], ['text', '/card/deck/draw']], [], [], []],
    'App\Controller\LibraryController::index' => [[], ['_controller' => 'App\\Controller\\LibraryController::index'], [], [['text', '/library']], [], [], []],
    'App\Controller\LibraryController::createFormBook' => [[], ['_controller' => 'App\\Controller\\LibraryController::createFormBook'], [], [['text', '/library/create']], [], [], []],
    'App\Controller\LibraryController::createBook' => [[], ['_controller' => 'App\\Controller\\LibraryController::createBook'], [], [['text', '/library/create/book']], [], [], []],
    'App\Controller\LibraryController::readOne' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::readOne'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book']], [], [], []],
    'App\Controller\LibraryController::readMany' => [[], ['_controller' => 'App\\Controller\\LibraryController::readMany'], [], [['text', '/library/books']], [], [], []],
    'App\Controller\LibraryController::updateFormBook' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::updateFormBook'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book/edit']], [], [], []],
    'App\Controller\LibraryController::updateBook' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::updateBook'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book/update']], [], [], []],
    'App\Controller\LibraryController::deleteBook' => [['bookid'], ['_controller' => 'App\\Controller\\LibraryController::deleteBook'], [], [['variable', '/', '[^/]++', 'bookid', true], ['text', '/library/book/delete']], [], [], []],
    'App\Controller\ProjController::home' => [[], ['_controller' => 'App\\Controller\\ProjController::home'], [], [['text', '/proj']], [], [], []],
    'App\Controller\ProjController::about' => [[], ['_controller' => 'App\\Controller\\ProjController::about'], [], [['text', '/proj/about']], [], [], []],
    'App\Controller\ProjController::aboutDatabase' => [[], ['_controller' => 'App\\Controller\\ProjController::aboutDatabase'], [], [['text', '/proj/about/database']], [], [], []],
    'App\Controller\ProjController::apiBlackJack' => [[], ['_controller' => 'App\\Controller\\ProjController::apiBlackJack'], [], [['text', '/proj/api']], [], [], []],
    'App\Controller\ReportController::home' => [[], ['_controller' => 'App\\Controller\\ReportController::home'], [], [['text', '/']], [], [], []],
    'App\Controller\ReportController::about' => [[], ['_controller' => 'App\\Controller\\ReportController::about'], [], [['text', '/about']], [], [], []],
    'App\Controller\ReportController::report' => [[], ['_controller' => 'App\\Controller\\ReportController::report'], [], [['text', '/report']], [], [], []],
    'App\Controller\ReportController::lucky' => [[], ['_controller' => 'App\\Controller\\ReportController::lucky'], [], [['text', '/lucky']], [], [], []],
    'App\Controller\ReportController::metrics' => [[], ['_controller' => 'App\\Controller\\ReportController::metrics'], [], [['text', '/metrics']], [], [], []],
    'App\Controller\ReportController::session' => [[], ['_controller' => 'App\\Controller\\ReportController::session'], [], [['text', '/session']], [], [], []],
    'App\Controller\ReportController::sessionDelete' => [[], ['_controller' => 'App\\Controller\\ReportController::sessionDelete'], [], [['text', '/session/delete']], [], [], []],
    'App\Controller\TwentyOneController::home' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::home'], [], [['text', '/game']], [], [], []],
    'App\Controller\TwentyOneController::start' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::start'], [], [['text', '/game/start']], [], [], []],
    'App\Controller\TwentyOneController::hit' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::hit'], [], [['text', '/game/hit']], [], [], []],
    'App\Controller\TwentyOneController::stand' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::stand'], [], [['text', '/game/stand']], [], [], []],
    'App\Controller\TwentyOneController::doc' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::doc'], [], [['text', '/game/doc']], [], [], []],
    'App\Controller\TwentyOneController::apiGameStatus' => [[], ['_controller' => 'App\\Controller\\TwentyOneController::apiGameStatus'], [], [['text', '/api/game']], [], [], []],
];
