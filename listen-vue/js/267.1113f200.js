"use strict";(self["webpackChunklisten_vue_dev"]=self["webpackChunklisten_vue_dev"]||[]).push([[267],{3267:function(t,e,s){s.r(e),s.d(e,{default:function(){return z}});var l=s(3396),a=s(7139),n=s(4870),i=s(2082);const c=()=>({getArticleDetail:async t=>await(0,i.Z)({url:"/post",params:{cid:t}})});var r=s(4418);const o=()=>({getLinks(){return(0,i.Z)({url:"/links",method:"get"})}});var u=s(2578);const d=o(),v=(0,u.Q_)("useLinksStore",{state:()=>({links:{}}),actions:{async fetchGetLinks(){const t=await d.getLinks();this.links=t.data}}}),w={class:"links p-8"},f={class:"relative flex h-full w-full flex-col bg-clip-border shadow-3xl shadow-shadow-500"},h={class:"mb-8 w-full"},x={class:"text-xl font-bold text-navy-700"},k=["innerHTML"],_=["href"],m={class:"flex items-center"},p={class:""},g=["src","alt"],y={class:"ml-4"},b={class:"text-base font-medium text-navy-700"},L={class:"mt-2 text-sm text-gray-600"};var D={__name:"index",setup(t){const e=(0,r.h)(),{link:s}=(0,u.Jk)(e),i=c(),o=(0,n.iH)("");(async function(){try{await i.getArticleDetail(s.value[0].cid).then((t=>{o.value=t.data}))}catch(t){console.log(t)}})();const d=v();d.fetchGetLinks();const{links:D}=(0,u.Jk)(d);return(t,e)=>((0,l.wg)(),(0,l.iD)("div",w,[(0,l._)("div",f,[(0,l._)("div",h,[(0,l._)("h1",x,(0,a.zw)(o.value.title),1),(0,l._)("p",{class:"mt-2 text-base text-gray-600 prose",innerHTML:o.value.text},null,8,k)]),((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)((0,n.SU)(D),(t=>((0,l.wg)(),(0,l.iD)("a",{href:t.url,class:"flex w-full items-center justify-between p-3 shadow-3xl shadow-shadow-500",key:t.lid},[(0,l._)("div",m,[(0,l._)("div",p,[(0,l._)("img",{class:"h-[83px] w-[83px] rounded-lg",src:t.image,alt:t.name},null,8,g)]),(0,l._)("div",y,[(0,l._)("p",b,(0,a.zw)(t.name),1),(0,l._)("p",L,(0,a.zw)(t.description),1)])])],8,_)))),128))])]))}};const H=D;var z=H}}]);
//# sourceMappingURL=267.1113f200.js.map