$.getScript( '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js',
	function () {
		MathJax.Hub.Config({
			extensions: ["tex2jax.js"],
			jax: ["input/TeX", "output/HTML-CSS"],
			tex2jax: {
				inlineMath: [["$","$"],["\\(","\\)"]],
				displayMath: [ ["$$","$$"], ["\\[","\\]"] ],
				processEscapes: true,
				skipTags: ["script","noscript","style","textarea","pre","code", "nomath", "syntaxhighlight"]
			},
			TeX: {
				equationNumbers: { autoNumber: "AMS" },
				extensions: ["AMSmath.js","AMSsymbols.js"],
				Macros: {
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
			}
		});
	}
);
