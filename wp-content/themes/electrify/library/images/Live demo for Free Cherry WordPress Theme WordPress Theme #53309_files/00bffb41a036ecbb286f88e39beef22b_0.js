function oSendpulsePush(){var e="http://www.templatemonster.com";var f="http://www.templatemonster.com";var a="https://templatemonstercom.sendpulse.com";var k=true;var d=true;var A="00bffb41a036ecbb286f88e39beef22b";var c="";var y="";var r="";var g="https://sendpulse.com:4434";var v="https://sendpulse.com:4435";var h="web.com.sendpulse.push";var o={};var z="";var u=null;var l=null;var p=null;var j={};var q=false;var s="1";var b="sendpulse.com";var x={ru:"Предоставлено SendPulse",en:"Powered by SendPulse",ua:"Надано SendPulse"};var m={ru:"запрашивает разрешение на:",en:"wants to:",ua:"запитує дозвіл на:"};var i={ru:"Показывать оповещения",en:"Show notifications",ua:"Показувати сповіщення"};var t={ru:"Разрешить",en:"Allow",ua:"Дозволити"};var w={ru:"Блокировать",en:"Block",ua:"Блокувати"};var n=false;this.start=function(){if(!oSpP.detectSite()){oSpP.log("Application allowed only for "+e);return false}if(oSpP.detectOs()=="iOS"){oSpP.log("Application can not work on iOS");return false}var B=oSpP.detectOs();if(!d){if((B=="iOS")||(B=="Android")){oSpP.log("Application disabled for your device");return false}}o=oSpP.detectBrowser();z=o.name.toLowerCase();if((z=="chrome")&&(parseFloat(o.version)<42)){oSpP.log("Application can not work with Crome browser version less then 42");return false}if((z=="firefox")&&(parseFloat(o.version)<44)){oSpP.log("Application can not work with Firefox browser version less then 44");return false}if((z=="firefox")&&(B=="Android")){oSpP.log("Application can not work with Firefox on Android");return false}if((z=="chrome")||(z=="firefox")){window.addEventListener("message",function(E){if(E.origin.toLowerCase()==a.toLowerCase()){if(E.data=="initend"){clearInterval(l)}else{if(E.data=="closeme"){p.close()}else{oSpP.storeSubscription(E.data)}}}},false);if(k){oSpP.getDbValue("SPIDs","SubscriptionId",function(E){if(E.target.result===undefined){oSpP.getDbValue("SPIDs","PromptClosed",function(G){if(G.target.result===undefined){oSpP.showPrompt()}else{var F=parseInt(G.target.result.value);F--;if(F==0){oSpP.deleteDbValue("SPIDs","PromptClosed");oSpP.showPrompt()}else{oSpP.putValueToDb("SPIDs",{type:"PromptClosed",value:F})}}})}})}else{var D=document.querySelectorAll(".sp_notify_prompt");for(var C=0;C<D.length;C++){D[C].addEventListener("click",function(){oSpP.showPopUp()})}}}else{if(z=="safari"){if(k){oSpP.startSubscription()}else{var D=document.querySelectorAll(".sp_notify_prompt");for(var C=0;C<D.length;C++){D[C].addEventListener("click",function(){oSpP.startSubscription()})}}}}};this.startSubscription=function(){switch(z){case"safari":if(oSpP.isSafariNotificationSupported()){var B=window.safari.pushNotification.permission(h);oSpP.checkSafariPermission(B)}break}};this.checkCookie=function(C){for(var E=C+"=",D=document.cookie.split(";"),F=0;F<D.length;F++){for(var B=D[F];" "==B.charAt(0);){B=B.substring(1)}if(0==B.indexOf(E)){return B.substring(E.length,B.length)}}return""};this.checkSafariPermission=function(B){oSpP.log("[DD] Permissions: "+B.permission);if(B.permission==="default"){n=true;oSpP.getDbValue("SPIDs","PromptShowed",function(C){if(C.target.result===undefined){oSpP.sendPromptStat("prompt_showed");oSpP.putValueToDb("SPIDs",{type:"PromptShowed",value:1})}else{oSpP.sendPromptStat("prompt_showed_again")}});window.safari.pushNotification.requestPermission(g,h,{appkey:A},oSpP.checkSafariPermission)}else{if(B.permission==="denied"){if(n){oSpP.sendPromptStat("prompt_denied")}}else{if(B.permission==="granted"){oSpP.uns();if(n){oSpP.sendPromptStat("prompt_granted")}oSpP.subscribe()}}}};this.subscribe=function(){switch(z){case"safari":var C=window.safari.pushNotification.permission(h);if(C.permission==="granted"){var B=C.deviceToken;oSpP.checkLocalSubsctoption(B)}break}};this.checkLocalSubsctoption=function(B){oSpP.log("[DD] subscribe :: subscriptionId: "+B);oSpP.getDbValue("SPIDs","SubscriptionId",function(C){if(C.target.result===undefined){oSpP.sendSubscribeDataToServer(B,"subscribe");oSpP.putValueToDb("SPIDs",{type:"SubscriptionId",value:B})}else{if(C.target.result.value!==B){oSpP.sendSubscribeDataToServer(C.target.result.value,"unsubscribe");oSpP.sendSubscribeDataToServer(B,"subscribe");oSpP.putValueToDb("SPIDs",{type:"SubscriptionId",value:B})}}})};this.sendSubscribeDataToServer=function(C,G,D){var F=new XMLHttpRequest();F.open("POST",g,true);F.setRequestHeader("Content-Type","application/json");if(D===undefined){D={};D.uname=oSpP.checkCookie("lgn");D.os=oSpP.detectOs()}D.variables=oSpP.getUserVariables();var B=window.location.href;var E={action:"subscription",subscriptionId:C,subscription_action:G,appkey:A,browser:o,lang:oSpP.getBrowserlanguage(),url:B,custom_data:D};F.send(JSON.stringify(E))};this.isSafariNotificationSupported=function(){return"safari" in window&&"pushNotification" in window.safari};this.storeSubscription=function(B){oSpP.log("StoreSubscription: "+B);oSpP.putValueToDb("SPIDs",{type:"SubscriptionId",value:B})};this.clearDomain=function(B){return B.replace("://www.","://").replace("://www2.","://")};this.detectSite=function(){return(!(oSpP.clearDomain(window.location.href.toLowerCase()).indexOf(oSpP.clearDomain(e.toLowerCase()))===-1))};this.getBrowserlanguage=function(){return navigator.language.substring(0,2)};this.getUserVariables=function(){var C={};var B=document.querySelectorAll("input.sp_push_custom_data");for(var D=0;D<B.length;D++){switch(B[D].type){case"text":case"hidden":C[B[D].name]=B[D].value;break;case"checkbox":C[B[D].name]=(B[D].checked)?1:0;break;case"radio":if(B[D].checked){C[B[D].name]=B[D].value}break}}return C};this.showPopUp=function(){if(k){oSpP.sendPromptStat("prompt_granted")}else{}var I=580;var E=580;var G=window.screenLeft!==undefined?window.screenLeft:screen.left;var B=window.screenTop!==undefined?window.screenTop:screen.top;var C=window.innerWidth?window.innerWidth:document.documentElement.clientWidth?document.documentElement.clientWidth:screen.width;var J=window.innerHeight?window.innerHeight:document.documentElement.clientHeight?document.documentElement.clientHeight:screen.height;var D=((C/2)-(I/2))+G;var H=((J/3)-(J/3))+B;var F=oSpP.getBrowserlanguage();if(F==""){F="en"}p=window.open(a+"/"+F+"/"+A,"_blank","scrollbars=yes, width="+I+", height="+E+", top="+H+", left="+D);if(window.focus){p.focus()}l=setInterval(function(){p.postMessage("init",a);p.postMessage("initpage|"+window.location.href,a);p.postMessage("initvariables|"+JSON.stringify(oSpP.getUserVariables()),a)},100);if(k){oSpP.closePrompt(true)}};this.showPrompt=function(){oSpP.getDbValue("SPIDs","PromptShowed",function(Z){if(Z.target.result===undefined){oSpP.sendPromptStat("prompt_showed");oSpP.putValueToDb("SPIDs",{type:"PromptShowed",value:1})}else{oSpP.sendPromptStat("prompt_showed_again")}});var J=document.getElementsByTagName("head")[0];var F=document.createElement("link");F.rel="stylesheet";F.type="text/css";F.href="https://cdn.sendpulse.com/css/push/sendpulse-prompt.min.css";F.media="all";J.appendChild(F);var G=oSpP.getMessageLang(oSpP.getBrowserlanguage());var S;var O="sendpulse-popover";var U="display:none;";var K=true;if(typeof s!="undefined"){if(s==0){K=false}}if(c.length>0){var E='<svg style="display: none;"><symbol id="sp_bell_icon"><path d="M139.165 51.42L103.39 15.558C43.412 61.202 3.74 132.185 0 212.402h50.174c3.742-66.41 37.877-124.636 88.99-160.98zM474.98 212.403h50.173c-3.742-80.217-43.413-151.2-103.586-196.845L385.704 51.42c51.398 36.346 85.533 94.572 89.275 160.982zm-49.388 12.582c0-77-53.39-141.463-125.424-158.487v-17.09c0-20.786-16.76-37.613-37.592-37.613s-37.592 16.827-37.592 37.614v17.09C152.95 83.52 99.56 148.004 99.56 224.983v137.918L49.408 413.01v25.076h426.336V413.01l-50.152-50.108V224.984zM262.576 513.358c3.523 0 6.76-.22 10.065-1.007 16.237-3.237 29.825-14.528 36.06-29.626 2.517-5.952 4.05-12.494 4.05-19.54H212.4c0 27.593 22.582 50.174 50.174 50.174z" /></symbol></svg>';var R='<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAAk1BMVEUNkaAmtrIltLEMj58Mj58mtrIks7EfrK0MkKD///8Pk6EmtrIisK8cp6oTmaQRlqIZoqkVnKaz4OL7/v7t+PhjvsT4/P3l9vbY8PDM6uy74+Ww3uGc2dt3ysx1xMoyrLLx+fro9vat4+Kj2t2NztOB0dF/yc5myMhevsNMwL8/u7pMsLlDr7cyuLY9sbY7p7IkpazkILODAAAABnRSTlPn5ubmSkmZnvKZAAAAiElEQVQI10XHVRbCQBBE0SJGeoCxuONu+18dpDPn5P7UK4SL1WwRwovYnl7jeIgmBd14sWZ3ogsHlqwjOnG4b8uknf6G7dqi5oAevelalXo4ZBqaiIYu+Vr622oYY9K+qcwzy865NZBS2iY9ypGREkqpPqGHciCE+FAuhQPEsUjr2AECP575wQ+doQxkp1hUBQAAAABJRU5ErkJggg==">';S=JSON.parse(c);O=S.style;var I=document.createElement("div");I.setAttribute("class","sendpulse-prompt "+O);if(S.backgroundcolor.length>0){U=U+"background-color: "+S.backgroundcolor+";"}I.setAttribute("style",U);var X=document.createElement("div");X.setAttribute("class","sendpulse-prompt-message");var W=document.createElement("img");W.setAttribute("class","sendpulse-bell-icon");W.setAttribute("width","14");W.setAttribute("height","14");W.setAttribute("src","https://cdn.sendpulse.com/img/push/icon-ring.svg");if(K){var Q=document.createElement("span");Q.setAttribute("class","sp-link-wrapper");var T=document.createElement("a");T.setAttribute("class","sp-link");T.setAttribute("href","https://"+b+"/webpush");T.setAttribute("target","_blank");var L=document.createElement("span");L.innerHTML=x[G];if(O!="sendpulse-bar"){T.innerHTML=R}T.appendChild(L);Q.appendChild(T)}if(O=="sendpulse-bar"){var N=document.createElement("div");N.setAttribute("class","sendpulse-prompt-info sendpulse-prompt-message-text");N.setAttribute("style","color: "+S.textcolor+" !important;");N.innerHTML+=r;var P=document.createElement("span");X.innerHTML+=E+'<svg viewBox="0 0 525.153 525.153" width="40" height="40" xmlns:xlink="http://www.w3.org/1999/xlink" class="sendpulse-bell-icon"><use class="sendpulse-bell-path" style="fill: '+S.textcolor+' !important;" xlink:href="#sp_bell_icon" x="0" y="0" />  </svg>'}else{if(O=="sendpulse-modal"||O=="sendpulse-safari"||O=="sendpulse-fab"){var N=document.createElement("div");N.setAttribute("class","sendpulse-prompt-title sendpulse-prompt-message-text");if(S.textcolor.length>0){N.setAttribute("style","color: "+S.textcolor+" !important;")}N.innerHTML=y;var P=document.createElement("div");P.setAttribute("class","sendpulse-prompt-info sendpulse-prompt-message-text");if(S.textcolor.length>0){P.setAttribute("style","color: "+S.textcolor+" !important;")}P.innerHTML+=r;if(O=="sendpulse-safari"){W.setAttribute("src","https://cdn.sendpulse.com"+S.icon);W.setAttribute("width","64");W.setAttribute("height","64");X.appendChild(W)}else{if(O!="sendpulse-fab"){X.innerHTML+=E+'<svg viewBox="0 0 525.153 525.153" width="40" height="40" xmlns:xlink="http://www.w3.org/1999/xlink" class="sendpulse-bell-icon"><use class="sendpulse-bell-path" style="fill: '+S.textcolor+' !important;" xlink:href="#sp_bell_icon" x="0" y="0" />  </svg>'}}if(O=="sendpulse-fab"){var V=document.createElement("div");V.setAttribute("class","sendpulse-prompt-fab");if(S.btncolor.length>0){V.setAttribute("style","background-color: "+S.btncolor+" !important;")}V.innerHTML+=E+'<svg viewBox="0 0 525.153 525.153" width="40" height="40" xmlns:xlink="http://www.w3.org/1999/xlink" class="sendpulse-bell-icon" ><use class="sendpulse-bell-path bell-prompt-fab" style="fill: '+S.iconcolor+' !important;" xlink:href="#sp_bell_icon" x="0" y="0" /></svg>';V.setAttribute("onclick","oSpP.showPopUp(); return false;")}}}}else{var I=document.createElement("div");I.setAttribute("class","sendpulse-prompt "+O);I.setAttribute("style",U);var X=document.createElement("div");X.setAttribute("class","sendpulse-prompt-message");var N=document.createElement("div");N.setAttribute("class","sendpulse-prompt-message-text");N.innerHTML=f+" "+m[G];var P=document.createElement("div");P.setAttribute("class","sendpulse-prompt-info sendpulse-prompt-message-text");var W=document.createElement("img");W.setAttribute("class","sendpulse-bell-icon");W.setAttribute("width","14");W.setAttribute("height","14");W.setAttribute("src","https://cdn.sendpulse.com/img/push/icon-ring.svg");P.appendChild(W);P.innerHTML+=" "+i[G]}if(O!="sendpulse-fab"){var B=document.createElement("div");B.setAttribute("class","sendpulse-prompt-buttons");var Y=document.createElement("button");Y.setAttribute("class","sendpulse-prompt-btn sendpulse-accept-btn");Y.setAttribute("type","button");Y.setAttribute("onclick","oSpP.showPopUp(); return false;");Y.innerHTML=t[G];var D=document.createElement("button");D.setAttribute("class","sendpulse-prompt-btn sendpulse-disallow-btn");D.setAttribute("type","button");D.setAttribute("onclick","oSpP.denyMessage(); return false;");D.innerHTML=w[G];if(O!="sendpulse-popover"){Y.innerHTML=S.allowbtntext;D.innerHTML=S.disallowbtntext;if(O!="sendpulse-safari"){Y.setAttribute("style","background-color:"+S.buttoncolor+" !important;border-color:"+S.buttoncolor+" !important;");D.setAttribute("style","color:"+S.buttoncolor+" !important;")}}if(c.length==0&&K){var Q=document.createElement("span");Q.setAttribute("class","sp-link-wrapper");var T=document.createElement("a");T.setAttribute("class","sp-link");T.setAttribute("href","https://"+b+"/webpush");T.setAttribute("target","_blank");var L=document.createElement("span");L.innerHTML=x[G];T.appendChild(L);Q.appendChild(T);B.appendChild(Q)}else{if(K&&typeof Q!="undefined"){B.appendChild(Q)}}B.appendChild(D);B.appendChild(Y);if(K&&O=="sendpulse-modal"){var M=document.createElement("div");M.innerHTML="&nbsp;";B.appendChild(M)}}X.appendChild(N);X.appendChild(P);if(O!="sendpulse-fab"){X.appendChild(B);if(O=="sendpulse-bar"){if(K&&typeof Q!="undefined"){I.appendChild(Q)}}I.appendChild(X)}else{if(K&&typeof Q!="undefined"){X.appendChild(Q)}I.appendChild(X);I.appendChild(V)}if(O!="sendpulse-popover"&&O!="sendpulse-safari"&&O!="sendpulse-fab"){var C=document.createElement("button");C.setAttribute("class","sendpulse-prompt-close");C.setAttribute("onclick","oSpP.closePrompt(); return false;");C.setAttribute("style","color:"+S.textcolor+" !important;");C.innerHTML="&times;";I.appendChild(C)}document.body.insertBefore(I,document.body.childNodes[0]);if(O=="sendpulse-modal"){var H=document.createElement("div");H.setAttribute("class","sendpulse-prompt-backdrop");H.setAttribute("style","display:none;");document.body.insertBefore(H,document.body.childNodes[1])}setTimeout(function(){I.className+=I.className?" show-prompt":"show-prompt"},1000)};this.denyMessage=function(){oSpP.sendPromptStat("prompt_denied");oSpP.storeSubscription("DENY");oSpP.closePrompt(true)};this.closePrompt=function(B){if(B===undefined){oSpP.sendPromptStat("prompt_closed")}document.body.removeChild(document.querySelector(".sendpulse-prompt"));if(document.getElementsByClassName("sendpulse-prompt-backdrop").length>0){document.body.removeChild(document.querySelector(".sendpulse-prompt-backdrop"))}oSpP.putValueToDb("SPIDs",{type:"PromptClosed",value:5})};this.initDb=function(D){if(u){return void D()}var C=window.indexedDB||window.mozIndexedDB||window.webkitIndexedDB||window.msIndexedDB;var B=C.open("sendpulse_push_db",2);B.onsuccess=function(E){u=E.target.result;D()};B.onupgradeneeded=function(E){var F=E.target.result;F.createObjectStore("SPIDs",{keyPath:"type"})}};this.getDbValue=function(B,C,D){oSpP.initDb(function(){u.transaction([B],"readonly").objectStore(B).get(C).onsuccess=D})};this.putValueToDb=function(B,C){oSpP.initDb(function(){u.transaction([B],"readwrite").objectStore(B).put(C)})};this.deleteDbValue=function(B,C){oSpP.initDb(function(){u.transaction([B],"readwrite").objectStore(B)["delete"](C)})};this.log=function(B){};this.detectBrowser=function(){var D,C=navigator.userAgent,B=C.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i)||[];var E=C.match(/(edge(?=\/))\/?\s*(\d+)/i)||[];if("Edge"===E[1]){return{name:E[1],version:E[2]}}return/trident/i.test(B[1])?(D=/\brv[ :]+(\d+)/g.exec(C)||[],{name:"IE",version:D[1]||""}):"Chrome"===B[1]&&(D=C.match(/\bOPR\/(\d+)/),null!=D)?{name:"Opera",version:D[1]}:(B=B[2]?[B[1],B[2]]:[navigator.appName,navigator.appVersion,"-?"],null!=(D=C.match(/version\/(\d+)/i))&&B.splice(1,1,D[1]),{name:B[0],version:B[1]})};this.detectOs=function(){var B="";if(navigator.userAgent.indexOf("Windows")!=-1){return("Windows")}if(navigator.userAgent.indexOf("Android")!=-1){return("Android")}if(navigator.userAgent.indexOf("Linux")!=-1){return("Linux")}if(navigator.userAgent.indexOf("iPhone")!=-1){return("iOS")}if(navigator.userAgent.indexOf("Mac")!=-1){return("Mac OS")}if(navigator.userAgent.indexOf("FreeBSD")!=-1){return("FreeBSD")}return""};this.uns=function(){oSpP.deleteDbValue("SPIDs","SubscriptionId")};this.getMessageLang=function(B){B=B.substring(0,2).toLowerCase();if(B=="ua"||B=="uk"){return"ua"}else{if(B=="ru"){return"ru"}else{return"en"}}};this.push=function(B,C){if(!oSpP.detectSite()){oSpP.log("Application allowed only for "+e);return false}j[B]=C;oSpP.getDbValue("SPIDs","SubscriptionId",function(D){if(D.target.result===undefined){if(!q){q=setInterval(function(){oSpP.getDbValue("SPIDs","SubscriptionId",function(E){if(E.target.result!==undefined){oSpP.sendUpdatesToServer(E.target.result.value);clearInterval(q);q=false}})},1000)}}else{oSpP.sendUpdatesToServer(D.target.result.value)}})};this.sendUpdatesToServer=function(B){var D=new XMLHttpRequest();D.open("POST",g,true);D.setRequestHeader("Content-Type","application/json");var C={action:"subscription",subscriptionId:B,subscription_action:"update_variables",appkey:A,custom_data:{variables:j}};D.send(JSON.stringify(C))};this.sendPromptStat=function(D){oSpP.log("[DD] Send prompt stat: "+D);var C=new XMLHttpRequest();C.open("POST",v,true);C.setRequestHeader("Content-Type","application/json");var B={action:"statisctic",statisctic_action:D,appkey:A};C.send(JSON.stringify(B))}}window.addEventListener("load",function(){oSpP.start()});var oSpP=new oSendpulsePush();