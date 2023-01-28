(function(w, d) {
    zaraz.debug = (fk = "") => {
        document.cookie = `zarazDebug=${fk}; path=/`;
        location.reload()
    };
    window.zaraz._al = function(ei, ej, ek) {
        w.zaraz.listeners.push({
            item: ei,
            type: ej,
            callback: ek
        });
        ei.addEventListener(ej, ek)
    };
    zaraz.preview = (dl = "") => {
        document.cookie = `zarazPreview=${dl}; path=/`;
        location.reload()
    };
    zaraz.i = function(fb) {
        const fc = d.createElement("div");
        fc.innerHTML = unescape(fb);
        const fd = fc.querySelectorAll("script");
        for (let fe = 0; fe < fd.length; fe++) {
            const ff = d.createElement("script");
            fd[fe].innerHTML && (ff.innerHTML = fd[fe].innerHTML);
            for (const fg of fd[fe].attributes) ff.setAttribute(fg.name, fg.value);
            d.head.appendChild(ff);
            fd[fe].remove()
        }
        d.body.appendChild(fc)
    };
    zaraz.f = async function(fh, fi) {
        const fj = {
            credentials: "include",
            keepalive: !0,
            mode: "no-cors"
        };
        if (fi) {
            fj.method = "POST";
            fj.body = new URLSearchParams(fi);
            fj.headers = {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        }
        return await fetch(fh, fj)
    };
    ! function(el, em, en, eo, ep, eq) {
        function er(et, eu) {
            eq ? eo(et, eu || 32) : ep.push(et, eu)
        }

        function es(ev, ew, ex, ey) {
            return ew && em.getElementById(ew) || (ey = em.createElement(ev || "SCRIPT"), ew && (ey.id = ew), ex && (ey.onload = ex), em.head.appendChild(ey)), ey || {}
        }
        eq = /p/.test(em.readyState), el.addEventListener("on" + en in el ? en : "load", (function() {
            for (eq = 1; ep[0];) er(ep.shift(), ep.shift())
        })), er._ = es, el.defer = er, el.deferscript = function(ez, eA, eB, eC) {
            er((function() {
                es("", eA, eC).src = ez
            }), eB)
        }
    }(this, d, "pageshow", setTimeout, []);
    defer((function() {
        for (; zaraz.deferred.length;) zaraz.deferred.pop()();
        Object.defineProperty(zaraz.deferred, "push", {
            configurable: !0,
            enumerable: !1,
            writable: !0,
            value: function(...eD) {
                let eE = Array.prototype.push.apply(this, eD);
                for (; zaraz.deferred.length;) zaraz.deferred.pop()();
                return eE
            }
        })
    }), 5500);
    addEventListener("visibilitychange", (function() {
        for (; zaraz.deferred.length;) zaraz.deferred.pop()()
    }));
    window.zaraz._p = async a => new Promise((b => {
        if (a) {
            a.e && a.e.forEach((c => {
                try {
                    new Function(c)()
                } catch (d) {
                    console.error(`Error executing script: ${c}\n`, d)
                }
            }));
            Promise.allSettled((a.f || []).map((e => fetch(e[0], e[1]))))
        }
        b()
    }));
    zaraz.pageVariables = {};
    zaraz.track = async function(eI, eJ, eK) {
        return new Promise(((eL, eM) => {
            const eN = {
                name: eI,
                data: {}
            };
            for (const eO of [localStorage, sessionStorage]) Object.keys(eO || {}).filter((eQ => eQ.startsWith("_zaraz_"))).forEach((eP => {
                try {
                    eN.data[eP.slice(7)] = JSON.parse(eO.getItem(eP))
                } catch {
                    eN.data[eP.slice(7)] = eO.getItem(eP)
                }
            }));
            Object.keys(zaraz.pageVariables).forEach((eR => eN.data[eR] = JSON.parse(zaraz.pageVariables[eR])));
            //
            eN.data = { ...eN.data,
                ...eJ
            };
            eN.zarazData = zarazData;
            fetch("/cdn-cgi/zaraz/t", {
                credentials: "include",
                keepalive: !0,
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(eN)
            }).catch((() => {
                console.warn("Large event payload sent to Cloudflare Zaraz, cannot assure deliverability.");
                return fetch("/cdn-cgi/zaraz/t", {
                    credentials: "include",
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(eN)
                })
            })).then((function(eT) {
                zarazData._let = (new Date).getTime();
                eT.ok || eM();
                return 204 !== eT.status && eT.json()
            })).then((async eS => {
                await zaraz._p(eS);
                "function" == typeof eK && eK()
            })).finally((() => eL()))
        }))
    };
    zaraz.set = function(eU, eV, eW) {
        eV = JSON.stringify(eV);
        prefixedKey = "_zaraz_" + eU;
        sessionStorage.removeItem(prefixedKey);
        localStorage.removeItem(prefixedKey);
        delete zaraz.pageVariables[eU];
        if (void 0 !== eV) {
            eW && "session" == eW.scope ? sessionStorage.setItem(prefixedKey, eV) : eW && "page" == eW.scope ? zaraz.pageVariables[eU] = eV : localStorage.setItem(prefixedKey, eV);
            zaraz.__watchVar = {
                key: eU,
                value: eV
            }
        }
    };
    for (const {
            m: eX,
            a: eY
        } of zarazData.q.filter((({
            m: eZ
        }) => ["debug", "set"].includes(eZ)))) zaraz[eX](...eY);
    for (const {
            m: e_,
            a: fa
        } of zaraz.q) zaraz[e_](...fa);
    delete zaraz.q;
    delete zarazData.q;
    zaraz.fulfilTrigger = function(dI, dJ, dK, dL) {
        zaraz.__zarazTriggerMap || (zaraz.__zarazTriggerMap = {});
        zaraz.__zarazTriggerMap[dI] || (zaraz.__zarazTriggerMap[dI] = "");
        zaraz.__zarazTriggerMap[dI] += "*" + dJ + "*";
        zaraz.track("__zarazEmpty", { ...dK,
            __zarazClientTriggers: zaraz.__zarazTriggerMap[dI]
        }, dL)
    };
    window.dataLayer = w.dataLayer || [];
    zaraz._processDataLayer = fq => {
        for (const fr of Object.entries(fq)) zaraz.set(fr[0], fr[1], {
            scope: "page"
        });
        if (fq.event) {
            if (zarazData.dataLayerIgnore && zarazData.dataLayerIgnore.includes(fq.event)) return;
            let fs = {};
            for (let ft of dataLayer.slice(0, dataLayer.indexOf(fq) + 1)) fs = { ...fs,
                ...ft
            };
            delete fs.event;
            fq.event.startsWith("gtm.") || zaraz.track(fq.event, fs)
        }
    };
    const fp = w.dataLayer.push;
    Object.defineProperty(w.dataLayer, "push", {
        configurable: !0,
        enumerable: !1,
        writable: !0,
        value: function(...fu) {
            let fv = fp.apply(this, fu);
            zaraz._processDataLayer(fu[0]);
            return fv
        }
    });
    dataLayer.forEach((fw => zaraz._processDataLayer(fw)));
    zaraz._cts = () => {
        zaraz._timeouts ? .forEach((fl => clearTimeout(fl)));
        zaraz._timeouts = []
    };
    zaraz._rl = function() {
        w.zaraz.listeners ? .forEach((fm => fm.item.removeEventListener(fm.type, fm.callback)));
        window.zaraz.listeners = []
    };
    history.pushState = function() {
        try {
            zaraz._rl();
            zaraz._cts && zaraz._cts()
        } finally {
            History.prototype.pushState.apply(history, arguments);
            setTimeout((() => {
                zarazData.l = d.location.href;
                zarazData.t = d.title;
                zaraz.pageVariables = {};
                zaraz.track("__zarazSPA")
            }), 100)
        }
    };
    history.replaceState = function() {
        try {
            zaraz._rl();
            zaraz._cts && zaraz._cts()
        } finally {
            History.prototype.replaceState.apply(history, arguments);
            setTimeout((() => {
                zarazData.l = d.location.href;
                zarazData.t = d.title;
                zaraz.pageVariables = {};
                zaraz.track("__zarazSPA")
            }), 100)
        }
    };
    zaraz._p({
        "e": ["(function(w,d){w.zarazData.executed.push(\"Pageview\");})(window,document)"]
    })
})(window, document);