(function(n) {
	function u(d) {
		a.dr = d.replace("http://", "").replace("https://", "");
		a.fpd = v(d).toLowerCase()
	}
	function v(d) {
		var b = d.match(h.pd);
		if (b != null) return b[0];
		b = 0;
		if ((b = d.indexOf("/")) > -1) return d.substring(0, b);
		return d
	}
	function r(d) {
		if (!d) return 1;
		for (var b = 0, c = 0, f = d.length - 1; f >= 0; f--) {
			c = parseInt(d.charCodeAt(f));
			b = (b << 6 & 268435455) + c + (c << 14);
			if ((c = b & 266338304) != 0) b ^= c >> 21
		}
		return b
	}
	function w(d) {
		var b = d.split("."),
			c = b[b.length - 1] * 1 + 1,
			f = b[b.length - 2];
		d = "";
		for (var g = 0; g < b.length - 3; g++) d += b[g] + ".";
		d += f + "." + a.mt + "." + c;
		return d
	}
	function x(d) {
		if (d == "-") {
			a.cu = 0;
			a.ci = 0
		} else if (d.indexOf("tckeyword=") > -1) {
			a.cu = d.replace("tckeyword=", "");
			a.ci = 0
		} else {
			a.cu = d.split(".")[0];
			a.ci = d.split(".")[1]
		}
	}
	function q(d) {
		d = l(a.d.cookie, d + "=" + a.dmh, ";");
		if (d != "-") d = d.substring(d.indexOf(".") + 1);
		return d
	}
	function l(d, b, c) {
		if (!d || !b || !c) return "-";
		var f, g = "-";
		f = d.indexOf(b);
		b = b.indexOf("=") + 1;
		if (f > -1) {
			c = d.indexOf(c, f);
			if (c < 0) c = d.length;
			g = d.substring(f + b, c)
		}
		return g
	}
	function m(d, b, c) {
		var f = "";
		f = d == "longKey" ? d + "=" + b + ";path=/;" : d + "=" + a.dmh + "." + b + ";path=/;";
		if (c) f += c;
		f += a.dc;
		a.d.cookie = f
	}
	function A() {
		if (a.dr == "0" || a.dr == "" || a.dr == "-") return "";
		var d = a.dr.toLowerCase(),
			b = "-";
		if (d.indexOf("/") > -1) {
			b = d.substring(d.indexOf("/") + 1, d.length);
			if (b.indexOf("?") > -1) b = b.substring(0, b.indexOf("?"))
		}
		if (!h.ldm.test(a.fpd) && a.fpd != a.tpd) {
			a.cu = 0;
			a.ci = 0;
			return "utmccn=(referral)|utmcsr=" + o(a.fpd) + "|utmcct=" + o(b) + "|utmcmd=referral"
		} else return ""
	}
	function y(d) {
		if (a.dr == "0" || a.dr == "" || a.dr == "-") return "";
		for (var b = 0, c = a.dr.toLowerCase(), f, g = 0; g < h.osr.length; g++) if (a.fpd.indexOf(h.osr[g]) > -1) if ((b = c.indexOf("?" + h.okw[g] + "=")) > -1 || (b = c.indexOf("&" + h.okw[g] + "=")) > -1) {
			f = c.substring(b + h.okw[g].length + 2, c.length).replace("|", "\u2016");
			if ((b = f.indexOf("&")) > -1) f = f.substring(0, b);
			b = "-";
			if (h.esl[g] != "") b = l(c.substring(c.indexOf("?") + 1, c.length), h.esl[g] + "=", "&");
			if (h.eslutf.test(c)) b = "utf-8";
			if (b == "-") {
				b = "utf-8";
				if (h.eslgb.test(h.osr[g])) b = "gb2312";
				switch (h.osr[g]) {
				case "baidu":
					if (c.indexOf("ssid=0/from=844b") > 0) b = "utf-8"
				}
			}
			a.cu = 0;
			a.ci = 0;
			return d ? "|utmEsl=" + b + "|utmctr=" + o(f) : "utmccn=(organic)|utmcmd=organic|utmEsl=" + b + "|utmcsr=" + h.osr[g] + "|utmctr=" + o(f)
		}
		return ""
	}
	function o(d) {
		return d.replace(/ /g, "+")
	}
	function j(d, b) {
		return typeof encodeURIComponent == "function" ? b ? encodeURI(d) : encodeURIComponent(d) : escape(d)
	}
	function s(d, b) {
		b += 1;
		if (!(b > 2 || !d)) {
			var c = new Image;
			c.src = d + "&_v=" + b + "&dt=" + (new Date).getTime();
			c.onload = function() {
				delete c
			};
			c.onerror = function() {
				s(d, b);
				return true
			}
		}
	}
	function z(d, b) {
		b += 1;
		if (!(b > 2 || !d)) {
			var c = document.createElement("script");
			c.language = "javaScript";
			c.type = "text/JavaScript";
			c.src = d + "&_v=" + b;
			document.getElementsByTagName("head")[0].appendChild(c);
			c.onerror = function() {
				z(d, b);
				return true
			}
		}
	}
	function t() {
		var d = "";
		d += "&utmn=" + Math.round(Math.random() * 2147483647);
		var b;
		a: {
			b = "";
			var c = "-",
				f = 0,
				g = 0,
				e = 0,
				i = a.cz;
			e = a.dls;
			c = l(e, h.crf + "=", "&");
			try {
				c != "-" && c != "" && u(typeof decodeURIComponent == "function" ? decodeURIComponent(c) : decodeURI(c))
			} catch (p) {}
			c = l(e, h.csr + "=", "&");
			if (c != "-" && c != "") {
				b = "utmcsr=" + j(o(c));
				c = l(e, h.ccn + "=", "&");
				b += c != "-" && c != "" ? "|utmccn=" + j(o(c)) : "|utmccn=(not+set)";
				c = l(e, h.cmd + "=", "&");
				b += c != "-" && c != "" ? "|utmcmd=" + j(o(c)) : "|utmcmd=(not+set)";
				c = y(1);
				if (c != "-" && c != "") b += c;
				c = l(e, h.cct + "=", "&");
				if (c != "-" && c != "") b += "|utmcct=" + j(o(c))
			}
			if (b == "-" || b == "") b = y();
			if (b == "-" || b == "") b = A();
			c = l(e, h.ctr + "=", "&");
			a.cu = c != "-" && c != "" ? c : a.cu;
			c = l(e, h.cti + "=", "&");
			a.ci = c != "-" && c != "" ? c : a.ci;
			if (b == "-" || b == "" || typeof b == "undefined") {
				if (i == "-") b = "utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)";
				if (b == "-" || b == "") {
					b = "";
					break a
				}
			}
			if (i != "-") {
				e = i.indexOf(".");
				if (e > -1) e = i.indexOf(".", e + 1);
				if (e > -1) e = i.indexOf(".", e + 1);
				c = i.substring(e + 1, i.length);
				if (c.toLowerCase() == b.toLowerCase()) f = 1;
				c = i.substring(0, e);
				if ((e = c.lastIndexOf(".")) > -1) {
					c = c.substring(e + 1, c.length);
					g = c * 1
				}
			}
			if (f == 0 || a.fns == 1) {
				g++;
				a.cz = a.mt + "." + a.ca.split(".")[a.ca.split(".").length - 1] + "." + g + "." + b
			}
			b = f == 0 || a.fns == 1 ? "&utmcn=1" : "&utmcr=1"
		}
		d += b;
		if (a.d.title) d += "&utmdt=" + j(a.d.title);
		d += "&utmhid=" + a.cb.split(".")[0];
		d += "&utmr=" + j(a.dr);
		d += "&utmp=" + j(a.du);
		if (a.orser) d += "&serialid=" + a.orser;
		if (a.resid) d += "&resourceid=" + a.resid;
		if (a.pview) d += "&Pageview=" + j(a.pview);
		d += "&refId=" + a.refid + "&userId=" + a.uid;
		d = h.gifpath + "?utmac=" + a.acct + d + "&utmcc=";
		b = "";
		b += j("__tctma=" + a.dmh + "." + a.ca + ";+");
		b += j("__tctmb=" + a.dmh + "." + a.cb.substring(a.cb.indexOf(".") + 1, a.cb.length) + ";+");
		b += j("__tctmu=" + a.dmh + ".tckeyword=" + a.cu + "|tcideaid=" + a.ci + ";");
		b += j("__tctmz=" + a.dmh + "." + a.cz + ";+");
		d = d + b + "&bInfo=";
		f = c = b = g = "-";
		i = 0;
		e = "";
		e = navigator;
		if (self.screen) {
			g = screen.width + "x" + screen.height;
			b = screen.colorDepth + "-bit"
		} else if (self.java) {
			g = java.awt.Toolkit.getDefaultToolkit().getScreenSize();
			g = g.width + "x" + g.height
		}
		if (e.language) c = e.language.toLowerCase();
		else if (e.browserLanguage) c = e.browserLanguage.toLowerCase();
		i = e.javaEnabled() ? 1 : 0;
		if (a.d.characterSet) f = j(a.d.characterSet);
		else if (a.d.charset) f = j(a.d.charset);
		var k = e.userAgent.toLowerCase();
		e = k.indexOf("metasr") > -1 ? "sogou" : k.indexOf("theworld") > -1 ? "theworld" : k.indexOf("firefox") > -1 ? "firefox" : k.indexOf("chrome") > -1 ? "chrome" : k.indexOf("safari") > -1 ? "safari" : k.indexOf("opera") > -1 ? "opera" : k.indexOf("msie") > -1 ? "msie" : k.indexOf("ipad") ? "safari mobile" : e.appName ? e.appName.toLowerCase() : "other";
		b = "utmcs=" + f.toLowerCase() + ";utmsr=" + g + ";utmsc=" + b + ";utmul=" + c + ";utmje=" + i + ";utmie=" + e;
		d += j(b);
		s(d, 0);
		a.fns = 0;
		m("__tctmu", a.cu + "." + a.ci, "");
		a.cz != "-" && a.cz != "" && m("__tctmz", a.cz, "")
	}
	function B() {
		var d = document.createElement("script");
		d.type = "text/javascript";
		d.src = "http://www." + a.fpd + "/vstjsonp/GetCookie.ashx?CookieKey=__tctmu,__tctmz&CallBack=_tcTraObj.CallBack";
		d.onreadystatechange = d.onerror = function() {
			if (!this.readyState || (this.readyState === "loaded" || this.readyState === "complete") && !window[obj]) t()
		};
		document.getElementsByTagName("head")[0].appendChild(d)
	}

		h = {
			ccn: "utm_campaign",
			cct: "utm_content",
			cmd: "utm_medium",
			csr: "utm_source",
			crf: "utm_referrer",
			ctr: "tcbdkeyid",
			cti: "tcideaid",
			osr: ["baidu", "baidu", "google", "sogou", "soso", "youdao", "bing", "yahoo", "114so", "gougou", "jike", "panguso", "360", "so", "sogou"],
			okw: ["wd", "word", "q", "query", "w", "q", "q", "p", "kw", "search", "q", "q", "q", "q", "keyword"],
			esl: ["ie", "ie", "ie", "ie", "ie", "ue", "", "ei", "", "", "", "", "ie", "ie", ""],
			eslutf: /(m.baidu.com|wap.baidu.com|baidu.mobi|3g.baidu.com|m1.baidu.com|m5.baidu.com)/,
			eslgb: /^(baidu|soso|sogou|118114)$/,
			ta: /^(172.|192.|127.|10.|localhost)/,
			ldm: /(ly.com|tongcheng.com|17u.cn|17u.com|17u.net)/,
			pd: /[\w-]+\.(com|net|org|gov|cc|biz|info|cn|mil|biz|name|rec)(\.(cn|hk|ca|pe))*/,
			cazz: /^(\d+\.\d+\.\d+\.\d+\.\d+){1}$/,
			cbzz: /^(\d+\.\d+\.\d+\.\d+){1}$/,
			gifpath: "http://vstgif.17usoft.com/__tctm.gif",
			eventpath: "http://vstlog.17usoft.com/TrackEvent/TrackEvent.ashx",
			clickpath: "http://vstlog.17usoft.com/HeatMap/ClickStream.ashx"
		};
;
	(function(d) {
		var b, c = function(e) {
				if (!_tcHotmapx.pid || parseInt(Math.random() * 100) > _tcHotmapx.sp) return false;
				flag = false;
				b && clearTimeout(b);
				b = setTimeout(function() {
					flag = true
				}, 500);
				e = f(e);
				return "?rx=" + (e.x - parseInt(g() / 2, 10)) + "&ry=" + e.y + "&pid=" + _tcHotmapx.pid
			},
			f = function(e) {
				e = e || window.event;
				return {
					x: e.pageX || e.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft),
					y: e.pageY || e.clientY + (document.documentElement.scrollTop || document.body.scrollTop)
				}
			},
			g = function() {
				var e, i;
				if (window.innerWidth && window.scrollMaxX) e = window.innerWidth + window.scrollMaxX;
				else if (document.body.scrollHeight > document.body.offsetHeight) e = document.body.scrollWidth;
				else if (document.body) e = document.body.offsetWidth;
				if (window.innerWidth) i = window.innerWidth;
				else if (document.documentElement && document.documentElement.clientWidth) i = document.documentElement.clientWidth;
				else if (document.body) i = document.body.clientWidth;
				return e < i ? i : e
			};
		typeof _tcHotmapx == "undefined" || !_tcHotmapx ||
		function(e, i, p) {
			if (e.addEventListener) e.addEventListener(i, p, false);
			else e.attachEvent && e.attachEvent("on" + i, p)
		}(d, "mousedown", function(e) {
			if (c(e)) {
				e = h.clickpath + c(e);
				z(e, 0)
			}
		})
	})(n);
	window._tcTraObj = {
		CallBack: function(d) {
			try {
				if (d) {
					var b = eval(d);
					b.hasOwnProperty("__tctmu") && b.__tctmu.length > 0 && x(b.__tctmu.substr(b.__tctmu.indexOf(".") + 1));
					if (b.hasOwnProperty("__tctmz") && b.__tctmz.length > 0) {
						var c = b.__tctmz.indexOf(".");
						if (c > -1) c = b.__tctmz.indexOf(".", c + 1);
						if (c > -1) c = b.__tctmz.indexOf(".", c + 1);
						if (c > -1) c = b.__tctmz.indexOf(".", c + 1);
						var f = b.__tctmz.substring(c + 1, b.__tctmz.length);
						if (a.cz == "-") f = a.mt + "." + a.ca.split(".")[a.ca.split(".").length - 1] + ".1." + f;
						else {
							c = a.cz.indexOf(".");
							d = 0;
							if (c > -1) c = a.cz.indexOf(".", c + 1);
							if (c > -1) c = a.cz.indexOf(".", c + 1);
							var g = a.cz.substring(0, c);
							if ((c = g.lastIndexOf(".")) > -1) {
								g = g.substring(c + 1, g.length);
								d = g * 1
							}
							f = a.mt + "." + a.ca.split(".")[a.ca.split(".").length - 1] + "." + d + "." + f
						}
						a.cz = f
					}
				}
			} catch (e) {}
			t()
		},
		_tcTrackEvent: function(d, b, c, f, g) {
			if (d && b) {
				var e = "{";
				if (!g) g = a.du;
				e += '"LoginKey":' + a.ca.split(".")[0];
				e += ',"LoginCount":' + a.ca.split(".")[4];
				e += ',"SessionId":' + a.cb.split(".")[0];
				e += ',"PageCount":' + a.cb.split(".")[3];
				e += ',"Category":"' + j(d) + '"';
				e += ',"Action":"' + j(b) + '"';
				e += ',"FromPage":"' + j(g) + '"';
				e += ',"Label":"' + (c ? j(c) : "") + '"';
				e += ',"Value":"' + (f ? j(f) : "") + '"';
				e += "}";
				s(h.eventpath + "?TrackEvent=" + e, 0)
			}
		},
		CookieInfo: function() {
			return a.ct
		}
	}
})(document || window.document);