import{T as m,r as d,o as c,d as u,b as a,u as e,w as r,F as p,Z as f,a as o,n as _,f as w,h as b}from"./app-33d20ed6.js";import{A as g}from"./AuthenticationCard-f10feffb.js";import{_ as h}from"./AuthenticationCardLogo-430aad53.js";import{_ as x,a as v}from"./TextInput-6f99100f.js";import{_ as y}from"./InputLabel-e723f65a.js";import{_ as V}from"./PrimaryButton-6c75de52.js";import"./_plugin-vue_export-helper-c27b6911.js";const C=o("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),$={class:"flex justify-end mt-4"},j={__name:"ConfirmPassword",setup(k){const s=m({password:""}),t=d(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(A,i)=>(c(),u(p,null,[a(e(f),{title:"Secure Area"}),a(g,null,{logo:r(()=>[a(h)]),default:r(()=>[C,o("form",{onSubmit:b(n,["prevent"])},[o("div",null,[a(y,{for:"password",value:"Password"}),a(x,{id:"password",ref_key:"passwordInput",ref:t,modelValue:e(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>e(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),a(v,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),o("div",$,[a(V,{class:_(["ms-4",{"opacity-25":e(s).processing}]),disabled:e(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{j as default};
