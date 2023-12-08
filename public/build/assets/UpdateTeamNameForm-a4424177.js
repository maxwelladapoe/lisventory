import{T as f,o as _,c as p,H as v,w as t,b as m,f as n,u as o,n as g,a as s,t as c}from"./app-33d20ed6.js";import{_ as h}from"./ActionMessage-d99c91b0.js";import{_ as T}from"./FormSection-c6b1eb26.js";import{_ as b,a as w}from"./TextInput-6f99100f.js";import{_ as l}from"./InputLabel-e723f65a.js";import{_ as x}from"./PrimaryButton-6c75de52.js";import"./SectionTitle-e187365c.js";import"./_plugin-vue_export-helper-c27b6911.js";const N={class:"col-span-6"},y={class:"flex items-center mt-2"},S=["src","alt"],V={class:"ms-4 leading-tight"},$={class:"text-gray-900"},k={class:"text-gray-700 text-sm"},B={class:"col-span-6 sm:col-span-4"},A={__name:"UpdateTeamNameForm",props:{team:Object,permissions:Object},setup(e){const r=e,a=f({name:r.team.name}),d=()=>{a.put(route("teams.update",r.team),{errorBag:"updateTeamName",preserveScroll:!0})};return(U,i)=>(_(),p(T,{onSubmitted:d},v({title:t(()=>[n(" Team Name ")]),description:t(()=>[n(" The team's name and owner information. ")]),form:t(()=>[s("div",N,[m(l,{value:"Team Owner"}),s("div",y,[s("img",{class:"w-12 h-12 rounded-full object-cover",src:e.team.owner.profile_photo_url,alt:e.team.owner.name},null,8,S),s("div",V,[s("div",$,c(e.team.owner.name),1),s("div",k,c(e.team.owner.email),1)])])]),s("div",B,[m(l,{for:"name",value:"Team Name"}),m(b,{id:"name",modelValue:o(a).name,"onUpdate:modelValue":i[0]||(i[0]=u=>o(a).name=u),type:"text",class:"mt-1 block w-full",disabled:!e.permissions.canUpdateTeam},null,8,["modelValue","disabled"]),m(w,{message:o(a).errors.name,class:"mt-2"},null,8,["message"])])]),_:2},[e.permissions.canUpdateTeam?{name:"actions",fn:t(()=>[m(h,{on:o(a).recentlySuccessful,class:"me-3"},{default:t(()=>[n(" Saved. ")]),_:1},8,["on"]),m(x,{class:g({"opacity-25":o(a).processing}),disabled:o(a).processing},{default:t(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),key:"0"}:void 0]),1024))}};export{A as default};
