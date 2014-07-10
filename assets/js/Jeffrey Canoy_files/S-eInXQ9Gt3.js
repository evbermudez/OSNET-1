/*!CK:1322086879!*//*1402976330,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["767Gv"]); }

__d("AdsCurrency",["AdsCurrencyConfig"],function(a,b,c,d,e,f){var g=b('AdsCurrencyConfig').currencies,h=Object.keys(g);function i(p){if(g[p])return g[p].format;return null;}function j(p){if(g[p])return g[p].symbol;return null;}function k(p){if(g[p])return 1*g[p].offset;return 1;}function l(p){if(g[p])return g[p].name;return null;}function m(p){if(g[p])return g[p].iso;return null;}function n(p){if(g[p])return g[p].default_daily_budget;return g.USD.default_daily_budget;}function o(p){if(g[p])return g[p].default_lifetime_budget;return g.USD.default_lifetime_budget;}f.getFormat=i;f.getSymbol=j;f.getOffset=k;f.getName=l;f.getISO=m;f.currencies=g;f.currencyMapKeys=h;f.getDefaultDailyBudget=n;f.getDefaultLifetimeBudget=o;},null);
__d("intlNumUtils",["NumberFormatConfig","escapeRegex"],function(a,b,c,d,e,f,g,h){var i=/(\d)(\d\d\d)($|\D)/;function j(q,r,s,t,u){s=s||'';t=t||'.';u=u||0;if(r===undefined||r===null){q=q.toString();}else q=m(q,r);var v=q.split('.'),w=v[0],x=v[1];if(Math.abs(parseInt(w,10)).toString().length>=u){var y='',z='$1'+s+'$2$3';while((y=w.replace(i,z))!=w)w=y;}var aa=w;if(x)aa+=t+x;return aa;}function k(q,r){return j(q,r,'',g.decimalSeparator,g.minDigitsForThousandsSeparator);}function l(q,r){return j(q,r,g.numberDelimiter,g.decimalSeparator,g.minDigitsForThousandsSeparator);}function m(q,r){var s=Math.pow(10,r);q=Math.round(q*s)/s+'';if(!r)return q;var t=q.indexOf('.'),u=0;if(t==-1){q+='.';u=r;}else u=r-(q.length-t-1);for(var v=0,w=u;v<w;v++)q+='0';return q;}function n(q,r){q=q.trim().replace(/^[^\d]*\-/,'\u0002');if(r){var s=new RegExp(h(r)+'(\\d*\\D*)$','i');q=q.replace(s,'\u0001$1');}else if(!((/^\u0002?(\d+,\d*){2,}$/.test(q))||(/^\u0002?(\d+\.\d*){2,}$/.test(q))))q=q.replace(/[\.,](\d*\D*)$/,'\u0001$1');q=q.replace(/[^0-9\u0001\u0002]/g,'').replace('\u0001','.').replace('\u0002','-');var t=Number(q);return (q===''||isNaN(t))?null:t;}function o(q){return n(q,g.decimalSeparator);}var p={formatNumber:k,formatNumberRaw:j,formatNumberWithThousandDelimiters:l,parseNumber:o,parseNumberRaw:n,getFloatString:function(q,r,s){var t=String(q),u=t.split('.'),v=p.getIntegerString(u[0],r);if(u.length===1)return v;return v+s+u[1];},getIntegerString:function(q,r){var s=String(q),t=/(\d+)(\d{3})/;while(t.test(s))s=s.replace(t,'$1'+r+'$2');return s;}};e.exports=p;},null);
__d("ads-lib-formatters",["AdsCurrency","NumberFormatConfig","intlNumUtils"],function(a,b,c,d,e,f,g,h,i){var j='USD';function k(da,ea,fa){da=da||'';fa=fa||'';ea=typeof ea==='undefined'?da.length:ea;return da.length>ea?(da.substr(0,ea-fa.length)+fa):da;}function l(da,ea){if(ea===undefined||ea===null)ea='';return function(fa){return !fa?ea:k(fa,da,'...');};}function m(da,ea,fa,ga,ha){if(da==='N/A')return da;if(ea===undefined)ea=0;return i.formatNumberRaw(da||0,ea,fa,ga,ha);}function n(da){return function(ea){return m(ea,da||0,',','.');};}function o(da){return function(ea){return m(ea,da||0,h.numberDelimiter,h.decimalSeparator,h.minDigitsForThousandsSeparator);};}function p(da,ea){return function(fa){var ga=Math.floor(Math.log(fa)/Math.LN10),ha=fa;if(ga<ea)ha=fa*Math.pow(10,-ga+ea);var ia=Math.pow(10,Math.floor(Math.log(ha)/Math.LN10)-ea+1),ja=Math.round(ha/ia)*ia;if(ga<ea)ja/=Math.pow(10,-ga+ea);var ka=o(da);return ka(ja);};}function q(da,ea){if(ea)return o(da);return function(fa){return m(fa,da||0,'',h.decimalSeparator,h.minDigitsForThousandsSeparator);};}function r(da,ea){var fa=ea===false?1:100;return function(ga){return m(ga*fa,da||0,',','.')+'%';};}function s(da,ea){var fa=ea===false?1:100;return function(ga){return m(ga*fa,da||0,h.numberDelimiter,h.decimalSeparator)+'%';};}function t(da,ea,fa,ga,ha){if(da===undefined)da=2;var ia=ga(da);if(fa===undefined)fa=false;ea=ea||j;var ja=ea+'-'+da+'-'+fa;if(!ha[ja]){var ka=g.getFormat(ea)||g.getFormat(j),la=g.getSymbol(ea)||g.getSymbol(j),ma=g.getOffset(ea)||g.getOffset(j);ka=ka.replace('{symbol}',la);ha[ja]=function(na){if(fa)na=na/ma;if(!(na+'').match(/^\-?[\d\.,]*$/))return 'N/A';return ka.replace('{amount}',ia(na));};}return ha[ja];}var u={};function v(da,ea,fa){return t(da,ea,fa,n,u);}var w={};function x(da,ea,fa){return t(da,ea,fa,o,w);}function y(da,ea){return i.parseNumberRaw(da+'',ea);}function z(){return function(da){return m(da,0,',','.')+'%';};}function aa(){return function(da){return m(da,0,h.numberDelimiter,h.decimalSeparator)+'%';};}function ba(da){var ea=da.currency(),fa=da.offset()==100?2:0;return v(fa,ea);}function ca(da){var ea=da.currency(),fa=da.offset()==100?2:0;return x(fa,ea);}f.createTextTruncator=l;f.chopString=k;f.parseNumber=y;f.formatNumber=m;f.createIntlNumberFormatter=o;f.createLimitedSigFigNumberFormatter=p;f.createMaybeDelimitedNumberFormatter=q;f.createIntlPercentFormatter=s;f.createIntlMoneyFormatter=x;f.createIntlMoneyFormatterForAccount=ca;f.createIntlInflationFormatter=aa;f.createNumberFormatter=n;f.createPercentFormatter=r;f.createMoneyFormatter=v;f.createMoneyFormatterForAccount=ba;f.createInflationFormatter=z;},null);