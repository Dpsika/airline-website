"use strict";(self.travelpayoutsWpPlugin=self.travelpayoutsWpPlugin||[]).push([[789],{775:(M,D,N)=>{var t=N(16709);var g,u=(0,t.B)().onInit,I={init:function(M){M.addCommand("travelpayouts_shortcodes_ajax_modal_command",(function(){document.dispatchEvent(window.tp_wp_events.openModal)})),M.addButton("travelpayouts_shortcodes_btn",{title:"Travelpayouts add table shortcode",image:"data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNC43MyAxMi45NjMySDExLjY0QzExLjM3NDkgMTIuOTYzMiAxMS4xNiAxMi43NDgzIDExLjE2IDEyLjQ4MzJWMTAuMDhIMTMuOTc3MkMxNC4xMDkxIDEwLjA4IDE0LjIyMTcgOS45ODQ2NiAxNC4yNDM1IDkuODU0NTVMMTQuNDM0MyA4LjcxNDU1QzE0LjQ2MTggOC41NDk5NCAxNC4zMzQ5IDguNCAxNC4xNjggOC40SDkuNDgwMDFWMTIuNDgzMkM5LjQ4MDAxIDEzLjY3NjEgMTAuNDQ3MSAxNC42NDMyIDExLjY0IDE0LjY0MzJIMTMuMzJWMTUuODkyNUMxMi40ODg4IDE2LjIwODMgMTEuNzc3NSAxNi4zMiAxMC44NjA5IDE2LjMyQzguNTIxOTEgMTYuMzIgNy4xNDQ5MSAxNS4wMjE1IDcuMDgwMDEgMTIuNzJWOC40SDMuNDYwODRDMy4zMjg5MyA4LjQgMy4yMTYzMSA4LjQ5NTM0IDMuMTk0NTYgOC42MjU0NUwzLjAwMzc2IDkuNzY1NDVDMi45NzYyNSA5LjkzMDA2IDMuMTAzMTUgMTAuMDggMy4yNzAwNyAxMC4wOEg1LjQwMDAxVjEyLjcyQzUuNDM2ODggMTQuMTYgNS44MTA2NSAxNS40ODIyIDYuODUyOTEgMTYuNTMyN0M3LjgwNTIgMTcuNDkyNiA5LjE5MTE0IDE4IDEwLjg2MDkgMThDMTIuMjY3NyAxOCAxMy4zMzM3IDE3Ljc2NzUgMTQuNzI0NiAxNy4xMTdDMTQuODkyOSAxNy4wMzgzIDE1IDE2Ljg2ODYgMTUgMTYuNjgyOFYxMy4yMzMyQzE1IDEzLjA4NCAxNC44NzkxIDEyLjk2MzIgMTQuNzMgMTIuOTYzMloiIGZpbGw9IiMwMDg1RkYiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zLjgzMjM3IDYuNzE5OTlINy4wODAwMlYzLjExNTE5TDkuNDgwMDEgMi4yNjUzMlY2LjcxOTk5SDE0LjUzOTJDMTQuNjcxMSA2LjcxOTk5IDE0Ljc4MzcgNi42MjQ2NSAxNC44MDU1IDYuNDk0NTRMMTQuOTk2MiA1LjM1NDU0QzE1LjAyMzggNS4xODk5MyAxNC44OTY4IDUuMDM5OTkgMTQuNzI5OSA1LjAzOTk5SDExLjE2VjAuMjcwMjAyQzExLjE2IDAuMDgzODExNiAxMC45NzU2IC0wLjA0NjUwODQgMTAuNzk5OSAwLjAxNTcxMTZMNS41Nzk4NiAxLjg2NDE5QzUuNDcyMDcgMS45MDIzOCA1LjQwMDAyIDIuMDA0MzUgNS40MDAwMiAyLjExODcxVjUuMDM5OTlINC4wMjMxNEMzLjg5MTIzIDUuMDM5OTkgMy43Nzg2MSA1LjEzNTMzIDMuNzU2ODMgNS4yNjU0NEwzLjU2NjA5IDYuNDA1NDRDMy41Mzg1MiA2LjU3MDA1IDMuNjY1NDUgNi43MTk5OSAzLjgzMjM3IDYuNzE5OTlaIiBmaWxsPSIjMDA4NUZGIi8+Cjwvc3ZnPgo=",cmd:"travelpayouts_shortcodes_ajax_modal_command",disabled:!0,onpostrender:function(){var M=this;u().then((function(){M.disabled(!1)}))}})},getInfo:function(){return{longname:"Travelpayouts",author:"travelpayouts",authorurl:"",infourl:"",version:"1.0"}}};g="travelpayouts_shortcodes_editor_btn",tinymce.create("tinymce.plugins.".concat(g),I),tinymce.PluginManager.add(g,tinymce.plugins[g])},37555:(M,D,N)=>{N.d(D,{BC:()=>u,OY:()=>g,rz:()=>t});const t="wp_open_tp_modal_select",g="tp_wp_widget_loaded",u="tp_wp_save"},16709:(M,D,N)=>{N.d(D,{B:()=>u});var t=N(37555);const g="tp_wp_widget_loaded",u=()=>{const M=()=>{localStorage.removeItem(g)};return window.removeEventListener("unload",M,!1),window.addEventListener("unload",M,!1),{setIsInitialized:()=>{localStorage.setItem(g,"true"),document.dispatchEvent(new CustomEvent(t.OY))},onInit:()=>new Promise((M=>{const D=setInterval((()=>{localStorage.getItem(g)&&(clearInterval(D),M())}),100)}))}}}},M=>{var D;D=775,M(M.s=D)}]);