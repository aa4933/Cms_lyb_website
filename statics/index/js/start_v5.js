var Page = {
	init: function() {
		var a = this;
		a.adjustSize();
		a.bindEvent();
		a.bindNav();
		a.bindQQOnline();
		a.bindScroll();
		a.scrollPage();
		a.bindItem1();
		a.bindFeatureList();
		a.bindAgencyList();
		$(".nav.nav_1").click()
	},
	bindQQOnline: function() {
		$("#floatTrigger").bind("click", function() {
			if ($("#online_qq_layer").attr("show")) {
				$("#online_qq_layer").animate({
					right: "-140px"
				});
				$("#online_qq_layer").removeAttr("show")
			} else {
				$("#online_qq_layer").animate({
					right: "0px"
				});
				$("#online_qq_layer").attr("show", "1")
			}
			return false
		});
		$("#online_qq_layer").animate({
			right: "-140px"
		});
		$("#online_qq_layer").removeAttr("show");
		$(document).bind("click", function(a) {
			if ($(a.target).isChildOf("#online_qq_layer") == false) {
				$("#online_qq_layer").animate({
					right: "-140px"
				});
				$("#online_qq_layer").removeAttr("show")
			}
		});
		jQuery.fn.isChildAndSelfOf = function(a) {
			return (this.closest(a).length > 0)
		};
		jQuery.fn.isChildOf = function(a) {
			return (this.parents(a).length > 0)
		}
	},
	bindEvent: function() {
		var a = this;
		$(window).resize(function() {
			var b = $(window);
			setTimeout(function() {
				a.adjustSize()
			}, 300)
		}).resize()
	},
	bindItem1: function() {
		var e = this;
		var c = Math.ceil(Math.random() * 11);
		var b = $("<img id='bg' src='/tpl/Home/138wo/common/new/images/bg" + c + ".jpg' />");
		var d = $(".w-user input[name='username']");
		var a = $(".w-user input[name='password']");
		b.on("load", function() {
			$(".item_1 .bgwrap").append(b);
			var f = (e.getClientHeight() - b.height()) / 2;
			if (f > 0) {
				b.css({
					height: "100%"
				})
			} else {
				b.css({
					"margin-top": f + "px"
				})
			}
			b.fadeIn("200", function() {
				$(".item_1 .content").fadeIn(300)
			});
			$(".loading").hide()
		});
		$(".btn_wrap .login").click(function() {
			var f = e.getClientHeight();
			if ($(".m-login").height() == 0) {
				var g = f / 2 + 20 + "px";
				$(".m-login").css("visibility", "visible").animate({
					height: g,
					opacity: "1"
				}, 300, function() {
					if (d.val() == "") {
						d.focus()
					} else {
						a.focus()
					}
				});
				$(".m-login .cont").show();
				if (e.getClientHeight() / 2 > 190) {
					var i = (f / 2 - 190) / f * 100 + "%";
					$(".item_1 .content").animate({
						top: i
					}, 300)
				} else {
					$(".item_1 .content").animate({
						top: "0%"
					}, 300)
				}
				$("#bg").animate({
					opacity: "0.7"
				}, 300)
			} else {
				$(".m-login").animate({
					height: "0px",
					opacity: "0"
				}, 300, function() {
					$(".m-login").css("visibility", "hidden");
					$(".m-login .cont").hide()
				});
				$(".item_1 .content").animate({
					top: "40%"
				}, 300);
				$("#bg").animate({
					opacity: "1"
				}, 300)
			}
		});
		$(".w-user input[name='username'],.w-user input[name='password']").on("keyup", function() {
			if ($(this).val() == "") {
				$(this).prev().show()
			} else {
				$(this).prev().hide()
			}
		});
		$("#signin-btn").click(function(h) {
			h.stopPropagation();
			var g = $(this);
			if (g.hasClass("disabled")) {
				return false
			}
			if (!d.val()) {
				d.focus();
				return false
			}
			if (!a.val()) {
				a.focus();
				return false
			}
			var f = {
				username: d.val(),
				password: a.val()
			};
			g.addClass("disabled").find("span").text("登录中...");
			$.post("/login", f, function(i) {
				if (i.success == true) {
					$.cookie("username", d.val(), {
						expires: 14,
						path: "/"
					});
					if ($("#remember-pwd").is(":checked")) {
						$.cookie("password", i.secret, {
							expires: 14,
							path: "/"
						})
					} else {
						$.cookie("password", null)
					} if (i.binded) {
						window.location.href = "/admin/main.jsp"
					} else {
						window.location.href = "/admin/ai/bind?action=bind"
					}
				} else {
					g.removeClass("disabled").find("span").text("登 录");
					if (i.frozen) {
						alert("该账号因非法绑定，已被冻结，请您及时联系客服！")
					} else {
						alert("用户名或密码错误！")
					}
				}
			}, "json");
			return false
		});
		if ($.cookie("username")) {
			d.val($.cookie("username"));
			d.prev().hide()
		}
		$(".btn_wrap .review").click(function() {
			$(".navwrap .nav[inx=2]").click()
		});
		$(".nav_btn_wrap a").click(function() {
			var f = $(this).index() + 2;
			$(".navwrap .nav[inx=" + f + "]").click()
		})
	},
	bindFeatureList: function() {
		$(".feature_list li.feature").hover(function() {
			var b = $(this).closest(".feature_list");
			var a = b.prev();
			var c = $(this).offset().left - a.offset().left + ($(this).width() - 35) / 2;
			var d = b.find(".feature").index($(this));
			$(".arrow", a).css({
				left: c
			});
			$(".feature_item", a).css("display", "none");
			$(".feature_item", a).eq(d).css("display", "block");
			$(".qrcode", a).show()
		})
	},
	bindAgencyList: function() {
		$(".item_5 .feature_list li.feature").hover(function() {
			var b = $(this).closest(".feature_list");
			var a = b.prev();
			var c = $(this).offset().left - a.offset().left + ($(this).width() - 35) / 2;
			var d = b.find(".feature").index($(this));
			$(".arrow", a).css({
				left: c
			});
			$("img", a).css("display", "none");
			$(".daili", a).css("display", "block")
		}, function() {
			var b = $(this).closest(".feature_list");
			var a = b.prev();
			$(".arrow", a).css({
				left: "-10000px"
			});
			$("img", a).css("display", "block");
			$(".daili", a).css("display", "none")
		})
	},
	adjustSize: function() {
		var d = this;
		var a = d.getClientHeight();
		$(".main .item").css({
			height: a
		});
		if ($(window).scrollTop() == 0 && $(".m-login").height() != 0) {
			var b = a / 2 + 20 + "px";
			$(".m-login").animate({
				height: b
			}, 300);
			if (d.getClientHeight() / 2 > 190) {
				var c = (a / 2 - 190) / a * 100 + "%";
				$(".item_1 .content").animate({
					top: c
				}, 300)
			} else {
				$(".item_1 .content").animate({
					top: "0%"
				}, 300)
			}
		}
	},
	getClientHeight: function() {
		return document.documentElement.clientHeight
	},
	bindNav: function() {
		var a = this;
		$(".nav").click(function() {
			var d = $(this).attr("inx") - 1;
			if (d == 0) {
				$(".navwrap").fadeOut();
				$("#online_qq_layer").fadeIn()
			} else {
				$(".navwrap").fadeIn();
				$("#online_qq_layer").fadeOut();
				var b = $(".main .item").eq(d);
				if (b.find("img[data-original]").size() > 0) {
					b.find("img[data-original]").each(function() {
						var e = $(this);
						e.attr("src", e.attr("data-original")).removeAttr("data-original")
					})
				}
			}
			var c = d * a.getClientHeight();
			$("html,body").animate({
				scrollTop: c
			})
		});
		$(".nav").tipsy({
			delayIn: 100,
			delayOut: 100,
			gravity: "e"
		});
		$("#goto_top").click(function() {
			$(".navwrap .nav[inx=1]").click()
		})
	},
	scrollPage: function() {
		var a = this;
		a.lastAnimation = 0;
		$(document).bind("mousewheel DOMMouseScroll", function(e) {
			e.preventDefault();
			var g = e.originalEvent.wheelDelta || -e.originalEvent.detail;
			var f = $(".nav.cur");
			var c = new Date().valueOf();
			if (!a.isScroll && c - a.lastAnimation > 400) {
				if (g < 0) {
					f = f.next().attr("inx") - 1
				} else {
					f = f.prev().attr("inx") - 1
				} if (isNaN(f)) {
					return
				}
				if (f == 0) {
					$(".navwrap").fadeOut();
					$("#online_qq_layer").fadeIn();
					$("#goto_top").fadeOut()
				} else {
					$(".navwrap").fadeIn();
					$("#online_qq_layer").fadeOut();
					$("#goto_top").fadeIn();
					var b = $(".main .item").eq(f);
					if (b.find("img[data-original]").size() > 0) {
						b.find("img[data-original]").each(function() {
							var h = $(this);
							h.attr("src", h.attr("data-original")).removeAttr("data-original")
						})
					}
				}
				a.isScroll = true;
				var d = f * a.getClientHeight();
				$("html,body").animate({
					scrollTop: d
				}, 600, function() {
					a.isScroll = false;
					a.lastAnimation = new Date().valueOf()
				})
			}
			return false
		})
	},
	bindScroll: function() {
		var a = this;
		a.isFlip = false;
		$(window).scroll(function() {
			var b = $(window).scrollTop();
			var c = Math.floor((b / a.getClientHeight())) + 1;
			c = c || 1;
			if (c < 8) {
				$(".nav").removeClass("cur");
				$(".nav[inx=" + c + "]").addClass("cur")
			}
		})
	}
};
$(function() {
	Page.init()
});