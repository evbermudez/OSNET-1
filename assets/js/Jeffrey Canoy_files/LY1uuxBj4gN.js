/*!CK:1510923703!*//*1402976135,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["13i58"]); }

__d("ComposerXAttachment",["ComposerXStore","copyProperties"],function(a,b,c,d,e,f,g,h){function i(){"use strict";}i.prototype.getRoot=function(){"use strict";};i.prototype.initWithComponents=function(j){"use strict";};i.prototype.cleanup=function(){"use strict";};i.prototype.reset=function(){"use strict";};i.prototype.getComponent=function(j){"use strict";return g.get(this._composerID,j);};i.prototype.getComponentInstance=function(j){"use strict";var k=g.get(this._composerID,j);return k&&k.instance;};i.prototype.canSwitchAway=function(){"use strict";return true;};i.prototype.setComposerID=function(j){"use strict";this._composerID=j;};i.prototype.getComposerID=function(){"use strict";return this._composerID;};i.prototype.allowOGTagPreview=function(){"use strict";return false;};h(i.prototype,{attachmentClassName:''});e.exports=i;},null);
__d("ComposerXTaggerIconReset",["CSS","cx"],function(a,b,c,d,e,f,g,h){function i(j){g.removeClass(j.element,"_1dsa");g.removeClass(j.element,"_1dsb");g.removeClass(j.element,"_509o");}e.exports=i;},null);
__d("ComposerXNUX",["AsyncRequest","ComposerXDragDrop","CSS","DOM","Event","SubscriptionsHandler","csx","cx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n){var o={},p={};function q(s,t,u){var v=u.dataTransfer.items;if(v){var w=h.filterImages(v);if(!w.length)return;}r.acknowledgeDialog(s,t);}var r={CAMERA_NUX:'camera_nux_seen',ADD_MORE_NUX:'add_more_nux_seen',HMU_NUX:'hmu_nux_seen',HMU_POST_NUX:'hmu_post_nux_seen',FACEREC_SUGGESTIONS_NUX:'facerec_suggestions_nux_seen',TAGGING_FLYOUT_NUX:'tagging_flyout_nux_seen',OGCOMPOSER_NEWVERBS_NUX:'ogcomposer_newverbs_nux_seen',onInit:function(s,t,u){if(o[u])return;p[u]=p[u]||new l();var v=p[u];v.engage();var w=s.getRoot();i.addClass(w,"_4bka");var x=j.scry(w,"._3o-a");x.forEach(function(y){v.addSubscriptions(k.listen(y,'click',r.acknowledgeDialog.bind(null,u,s)));});if(u==r.CAMERA_NUX)v.addSubscriptions(k.listen(document,'dragenter',q.bind(null,u,s)));v.addSubscriptions(s.subscribe('cancel',r.sendMarkSeenRequest.bind(null,u)),s.subscribe('hide',v.release.bind(v)));s.setContext(t).show();},acknowledgeDialog:function(s,t){r.sendMarkSeenRequest(s);t.hide();},sendMarkSeenRequest:function(s){if(!o[s]){new g('/ajax/photos/composer/mark_nux_seen.php').setData({type:s}).send();o[s]=true;}},onCleanup:function(s){s.hide();}};e.exports=r;},null);
__d("intlList",["React","fbt","invariant","keyMirror"],function(a,b,c,d,e,f,g,h,i,j){'use strict';var k=function(m,n){n=n||k.CONJUNCTIONS.AND;var o=m.length;if(o===0){return '';}else if(o===1)return m[0];var p=m.shift(),q=m.pop(),r=p;m.forEach(function(s){r=h._("{previous items}, {following items}",[h.param("previous items",r),h.param("following items",s)]);});return l(r,q,n);};function l(m,n,o){switch(o){case k.CONJUNCTIONS.AND:return (h._("{list of items} and {last item}",[h.param("list of items",m),h.param("last item",n)]));case k.CONJUNCTIONS.OR:return (h._("{list of items} or {last item}",[h.param("list of items",m),h.param("last item",n)]));case k.CONJUNCTIONS.NONE:return (h._("{list of items}, {last item}",[h.param("list of items",m),h.param("last item",n)]));default:i(false);}}k.CONJUNCTIONS=j({AND:null,NONE:null,OR:null});e.exports=k;},null);
__d("AudienceSelectorTags",[],function(a,b,c,d,e,f){var g={},h={hasTags:function(i){return g.hasOwnProperty(i);},setHasTags:function(i){if(i)g[i]=true;}};e.exports=h;},null);
__d("DynamicIconSelector",["Button","CSS","DOM","SelectorDeprecated"],function(a,b,c,d,e,f,g,h,i,j){var k={swapIcon:function(l){var m=j.getSelectedOptions(l)[0],n=m&&i.scry(m,'.itemIcon')[0],o=j.getSelectorButton(l);if(n){g.setIcon(o,n.cloneNode(true));}else{var p=i.scry(o,'.img')[0];p&&i.remove(p);}h.conditionClass(o,'uiSelectorChevronOnly',!n);}};j.subscribe('change',function(l,m){var n=m.selector;if(h.hasClass(n,'dynamicIconSelector'))k.swapIcon(n);});e.exports=k;},null);
__d("PrivacySelectorOption",["Arbiter","AudienceSelectorTags","CSS","CurrentUser","DOM","DynamicIconSelector","Parent","PrivacyConst","SelectorDeprecated","copyProperties","csx","fbt","intlList","tx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t){function u(v,w){if(!v)throw new Error("there's no DOM option. Config data: ",w);this._elem=v;this._selector=m.byClass(this._elem,'audienceSelector');if(!this._selector)return;this._priv_base_val=w.priv_base_val;this._audienceCount=w.audience_count||"";this._hasRestricted=w.has_restricted||false;this._isCustom=w.is_custom||false;this._includedAudience=w.included||"";this._excludedAudience=w.excluded||{};this._excludedTaggees={};this._tagExpansionBehavior=w.tag_expansion_behavior||n.TagExpansion.NONE;this._plusLabel=k.scry(v,'.plusLabel')[0];this._audienceCountLabel=k.scry(v,'.audienceCountLabel')[0];this._taggedIDs=[];this._tags=[];this._recalculateTooltipAndLabel();this._updateOptionCountLabel();this._updateSelector();g.subscribe('Composer/changedtags',function(x,y){var z=i.hasClass(this._selector,'composerAudienceSelector');if(!this._getChangedData()||!z)return;this._tags=[];this._taggedIDs=[];for(var aa=0;aa<y.withTags.length;aa++){var ba=y.withTags[aa].info;if(ba.uid!=j.getID()){this._tags.push(ba.text);this._taggedIDs.push(ba.uid);}}for(aa in y.mention)if(y.mention[aa].type=='user'&&y.mention[aa].uid!=j.getID()){this._tags.push(y.mention[aa].text);this._taggedIDs.push(y.mention[aa].uid);}var ca=k.scry(document.body,"._5l7q")[0];ca&&!!this._taggedIDs.length&&i.hide(ca);this._updateOptionCountLabel();var da=this._recalculateTooltipAndLabel();if(da&&o.isOptionSelected(this._elem)){this._updateSelector();g.inform('SelectedPrivacyOption/changed',this._getChangedData());}}.bind(this));o.listen(this._selector,'change',this._updateSelector.bind(this));}p(u.prototype,{updateOption:function(v,w,x,y,z){this._priv_base_val=v;this._includedAudience=w;this._excludedAudience=x;this._tagExpansionBehavior=y;this._audienceCount=z;this._recalculateTooltipAndLabel();this._updateOptionCountLabel();return {label:this._label,tooltip:this._tooltip};},_recalculateTooltipAndLabel:function(){var v=this._label;this._label=this._getNewSelectorLabel();var w=this._tooltip;this._tooltip=this._getNewTooltip();return (w!=this._tooltip)||(v!=this._label);},_getNewTooltip:function(){if(this._isCustom)return this._recalcCustomTooltip();switch(this._priv_base_val){case n.FriendsValue.ALL_FRIENDS:return this._recalcFriendsTooltip();case n.FriendsValue.FRIENDS_MINUS_ACQUAINTANCES:return this._recalcFriendsMinusTooltip();case n.FriendsValue.SELF:var v=this._getTagExpansionText();return v?v:this._getIncludedAudience();default:return this._recalcCustomTooltip();}},_getNewSelectorLabel:function(){var v=this._elem.getAttribute('data-label').replace(/\(.*\)/,"");if(this._showAudienceCount()){var w=' ('+this._audienceCount+')';v+=w;}if(this._isTagExpanded())v+=' (+)';return v;},_updateOptionCountLabel:function(){if(this._audienceCountLabel){if(this._showAudienceCount()){var v=' ('+this._audienceCount+')';k.setContent(this._audienceCountLabel,v);}i.conditionShow(this._audienceCountLabel,this._showAudienceCount());}this._plusLabel&&i.conditionShow(this._plusLabel,this._isTagExpanded());},_getChangedData:function(){return {tags:this._taggedIDs,privacy:this._priv_base_val};},_showAudienceCount:function(){return (this._audienceCountLabel&&this._audienceCount&&this._audienceCount.length>0);},_isTagExpanded:function(){var v=this._getTagExpansionBehavior(),w=!!this._taggedIDs.length||this._alreadyHasTags();return (w&&v!=n.TagExpansion.NONE);},_alreadyHasTags:function(){var v=k.scry(this._selector,'*[data-oid]')[0];v=v&&v.getAttribute('data-oid');return v&&h.hasTags(v);},_updateSelector:function(){if(o.isOptionSelected(this._elem)){var v=i.hasClass(this._selector,'composerAudienceSelector');v&&o.setButtonLabel(this._selector,this._label);o.setButtonTooltip(this._selector,this._tooltip);l.swapIcon(this._selector);return false;}return true;},_isSharedAlbum:function(){var v=k.scry(this._selector,'*[data-shared-album]')[0];return v&&v.getAttribute('data-shared-album');},_getTagExpansionBehavior:function(){if(this._tagExpansionBehavior)return this._tagExpansionBehavior;var v=this._priv_base_val===n.FriendsValue.SELF,w=this._priv_base_val===n.FriendsValue.EVERYONE;if((v&&this._isSharedAlbum())||w){return n.TagExpansion.NONE;}else if(this._priv_base_val<n.FriendsValue.ALL_FRIENDS)return n.TagExpansion.TAGGEES;return n.TagExpansion.FRIENDS_OF_TAGGEES;},_getTagExpansionText:function(){var v=this._getTagExpansionBehavior();if(!!this._taggedIDs.length||this._alreadyHasTags()){if(v==n.TagExpansion.FRIENDS_OF_TAGGEES){return "friends of anyone tagged";}else if(v==n.TagExpansion.TAGGEES)return "Anyone tagged";return '';}return '';},_getIncludedAudience:function(){if(this._includedAudience)return this._includedAudience;var v=this._priv_base_val===n.FriendsValue.SELF;if(v&&!this._isSharedAlbum())return "Only Me";return this._elem.getAttribute('data-label');},_getCombinedSentence:function(v,w){if(!w)return v;return r._("{list of people who can see this}; Except: {list of people who cannot see this}",[r.param("list of people who can see this",v),r.param("list of people who cannot see this",w)]);},_recalcFriendsTooltip:function(){var v=this._tags.length;if(v>2){return this._hasRestricted?"Your friends and friends of anyone tagged; Except: Restricted":"Your friends and friends of anyone tagged";}else if(v==2){if(this._hasRestricted){return t._("Your friends, {user}'s friends and {user2}'s friends; Except: Restricted ",{user:this._tags[0],user2:this._tags[1]});}else return t._("Your friends, {user}'s friends and {user2}'s friends",{user:this._tags[0],user2:this._tags[1]});}else if(v==1){if(this._hasRestricted){return t._("Your friends and {user}'s friends; Except: Restricted",{user:this._tags[0]});}else return t._("Your friends and {user}'s friends",{user:this._tags[0]});}else return this._hasRestricted?"Your friends; Except: Restricted":"Your friends";},_recalcFriendsMinusTooltip:function(){var v=this._tags.length;if(v>0||this._alreadyHasTags()){var w="friends of anyone tagged",x=r._("{people who can see this}, {list of more people who can see this}",[r.param("people who can see this","Your friends"),r.param("list of more people who can see this",w)]),y="Acquaintances";if(this._hasRestricted)y=r._("{Name of Acquaintances friend list}, {restricted}",[r.param("Name of Acquaintances friend list",y),r.param("restricted","Restricted")]);return this._getCombinedSentence(x,y);}else{if(this._hasRestricted)return "Friends; Except: Acquaintances, Restricted";return "Friends except Acquaintances";}},_recalcCustomTooltip:function(){var v=this._getIncludedAudience(),w=this._getTagExpansionText();if(w)v=r._("{list of people who can see this}, {list of additional people who can see this}",[r.param("list of people who can see this",v),r.param("list of additional people who can see this",w)]);for(var x=0;x<this._taggedIDs.length;x++){y=this._taggedIDs[x];if(y in this._excludedAudience){delete this._excludedAudience[y];this._excludedTaggees[y]=this._tags[x];break;}}for(var y in this._excludedTaggees)if(this._excludedTaggees.hasOwnProperty(y))if(this._taggedIDs.indexOf(y)===-1){this._excludedAudience[y]=this._excludedTaggees[y];delete this._excludedTaggees[y];break;}var z=[];for(x in this._excludedAudience)if(this._excludedAudience.hasOwnProperty(x))z.push(this._excludedAudience[x]);return this._getCombinedSentence(v,s(z));}});e.exports=u;},null);
__d("XPrivacyCustomDialogControllerURIBuilder",["XControllerURIBuilder"],function(a,b,c,d,e,f,g){e.exports=g.create("\/privacy\/custom_dialog\/",{id:{type:"String",required:true},option_id:{type:"String",required:true},autosave:{type:"Bool"},explain_tags:{type:"Bool"},limit_community:{type:"Bool"},limit_facebook:{type:"Bool"},limit_fof:{type:"Bool"},limit_tagexpand:{type:"Bool"},is_new_privacy_selector:{type:"Bool"},render_location:{type:"Int"},content_type:{type:"String"},post_param:{type:"String"},privacy_data:{type:"String"},source:{type:"String"},tags:{type:"IntVector"},tag_expansion_button:{type:"String"},__asyncDialog:{type:"Int"}});},null);
__d("CustomPrivacyOptionController",["Arbiter","AsyncDialog","AsyncRequest","DOM","Event","Form","Parent","PrivacyConst","PrivacySelectorOption","SelectorDeprecated","XPrivacyCustomDialogControllerURIBuilder","copyProperties"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){function s(t,u){if(!t)return;setTimeout((function(){this._selector=m.byClass(t,'audienceSelector');if(!this._selector)return;this.initCustomState(t,u.option_id,u.id);var v={priv_base_val:u.base_audience_value,audience_count:u.audience_count,is_custom:true,included:u.included_audience,excluded:u.excluded_audience,tag_expansion_behavior:u.tag_expansion_behavior};this._optionJSInstance=new o(t,v);k.listen(t,'click',function(event){this.openCustomDialog(event,u.option_id,u.explain_tags,u.autosave,u.limit_community,u.limit_facebook,u.limit_fof,u.limit_tagexpand,u.source);}.bind(this));p.listen(this._selector,'select',function(w){if(w.option._id!=this._id)this.clearCustomState();}.bind(this));}).bind(this),0);}r(s,{_instances:{},update:function(t,u,v,w,x,y,z,aa,ba){var ca=s._instances[t];ca._update(u,v)._updateOption(v,x,y,z,aa,ba);g.inform('Form/change',{node:ca._container});},getData:function(t){return s._instances[t]._privacyData;},setPrivacyData:function(t,u,v){s._instances[t]._update(u,v);}});r(s.prototype,{_updateOption:function(t,u,v,w,x,y){var z=p.getOption(this._selector,t)||p.getOption(this._selector,n.BaseValue.CUSTOM+''),aa=this._optionJSInstance.updateOption(u,v,w,x,y);g.inform('CustomPrivacyOptionController/update',{selector:this._selector,option:z,tooltip:aa.tooltip,label:aa.label});return this;},_update:function(t,u){var v=u==n.BaseValue.CUSTOM||!p.getOption(this._selector,u),w=this._selector.getAttribute('data-name');this.updateCustomState(t,v,w);return this;},initCustomState:function(t,u,v){s._instances[u]=this;this._container=j.find(t,'.customPrivacyInputs');this._id=v;this._privacyData={};var w=l.serialize(this._container);if(w.audience)this._privacyData=w.audience[v];return t;},openCustomDialog:function(event,t,u,v,w,x,y,z,aa){var ba=new q().setString('option_id',t).setString('id',this._id).setString('privacy_data',JSON.stringify(this._privacyData)).setBool('explain_tags',u).setBool('autosave',v).setBool('limit_community',w).setBool('limit_facebook',x).setBool('limit_fof',y).setBool('limit_tagexpand',z).setBool('is_new_privacy_selector',false).setString('source',aa).getURI(),ca=new i(ba);ca.setRelativeTo(event.getTarget());h.send(ca,function(da){da.subscribe('cancel',function(){g.inform('CustomPrivacyOptionController/cancel',{selector:this._selector});});});},updateCustomState:function(t,u,v){this.clearCustomState();this._privacyData=r({},t);if(u)if(v){v=v.slice(0,-'[value]'.length);var w={};w[v]=t;l.createHiddenInputs(w,this._container,null,true);}},clearCustomState:function(){this._privacyData={};j.empty(this._container);}});e.exports=s;},null);
__d("AudienceSelector",["Arbiter","AudienceSelectorTags","CSS","CustomPrivacyOptionController","DOM","DynamicIconSelector","PrivacyConst","SelectorDeprecated"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n){var o={};n.subscribe('select',function(q,r){if(!i.hasClass(r.selector,'audienceSelector'))return;var s=n.getOptionValue(r.option);r.value=s;g.inform('AudienceSelector/changed',r);if(s==m.BaseValue.CUSTOM&&!i.hasClass(r.option,'noDialog')){n.toggle(r.selector);return false;}g.inform('AudienceSelector/changedNonCustomDialogButton',r);if(i.hasClass(r.selector,'dataTooltip')){var t=k.find(r.option,'.itemAnchor').getAttribute('data-tooltip');n.setButtonTooltip(r.selector,t||null);}if(!i.hasClass(r.option,'specialOption'))return;var u=k.find(r.option,'a').getAttribute('data-type');if(i.hasClass(r.option,'moreOption')){i.addClass(r.selector,u);i.addClass(r.selector,'showSecondaryOptions');return false;}else if(i.hasClass(r.option,'returnOption')){i.removeClass(r.selector,'showSecondaryOptions');i.removeClass(r.selector,'friendList');return false;}});var p={keepSynchronized:function(q,r){o[q]||(o[q]={});o[q][r.id]=r;},setHasTags:function(q){h.setHasTags(q);},forceAndKeepSynchronized:function(q,r){p.keepSynchronized(q,r);g.inform('AudienceSelector/update',{option:n.getSelectedOptions(r)[0],selector:r});},get:function(q){var r=k.scry(q,'div.audienceSelector');if(r.length!=1)return;return r[0];},setAudience:function(q,r){var s=this.get(q);n.setSelected(s,r.toString());l.swapIcon(s);var t=n.getSelectedOptions(s);g.inform('AudienceSelector/changed',{option:t[0],selector:s});}};g.subscribe('CustomPrivacyOptionController/update',function(q,r){if(!i.hasClass(r.selector,'audienceSelector'))return;n.setSelected(r.selector,n.getOptionValue(r.option));l.swapIcon(r.selector);var s=i.hasClass(r.selector,'composerAudienceSelector'),t=i.hasClass(r.selector,'inlineAudienceWidget');if(s||t)n.setButtonLabel(r.selector,r.label);n.setButtonTooltip(r.selector,r.tooltip);g.inform('AudienceSelector/update',r);});g.subscribe(['AudienceSelector/changed','AudienceSelector/update'],function(event,q){var r=n.getOptionValue(q.option),s={};if(r==m.BaseValue.CUSTOM){if(event=='AudienceSelector/changed')return;s=j.getData(q.option.id);}else if(i.hasClass(q.selector,'inlineAudienceWidget'))n.setButtonLabel(q.selector,q.option.innerText);for(var t in o){var u=o[t];if(u[q.selector.id]){g.inform('AudienceSelector/syncNonSelectorIcon',{category:t});for(var v in u){var w=u[v];if(!w||q.selector===w)continue;if(n.getValue(w)!==r){n.setSelected(w,r);l.swapIcon(w);}if(r==m.BaseValue.CUSTOM){var x=n.getOption(w,m.BaseValue.CUSTOM+'');if(x){j.setPrivacyData(x.id,s,r);n.setButtonTooltip(w,q.tooltip);}}}}}});e.exports=p;},null);
__d("legacy:AudienceSelector",["AudienceSelector"],function(a,b,c,d){b('AudienceSelector');},3);
__d("FriendListPrivacyOptions",["Arbiter","AsyncDialog","AsyncRequest","Dialog","DOMQuery","PageTransitions","Parent","SelectorDeprecated","$","ge"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){var q=false,r=false,s=null,t={},u=function(w){if(!Object.keys(t).length)l.registerHandler(function(){t={};q=false;r=false;});var x=w.getAttribute('data-name');t[x]=w;n.listen(w,'select',function(y){var z=y.option,aa=k.find(z,'a.itemAnchor'),ba=aa.getAttribute('data-flid');if(!ba)return;var ca=aa.getAttribute('data-dynamic');if(ca&&q){v.showSmartListNux(z,ba);}else if(!ca&&r)v.showDumbListNux([ba]);});},v={listen:function(w,x,y){var z=p(w);if(!z)return;var aa=m.byClass(z,'audienceSelector');if(aa){u(aa);q=x;r=y;}},showSmartListNux:function(w,x){w=o(w);new i('/ajax/friends/lists/smart_list_publish_nux.php').setData({option_id:w.id,flid:x}).send();q=false;},setContextualDialog:function(w,x){x=o(x);var y=m.byClass(x,'audienceSelector');if(y){w.setContext(y);w.show();var z=g.subscribe('composer/publish',function(){w.hide();});w.subscribe('hide',function(){z.unsubscribe();});}},showDumbListNux:function(w){h.send(new i('/ajax/friends/lists/dumb_list_publish_nux.php').setData({flids:w}));r=false;},showBothListsNux:function(w,x){s=o(w);v.showDumbListNux(x);},setDialogX:function(w){if(!s)return;w.subscribe('hide',function(){v.showSmartListNux(s);s=null;});},setDialog:function(){if(!s)return;var w=j.getCurrent();if(w)w.setCloseHandler(function(){v.showSmartListNux(s);s=null;});}};e.exports=v;},null);
__d("legacy:DynamicIconSelector",["DynamicIconSelector"],function(a,b,c,d){a.DynamicIconSelector=b('DynamicIconSelector');},3);
__d("MentionsTypeaheadAreaView",["ContextualTypeaheadView","Parent"],function(a,b,c,d,e,f,g,h){for(var i in g)if(g.hasOwnProperty(i))k[i]=g[i];var j=g===null?null:g.prototype;k.prototype=Object.create(j);k.prototype.constructor=k;k.__superConstructor__=g;function k(){"use strict";if(g!==null)g.apply(this,arguments);}k.prototype.getContext=function(){"use strict";return h.byClass(this.element,'uiMentionsInput');};e.exports=k;},null);