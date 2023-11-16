"use strict";(self["webpackChunklisten_vue_dev"]=self["webpackChunklisten_vue_dev"]||[]).push([[43],{192:function(e,l,i){i.r(l),i.d(l,{default:function(){return q}});var n=i(1404),t=i(3396),o=i(4870),r=i(610),s=i(5323),a=i(7936),c=i(253),d=i(2220);function u(e){const l=(0,t.FN)();l&&(0,d.l7)(l.proxy,e)}const v=Symbol(),f=()=>(0,t.f3)(v,null);var g=i(6048);const[p,m]=(0,r["do"])("loading"),b=Array(12).fill(null).map(((e,l)=>(0,t.Wm)("i",{class:m("line",String(l+1))},null))),h=(0,t.Wm)("svg",{class:m("circular"),viewBox:"25 25 50 50"},[(0,t.Wm)("circle",{cx:"50",cy:"50",r:"20",fill:"none"},null)]),x={size:s.Or,type:(0,s.SQ)("circular"),color:String,vertical:Boolean,textSize:s.Or,textColor:String};var w=(0,t.aZ)({name:p,props:x,setup(e,{slots:l}){const i=(0,t.Fl)((()=>(0,d.l7)({color:e.color},(0,g.Xn)(e.size)))),n=()=>{const n="spinner"===e.type?b:h;return(0,t.Wm)("span",{class:m("spinner",e.type),style:i.value},[l.icon?l.icon():n])},o=()=>{var i;if(l.default)return(0,t.Wm)("span",{class:m("text"),style:{fontSize:(0,g.Nn)(e.textSize),color:null!=(i=e.textColor)?i:e.color}},[l.default()])};return()=>{const{type:l,vertical:i}=e;return(0,t.Wm)("div",{class:m([l,{vertical:i}]),"aria-live":"polite","aria-busy":!0},[n(),o()])}}});const y=(0,n.n)(w);const[_,k,S]=(0,r["do"])("list"),W={error:Boolean,offset:(0,s.SI)(300),loading:Boolean,disabled:Boolean,finished:Boolean,scroller:Object,errorText:String,direction:(0,s.SQ)("down"),loadingText:String,finishedText:String,immediateCheck:s.J5};var H=(0,t.aZ)({name:_,props:W,emits:["load","update:error","update:loading"],setup(e,{emit:l,slots:i}){const n=(0,o.iH)(e.loading),r=(0,o.iH)(),s=(0,o.iH)(),d=f(),v=(0,c.eo)(r),g=(0,t.Fl)((()=>e.scroller||v.value)),p=()=>{(0,t.Y3)((()=>{if(n.value||e.finished||e.disabled||e.error||!1===(null==d?void 0:d.value))return;const{direction:i}=e,t=+e.offset,o=(0,c.EL)(g);if(!o.height||(0,a.xj)(r))return;let u=!1;const v=(0,c.EL)(s);u="up"===i?o.top-v.top<=t:v.bottom-o.bottom<=t,u&&(n.value=!0,l("update:loading",!0),l("load"))}))},m=()=>{if(e.finished){const l=i.finished?i.finished():e.finishedText;if(l)return(0,t.Wm)("div",{class:k("finished-text")},[l])}},b=()=>{l("update:error",!1),p()},h=()=>{if(e.error){const l=i.error?i.error():e.errorText;if(l)return(0,t.Wm)("div",{role:"button",class:k("error-text"),tabindex:0,onClick:b},[l])}},x=()=>{if(n.value&&!e.finished&&!e.disabled)return(0,t.Wm)("div",{class:k("loading")},[i.loading?i.loading():(0,t.Wm)(y,{class:k("loading-icon")},{default:()=>[e.loadingText||S("loading")]})])};return(0,t.YP)((()=>[e.loading,e.finished,e.error]),p),d&&(0,t.YP)(d,(e=>{e&&p()})),(0,t.ic)((()=>{n.value=e.loading})),(0,t.bv)((()=>{e.immediateCheck&&p()})),u({check:p}),(0,c.OR)("scroll",p,{target:g,passive:!0}),()=>{var l;const o=null==(l=i.default)?void 0:l.call(i),a=(0,t.Wm)("div",{ref:s,class:k("placeholder")},null);return(0,t.Wm)("div",{ref:r,role:"feed",class:k(),"aria-busy":n.value},["down"===e.direction?o:a,x(),m(),h(),"up"===e.direction?o:a])}}});const T=(0,n.n)(H);i(1958);var C=i(7139);const L=(0,t._)("button",{class:"link"},"展开",-1),D=[L];var z={__name:"TextOverflow",setup(e){const l=(0,o.iH)(!1),i=()=>{l.value=!1},n=()=>{l.value=!0};return(e,o)=>((0,t.wg)(),(0,t.iD)("div",{class:(0,C.C_)({"overflow-hidden mb-14":!l.value})},[(0,t.WI)(e.$slots,"default"),l.value?((0,t.wg)(),(0,t.iD)("button",{key:0,class:"block link my-4",onClick:i}," 收起 ")):((0,t.wg)(),(0,t.iD)("span",{key:1,class:"show-more-btn",onClick:n},D))],2))}};const B=z;var O=B,M=i(2578),Y=i(3348);const A={class:"home bg-white p-8 py-6 pb-16"},F={class:"flex"},R={class:"w-12 mr-4"},j=["src","alt"],E={class:"flex-1 pb-4 border-b-[1px] border-zinc-150"},I={class:"text-[#5b6b92] mb-1"},J={key:0,class:"relative"},N=["innerHTML"],P={key:1,class:"relative"},Q=["innerHTML"];var U={__name:"index",setup(e){const l=(0,Y.o)(),{homeArticleList:i,pages:n}=(0,M.Jk)(l),r=(0,o.iH)(0),s=(0,o.iH)(!1),a=(0,o.iH)(!1),c=async()=>{a.value||await l.fetchGetArticleList(++r.value),s.value=!1,r.value===n.value&&(a.value=!0)};return(0,t.bv)((()=>{console.log(document.querySelector(".contRef"))})),(e,l)=>{const n=O,r=T;return(0,t.wg)(),(0,t.iD)("div",A,[(0,t._)("ul",null,[(0,t.Wm)(r,{loading:s.value,"onUpdate:loading":l[0]||(l[0]=e=>s.value=e),finished:a.value,"finished-text":"没有更多了",offset:"0",onLoad:c},{default:(0,t.w5)((()=>[((0,t.wg)(!0),(0,t.iD)(t.HY,null,(0,t.Ko)((0,o.SU)(i),(e=>((0,t.wg)(),(0,t.iD)("li",{key:e.cid,class:"mb-8"},[(0,t._)("div",F,[(0,t._)("div",R,[(0,t._)("img",{class:"w-12 rounded",src:e.categories[0].description,alt:e.categories[0].name},null,8,j)]),(0,t._)("div",E,[(0,t._)("div",I,(0,C.zw)(e.categories[0].name),1),"1"===e.fields.hiddenLine.value?((0,t.wg)(),(0,t.iD)("div",J,[(0,t.Wm)(n,{class:"content",ref_for:!0,ref:"contRef"},{default:(0,t.w5)((()=>[(0,t._)("div",{innerHTML:e.digest,class:"prose lg:prose-sm"},null,8,N)])),_:2},1536)])):((0,t.wg)(),(0,t.iD)("div",P,[(0,t._)("div",{innerHTML:e.digest,class:"prose lg:prose-sm"},null,8,Q)]))])])])))),128))])),_:1},8,["loading","finished"])])])}}};const Z=U;var q=Z}}]);
//# sourceMappingURL=43.ea46896b.js.map