# Scraper

This is a small PHP library using the [DOMXPath class](http://php.net/manual/en/class.domxpath.php) to scrape data from websites.

## Usage
To use create a new object from any url with the DOMScraper class.
```
$url = "www.google.com";
$scraper = new DOMScraper($url);
```

Using an [XPath query](https://www.w3schools.com/xml/xpath_syntax.asp), retrieve the text of any element within the HTML.
```
$xpath = //div(contains[@class,'mainText']);
$text = $scraper->getTextContent($xpath);
```

> The [Xpath Helper Chrome Extension](https://chrome.google.com/webstore/detail/xpath-helper/hgimnogjllphhhkhlmebbmlgjoejdpjl?hl=en) makes it easy to find the correct XPath for the desired element.

---
### See More...
I've been using these classes to extract teams from fleaflicker.com for my [Dynasty Footbal app](https://github.com/njcannington/dynasty_football);

---
