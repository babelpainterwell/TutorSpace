!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=36)}({36:function(e,t,n){e.exports=n(37)},37:function(e,t){$("input").on("input",(function(){$(this).val()?$(this).next().addClass("fill-color-blue-secondary"):$(this).next().removeClass("fill-color-blue-secondary")})),$("input").filter("[required]").on("input",(function(){var e=!0;$.each($("input").filter("[required]"),(function(t,n){$(n).val()||(e=!1)})),e?($(".button-next").addClass("button-next-animation"),$(".button-next").removeClass("bg-grey")):($(".button-next").removeClass("button-next-animation"),$(".button-next").addClass("bg-grey"))})),$("#btn-google-signup").click((function(e){e.preventDefault()}))}});