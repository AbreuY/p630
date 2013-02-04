// JavaScript Document:::Banner Script.
var tpj=jQuery;

				tpj(document).ready(function() {
				
				if (tpj.fn.cssOriginal != undefined)
					tpj.fn.css = tpj.fn.cssOriginal;

				tpj("#rev_slider_1_1").show().revolution(
					{
						delay:9000,
						startwidth:960,
						startheight:450,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"bullet",
						navigationArrows:"verticalcentered",
						navigationStyle:"round",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						navOffsetHorizontal:0,
						navOffsetVertical:-25,
						
						shadow:1,
						fullWidth:"on"
					});
				});	//ready

