// import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 * 
 *  php -S localhost:8888 -t public
 */
import './styles/app.scss';
import hello from './js/hello.js';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
console.log(hello())
