$.getScript( '//cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js',
	MathJax = {
		tex: {

			//math environment symbols
			inlineMath: [['$', '$'], ['\\(', '\\)']],
			displayMath: [ ['$$', '$$'] , ['\\[', '\\]'] ],

			//equation numebring
			tags: 'ams', //equation numbering

			//some basic macros
			macros: {
				NN: "{\\mathbb{N}}",
				ZZ: "{\\mathbb{Z}}",
				QQ: "{\\mathbb{Q}}",
				RR: "{\\mathbb{R}}",
				CC: "{\\mathbb{C}}",

				Hom: "{\\mathop{\\mathrm{Hom}}\\nolimits}",
				End: "{\\mathop{\\mathrm{End}}\\nolimits}",
				Ker: "{\\mathop{\\mathrm{Ker}}\\nolimits}",
				Image: "{\\mathop{\\mathrm{Im}}\\nolimits}",

				coloneq: "{\\mathrel{\\vcenter{:}}=}"
			}
		},

		svg: {
			fontCache: 'global'
		},

		loader: {
			source: {
				'[tex]/amsCd': '[tex]/amscd', //fixes capitalization issue
				'[tex]/AMScd': '[tex]/amscd' //compatibility with MathJax 2
			}
		},

		//tags to skip from parsing
		options: {
			skipHtmlTags: {'[+]': ['nomath', 'syntaxhighlight']}
		}
	}
);
