/*! third party licenses: js/vendor.LICENSE.txt */
import{s as k,o as i,c as l,a as s,t as o,b as u,m as r,c5 as f,c6 as C,e as p,H as _,f as m,n as V,G as b,p as v,g as x,_ as I}from"./store-DE2z1cMA.mjs";const S={name:"CheckIcon",emits:["click"],props:{title:{type:String},fillColor:{type:String,default:"currentColor"},size:{type:Number,default:24}}},z=["aria-hidden","aria-label"],H=["fill","width","height"],L={d:"M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"},M={key:0};function $(e,n,t,d,h,a){return i(),l("span",r(e.$attrs,{"aria-hidden":t.title?null:!0,"aria-label":t.title,class:"material-design-icon check-icon",role:"img",onClick:n[0]||(n[0]=c=>e.$emit("click",c))}),[(i(),l("svg",{fill:t.fillColor,class:"material-design-icon__svg",width:t.size,height:t.size,viewBox:"0 0 24 24"},[s("path",L,[t.title?(i(),l("title",M,o(t.title),1)):u("",!0)])],8,H))],16,z)}const w=k(S,[["render",$]]),B={name:"NcActionButton",components:{CheckIcon:w,ChevronRightIcon:f},mixins:[C],inject:{isInSemanticMenu:{from:"NcActions:isSemanticMenu",default:!1}},props:{ariaHidden:{type:Boolean,default:null},disabled:{type:Boolean,default:!1},isMenu:{type:Boolean,default:!1},type:{type:String,default:"button",validator:e=>["button","checkbox","radio","reset","submit"].includes(e)},modelValue:{type:[Boolean,String],default:null},value:{type:String,default:null}},emits:["update:modelValue"],computed:{isFocusable(){return!this.disabled},isChecked(){return this.type==="radio"&&typeof this.modelValue!="boolean"?this.modelValue===this.value:this.modelValue},nativeType(){return this.type==="submit"||this.type==="reset"?this.type:"button"},buttonAttributes(){const e={};return this.isInSemanticMenu?(e.role="menuitem",this.type==="radio"?(e.role="menuitemradio",e["aria-checked"]=this.isChecked?"true":"false"):(this.type==="checkbox"||this.nativeType==="button"&&this.modelValue!==null)&&(e.role="menuitemcheckbox",e["aria-checked"]=this.modelValue===null?"mixed":this.modelValue?"true":"false")):this.modelValue!==null&&this.nativeType==="button"&&(e["aria-pressed"]=this.modelValue?"true":"false"),e}},methods:{handleClick(e){this.onClick(e),(this.modelValue!==null||this.type!=="button")&&(this.type==="radio"?typeof this.modelValue!="boolean"?this.isChecked||this.$emit("update:modelValue",this.value):this.$emit("update:modelValue",!this.isChecked):this.$emit("update:modelValue",!this.isChecked))}}},T=e=>(v("data-v-68a40e32"),e=e(),x(),e),A=["role"],N=["aria-label","disabled","title","type"],F={key:0,class:"action-button__longtext-wrapper"},G={class:"action-button__name"},P=T(()=>s("br",null,null,-1)),R=["textContent"],U=["textContent"],Z={key:2,class:"action-button__text"},j={key:5,class:"action-button__pressed-icon material-design-icon"};function q(e,n,t,d,h,a){const c=p("ChevronRightIcon"),y=p("CheckIcon");return i(),l("li",{class:m(["action",{"action--disabled":t.disabled}]),role:a.isInSemanticMenu&&"presentation"},[s("button",r({"aria-label":e.ariaLabel,class:["action-button button-vue",{"action-button--active":a.isChecked,focusable:a.isFocusable}],disabled:t.disabled,title:e.title,type:a.nativeType},a.buttonAttributes,{onClick:n[0]||(n[0]=(...g)=>a.handleClick&&a.handleClick(...g))}),[_(e.$slots,"icon",{},()=>[s("span",{class:m([[e.isIconUrl?"action-button__icon--url":e.icon],"action-button__icon"]),style:V({backgroundImage:e.isIconUrl?"url(".concat(e.icon,")"):null}),"aria-hidden":"true"},null,6)],!0),e.name?(i(),l("span",F,[s("strong",G,o(e.name),1),P,s("span",{class:"action-button__longtext",textContent:o(e.text)},null,8,R)])):e.isLongText?(i(),l("span",{key:1,class:"action-button__longtext",textContent:o(e.text)},null,8,U)):(i(),l("span",Z,o(e.text),1)),t.isMenu?(i(),b(c,{key:3,size:20,class:"action-button__menu-icon"})):a.isChecked===!0?(i(),b(y,{key:4,size:20,class:"action-button__pressed-icon"})):a.isChecked===!1?(i(),l("span",j)):u("",!0),u("",!0)],16,N)],10,A)}const X=k(B,[["render",q],["__scopeId","data-v-68a40e32"]]),D={name:"PlusIcon",emits:["click"],props:{title:{type:String},fillColor:{type:String,default:"currentColor"},size:{type:Number,default:24}}},E=["aria-hidden","aria-label"],J=["fill","width","height"],K={d:"M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"},O={key:0};function Q(e,n,t,d,h,a){return i(),l("span",r(e.$attrs,{"aria-hidden":t.title?null:!0,"aria-label":t.title,class:"material-design-icon plus-icon",role:"img",onClick:n[0]||(n[0]=c=>e.$emit("click",c))}),[(i(),l("svg",{fill:t.fillColor,class:"material-design-icon__svg",width:t.size,height:t.size,viewBox:"0 0 24 24"},[s("path",K,[t.title?(i(),l("title",O,o(t.title),1)):u("",!0)])],8,J))],16,E)}const Y=I(D,[["render",Q]]);export{X as G,Y as P,w as b};