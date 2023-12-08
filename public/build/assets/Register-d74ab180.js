import{T as g,o as c,d as f,b as e,u as o,w as l,F as _,Z as w,a as r,f as d,e as h,i as v,n as y,h as V}from"./app-33d20ed6.js";import{A as k}from"./AuthenticationCard-f10feffb.js";import{_ as x}from"./AuthenticationCardLogo-430aad53.js";import{_ as b}from"./Checkbox-5d56b3b7.js";import{_ as u,a as i}from"./TextInput-6f99100f.js";import{_ as m}from"./InputLabel-e723f65a.js";import{_ as $}from"./PrimaryButton-6c75de52.js";import"./_plugin-vue_export-helper-c27b6911.js";const P={class:"mt-4"},q={class:"mt-4"},C={class:"mt-4"},N={key:0,class:"mt-4"},U={class:"flex items-center"},A={class:"ms-2"},F=["href"],T=["href"],B={class:"flex items-center justify-end mt-4"},G={__name:"Register",setup(R){const s=g({name:"",email:"",password:"",password_confirmation:"",terms:!1}),p=()=>{s.post(route("register"),{onFinish:()=>s.reset("password","password_confirmation")})};return(n,a)=>(c(),f(_,null,[e(o(w),{title:"Register"}),e(k,null,{logo:l(()=>[e(x)]),default:l(()=>[r("form",{onSubmit:V(p,["prevent"])},[r("div",null,[e(m,{for:"name",value:"Name"}),e(u,{id:"name",modelValue:o(s).name,"onUpdate:modelValue":a[0]||(a[0]=t=>o(s).name=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.name},null,8,["message"])]),r("div",P,[e(m,{for:"email",value:"Email"}),e(u,{id:"email",modelValue:o(s).email,"onUpdate:modelValue":a[1]||(a[1]=t=>o(s).email=t),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.email},null,8,["message"])]),r("div",q,[e(m,{for:"password",value:"Password"}),e(u,{id:"password",modelValue:o(s).password,"onUpdate:modelValue":a[2]||(a[2]=t=>o(s).password=t),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),r("div",C,[e(m,{for:"password_confirmation",value:"Confirm Password"}),e(u,{id:"password_confirmation",modelValue:o(s).password_confirmation,"onUpdate:modelValue":a[3]||(a[3]=t=>o(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:o(s).errors.password_confirmation},null,8,["message"])]),n.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature?(c(),f("div",N,[e(m,{for:"terms"},{default:l(()=>[r("div",U,[e(b,{id:"terms",checked:o(s).terms,"onUpdate:checked":a[4]||(a[4]=t=>o(s).terms=t),name:"terms",required:""},null,8,["checked"]),r("div",A,[d(" I agree to the "),r("a",{target:"_blank",href:n.route("terms.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Terms of Service",8,F),d(" and "),r("a",{target:"_blank",href:n.route("policy.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Privacy Policy",8,T)])]),e(i,{class:"mt-2",message:o(s).errors.terms},null,8,["message"])]),_:1})])):h("",!0),r("div",B,[e(o(v),{href:n.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:l(()=>[d(" Already registered? ")]),_:1},8,["href"]),e($,{class:y(["ms-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:l(()=>[d(" Register ")]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{G as default};
