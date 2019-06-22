//store selected content in global variable "selectedContent"
if (!window.x) { x = {}; }
x.Selector = {};
x.Selector.getSelected = function() {
    var t = '';
    if (window.getSelection) {
        t = window.getSelection();
    } else if (document.getSelection) {
        t = document.getSelection();
    } else if (document.selection) {
        t = document.selection.createRange().text;
    }
    return t;
}
$('#input_article').bind("mouseup", function() {
    selectedtxt = x.Selector.getSelected();
	document.getElementById('selectedContent').innerHTML = selectedtxt;
});

//color the entities
function onColor(c, a){
	var _result = "";
	switch(c)
	{
	case 'aspect':
		_result = "<span class='aspect'>" + a + "</span>";
		break;
	}
	var txt = document.getElementById('input_article').innerHTML;
	var new_txt = txt.replace(new RegExp(a,"g"), _result);
	document.getElementById('input_article').innerHTML = new_txt;
}


//send aspect by ajax
function sendAspect(e){
	$('#input_article').addClass('unselectable');
	var _word = document.getElementById('selectedContent').innerHTML;
	var _aspect = e.innerHTML;
	var _data = { A : _aspect, W : _word };
    $.ajax({
		url:"tag_word.php",
		data: _data,
		type: 'post',
		success: function(feedback){
			if(feedback==_word){
				onColor('aspect', feedback);
				$('#input_article').removeClass('unselectable');
			}
			else{
				alert('unexpected error! please reload this web...\n\n'+feedback);
			}
		}
	});	
}

//initialize special dataTable
$('#innerTable').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
	"oLanguage": {
		"sSearch": "find: "
	},
	"scrollY": "200px",
    "scrollCollapse": true,
    "paging": false
});

//contextmenu functions
var menuDisplayed = false;
var menuSearching = false;
var menuBox = null;
window.addEventListener("contextmenu", function() {
    var mleft = arguments[0].clientX;
    var mtop = arguments[0].clientY;
    menuBox = window.document.querySelector(".menu");
    menuBox.style.left = mleft + "px";
    menuBox.style.top = mtop + "px";
    menuBox.style.display = "block";
    arguments[0].preventDefault();
    menuDisplayed = true;
}, false);
window.addEventListener("click", function() {
	if(menuSearching == true){
		return;
	} else if(menuDisplayed == true){
        menuBox.style.display = "none"; 
    }
}, true);
document.getElementById('innerTable_filter').getElementsByTagName('input')[0].addEventListener("focusout", function(){
	menuSearching = false;
});
document.getElementById('innerTable_filter').getElementsByTagName('input')[0].addEventListener("focusin", function(){
	menuSearching = true;
});


//show content in editable-parageaph
function showContent(evt){
	var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++)
    {
        var reader = new FileReader();
        reader.onload = (function(reader)
        {
            return function()
            {
                var contents = reader.result;
                var lines = contents.split('\n');
                document.getElementById('input_article').innerHTML=contents;
            }
        })(reader);
        reader.readAsText(f);
    }
}
document.getElementById('articleFile').addEventListener('change', showContent, false);

