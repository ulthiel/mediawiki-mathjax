<?php
/**
	MathJax for Mediawiki.
	This is originally due to Dirk Nuyens.
	His v0.7 (Apr 2012) was forked by hbshim (Dec 2015), this in turn by xeyownt (May 2019), and I have forked the latter (May 2020).
**/

class MathJax_Parser {
	static $Markers;
	static $mark_n = 0;

	private static $moduleLoaded = false;

	public static function onRegistration() {
		Hooks::register( 'ParserFirstCallInit', __CLASS__ . '::setup' );
	}

	public static function setup( Parser $parser )
	{
		$parser->setHook( 'nomath' , 'MathJax_Parser::NoMathJax' );

		global $wgOut, $wgMjModule;

		$wgOut->addModules( 'ext.' . $wgMjModule );

	}

	static function RemoveMathTags(&$parser, &$text)
	{
		$text = preg_replace('|:\s*<math>(.*?)</math>|s', '\\[$1\\]', $text);
		$text = preg_replace('|<math>(.*?)</math>|s',     '\\($1\\)', $text);

		return true;
	}

	static function ReplaceByMarkers(Parser &$parser, &$text )
	{
		// $$...$$
		$text = preg_replace_callback('/(\$\$)(.*?)(\$\$)/s', 'MathJax_Parser::Marker',$text);

		// $...$
		//comment the following line if you don't want to use single $ as math
		//environment indicactor.
		$text = preg_replace_callback('|(?<![\{\/\:\\\\])(\$)(.*?)(?<![\\\\])(\$)|s', 'MathJax_Parser::Marker', $text);

		// \[...\]
		$text = preg_replace_callback('/(\\\\\[)(.*?)(\\\\\])/s', 'MathJax_Parser::Marker', $text);

		// \(...\)
		$text = preg_replace_callback('/(\\\\\()(.*?)(\\\\\))/s', 'MathJax_Parser::Marker', $text);

		// \begin{...}...\end{...}
		$text = preg_replace_callback('/(\\\begin{(?:.*?)})(.*?)(\\\end{(?:.*?)})/s', 'MathJax_Parser::Marker', $text);

		return true;
	}

	static function NoMathJax( $text, array $args, Parser $parser, PPFrame $frame )
	{
		$output = $parser->recursiveTagParse($text, $frame);

		return '<nomath>' . $output . '</nomath>';
	}

	static function RemoveMarkers( Parser &$parser, &$text )
	{

		$text = preg_replace_callback('/' . Parser::MARKER_PREFIX . 'MathJax(?:.*?)' . Parser::MARKER_SUFFIX . '/s', 'MathJax_Parser::MarkerVal', $text);

		return true;
	}

	static function MarkerVal($matches)
	{
		return self::$Markers[$matches[0]];
	}


	static function Marker($matches)
	{
		$marker = Parser::MARKER_PREFIX . 'MathJax' . ++self::$mark_n . Parser::MARKER_SUFFIX;

		$matches[2] = str_replace('<', '&#60;', $matches[2]);
		$matches[2] = str_replace('>', '&#62;', $matches[2]);
		self::$Markers[$marker] =  $matches[1] . $matches[2] . $matches[3];

		return $marker;
	}
}
