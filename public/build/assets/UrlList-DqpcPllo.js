import{d,k as h,z as k,o,e as n,b as m,u as L,a as e,F as g,h as U,t as l,Z as y,H as P,I as S}from"./app-4SYP0aWS.js";/* empty css                                                                */import{_ as x}from"./_plugin-vue_export-helper-DlAUqK2U.js";const B=r=>(P("data-v-a455ce23"),r=r(),S(),r),I={class:"url-list"},R={key:0,class:"styled-table"},V=B(()=>e("thead",null,[e("tr",null,[e("th",null,"Original URL"),e("th",null,"Shortened URL"),e("th",null,"Clicks")])],-1)),w=["href"],C={key:1},N={class:"pagination"},E=["disabled"],F={class:"font-pag"},M=["disabled"],j={__name:"UrlList",props:{canLogin:Boolean,canRegister:Boolean,laravelVersion:String,phpVersion:String},setup(r){const c=d([]),t=d(1),i=d(10),_=h(()=>{const a=(t.value-1)*i.value;return c.value.slice(a,a+i.value)});async function v(){try{const p=await(await fetch("/api/urls")).json();c.value=p}catch(a){console.error("Error getting URLs:",a)}}function f(){t.value<u.value&&t.value++}function b(){t.value>1&&t.value--}const u=h(()=>Math.ceil(c.value.length/i.value));return k(()=>{v()}),(a,p)=>(o(),n(g,null,[m(L(y),{title:"UrlList"}),e("div",I,[_.value.length?(o(),n("table",R,[V,e("tbody",null,[(o(!0),n(g,null,U(_.value,s=>(o(),n("tr",{key:s.id},[e("td",null,l(s.original_url),1),e("td",null,[e("a",{href:s.shortened_url,target:"_blank",class:"url-link"},l(s.shortened_url),9,w)]),e("td",null,l(s.clicks),1)]))),128))])])):(o(),n("p",C,"There are no shortened URLs.")),e("div",N,[e("button",{onClick:b,disabled:t.value===1,class:"button-pag font-pag"},"Previous",8,E),e("span",F,"Page "+l(t.value)+" of "+l(u.value),1),e("button",{onClick:f,disabled:t.value===u.value,class:"button-pag font-pag"},"Next",8,M)])])],64))}},O=x(j,[["__scopeId","data-v-a455ce23"]]);export{O as default};
