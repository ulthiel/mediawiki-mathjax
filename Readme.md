# mediawiki-mathjax

A [MediaWiki](https://www.mediawiki.org/wiki/MediaWiki) extension for [MathJax](https://www.mathjax.org). A fork of [Extension:MathJax](https://www.mediawiki.org/wiki/Extension:MathJax) that supports both MathJax version 2 and the new version 3. Tested with MediaWiki 1.34.

## Installation

Simply clone this repository into the ```extensions``` directory of your mediawiki installation and add the line
```
wfLoadExtension( 'mediawiki-mathjax' );
```
to your ```Localsettings.php``` file. The extension has 2 modules (located in the ```modules``` subdirectory) called ```ext.Mj2.js``` (for MathJax 2) and ```ext.Mj3.js``` (for MathJax 3). You can select the module by setting the  ```$wgMjModule``` in ```LocalSettings.php``` to ```Mj2``` or to ```Mj3``` (default), e.g.
```
wfLoadExtension( 'mediawiki-mathjax' );
$wgMjModule = "Mj2"; //default is Mj3
```
MathJax is best configured in the modules themselves (see the [MathJax documentation](https://docs.mathjax.org/en/latest/index.html)). I've added a minimal standard configuration; if you want to do your own changes, I suggest copying the module file ```ext.MjX.js``` to ```ext.MjX-local.js```, do the changes in the latter, and then set ```$wgMjModule``` in ```LocalSettings.php``` to ```MjX-local```.

In contrast to the official Extension:MathJax, my default configuration supports a single Dollar for math environments. This is particularly useful for personal pure math Wikis as you can basically type standard LaTeX. If you want to deactivate this, you should comment out the particular line the parser in the file ```MathJax_body.php``` and remove the single dollar from the ```inlineMath``` section in the module.

## History
This extension is originally due to Dirk Nuyens (initial public release v0.5, Nov 2011). The last version by Nuyens was v0.7 (Apr 2012). It was forked by [hbshim](https://github.com/hbshim/mediawiki-mathjax) (Dec 2015), then by [xeyownt](https://github.com/xeyownt/mediawiki-mathjax) (May 2019) who made this extension compatible with newer MediaWikis and changed to resource modules. I have forked this latter version (May 2020) and added support for the new MathJax version 3 as well.
