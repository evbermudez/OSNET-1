/*!CK:2648933610!*//*1401158430,178183207*/

if (self.CavalryLogger) { CavalryLogger.start_js(["wxq+C"]); }

__d("SnowliftPicCropper",["Arbiter","CSS","Dialog","DOM","Event","Form","Keys","Parent","Photocrop2","ProfilePicRequestCreator","ProfilePictureFlowLogging","Style","URI","copyProperties","tx"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u){var v=q.flow.SNOWLIFT;function w(x){"use strict";this.root=x.getRoot();this.photoSnowlift=x;}w.prototype.init=function(){"use strict";this.croppingMode=false;this.optionMenu=j.find(this.root,'div.fbPhotoSnowliftContainer');this.overlayActions=j.find(this.root,'div.snowliftOverlayBar');this.setupHandlers();this.resetData();g.subscribe('PhotoTagger.REMOVED_MAKE_PROFILE_PIC_OPTION',this.disableCropping.bind(this,false));};w.prototype.setupHandlers=function(){"use strict";this.handlers=[k.listen(this.optionMenu,'click',this.clickHandler.bind(this)),k.listen(this.overlayActions,'click',this.clickHandler.bind(this)),k.listen(window,'resize',(function(event){this.resetPhoto();}).bind(this)),k.listen(document.documentElement,'keydown',function(event){if(!this.croppingMode)return;var x=k.getKeyCode(event);if(x===m.ESC){this.disableCropping(false);k.kill(event);}}.bind(this))];};w.prototype.submitCroppedPhoto=function(){"use strict";var x=this.photoSnowlift.getCurrentPhotoInfo();if(!x)return;this._logFlowStep(q.step.LOADING);this._logFlowStep(q.step.CROP_SAVING);var y=this.getProfilePicTargetId(x);h.addClass(this.root,'profilePicSavingMode');var z=this.disableCropping(true);new p(x.fbid,x.owner,y,z).setSuccessURI(new s('/profile.php').setQueryData({id:y}).toString()).setErrorURI(new s('/photo.php').setQueryData({pid:x.pid,id:x.owner}).toString()).setIsUnscaled(true).setProfilePhotoMethod('existing').setProfilePhotoSource(this._data.pp_source).send();};w.prototype.clickHandler=function(event){"use strict";var x=event.getTarget();if(!this.croppingMode&&n.byClass(x,'fbPhotoActionsCrop')){var y=n.byClass(x,'fbPhotoActionsCrop');this._setData({inprofilepicalbum:!!n.byClass(x,'profileAlbum'),makeuserprofile:!!n.byClass(x,'makeUserProfile'),profile_id:y.getAttribute('data-userid')});if(this._data.isUser)q.setFlowType(v).setAction(q.action.MAKE_PROFILE).log();this.enableCropping();event.prevent();}else if(this.croppingMode&&n.byClass(x,'cancelCroppingLink')){this._logFlowStep(q.step.CANCEL);this.disableCropping(false);event.prevent();}else if(this.croppingMode&&n.byClass(x,'doneCroppingLink')){this.submitCroppedPhoto();event.prevent();}};w.prototype.resetPhoto=function(){"use strict";this.photo=j.find(this.root,'img.spotlight');if(this.photocrop){j.setAttributes(this.photocrop.highlight,{src:this.photo.src});this.photocrop.photo=this.photo;this.photocrop.adjustForResize();}else if(this.wrapper){j.remove(this.wrapper);this.wrapper=null;}};w.prototype.enableCropping=function(){"use strict";if(this.croppingMode)return;if(this._data.previousProfilePic)return this.showPicInProfileAlbumDialog();this._logFlowStep(q.step.CROP);this.croppingMode=true;this.resetPhoto();this.wrapper=j.create('div');h.addClass(this.wrapper,'stageCropper');j.find(this.root,'.stage').appendChild(this.wrapper);r.set(this.wrapper,'width','100%');r.set(this.wrapper,'height','100%');this.photocrop=new o(this.photo,{target:this.wrapper},this.photoSnowlift.getCurrentImageServerSizeDimensions());h.addClass(this.root,'profilePicCroppingMode');};w.prototype.disableCropping=function(x){"use strict";if(!this.croppingMode)return;this.croppingMode=false;h.removeClass(this.root,'profilePicCroppingMode');var y=null;if(this.photocrop){y=this.photocrop.done(x);this.photocrop=null;}if(!x&&this.wrapper){j.remove(this.wrapper);this.wrapper=null;}delete this.photo;return y;};w.prototype.showPicInProfileAlbumDialog=function(){"use strict";this._logFlowStep(q.step.PREVIOUS_PIC_INIT);new i().setTitle("Make Profile Picture").setBody("You've used this photo as your profile picture before. Do you want to use it again?").setButtons([i.CONFIRM,i.CANCEL]).setModal(true).setHandler((function(){h.addClass(this.root,'profilePicSavingMode');var x=this.photoSnowlift.getCurrentPhotoInfo();if(!x)return;this._logFlowStep(q.step.PREVIOUS_PIC_SAVING);this._logFlowStep(q.step.LOADING);var y=this.getProfilePicTargetId(x),z=this._data.isUser?'profile':'object',aa={pid:x.pid,owner:x.owner,id:y,type:z,profile_pic_id:y};l.post('/pic_upload.php',aa);}).bind(this)).show();};w.prototype.getProfilePicTargetId=function(x){"use strict";if(this._data.isUser||this._data.profile_id)return this._data.profile_id;return x.owner;};w.prototype.resetData=function(){"use strict";this._setData(this.photoSnowlift.getLoadQuery());};w.prototype._logFlowStep=function(x){"use strict";q.setFlowType(v).log(x);};w.prototype._setData=function(x){"use strict";this._data={profile_id:parseInt(x.profile_id,10),pp_source:x.pp_source||'photo_view',isUser:!!x.makeuserprofile,previousProfilePic:!!x.inprofilepicalbum};};w.getInstance=function(x){"use strict";if(!w._instance)w._instance=new w(x);return w._instance;};t(w,{_instance:null});e.exports=w;},null);