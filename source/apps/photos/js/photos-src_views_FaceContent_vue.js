/*! For license information please see photos-src_views_FaceContent_vue.js.LICENSE.txt */
"use strict";(self.webpackChunkphotos=self.webpackChunkphotos||[]).push([["src_views_FaceContent_vue"],{66951:(t,e,n)=>{n.d(e,{Z:()=>A});var o=n(5656),a=n(65358),i=n(59537),s=n(45086),c=n(3301),r=n(81067),l=n(2161),d=n(80351),h=n.n(d),f=n(30319);var p=n(32114);const A={name:"FetchFilesMixin",mixins:[n(69363).Z],data:()=>({errorFetchingFiles:null,loadingFiles:!1,doneFetchingFiles:!1,fetchSemaphore:new p.Z(1),fetchedFileIds:[]}),watch:{"$route.path"(){this.resetFetchFilesState()}},methods:{async fetchFiles(){let t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[],n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];if(this.doneFetchingFiles&&!n||this.loadingFiles)return[];const d=await this.fetchSemaphore.acquire();try{this.errorFetchingFiles=null,this.loadingFiles=!0;const n=200,d=await async function(){let t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};t={firstResult:0,nbResults:200,mimesType:c.Oj,onThisDay:!1,onlyFavorites:!1,...t};const e=t.mimesType.reduce(((t,e)=>"".concat(t,"\n\t\t<d:eq>\n\t\t\t<d:prop>\n\t\t\t\t<d:getcontenttype/>\n\t\t\t</d:prop>\n\t\t\t<d:literal>").concat(e,"</d:literal>\n\t\t</d:eq>\n\t")),""),n=t.onlyFavorites?"<d:eq>\n\t\t\t\t<d:prop>\n\t\t\t\t\t<oc:favorite/>\n\t\t\t\t</d:prop>\n\t\t\t\t<d:literal>1</d:literal>\n\t\t\t</d:eq>":"",i=t.onThisDay?"<d:or>".concat(Array(20).fill(1).map(((t,e)=>{const n=h()(Date.now()).startOf("day").subtract(3,"d").subtract(e+1,"y"),o=h()(Date.now()).endOf("day").add(3,"d").subtract(e+1,"y");return"<d:and>\n\t\t\t\t<d:gt>\n\t\t\t\t\t<d:prop>\n\t\t\t\t\t\t<d:getlastmodified />\n\t\t\t\t\t</d:prop>\n\t\t\t\t\t<d:literal>".concat(n.format(h().defaultFormatUtc),"</d:literal>\n\t\t\t\t</d:gt>\n\t\t\t\t<d:lt>\n\t\t\t\t\t<d:prop>\n\t\t\t\t\t\t<d:getlastmodified />\n\t\t\t\t\t</d:prop>\n\t\t\t\t\t<d:literal>").concat(o.format(h().defaultFormatUtc),"</d:literal>\n\t\t\t\t</d:lt>\n\t\t\t</d:and>")})).join("\n"),"</d:or>"):"",d=f.Z.state.userConfig.photosSourceFolders.map((t=>"\n\t\t\t<d:scope>\n\t\t\t\t<d:href>".concat((0,a.RQ)(o._o,t),"</d:href>\n\t\t\t\t<d:depth>infinity</d:depth>\n\t\t\t</d:scope>"))).join("\n");return t=Object.assign({method:"SEARCH",headers:{"content-Type":"text/xml"},data:'<?xml version="1.0" encoding="UTF-8"?>\n\t\t\t<d:searchrequest xmlns:d="DAV:"\n\t\t\t\txmlns:oc="http://owncloud.org/ns"\n\t\t\t\txmlns:nc="http://nextcloud.org/ns"\n\t\t\t\txmlns:ns="https://github.com/icewind1991/SearchDAV/ns"\n\t\t\t\txmlns:ocs="http://open-collaboration-services.org/ns">\n\t\t\t\t<d:basicsearch>\n\t\t\t\t\t<d:select>\n\t\t\t\t\t\t<d:prop>\n\t\t\t\t\t\t\t'.concat(l.N,"\n\t\t\t\t\t\t</d:prop>\n\t\t\t\t\t</d:select>\n\t\t\t\t\t<d:from>\n\t\t\t\t\t\t").concat(d,"\n\t\t\t\t\t</d:from>\n\t\t\t\t\t<d:where>\n\t\t\t\t\t\t<d:and>\n\t\t\t\t\t\t\t<d:or>\n\t\t\t\t\t\t\t\t").concat(e,"\n\t\t\t\t\t\t\t</d:or>\n\t\t\t\t\t\t\t").concat(n,"\n\t\t\t\t\t\t\t").concat(i,"\n\t\t\t\t\t\t</d:and>\n\t\t\t\t\t</d:where>\n\t\t\t\t\t<d:orderby>\n\t\t\t\t\t\t<d:order>\n\t\t\t\t\t\t\t<d:prop><nc:metadata-photos-original_date_time/></d:prop>\n\t\t\t\t\t\t\t<d:descending/>\n\t\t\t\t\t\t</d:order>\n\t\t\t\t\t\t<d:order>\n\t\t\t\t\t\t\t<d:prop><d:getlastmodified/></d:prop>\n\t\t\t\t\t\t\t<d:descending/>\n\t\t\t\t\t\t</d:order>\n\t\t\t\t\t</d:orderby>\n\t\t\t\t\t<d:limit>\n\t\t\t\t\t\t<d:nresults>").concat(t.nbResults,"</d:nresults>\n\t\t\t\t\t\t<ns:firstresult>").concat(t.firstResult,"</ns:firstresult>\n\t\t\t\t\t</d:limit>\n\t\t\t\t</d:basicsearch>\n\t\t\t</d:searchrequest>"),deep:!0,details:!0},t),(await r.ZP.getDirectoryContents("",t)).data.map((t=>(0,s.AX)(t)))}({firstResult:this.fetchedFileIds.length,nbResults:n,...t,signal:this.abortController.signal});d.length!==n&&(this.doneFetchingFiles=!0);const p=d.map((t=>t.fileid)).filter((t=>!this.fetchedFileIds.includes(t.toString())));return this.fetchedFileIds.push(...p.map((t=>t.toString())).filter((t=>!e.includes(t)))),this.$store.dispatch("appendFiles",d),i.Z.debug("[FetchFilesMixin] Fetched ".concat(p.length," new files: "),p),p}catch(t){var p;if(404===(null===(p=t.response)||void 0===p?void 0:p.status)){const e=f.Z.state.userConfig.photosSourceFolders;for(const n of e){var A,u;if(null!==(null===(A=t.response)||void 0===A||null===(u=A.data)||void 0===u?void 0:u.match("File with name /".concat(n," could not be located")))){i.Z.debug("The ".concat(n," folder does not exist, creating it."));try{return await(0,o.rp)().createDirectory((0,a.RQ)(o._o,n)),this.resetFetchFilesState(),[]}catch(t){this.errorFetchingFiles=404,i.Z.error("Fail to create source directory",{error:t})}}}}else{if("ERR_CANCELED"===t.code)return[];this.errorFetchingFiles=t}i.Z.error("Error fetching files",{error:t})}finally{this.loadingFiles=!1,this.fetchSemaphore.release(d)}return[]},resetFetchFilesState(){this.doneFetchingFiles=!1,this.errorFetchingFiles=null,this.loadingFiles=!1,this.fetchedFileIds=[]}}}},3640:(t,e,n)=>{n.d(e,{Z:()=>c});var o=n(87537),a=n.n(o),i=n(23645),s=n.n(i)()(a());s.push([t.id,".face-list[data-v-33326436]{display:flex;flex-direction:row;height:350px;flex-wrap:wrap;padding:12px}.loader[data-v-33326436]{margin:25% auto}","",{version:3,sources:["webpack://./src/components/Faces/FaceMergeForm.vue"],names:[],mappings:"AAEA,4BACC,YAAA,CACA,kBAAA,CACA,YAAA,CACA,cAAA,CACA,YAAA,CAGD,yBACC,eAAA",sourcesContent:['$sizes: ("400": ("count": 3, "marginTop": 66, "marginW": 8), "700": ("count": 4, "marginTop": 66, "marginW": 8), "1024": ("count": 5, "marginTop": 66, "marginW": 44), "1280": ("count": 4, "marginTop": 66, "marginW": 44), "1440": ("count": 5, "marginTop": 88, "marginW": 66), "1600": ("count": 6, "marginTop": 88, "marginW": 66), "2048": ("count": 7, "marginTop": 88, "marginW": 66), "2560": ("count": 8, "marginTop": 88, "marginW": 88), "3440": ("count": 9, "marginTop": 88, "marginW": 88), "max": ("count": 10, "marginTop": 88, "marginW": 88));\n\n.face-list {\n\tdisplay: flex;\n\tflex-direction: row;\n\theight: 350px;\n\tflex-wrap: wrap;\n\tpadding: 12px;\n}\n\n.loader {\n\tmargin: 25% auto;\n}\n'],sourceRoot:""}]);const c=s},77157:(t,e,n)=>{n.d(e,{Z:()=>c});var o=n(87537),a=n.n(o),i=n(23645),s=n.n(i)()(a());s.push([t.id,".face[data-v-ac533158]{display:flex;flex-direction:column}.face__empty[data-v-ac533158]{display:flex;flex-direction:column;align-items:center}.face__empty__button[data-v-ac533158]{margin-top:32px}.face__header[data-v-ac533158]{display:flex;min-height:60px;align-items:center;justify-content:space-between;position:-webkit-sticky;position:sticky;z-index:3;background:var(--color-main-background);padding:0 64px}@media only screen and (max-width: 1020px){.face__header[data-v-ac533158]{padding:0;padding-left:64px}}.face__header__left[data-v-ac533158]{height:100%;display:flex;align-items:center}.face__header__title[data-v-ac533158]{margin-left:10px}.face__header__title h2[data-v-ac533158]{margin-bottom:0}.face__header__loader[data-v-ac533158]{margin-left:32px}.face__header__actions[data-v-ac533158]{display:flex;align-items:center}.face__header__actions button[data-v-ac533158]{margin-left:16px}.face__photos[data-v-ac533158]{margin-top:16px;height:100%;min-height:0;padding:0 64px}@media only screen and (max-width: 1020px){.face__photos[data-v-ac533158]{padding:0}}.empty-content-with-illustration[data-v-ac533158] .empty-content__icon{width:200px;height:200px}.empty-content-with-illustration[data-v-ac533158] .empty-content__icon svg{width:200px;height:200px}.rename-form[data-v-ac533158]{display:flex;flex-direction:row;align-items:center;height:70px;padding:16px}.rename-form input[data-v-ac533158]{width:100%}","",{version:3,sources:["webpack://./src/mixins/FaceContent.scss"],names:[],mappings:"AAqBA,uBACC,YAAA,CACA,qBAAA,CAEA,8BACC,YAAA,CACA,qBAAA,CACA,kBAAA,CAEA,sCACC,eAAA,CAKF,+BACC,YAAA,CACA,eAAA,CACA,kBAAA,CACA,6BAAA,CACA,uBAAA,CAAA,eAAA,CACA,SAAA,CACA,uCAAA,CACA,cAAA,CAEA,2CAVD,+BAWE,SAAA,CACA,iBAAA,CAAA,CAGD,qCACC,WAAA,CACA,YAAA,CACA,kBAAA,CAGD,sCACC,gBAAA,CACA,yCACC,eAAA,CAIF,uCACC,gBAAA,CAGD,wCACC,YAAA,CACA,kBAAA,CAEA,+CACC,gBAAA,CAKH,+BACC,eAAA,CACA,WAAA,CACA,YAAA,CACA,cAAA,CAEA,2CAND,+BAOE,SAAA,CAAA,CAKH,uEACC,WAAA,CACA,YAAA,CAEA,2EACC,WAAA,CACA,YAAA,CAIF,8BACC,YAAA,CACA,kBAAA,CACA,kBAAA,CACA,WAAA,CACA,YAAA,CAEA,oCACC,UAAA",sourcesContent:["/**\n * @copyright Copyright (c) 2023 Marcel Klehr <mklehr@gmx.net>\n *\n * @author Marcel Klehr <mklehr@gmx.net>\n *\n * @license AGPL-3.0-or-later\n *\n * This program is free software: you can redistribute it and/or modify\n * it under the terms of the GNU Affero General Public License as\n * published by the Free Software Foundation, either version 3 of the\n * License, or (at your option) any later version.\n *\n * This program is distributed in the hope that it will be useful,\n * but WITHOUT ANY WARRANTY; without even the implied warranty of\n * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the\n * GNU Affero General Public License for more details.\n *\n * You should have received a copy of the GNU Affero General Public License\n * along with this program. If not, see <http://www.gnu.org/licenses/>.\n *\n */\n.face {\n\tdisplay: flex;\n\tflex-direction: column;\n\n\t&__empty {\n\t\tdisplay: flex;\n\t\tflex-direction: column;\n\t\talign-items: center;\n\n\t\t&__button {\n\t\t\tmargin-top: 32px;\n\t\t}\n\n\t}\n\n\t&__header {\n\t\tdisplay: flex;\n\t\tmin-height: 60px;\n\t\talign-items: center;\n\t\tjustify-content: space-between;\n\t\tposition: sticky;\n\t\tz-index: 3;\n\t\tbackground: var(--color-main-background);\n\t\tpadding: 0 64px;\n\n\t\t@media only screen and (max-width: 1020px) {\n\t\t\tpadding: 0;\n\t\t\tpadding-left: 64px;\n\t\t}\n\n\t\t&__left {\n\t\t\theight: 100%;\n\t\t\tdisplay: flex;\n\t\t\talign-items: center;\n\t\t}\n\n\t\t&__title {\n\t\t\tmargin-left: 10px;\n\t\t\th2 {\n\t\t\t\tmargin-bottom: 0;\n\t\t\t}\n\t\t}\n\n\t\t&__loader {\n\t\t\tmargin-left: 32px;\n\t\t}\n\n\t\t&__actions {\n\t\t\tdisplay: flex;\n\t\t\talign-items: center;\n\n\t\t\tbutton {\n\t\t\t\tmargin-left: 16px;\n\t\t\t}\n\t\t}\n\t}\n\n\t&__photos {\n\t\tmargin-top: 16px;\n\t\theight: 100%;\n\t\tmin-height: 0; // Prevent it from overflowing in a flex context.\n\t\tpadding: 0 64px;\n\n\t\t@media only screen and (max-width: 1020px) {\n\t\t\tpadding: 0;\n\t\t}\n\t}\n}\n\n.empty-content-with-illustration :deep .empty-content__icon {\n\twidth: 200px;\n\theight: 200px;\n\n\tsvg {\n\t\twidth: 200px;\n\t\theight: 200px;\n\t}\n}\n\n.rename-form {\n\tdisplay: flex;\n\tflex-direction: row;\n\talign-items: center;\n\theight: 70px;\n\tpadding: 16px;\n\n\tinput {\n\t\twidth: 100%;\n\t}\n}\n"],sourceRoot:""}]);const c=s},35406:(t,e,n)=>{n.d(e,{Z:()=>_});var o=n(20629),a=n(46116),i=n(99751);const s={name:"FaceMergeForm",components:{FaceCover:n(4294).Z},mixins:[a.Z,i.Z],props:{firstFace:{type:String,required:!0}},data:()=>({loading:!1}),computed:{...(0,o.Se)(["files","faces","facesFiles"]),filteredFaces(){return Object.values(this.faces).filter((t=>t.basename!==this.firstFace)).sort(((t,e)=>t.props.nbItems&&e.props.nbItems?e.props.nbItems-t.props.nbItems:this.facesFiles[e.basename]&&this.facesFiles[t.basename]?this.facesFiles[e.basename].length-this.facesFiles[t.basename].length:0))}},methods:{handleSelect(t){this.$emit("select",t),this.loading=!0}}};var c=n(93379),r=n.n(c),l=n(7795),d=n.n(l),h=n(90569),f=n.n(h),p=n(3565),A=n.n(p),u=n(19216),m=n.n(u),g=n(44589),C=n.n(g),F=n(3640),v={};v.styleTagTransform=C(),v.setAttributes=A(),v.insert=f().bind(null,"head"),v.domAPI=d(),v.insertStyleElement=m();r()(F.Z,v);F.Z&&F.Z.locals&&F.Z.locals;const _=(0,n(51900).Z)(s,(function(){var t=this,e=t._self._c;return e("div",{staticClass:"merge-form face-list"},t._l(t.filteredFaces,(function(n){return e("FaceCover",{key:n.basename,attrs:{"base-name":n.basename,small:""},on:{click:function(e){return t.handleSelect(n.basename)}}})})),1)}),[],!1,null,"33326436",null).exports},66776:(t,e,n)=>{n.r(e),n.d(e,{default:()=>W});var o=n(20629),a=n(77531),i=n(44893),s=n(84320),c=n(58613),r=n(34020),l=n(56855),d=n(18667),h=n(69254),f=n(73981),p=n(39337),A=n(64882),u=n(66951),m=n(98171),g=n(97519),C=n(64811),F=n(59537),v=n(99751),_=n(20144),y=n(35406);const x={name:"FaceContent",components:{Pencil:a.Z,Star:c.Z,Download:r.Z,Close:i.Z,AlertCircle:s.Z,Send:l.Z,Merge:d.Z,ArrowLeft:h.Z,AccountBoxMultipleOutline:p.Z,FaceMergeForm:y.Z,FilesListViewer:g.Z,File:C.Z,NcLoadingIcon:A.lb,NcEmptyContent:A.SL,NcActions:A.O3,NcActionButton:A.Js,NcDialog:A.a0,NcButton:A.P2,AccountSwitch:f.Z},directives:{focus(t){_.ZP.nextTick((()=>t.focus()))}},mixins:[v.Z,u.Z,m.Z],props:{faceName:{type:String,default:"/"}},data:()=>({showMoveModal:!1,showMergeModal:!1,showRenameModal:!1,loadingCount:0,appContent:document.getElementById("app-content-vue")}),computed:{...(0,o.Se)(["files","facesFiles"]),face(){return this.faces[this.faceName]},faceFileIds(){return this.facesFiles[this.faceName]||[]},shouldFavoriteSelection(){return this.selectedFileIds.some((t=>0===this.$store.state.files.files[t].favorite))}},watch:{face(){this.face&&this.fetchFaceContent(this.faceName)}},mounted(){this.fetchFaceContent(this.faceName)},methods:{...(0,o.nv)(["appendFiles","deleteFace","renameFace","downloadFiles","toggleFavoriteForFiles","removeFilesFromFace","moveFilesToFace"]),openViewer(t){const e=this.files[t];OCA.Viewer.open({path:"/"+e.filename.split("/").slice(3).join("/"),list:this.faceFileIds.map((t=>({...this.files[t],filename:"/"+this.files[t].filename.split("/").slice(3).join("/")}))),loadMore:e.loadMore?async()=>await e.loadMore(!0):()=>[],canLoop:e.canLoop})},async handleRemoveFilesFromFace(t){try{this.loadingCount++,await this.removeFilesFromFace({faceName:this.faceName,fileIdsToRemove:t}),this.resetSelection()}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async handleDeleteFace(){try{this.loadingCount++,await this.deleteFace({faceName:this.faceName}),this.$router.push("/faces")}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async handleRenameFace(t){try{this.loadingCount++,this.showRenameModal=!1;const e=this.faceName;await this.renameFace({oldName:e,faceName:t}),this.$router.push({name:"facecontent",params:{faceName:t}})}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async handleMerge(t){try{this.loadingCount++,await this.moveFilesToFace({oldFace:this.faceName,faceName:t,fileIdsToMove:this.facesFiles[this.faceName]}),await this.deleteFace({faceName:this.faceName}),this.showMergeModal=!1,this.$router.push({name:"facecontent",params:{faceName:t}})}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async handleMove(t,e){try{this.loadingCount++,await this.moveFilesToFace({oldFace:this.faceName,faceName:t,fileIdsToMove:e}),this.showMoveModal=!1}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async favoriteSelection(){try{this.loadingCount++,await this.toggleFavoriteForFiles({fileIds:this.selectedFileIds,favoriteState:!0})}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async unFavoriteSelection(){try{this.loadingCount++,await this.toggleFavoriteForFiles({fileIds:this.selectedFileIds,favoriteState:!1})}catch(t){F.Z.error(t)}finally{this.loadingCount--}},async downloadSelection(){try{this.loadingCount++,await this.downloadFiles(this.selectedFileIds)}catch(t){F.Z.error(t)}finally{this.loadingCount--}}}};var w=n(93379),b=n.n(w),k=n(7795),N=n.n(k),S=n(90569),M=n.n(S),Z=n(3565),I=n.n(Z),B=n(19216),R=n.n(B),T=n(44589),E=n.n(T),D=n(77157),L={};L.styleTagTransform=E(),L.setAttributes=I(),L.insert=M().bind(null,"head"),L.domAPI=N(),L.insertStyleElement=R();b()(D.Z,L);D.Z&&D.Z.locals&&D.Z.locals;const W=(0,n(51900).Z)(x,(function(){var t=this,e=t._self._c;return void 0!==t.face||t.loadingFiles||t.loadingFaces?t.errorFetchingFiles||t.errorFetchingFaces?e("NcEmptyContent",{scopedSlots:t._u([{key:"icon",fn:function(){return[e("AlertCircle")]},proxy:!0}])},[t._v("\n\t"+t._s(t.t("photos","An error occurred"))+"\n")]):e("div",{staticClass:"face"},[e("div",{staticClass:"face__header"},[e("div",{staticClass:"face__header__left"},[e("NcActions",[e("NcActionButton",{on:{click:function(e){return t.$router.push("/faces/")}},scopedSlots:t._u([{key:"icon",fn:function(){return[e("ArrowLeft")]},proxy:!0}])},[t._v(t._s(t.t("photos","Back"))+"\n\t\t\t\t")])],1),t._v(" "),e("div",{staticClass:"face__header__title"},[void 0!==t.face?e("h2",{class:{"face-name":!0,"hidden-visually":t.face.basename.match(/^[0-9]+$/)}},[t._v("\n\t\t\t\t\t"+t._s(t.face.basename)+"\n\t\t\t\t")]):t._e()]),t._v(" "),t.loadingCount>0||t.loadingFaces?e("NcLoadingIcon"):t._e()],1),t._v(" "),void 0!==t.face?e("div",{staticClass:"face__header__actions"},[e("NcActions",[e("NcActionButton",{attrs:{"close-after-click":!0,"aria-label":t.t("photos","Rename person")},on:{click:function(e){t.showRenameModal=!0}},scopedSlots:t._u([{key:"icon",fn:function(){return[e("Pencil")]},proxy:!0}],null,!1,514409694)},[t._v("\n\t\t\t\t\t"+t._s(t.t("photos","Rename person"))+"\n\t\t\t\t")])],1),t._v(" "),e("NcActions",{attrs:{"force-menu":!0}},[Object.keys(t.faces).length>1?e("NcActionButton",{attrs:{"close-after-click":!0,"aria-label":t.t("photos","Merge with different person")},on:{click:function(e){t.showMergeModal=!0}},scopedSlots:t._u([{key:"icon",fn:function(){return[e("Merge")]},proxy:!0}],null,!1,3117189691)},[t._v("\n\t\t\t\t\t"+t._s(t.t("photos","Merge with different person"))+"\n\t\t\t\t")]):t._e(),t._v(" "),t.selectedFileIds.length?[e("NcActionButton",{attrs:{"close-after-click":!0,"aria-label":t.t("photos","Download selected files")},on:{click:t.downloadSelection}},[e("Download",{attrs:{slot:"icon"},slot:"icon"}),t._v("\n\t\t\t\t\t\t"+t._s(t.t("photos","Download selected photos"))+"\n\t\t\t\t\t")],1),t._v(" "),t.shouldFavoriteSelection?e("NcActionButton",{attrs:{"close-after-click":!0,"aria-label":t.t("photos","Mark selection as favorite")},on:{click:t.favoriteSelection}},[e("Star",{attrs:{slot:"icon"},slot:"icon"}),t._v("\n\t\t\t\t\t\t"+t._s(t.t("photos","Favorite"))+"\n\t\t\t\t\t")],1):e("NcActionButton",{attrs:{"close-after-click":!0,"aria-label":t.t("photos","Remove selection from favorites")},on:{click:t.unFavoriteSelection}},[e("Star",{attrs:{slot:"icon"},slot:"icon"}),t._v("\n\t\t\t\t\t\t"+t._s(t.t("photos","Remove from favorites"))+"\n\t\t\t\t\t")],1),t._v(" "),e("NcActionButton",{attrs:{"close-after-click":!0},on:{click:function(e){t.showMoveModal=!0}},scopedSlots:t._u([{key:"icon",fn:function(){return[e("AccountSwitch")]},proxy:!0}],null,!1,2937983280)},[t._v("\n\t\t\t\t\t\t"+t._s(t.n("photos","Move photo to a different person","Move photos to a different person",t.selectedFileIds.length))+"\n\t\t\t\t\t")]),t._v(" "),e("NcActionButton",{attrs:{"close-after-click":!0},on:{click:function(e){return t.handleRemoveFilesFromFace(t.selectedFileIds)}},scopedSlots:t._u([{key:"icon",fn:function(){return[e("Close")]},proxy:!0}],null,!1,1051939733)},[t._v("\n\t\t\t\t\t\t"+t._s(t.n("photos","Remove photo from person","Remove photos from person",t.selectedFileIds.length))+"\n\t\t\t\t\t")])]:t._e(),t._v(" "),e("NcActionButton",{attrs:{"close-after-click":!0},on:{click:t.handleDeleteFace},scopedSlots:t._u([{key:"icon",fn:function(){return[e("Close")]},proxy:!0}],null,!1,1051939733)},[t._v("\n\t\t\t\t\t"+t._s(t.t("photos","Remove person"))+"\n\t\t\t\t")])],2)],1):t._e()]),t._v(" "),void 0!==t.face?e("FilesListViewer",{staticClass:"face__photos",attrs:{"container-element":t.appContent,"file-ids":t.faceFileIds,loading:t.loadingFiles||t.loadingFaces},scopedSlots:t._u([{key:"default",fn:function(n){let{file:o,distance:a}=n;return e("File",{attrs:{file:t.files[o.id],"allow-selection":!0,selected:!0===t.selection[o.id],distance:a},on:{click:t.openViewer,"select-toggled":t.onFileSelectToggle}})}}],null,!1,2716306842)}):t._e(),t._v(" "),t.showRenameModal?e("NcDialog",{attrs:{name:t.t("photos","Rename person"),"close-on-click-outside":"",size:"small"},on:{closing:function(e){t.showRenameModal=!1}},scopedSlots:t._u([{key:"actions",fn:function(){return[e("NcButton",{attrs:{"aria-label":t.t("photos","Save."),type:"primary",disabled:t.$refs.nameInput&&""===t.$refs.nameInput.value.trim()},on:{click:function(e){return t.handleRenameFace(t.$refs.nameInput.value)}},scopedSlots:t._u([{key:"icon",fn:function(){return[t.loadingCount?e("NcLoadingIcon"):e("Send")]},proxy:!0}],null,!1,564208483)},[t._v("\n\t\t\t\t"+t._s(t.t("photos","Save"))+"\n\t\t\t")])]},proxy:!0}],null,!1,4139225602)},[e("div",{staticClass:"rename-form"},[e("input",{directives:[{name:"focus",rawName:"v-focus"}],ref:"nameInput",attrs:{type:"text",name:"name",required:"",placeholder:t.t("photos","Name of this person")},domProps:{value:t.faceName},on:{keydown:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.handleRenameFace(t.$refs.nameInput.value)}}})])]):t._e(),t._v(" "),t.showMergeModal?e("NcDialog",{attrs:{name:t.t("photos","Merge person"),"close-on-click-outside":"",size:"normal"},on:{closing:function(e){t.showMergeModal=!1}}},[e("FaceMergeForm",{attrs:{"first-face":t.faceName},on:{select:function(e){return t.handleMerge(e)}}})],1):t._e(),t._v(" "),t.showMoveModal?e("NcDialog",{attrs:{name:t.t("photos","Move to different person"),"close-on-click-outside":"",size:"normal"},on:{closing:function(e){t.showMoveModal=!1}}},[e("FaceMergeForm",{attrs:{"first-face":t.faceName},on:{select:function(e){return t.handleMove(e,t.selectedFileIds)}}})],1):t._e()],1):e("NcEmptyContent",{staticClass:"empty-content-with-illustration",scopedSlots:t._u([{key:"icon",fn:function(){return[e("AccountBoxMultipleOutline")]},proxy:!0}],null,!1,2861705255)},[t._v("\n\t"+t._s(t.t("photos","This person could not be found"))+"\n")])}),[],!1,null,"ac533158",null).exports}}]);
//# sourceMappingURL=photos-src_views_FaceContent_vue.js.map?v=757e4fd6c78638086549