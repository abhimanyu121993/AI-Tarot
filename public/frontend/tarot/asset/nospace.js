
		jQuery.fn.selectText = function () {
			this.find('input').each(function () {
				if ($(this).prev().length == 0 || !$(this).prev().hasClass('p_copy')) {
					$('<p class="p_copy" style="position: absolute; z-index: -1;"></p>').insertBefore($(this));
				}
				$(this).prev().html($(this).val());
			});
			var doc = document;
			var element = this[0];
			console.log(this, element);
			if (doc.body.createTextRange) {
				var range = document.body.createTextRange();
				range.moveToElementText(element);
				range.select();
			} else if (window.getSelection) {
				var selection = window.getSelection();
				var range = document.createRange();
				range.selectNodeContents(element);
				selection.removeAllRanges();
				selection.addRange(range);
			}
		};
		jQuery(document).ready(function () {
			jQuery("#smeaning").attr("data-toggle", "modal").attr("data-target", "#mMdl");
			jQuery("header").on("mouseover", function () {
				jQuery("header").css("z-index", "10000000");
			});
			jQuery(".magicard-commands > div").each(function () {
				jQuery(this).children("i").remove();
			});
			if (jQuery(".widget_magicards_widget").length > 0) {
				jQuery("#smeaning").removeAttr("href").css("cursor", "pointer").css("user-select", "none");
				jQuery(".magicard-clicker, .magicard-back").unbind("click").bind("click");
				(function (jQuery) {
					jQuery.fn.clickToggle = function (func1, func2) {
						var funcs = [func1, func2];
						this.data('toggleclicked', 0);
						this.click(function () {
							var data = jQuery(this).data();
							var tc = data.toggleclicked;
							jQuery.proxy(funcs[tc], this)();
							data.toggleclicked = (tc + 1) % 2;
						});
						return this;
					};
				}(jQuery));
				jQuery(".magicard-toggle").unbind("click");
				var getcode = jQuery(".magicard-flipper").parent().html();
				jQuery(".magicard-flipper").parent().append(getcode);
				jQuery(".magicard-shuffle").on("click", function () {
					if (jQuery("#ques").val() == "") {
					} else {
						jQuery("#mModle").attr("id", "mMdl");
						jQuery("header").css("z-index", "90");
						jQuery(".magicard-toggle").unbind("click");
						jQuery("#smeaning").unbind("click");
						var s;
						var orgLeft = jQuery(".magicard-flipper").parent().children("div:nth-child(2)").css("left");
						for (s = 1; s <= 10; s++) {
							jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({ left: '40.2%', top: '8%' }, 110, function () { jQuery(this).css('z-index', 10000) });
							jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({ left: '50%', top: '-8%' }, 110, function () { jQuery(this).css('z-index', -10000) });
							jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({ left: orgLeft, top: '2%' }, 110, function () { jQuery(this).css('z-index', 10000) });
							jQuery(".magicard-flipper").parent().children("div:nth-child(2)").animate({ left: orgLeft, top: '2%' }, 10, function () { jQuery(this).css('z-index', 0) });
						}
						jQuery(".magicard-flipper").parent().children("div:nth-child(2)").css("{z-index: 0 !important;}");
						setTimeout(function () {
							jQuery('.magicard-toggle').bind("click", function () {
								jQuery(".magicard-back, .magicard-description").css("left", "0px");
								jQuery(".magicard-description").css("padding", "0px 20px");
								if (jQuery(".magicard-wrap").hasClass("magicard-hover")) {
									jQuery(".magicard-wrap").addClass("magicard-wrap").removeClass("magicard-hover").removeClass("magicard-toggle-open");
									jQuery(".magicard-tooltip").animate({ scrollTop: (0, 0) }, 1000);
								} else {
									jQuery(".magicard-wrap").addClass("magicard-wrap").addClass("magicard-hover");
									jQuery('#smeaning').bind("click", function () {
										jQuery(".ktp .magicard-description").html('<img  title="Loading..." data-src="/wp-content/themes/tarotmoon/ajax.gif" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img src="/wp-content/themes/tarotmoon/ajax.gif" title="Loading..."/></noscript>');
										function replace_last_comma_with_and(x) {
											if (x.startsWith('.')) {
												return x.replace(x.charAt(0), '');
											} else if (x.startsWith('!')) {
												return x.replace(x.charAt(0), '');
											} else if (x.startsWith('?')) {
												return x.replace(x.charAt(0), '');
											}
											if (x.endsWith(('.', '!', '?'))) {
												return x;
											} else {
												if (x.lastIndexOf("?") > 1) {
													var pos = x.lastIndexOf('?');
													return x.substring(0, pos) + "?";
												} else if (x.lastIndexOf("!") > 1) {
													var pos = x.lastIndexOf('!');
													return x.substring(0, pos) + "!";
												} else if (x.lastIndexOf(".") > 1) {
													var pos = x.lastIndexOf('.');
													return x.substring(0, pos) + ".";
												}
											}
										}
										function removeLastSentence(output) {
											output = output.replace("###", "");
											return replace_last_comma_with_and(output);
										}
										async function gptCall(prompt) {
											let data = {
												"model": "curie:ft-personal-2021-12-20-15-21-20",
												"prompt": prompt,
												"temperature": 0.7,
												"max_tokens": 160,
												"top_p": 0.9,
												"frequency_penalty": 0.5,
												"presence_penalty": 0.2,
												"stop": ["/-/-/-/-/"]
											}
											const response = await fetch('https://api.openai.com/v1/completions', {
												method: 'POST',
												headers: {
													'Authorization': 'Bearer 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',
													'Content-Type': 'application/json'
												},
												body: JSON.stringify(data)
											});
											const result = await response.json();
											var ai_text = result.choices[0].text;
											var remove = removeLastSentence(ai_text);
											jQuery(".ktp .magicard-description").html(remove);
											jQuery(".ajax").css("display", "none");
											if (!ai_text.endsWith(".")) {
												var removed = removeLastSentence(ai_text);
												return removed
											} else {
											}
										}
										window.setTimeout(function () {
											var aitext = gptCall("My tarot card is " + jQuery(".modal-body.toadd .magicard-caption").text() + ". " + jQuery('#ques').val());
											jQuery(".ajax").css("display", "block");
										}, 2000);
										jQuery(".magi-cus-page").css("z-index", "1000 !important");
										jQuery(".magicard-wrap").addClass("magicard-wrap").addClass("magicard-hover").addClass("magicard-toggle-open");
										var htmlsec = jQuery(".magicard-flipper").parent().children("div:nth-child(1)").children(".magicard-tooltip").children(".magicard-caption").parent().html();
										jQuery(".toadd .ktp").html(htmlsec);
										var txt = "";

										var url = '<meta property="og:url" content="' + + '" />';
										var web = '<meta property="og:type" content="website" />';
										var title = '<meta property="og:title" content="' + jQuery(".share_title").text() + '" />';
										var desc = '<meta property="og:description" content="' + jQuery(".ktp").text() + '" />';
										var img = '<meta property="og:image" content="" />';
										jQuery('head').append(url + web + title + desc + img);
										jQuery(".popupParent").css("display", "block");
										jQuery(".magicard-flipper").parent().children("div:nth-child(1)").children(".magicard-tooltip").css("opacity", "0");
										var htxml = jQuery(".highlight-and-share-wrapper-cts").next().html();
										jQuery(".social_share_icons .a2a_kit").html(htxml);
										jQuery(".a2a_kit > div").each(function () {
											jQuery(this).children("a").children("span").remove();
											jQuery(this).children("a").on("mouseover", function () {
												jQuery(".share_sec").selectText();
											});
										});
										window.setInterval(function () {
											var tw = jQuery(".modal-backdrop.fade.show").next().children(".has_twitter").children("a").attr("href");
											jQuery(".a2a_kit .has_twitter").children("a").attr("href", tw);
											var fb = jQuery(".modal-backdrop.fade.show").next().children(".has_facebook").children("a").attr("href");
											jQuery(".a2a_kit .has_facebook").children("a").attr("href", fb);
											var ln = jQuery(".modal-backdrop.fade.show").next().children(".has_linkedin").children("a").attr("href");
											jQuery(".a2a_kit .has_linkedin").children("a").attr("href", ln);
											var ems = jQuery(".modal-backdrop.fade.show").next().children(".has_email").children("a").attr("href");
											jQuery(".a2a_kit .has_email").children("a").attr("href", ems);
											var pt = jQuery(".modal-backdrop.fade.show").next().children(".has_pinterest").children("a").attr("href");
											jQuery(".a2a_kit .has_pinterest").children("a").attr("href", pt);
											var wa = jQuery(".modal-backdrop.fade.show").next().children(".has_whatsapp").children("a").attr("href");
											jQuery(".a2a_kit .has_whatsapp").children("a").attr("href", wa);
										}, 500);
										var titleX = jQuery(".share_sec .magicard-caption").text();
										jQuery(".share_sec  .magicard-caption").remove();
										jQuery(".modal-body.toadd > h4").each(function () {
											jQuery(this).remove();
										});
										jQuery(".modal-body.toadd").prepend('<h4 class="magicard-caption">' + titleX + '</h4>');
										window.setTimeout(function () {
											//WA
											jQuery(".social_share_icons .a2a_kit div.has_whatsapp a").attr("href", jQuery(".social_share_icons .a2a_kit div.has_whatsapp a").attr("href").replace(": %url%", ""));
											var hrf = "index.html";
											jQuery(".social_share_icons .a2a_kit div").each(function () {
												var hrfs = jQuery(this).children("a").attr("href").replace("%url%", hrf);
												jQuery(this).children("a").attr("href", hrfs);
											});
										}, 1000);
										jQuery(".modal-body.toadd button").on("click", function () {
											jQuery('#ques').val("");
											jQuery("#bts .magicard-shuffle").click();

										});
									});
									jQuery(".magicard-tooltip").animate({ scrollTop: (0, 0) }, 1000);
								}
							});
						}, 3200);
					}
				});
			}
			jQuery('button[data-dismiss="modal"]').on("click", function () {
				jQuery(".modal-body.toadd h4").each(function () {
					jQuery(this).remove();
				});
			});
			jQuery(document).on("click", ".es-list li", function () {
				jQuery(this).parent().css("display", "none");
			});
			jQuery(document).on("click", "#ques", function () {
				jQuery(".es-list").css("display", "block");
			});
			jQuery("#study-topics").accordionjs();
			jQuery("#study-topics li").each(function () {
				jQuery(this).removeClass("acc_active");
			});
			jQuery("#study-topics li:nth-child(1) .acc_content").css("display", "none");
			jQuery(".magicard-shuffle strong").text("2");
			jQuery(".magicard-toggle strong").text("3");
			jQuery("#smeaning strong").text("4");
			jQuery(".magicard-commands.align-center").prepend("<form><select id='ques' name='search' placeholder='Type a question or select from list' maxlength='35'><option value='1'>Am I going to become wealthy?</option><option value='2'>Will I find love?</option><option value='3'>Will today be a good day?</option><option value='3'>Will my relationship succeed?</option><option value='4'>Will I have a good future?</option><option value='5'>What do others think of me?</option><option value='6'>How can I improve my health?</option><option value='7'>Should I change careers?</option></select></form>");
			jQuery('#ques').editableSelect({
				filter: false,
				trigger: 'focus'
			});
			var input = document.getElementById("ques");
			input.addEventListener("keyup", function (event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					jQuery(".es-list").css("display", "none");
					jQuery(".magicard-shuffle").click();
					window.setTimeout(function () {
						var aitext = gptCall("My tarot card is " + jQuery(".modal-body.toadd .magicard-caption").text() + ". " + jQuery('#ques').val());
						jQuery(".ajax").css("display", "block");
					}, 2000);
				}
			});
		});
	