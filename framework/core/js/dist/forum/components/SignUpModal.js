"use strict";(self.webpackChunkflarum_core=self.webpackChunkflarum_core||[]).push([[395],{8686:(t,s,a)=>{a.r(s),a.d(s,{default:()=>h});var e=a(7905),r=a(6789),i=a(899),o=a(8312),n=a(6403),l=a(1552),d=a(4041),u=a(6458);class h extends i.Z{constructor(){super(...arguments),(0,e.Z)(this,"username",void 0),(0,e.Z)(this,"email",void 0),(0,e.Z)(this,"password",void 0)}oninit(t){super.oninit(t),this.username=(0,u.Z)(this.attrs.username||""),this.email=(0,u.Z)(this.attrs.email||""),this.password=(0,u.Z)(this.attrs.password||"")}className(){return"Modal--small SignUpModal"}title(){return r.Z.translator.trans("core.forum.sign_up.title")}content(){return[m("div",{className:"Modal-body"},this.body()),m("div",{className:"Modal-footer"},this.footer())]}isProvided(t){var s,a;return null!=(s=null==(a=this.attrs.provided)?void 0:a.includes(t))&&s}body(){return[!this.attrs.token&&m(n.Z,null),m("div",{className:"Form Form--centered"},this.fields().toArray())]}fields(){const t=new d.Z,s=(0,l.Z)(r.Z.translator.trans("core.forum.sign_up.username_placeholder")),a=(0,l.Z)(r.Z.translator.trans("core.forum.sign_up.email_placeholder")),e=(0,l.Z)(r.Z.translator.trans("core.forum.sign_up.password_placeholder"));return t.add("username",m("div",{className:"Form-group"},m("input",{className:"FormControl",name:"username",type:"text",placeholder:s,"aria-label":s,bidi:this.username,disabled:this.loading||this.isProvided("username")})),30),t.add("email",m("div",{className:"Form-group"},m("input",{className:"FormControl",name:"email",type:"email",placeholder:a,"aria-label":a,bidi:this.email,disabled:this.loading||this.isProvided("email")})),20),this.attrs.token||t.add("password",m("div",{className:"Form-group"},m("input",{className:"FormControl",name:"password",type:"password",autocomplete:"new-password",placeholder:e,"aria-label":e,bidi:this.password,disabled:this.loading})),10),t.add("submit",m("div",{className:"Form-group"},m(o.Z,{className:"Button Button--primary Button--block",type:"submit",loading:this.loading},r.Z.translator.trans("core.forum.sign_up.submit_button"))),-10),t}footer(){return[m("p",{className:"SignUpModal-logIn"},r.Z.translator.trans("core.forum.sign_up.log_in_text",{a:m(o.Z,{className:"Button Button--text Button--link",onclick:this.logIn.bind(this)})}))]}logIn(){const t={identification:this.email()||this.username()};r.Z.modal.show((()=>a.e(460).then(a.bind(a,7561))),t)}onready(){this.attrs.username&&!this.attrs.email?this.$("[name=email]").select():this.$("[name=username]").select()}onsubmit(t){t.preventDefault(),this.loading=!0;const s=this.submitData();r.Z.request({url:r.Z.forum.attribute("baseUrl")+"/register",method:"POST",body:s,errorHandler:this.onerror.bind(this)}).then((()=>window.location.reload()),this.loaded.bind(this))}submitData(){const t=this.attrs.token?{token:this.attrs.token}:{password:this.password()};return{username:this.username(),email:this.email(),...t}}}flarum.reg.add("core","forum/components/SignUpModal",h)}}]);
//# sourceMappingURL=SignUpModal.js.map