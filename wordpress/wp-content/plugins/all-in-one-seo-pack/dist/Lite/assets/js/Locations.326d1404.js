import{C as u}from"./Blur.8490ecd2.js";import{C as _}from"./SettingsRow.eb71f07b.js";import{S as m}from"./Plus.a9b9ba75.js";import{n}from"./vueComponentNormalizer.87056a83.js";import{C as p}from"./Index.c7d3532f.js";import{C as d}from"./Card.77d72357.js";import{C as f}from"./ProBadge.7c0de2f7.js";import{C as v}from"./Index.17df93e8.js";import{A as g}from"./ToolsSettings.cc636f56.js";import"./index.01898232.js";import"./Row.13b6f3f1.js";import"./index.460e1b4b.js";import"./client.93f15631.js";import"./Tooltip.674a9fb4.js";import"./QuestionMark.83ebd18e.js";import"./Slide.f5d21606.js";var y=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"aioseo-locations-blur"},[s("core-blur",[s("core-settings-row",{staticClass:"info-name-row",attrs:{name:e.strings.name,align:""},scopedSlots:e._u([{key:"content",fn:function(){return[s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("base-input",{attrs:{type:"text",size:"medium"}}),s("span",{staticClass:"field-description"},[e._v(e._s(e.strings.nameDesc))])],1)]},proxy:!0}])}),s("core-settings-row",{staticClass:"info-business-image",attrs:{name:e.strings.image},scopedSlots:e._u([{key:"content",fn:function(){return[s("div",{staticClass:"image-upload"},[s("base-input",{attrs:{size:"medium",placeholder:e.strings.pasteYourImageUrl}}),s("base-button",{staticClass:"insert-image",attrs:{size:"medium",type:"black"}},[s("svg-circle-plus"),e._v(" "+e._s(e.strings.uploadOrSelectImage)+" ")],1),s("base-button",{staticClass:"remove-image",attrs:{size:"medium",type:"gray"}},[e._v(" "+e._s(e.strings.remove)+" ")])],1),s("div",{staticClass:"aioseo-description"},[e._v(" "+e._s(e.strings.minimumSize)+" ")])]},proxy:!0}])}),s("core-settings-row",{staticClass:"info-business-type",attrs:{name:e.strings.businessType,align:""},scopedSlots:e._u([{key:"content",fn:function(){return[s("base-select",{attrs:{size:"large",options:e.businessTypes,value:"default"}})]},proxy:!0}])}),s("core-settings-row",{staticClass:"info-urls-row",attrs:{name:e.strings.urls,align:""},scopedSlots:e._u([{key:"content",fn:function(){return[s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("span",{staticClass:"field-description"},[e._v(e._s(e.strings.websiteDesc))]),s("base-input",{attrs:{type:"text",size:"medium"}})],1),s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("span",{staticClass:"field-description mt-8"},[e._v(e._s(e.strings.aboutDesc))]),s("base-input",{attrs:{type:"text",size:"medium"}})],1),s("div",{staticClass:"aioseo-col col-xs-12 text-xs-left"},[s("span",{staticClass:"field-description mt-8"},[e._v(e._s(e.strings.contactDesc))]),s("base-input",{attrs:{type:"text",size:"medium"}})],1)])]},proxy:!0}])})],1)],1)},x=[];const b={components:{CoreBlur:u,CoreSettingsRow:_,SvgCirclePlus:m},data(){return{strings:{name:"name",nameDesc:"Your name or company name.",businessType:"Type",urls:"URLs",image:"Image",uploadOrSelectImage:"Upload or Select Image",pasteYourImageUrl:"Paste your image URL or select a new image",minimumSize:"Minimum size: 112px x 112px, The image must be in JPG, PNG, GIF, SVG, or WEBP format.",remove:"Remove",websiteDesc:"Website URL:",aboutDesc:"About Page URL:",contactDesc:"Contact Page URL:"},businessTypes:[{label:"default",value:"LocalBusiness"},{label:"Animal Shelter",value:"Animal Shelter"}]}}},o={};var h=n(b,y,x,!1,C,null,null,null);function C(e){for(let t in o)this[t]=o[t]}var $=function(){return h.exports}(),S=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"aioseo-locations-lite"},[s("core-card",{staticClass:"aioseo-locations-card",attrs:{slug:"localBusinessInfo",noSlide:!0},scopedSlots:e._u([{key:"header",fn:function(){return[e._v(" "+e._s(e.strings.businessInfo)+" "),s("core-pro-badge")]},proxy:!0}])},[s("blur"),s("cta",{attrs:{"cta-link":e.$links.getPricingUrl("local-seo","local-seo-upsell","locations"),"button-text":e.strings.ctaButtonText,"learn-more-link":e.$links.getUpsellUrl("local-seo",null,"home"),"feature-list":e.features},scopedSlots:e._u([{key:"header-text",fn:function(){return[e._v(" "+e._s(e.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[e.$isPro&&e.$addons.requiresUpgrade("aioseo-local-business")&&e.$addons.currentPlans("aioseo-local-business")?s("core-alert",{attrs:{type:"red"}},[e._v(" "+e._s(e.strings.thisFeatureRequires)+" "),s("strong",[e._v(e._s(e.$addons.currentPlans("aioseo-local-business")))])]):e._e(),e._v(" "+e._s(e.strings.locationInfo1)+" ")]},proxy:!0}])})],1)],1)},L=[];const w={components:{Blur:$,CoreAlert:p,CoreCard:d,CoreProBadge:f,Cta:v},data(){return{features:["Local Business Schema","Multiple Locations","Business Info and Location blocks, widgets and shortcodes","Detailed Address, Contact and Payment Info"],strings:{locationInfo1:"Local Business schema markup enables you to tell Google about your business, including your business name, address and phone number, opening hours and price range. This information may be displayed as a Knowledge Graph card or business carousel.",businessInfo:"Business Info",ctaButtonText:"Upgrade to Pro and Unlock Local SEO",ctaHeader:this.$t.sprintf("Local SEO is only available for licensed %1$s %2$s users.","AIOSEO","Pro"),thisFeatureRequires:"This feature requires one of the following plans:"}}}},a={};var U=n(w,S,L,!1,I,null,null,null);function I(e){for(let t in a)this[t]=a[t]}var r=function(){return U.exports}(),P=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div")},k=[];const R={},i={};var A=n(R,P,k,!1,z,null,null,null);function z(e){for(let t in i)this[t]=i[t]}var B=function(){return A.exports}(),T=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div")},D=[];const E={},l={};var F=n(E,T,D,!1,M,null,null,null);function M(e){for(let t in l)this[t]=l[t]}var G=function(){return F.exports}(),O=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"aioseo-locations"},[e.shouldShowMain?s("locations"):e._e(),e.shouldShowActivate?s("activate"):e._e(),e.shouldShowUpdate?s("update"):e._e(),e.shouldShowLite?s("lite"):e._e()],1)},j=[];const q={mixins:[g],components:{Locations:r,Activate:B,Lite:r,Update:G},data(){return{addonSlug:"aioseo-local-business"}}},c={};var Y=n(q,O,j,!1,H,null,null,null);function H(e){for(let t in c)this[t]=c[t]}var le=function(){return Y.exports}();export{le as default};
