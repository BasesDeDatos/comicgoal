/*!CK:2755204724!*//*1442899093,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["2dMTS"]); }

__d("PluginConnectButtonType",[],function a(b,c,d,e,f,g){c.__markCompiled&&c.__markCompiled();f.exports={BLUE_BASE:1,WHITE_BASE:2};},null,{});
__d("classWithMixins",[],function a(b,c,d,e,f,g){if(c.__markCompiled)c.__markCompiled();function h(i,j){var k=function(){i.apply(this,arguments);};k.prototype=Object.assign(Object.create(i.prototype),j.prototype);return k;}f.exports=h;},null);
__d('transferTextStyles',['Style'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={fontFamily:null,fontSize:null,fontStyle:null,fontWeight:null,lineHeight:null,wordWrap:null};function j(k,l){for(var m in i)if(i.hasOwnProperty(m))i[m]=h.get(k,m);h.apply(l,i);}f.exports=j;},null);
__d('TextMetrics',['DOM','Style','UserAgent','transferTextStyles'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();function l(n){var o=n.clientWidth,p=i.get(n,'-moz-box-sizing')=='border-box';if(p&&j.isBrowser('Firefox < 29'))return o;var q=i.getFloat(n,'paddingLeft')+i.getFloat(n,'paddingRight');return o-q;}function m(n,o){'use strict';this.$TextMetrics1=n;this.$TextMetrics2=!!o;var p='textarea',q='textMetrics';if(this.$TextMetrics2){p='div';q+=' textMetricsInline';}this.$TextMetrics3=h.create(p,{className:q});k(n,this.$TextMetrics3);document.body.appendChild(this.$TextMetrics3);}m.prototype.measure=function(n){'use strict';var o=this.$TextMetrics1,p=this.$TextMetrics3;n=(n||o.value)+'...';if(!this.$TextMetrics2){var q=l(o);i.set(p,'width',Math.max(q,0)+'px');}if(o.nodeName==='TEXTAREA'){p.value=n;}else h.setContent(p,n);return {width:p.scrollWidth,height:p.scrollHeight};};m.prototype.destroy=function(){'use strict';h.remove(this.$TextMetrics3);};f.exports=m;},null);
__d('TextInputControl',['DOMControl','Event','Input','debounce'],function a(b,c,d,e,f,g,h,i,j,k){if(c.__markCompiled)c.__markCompiled();var l,m;l=babelHelpers.inherits(n,h);m=l&&l.prototype;function n(o){'use strict';m.constructor.call(this,o);var p=this.getRoot(),q=k(this.update.bind(this),0);i.listen(p,{input:q,keydown:q,paste:q});}n.prototype.setMaxLength=function(o){'use strict';j.setMaxLength(this.getRoot(),o);return this;};n.prototype.getValue=function(){'use strict';return j.getValue(this.getRoot());};n.prototype.isEmpty=function(){'use strict';return j.isEmpty(this.getRoot());};n.prototype.setValue=function(o){'use strict';j.setValue(this.getRoot(),o);this.update();return this;};n.prototype.clear=function(){'use strict';return this.setValue('');};n.prototype.setPlaceholderText=function(o){'use strict';j.setPlaceholder(this.getRoot(),o);return this;};f.exports=n;},null);
__d('TextAreaControl',['Arbiter','ArbiterMixin','CSS','DOMControl','Event','Style','TextInputControl','TextMetrics','classWithMixins','mixin'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){if(c.__markCompiled)c.__markCompiled();var r,s;function t(v,w){return m.getFloat(v,w)||0;}r=babelHelpers.inherits(u,p(n,q(i)));s=r&&r.prototype;function u(v){'use strict';s.constructor.call(this,v);this.autogrow=j.hasClass(v,'uiTextareaAutogrow');this.autogrowWithPlaceholder=j.hasClass(v,'uiTextareaAutogrowWithPlaceholder');this.width=null;l.listen(v,'focus',this._handleFocus.bind(this));}u.prototype.setAutogrow=function(v){'use strict';this.autogrow=v;return this;};u.prototype.onupdate=function(){'use strict';s.onupdate.call(this);this.updateHeight();};u.prototype.updateHeight=function(){'use strict';if(this.autogrow){var v=this.getRoot();if(!this.metrics)this.metrics=new o(v);if(typeof this.initialHeight==='undefined'){this.isBorderBox=m.get(v,'box-sizing')==='border-box'||m.get(v,'-moz-box-sizing')==='border-box'||m.get(v,'-webkit-box-sizing')==='border-box';this.borderBoxOffset=t(v,'padding-top')+t(v,'padding-bottom')+t(v,'border-top-width')+t(v,'border-bottom-width');this.initialHeight=v.offsetHeight-this.borderBoxOffset;}var w=null;if((!v.value||v.value.length===0)&&this.autogrowWithPlaceholder){w=this.metrics.measure(v.placeholder);}else w=this.metrics.measure();var x=Math.max(this.initialHeight,w.height);if(this.isBorderBox)x+=this.borderBoxOffset;if(this.maxHeight&&x>this.maxHeight){x=this.maxHeight;h.inform('maxHeightExceeded',{textArea:v});}if(x!==this.height){this.height=x;m.set(v,'height',x+'px');h.inform('reflow');this.inform('resize');}}else if(this.metrics){this.metrics.destroy();this.metrics=null;}};u.prototype.resetHeight=function(){'use strict';this.height=-1;this.update();};u.prototype.setMaxHeight=function(v){'use strict';this.maxHeight=v;};u.prototype.setAutogrowWithPlaceholder=function(v){'use strict';this.autogrowWithPlacedholder=v;};u.prototype._handleFocus=function(){'use strict';this.width=null;};u.getInstance=function(v){'use strict';return k.getInstance(v)||new u(v);};f.exports=u;},null);
__d('PluginFlyout',['Arbiter','Button','CSS','DOM','DOMEvent','DOMEventListener','Focus','Form','Plugin','TextAreaControl','csx'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){if(c.__markCompiled)c.__markCompiled();var s=h.SUBSCRIBE_NEW,t=h.subscribe,u=h.inform,v=function(x,y){return m.add(x,'click',y);};function w(x,y,z){var aa=this,ba=t(p.CONNECT,function(event,ca){h.unsubscribe(ba);aa.init(x,y,z);aa.connect(event,ca);},s);t(p.DIALOG,function(){aa.init(x,y,z);aa.toggle();},s);}Object.assign(w.prototype,{init:function(x,y,z){if(this.initialized)return;this.initialized=true;k.appendContent(x,JSON.parse(z));var aa=k.find(x,'form'),ba=k.find(aa,"._56zw"),ca=k.find(aa,"._56zx"),da=k.find(aa,"._42x4"),ea=q.getInstance(da);m.add(da,'keyup',function(ia){i.setEnabled(ba,!!ea.getValue());});m.add(window,'keydown',function(ia){if(ia.keyCode===27)ga();});m.add(aa,'submit',function(ia){new l(ia).kill();o.bootstrap(aa);});var fa=y==='tiny'?k.find(document.body,'.pluginPostFlyoutPrompt'):null;this.flyout=x;this.form=aa;this.post_button=ba;this.prompt=fa;var ga=this.hide.bind(this),ha=this.show.bind(this);v(ca,function(ia){new l(ia).kill();ga();});if(fa)v(fa,function(ia){new l(ia).kill();ha();});t(p.CONNECT,this.connect.bind(this),s);t(p.DISCONNECT,function(){ga();},s);t(w.SUCCESS,function(){ga();if(fa)j.hide(fa);},s);t(p.ERROR,function(event,ia){if(ia.action!=='comment')return;k.setContent(k.find(aa,"._56zy"),ia.content);j.hide(ba);},s);},connect:function(event,x){if(x.crossFrame)return;if(this.prompt)j.show(this.prompt);if(!x.story_fbid)this.show();},show:function(){this.shown=true;j.show(this.flyout);j.show(this.post_button);var x=k.scry(this.form,"._5jjo");if(x){n.set(x[0]);}else n.set(this.form.comment);u(w.SHOW);},hide:function(){this.shown=false;j.hide(this.flyout);u(w.HIDE);},toggle:function(){if(this.shown){this.hide();}else this.show();}});Object.assign(w,{SUCCESS:'platform/plugins/flyout/success',SHOW:'platform/plugins/flyout/show',HIDE:'platform/plugins/flyout/hide',success:function(){u(w.SUCCESS);}});f.exports=w;},null);
__d('PluginMessage',['DOMEventListener'],function a(b,c,d,e,f,g,h){if(c.__markCompiled)c.__markCompiled();var i={listen:function(){h.add(window,'message',function(event){if(/\.facebook\.com$/.test(event.origin)&&/^FB_POPUP:/.test(event.data)){var j=JSON.parse(event.data.substring(9));if('reload' in j&&/^https?:/.test(j.reload))document.location.replace(j.reload);}});}};f.exports=i;},null);
__d('PluginOptin',['DOMEvent','DOMEventListener','PluginMessage','PopupWindow','URI','UserAgent_DEPRECATED','PlatformWidgetEndpoint'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n){if(c.__markCompiled)c.__markCompiled();function o(p,q){Object.assign(this,{return_params:l.getRequestURI().getQueryData(),login_params:{},optin_params:{},plugin:p,api_key:q});this.addReturnParams({ret:'optin'});this.login_params.nux=false;delete this.return_params.hash;}Object.assign(o.prototype,{addReturnParams:function(p){Object.assign(this.return_params,p);return this;},addLoginParams:function(p){Object.assign(this.login_params,p);return this;},addOptinParams:function(p){Object.assign(this.optin_params,p);return this;},start:function(){var p=new l(n.dialog('plugin.optin')).addQueryData(this.optin_params).addQueryData({app_id:this.api_key||127760087237610,secure:l.getRequestURI().isSecure(),social_plugin:this.plugin,return_params:JSON.stringify(this.return_params),login_params:JSON.stringify(this.login_params)});if(m.mobile()){p.setSubdomain('m');}else p.addQueryData({display:'popup'});this.popup=k.open(p.toString(),420,450);j.listen();return this;}});o.starter=function(p,q,r,s){var t=new o(p);t.addReturnParams(q||{});t.addLoginParams(r||{});t.addOptinParams(s||{});return t.start.bind(t);};o.listen=function(p,q,r,s,t){i.add(p,'click',function(u){new h(u).kill();o.starter(q,r,s,t)();});};f.exports=o;},null);
__d('PluginConnectButton',['Arbiter','CSS','DOM','DOMDimensions','DOMEvent','DOMEventListener','Focus','Form','PlatformWidgetEndpoint','Plugin','PluginConnectButtonType','PluginFlyout','PluginOptin','Style','URI','csx','cx','getElementPosition'],function a(b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y){if(c.__markCompiled)c.__markCompiled();var z=h.SUBSCRIBE_NEW,aa=h.subscribe,ba=function(da,ea){return m.add(da,'click',ea);};function ca(da){this.config=da;this.busy=false;var ea=j.find(da.form,'.pluginConnectButton');this.buttons=ea;this.node_connected=j.find(ea,'.pluginConnectButtonConnected');this.node_disconnected=j.find(ea,'.pluginConnectButtonDisconnected');var fa=(function(ha){new l(ha).kill();if(!this.busy){this.submit();this.busy=this.canpersonalize;}}).bind(this);ba(this.node_disconnected,fa);if(da.buttontype===r.BLUE_BASE){ba(j.find(ea,'.pluginButtonX button'),fa);}else if(da.buttontype===r.WHITE_BASE)ba(this.node_connected,fa);ba(this.node_connected,function(ha){return h.inform(q.DIALOG,ha);});var ga=this.update.bind(this);aa(q.CONNECT,ga,z);aa(q.DISCONNECT,ga,z);aa(q.ERROR,this.error.bind(this),z);aa('Connect.Unsafe.xd/reposition',this.flip.bind(this));aa(s.HIDE,this.hideFlyout.bind(this));if(da.autosubmit)setTimeout(this.submit.bind(this),0);}Object.assign(ca.prototype,{update:function(da,event){this.busy=false;var ea=this.config;if(event.identifier!==ea.identifier)return;var fa=da===q.CONNECT,ga=p.plugins(ea.plugin);ga+='/'+(!fa?'connect':'disconnect');i[fa?'show':'hide'](this.node_connected);i[fa?'hide':'show'](this.node_disconnected);try{if(document.activeElement.nodeName.toLowerCase()==='button'){var ia=fa?this.node_connected:this.node_disconnected,ja=j.find(ia,'button');ja.disabled=false;n.set(ja);}}catch(ha){}ea.connected=fa;ea.form.setAttribute('action',ga);ea.form.setAttribute('ajaxify',ga);},error:function(event,da){this.busy=false;if(da.action in {connect:1,disconnect:1}){j.setContent(this.buttons,da.content);var ea=j.scry(this.buttons,'.confirmButton');if(ea.length===1)n.set(ea[0]);}},submit:function(){if(!this.config.canpersonalize)return this.login();o.bootstrap(this.config.form);this.fireStateToggle();},fireStateToggle:function(){var da=this.config;if(da.connected){q.disconnect(da.identifier);}else q.connect(da.identifier);},login:function(){var da=this.config.plugin;new t(da,v.getRequestURI().getQueryData().api_key).addReturnParams({act:'connect'}).addLoginParams({social_plugin_action:this.config.pluginaction}).start();},flip:function(da,ea){var fa=j.scry(document.body,"._4xn8");if(fa.length===0){return;}else fa=fa[0];var ga=j.scry(this.config.form,'.pluginConnectButtonConnected .pluginButtonIcon'),ha=u.get(ga[0],'display')!=='none'?ga[0]:ga[1],ia=j.find(document.body,'.pluginConnectButtonLayoutRoot'),ja;if(ea.type==='reposition'){i.addClass(ia,"_1f8a");u.set(ia,'padding-left',450-ia.offsetWidth+'px');i.removeClass(ia,"_1f8b");ja=y(ha).x+k.getElementDimensions(ha).width/2-6;}else{i.addClass(ia,"_1f8b");u.set(ia,'padding-left','0px');i.removeClass(ia,"_1f8a");ja=6;}u.set(fa,'left',ja+'px');},hideFlyout:function(){n.set(this.connected?this.node_disconnected:this.node_connected);}});f.exports=ca;},null);
__d('PluginConnectButtonResize',['DOMDimensions','DOMQuery','PluginResize','Style','getElementPosition'],function a(b,c,d,e,f,g,h,i,j,k,l){if(c.__markCompiled)c.__markCompiled();function m(n,o,p){if(p)k.set(n,'width',p+'px');j.auto(n,'resize.flow');function q(){var r=i.scry(document.body,'.uiTypeaheadView')[0];if(!r)return {x:0,y:0};var s=l(r),t=h.getElementDimensions(r);return {x:s.x+t.width,y:s.y+t.height};}new j(function(){return (Math.max(j.getElementWidth(n),o&&o.offsetWidth,q().x));},function(){return (Math.max(n.offsetHeight,o?o.offsetHeight+o.offsetTop:0,q().y));},'resize.iframe',true).resize().auto();}f.exports=m;},null);
__d('PluginConnection',['Arbiter','CSS','Plugin'],function a(b,c,d,e,f,g,h,i,j){if(c.__markCompiled)c.__markCompiled();var k=function(){};Object.assign(k.prototype,{init:function(l,m,n,event){event=event||j.CONNECT;this.identifier=l;this.element=m;this.css=n;h.subscribe([j.CONNECT,j.DISCONNECT],function(o,p){if(l===p.href)i[o===event?'addClass':'removeClass'](m,n);return true;});return this;},connected:function(){return i.hasClass(this.element,this.css);},connect:function(){return h.inform(j.CONNECT,{href:this.identifier},h.BEHAVIOR_STATE);},disconnect:function(){return h.inform(j.DISCONNECT,{href:this.identifier},h.BEHAVIOR_STATE);},toggle:function(){return this.connected()?this.disconnect():this.connect();}});k.init=function(l){for(var m,n=0;n<l.length;n++){m=new k();m.init.apply(m,l[n]);}};f.exports=k;},null);