function changeLanguage(e){e.preventDefault();window.location.pathname="/change_language/"+this.getAttribute("data-lang");}
function initLanguageSelect(){const selectList=document.querySelectorAll('a[data-lang]');for(let i=0;i<selectList.length;i++){selectList[i].addEventListener("click",changeLanguage,false);}}
window.addEventListener("DOMContentLoaded",initLanguageSelect);(function(i18n){if(i18n.hasInitialised)return;i18n.translate=function(text,params=null){let translate=window.i18Translations?window.i18Translations[text]:text;if(translate){if(params){for(let key in params){if(params.hasOwnProperty(key)){translate.replace('{{'+key+'}}',params[key]);}}}
return translate;}
return text;};i18n.normalizeURL=function(path,lang="en"){return '/'+window.i18Language+path}
i18n.hasInitialised=true;window.i18n=i18n;})(window.i18n||{});function _t(text,params=null){return window.i18n?window.i18n.translate(text,params):text;}