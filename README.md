# Web to Sheets Scraper

## This project is used to dabble in a PHP scraper library and google's API for docs.

### Background
I use google docs to manage some golf pools. It can be tough to update all the scores of a few players throughout a tournament. Using [ESPN's leaderboard](http://www.espn.com/golf/leaderboard), I designed this project to easily pull in up-to-date scores for a handful of golfers into a google sheet.


### Technical Bits
Leaning on some specific tools for this:
 * [DOMXPath class](http://php.net/manual/en/class.domxpath.php) to grab the text from the HTML of ESPN's leaderboard.
 * [Google's PHP API client](https://developers.google.com/drive/v3/web/quickstart/php) (via composer) to access Google Sheets.
