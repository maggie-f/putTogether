var putTogether = {
	visible: false,
	visibleTaskEditor: false,
	tab: "",
	namesPanels: ["tasks", "messages", "files", "calendar", "team", "project"],
	build: function () 
			{ 
				/** MENU **/
				$(function (){$(".headPanel .headPanelBody").mouseover(function(){
					$(this).removeClass("headPanelNonClick");
					$(this).addClass("headPanelOnClick");
				}).mouseout(function(){
					$(this).removeClass("headPanelOnClick");
					$(this).addClass("headPanelNonClick");
				});}); 
				/** Date datepicker **/
				$(function () {
					$("#created").datepicker();
					$( "#created" ).datepicker("option", "dateFormat", "mm/dd/yy");});				
				$(function() {
					$("#ended").datepicker();
					$("#ended").datepicker("option", "dateFormat", "mm/dd/yy");});
				$(function() {
					$("#enddate").datepicker();
					$("#enddate").datepicker("option", "dateFormat", "mm/dd/yy");});
				putTogether.assingClasses;
			},
	seeUnseeMenu: $(function(){
					$(".seeUnseeMenu").click(function(){
						if (putTogether.visible) {
							$("#menu").css("display", "none");
							$("#content").removeClass("col-md-10")
							.addClass("col-md-12");
							$("#projectBox").addClass("container");
							putTogether.visible = false;
						}
						else{
							$("#menu").css("display", "");
							$("#content").removeClass("col-md-12")
							.addClass("col-md-10");
							$("#projectBox").removeClass("container");
							putTogether.visible = true;
						}
					});
				}),
	loadTaskData: function (value){
					var id = value;
						$.ajax({
							type:"POST",
							url: "/PutTogether/tasks/get-task-data?id="+id,
							dataType: 'text',
							async:true,
							success: function(tab){
								putTogether.loadData(tab);
							},
							error: function (tab) {
								alert('error' + tab);
							}
						});
					},
	loadData: function (tab){
				var json = JSON.parse(tab);
				$('#nameTask0').val(json.name);
				$('#descriptionTask0').val(json.description);
				$('#created').val($.datepicker.formatDate("mm/dd/yy", new Date(json.created)));
				$('#ended').val($.datepicker.formatDate("mm/dd/yy", new Date(json.ended)));
				$('#idTask').val(json.id);
				$("#formPart").attr("action", "/PutTogether/tasks/edit");
			},
	cleanData: function (){
					$("#formPart").attr("action", "/PutTogether/tasks/add");
				},
	addClasses: function addClasses(nameOfId){
					$("#"+nameOfId).mouseover(function(){
						$(this).removeClass("unselected");
						$(this).addClass(nameOfId+"Selected");
					})
					.mouseout(function(){
						$(this).removeClass(nameOfId+"Selected");
						$(this).addClass("unselected");
					});
				},
	assingClasses: $(function(){
					if($("#messages").length){
						for(i=0; i <= putTogether.namesPanels.length; i++){
							putTogether.addClasses(putTogether.namesPanels[i]);
						}
						$(".headPanel .headPanelBody .icon").addClass("borraAnterior");
					}
				}),
	openEditor: function (){
				$("#editProjecto").css("display", "");
				$("#dataProject").css("display", "none");
				},
    closeEditor: function (){
				$("#editProjecto").css("display", "none");
				$("#dataProject").css("display", "");
			},
	editState: function (idTask, idState){
				$.ajax({
					type:"POST",
					url: "/PutTogether/tasks/edit-state?id="+idTask+"&state="+idState,
					dataType: 'text',
					async:true,
					success: function(tab){
						putTogether.changeOptionIcon(idTask, idState)
					},
					error: function (tab) {
						console.log(tab);
					}
				});
				},
	seeStatePanelOptions: function (value){
							$("#stateOptions"+value).css('display', '');
	},
	unseeStatePanelOptions: function (value){
							$("#stateOptions"+value).css('display', 'none');
	},
	changeOptionIcon: function (idTask, idState){
						$("#option"+idTask).removeClass();
						$("#icon"+idTask).removeClass();
						switch (idState){
							case 'p':
								$("#option"+idTask).addClass("stateProcess");
								$("#icon"+idTask).addClass("fa fa-play-circle");
								break;
							case 'w':
								$("#option"+idTask).addClass("stateWaiting");
								$("#icon"+idTask).addClass("fa fa-pause-circle");
								break;
							case 'f':
								$("#option"+idTask).addClass("stateFinished");
								$("#icon"+idTask).addClass("fa fa-check-circle");
								break;
						}						
					},
	checkState: function (){
				$.ajax({
					type:"POST",
					url: "/PutTogether/tasks/check-State",
					dataType: 'text',
					async:true,
					success: function(tab){
						var response = JSON.parse(tab);
						putTogether.actionEditor(response);
					},
					error: function (tab) {
						console.log(tab);
					}
				});
				},
	actionEditor: function (value){
					if(value){
						$("#taskEditor").removeClass("notSee");
						$('#taskList').removeClass("col-sm-12 col-md-12 col-lg-12");
						$('#taskList').addClass("col-sm-8 col-md-8 col-lg-8");
						$('#iconActionEditor').removeClass("fa-angle-double-left");
						$('#iconActionEditor').addClass("fa-angle-double-right");
						$('#lnkActionEditor').attr("title", "Close Task Editor");
					}else{
						$("#taskEditor").addClass("notSee");
						$('#taskList').removeClass("col-sm-8 col-md-8 col-lg-8");
						$('#taskList').addClass("col-sm-12 col-md-12 col-lg-12");
						$('#iconActionEditor').removeClass("fa-angle-double-right");
						$('#iconActionEditor').addClass("fa-angle-double-left");
						$('#lnkActionEditor').attr("title", "Open Task Editor");
					}
				}
}

putTogether.build();