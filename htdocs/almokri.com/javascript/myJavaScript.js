function methoda(){
  document.getElementById("my-modal").style.display = "block";
}
function closemethode(){
  var f=document.getElementById("my-modal");
  f.classList.toggle("animateshow");
  f.classList.toggle("animate");
  var e=document.getElementById("thecontent");
  e.classList.toggle("animationmymove");
  e.classList.toggle("animationclose");
  setTimeout(customFunction, 500);
  //setInterval(): executes a function, over and over again, at specified time intervals
  // setTimeout() : executes a function, once, after waiting a specified number of milliseconds
  

  /*
  e.addEventListener("animationend", () => {
    var n=document.getElementById("my-modal");
  n.classList.toggle("animate");
  var r=document.getElementById("thecontent");
  r.classList.toggle("animationclose");
  console.log("fuckingevent clicked");
  });*/
}

function customFunction() {
  var n=document.getElementById("my-modal");
  n.classList.toggle("animate");
  var r=document.getElementById("thecontent");
  r.classList.toggle("animationclose");
}
function loadDoc(a) {
  if(a==1){
  document.getElementById("my-modal").style.display = "block";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("thecontent").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "inpopup\\addbook.php", true);
  xhttp.send();


}else if(a==2){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("thecontent").innerHTML = this.responseText;
    }
  };
 // xhttp.abort();   to cancel the ajax call
  xhttp.open("GET", "inpopup\\signtodeletebook.php", true);
  xhttp.send();
  var t=document.getElementById("my-modal");
  t.classList.toggle("animateshow");
  var backgroundt=document.getElementById("thecontent");
  backgroundt.classList.toggle("animationmymove");
  console.log("ajax clicked");
}else if(a==3){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("thecontent").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "inpopup\\comments.php", true);
  xhttp.send();
  var t=document.getElementById("my-modal");
  t.classList.toggle("animateshow");
  var backgroundt=document.getElementById("thecontent");
  backgroundt.classList.toggle("animationmymove");
}else if(a==4){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("thecontent").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "inpopup\\OnProgressBars.php", false );
  xhttp.send();
  
  var t=document.getElementById("my-modal");
  t.classList.toggle("animateshow");
  var backgroundt=document.getElementById("thecontent");
  backgroundt.classList.toggle("animationmymove");

  var file = document.getElementById("upload-pdf").files[0];
  var sizeOfChunk=102400;
  var numberOfTry=5;
  var sizeOfFile=file.size;
  var numberOfChunks=Math.ceil(sizeOfFile/sizeOfChunk,1);
  var index=0;
  document.getElementById("nameofuploadedfile").innerHTML=file.name;
  makeslice(file,index,sizeOfChunk,numberOfChunks);
}
}
////////////////////////////////////////////////////////////////////////////// document.getElementById("myForm").submit(); 
var tftf=true;
var dir="pdf_books/";
function uploadslice(slice,file,index,sizeOfChunk,retry,numberOfChunks){
  var fd = new FormData();
  var xhr=new XMLHttpRequest;
  fd.append('filename', file.name);
  fd.append('start', sizeOfChunk * index);
  fd.append('size', file.size);
  fd.append('index', index);
  fd.append('slice', slice);
  fd.append('retry', retry);
  fd.append('dir', dir);
  fd.append('numberOfChunks', numberOfChunks-1);
  xhr.open('POST', 'myphp.php', true);
  xhr.onreadystatechange = function() {
      var status=this.status,readyState=this.readyState;
      if (readyState == 4 && status == 200) {
          var last=this.responseText;
          if(last==2){
              makeslice(file,index+1,sizeOfChunk,numberOfChunks);
          }else if(last==1){
            if(!tftf){
//              document.getElementById("pcloseitit").innerHTML="اغلاق";
//              document.getElementById("closeitit").addEventListener('click', closemethode(),false);
                var fde = new FormData();
                var xhre=new XMLHttpRequest;
                console.log("this shit excute very well");
                fde.append('name', document.getElementById("nameofthebook").value);
                fde.append('number', document.getElementById("numberofages").value);
                fde.append('year', document.getElementById("yearofedition").value);
                fde.append('description', document.getElementById("descritionofbook").value);
                fde.append('linlk', document.getElementById("linkofbook").value);
                fde.append('key', document.getElementById("keywords").value);
                fde.append('catygory', document.querySelector('input[name="radio"]:checked').value);
                fde.append('pdf', document.getElementById("upload-pdf").files[0].name);
                fde.append('img', document.getElementById("upload-photo").files[0].name);
           //     fde.append('author', author);
                xhre.open('POST', 'createthefilesneedd.php', true);
                xhre.onreadystatechange = function() {
                  if (readyState == 4 && status == 200) {
                    document.getElementById("closeitit").innerHTML='<p onclick="closemethode()" style="color:white;font-size:15px;display:flex;align-items: center;width:100%;height:100%;justify-content: center;cursor: pointer;">اغلاق</p>';
                  }
                }
                xhre.send(fde,false);
            }
            if(tftf){
              var file2 = document.getElementById("upload-photo").files[0];
              var sizeOfFile2=file.size;
              dir="images_books/";
              document.getElementById("nameofuploadedfile").innerHTML=file2.name;
              var numberOfChunks2=Math.ceil(sizeOfFile2/sizeOfChunk,1);
              var index2=0;
              makeslice(file2,index2,sizeOfChunk,numberOfChunks2);
              tftf=false;
            }
          }
      }
    };
    xhr.addEventListener("progress", onprogress, false);
    xhr.upload.onprogress = function (e) {
      var progress=document.getElementById("thebar");
      if (e.lengthComputable) {
          var value = e.loaded / e.total;
          var all = Math.round(((index+value)/numberOfChunks)*100);
          progress.style.width = all + '%';
      }
  };
    xhr.send(fd,false);
}
function makeslice(file,index,sizeOfChunk,numberOfChunks){
  var slice=file.slice(sizeOfChunk * index, sizeOfChunk * (index + 1));
  uploadslice(slice,file,index,sizeOfChunk,0,numberOfChunks);
}

































































$(document).ready(function(){
	load_data();
	function load_data(query) {
		$.ajax({
			url: "fetch.php",
			method: "post",
			data: {query:query},
			success: function(data)
			{
				$('#result').html(data);
			}
		});
	}
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
  });
});




var animateHTML = function() {
  var elems,windowHeight;
  var initi = function() {
    elems = document.getElementsByClassName("alldivleft");
    windowHeight = window.innerHeight;
    _addEventHandlers();
  }
  var _addEventHandlers = function() {
      window.addEventListener("scroll", _checkPosition);
 //     window.addEventListener("resize", init);
  }
  var _checkPosition = function() {
    var scrol=window.innerHeight;
    var scroly=window.scrollY+scrol;
    for ( var i = 0; i < elems.length; i++ ) {
      var posFromTop = elems[i].getBoundingClientRect().top;
      if ( scroly >= posFromTop ) {
        elems[i].className = "alldivleftt";
      }
    }
  }
  return {
    init: initi
  }
}
animateHTML().init();



var animateeHTML = function() {
  var elems,windowHeight;
  var initi = function() {
    elems = document.getElementsByClassName("alldivright");
    windowHeight = window.innerHeight;
    _addEventHandlers();
  }
  var _addEventHandlers = function() {
      window.addEventListener("scroll", _checkPosition);
 //     window.addEventListener("resize", init);
  }
  var _checkPosition = function() {
    var scrol=window.innerHeight;
    var scroly=window.scrollY+scrol;
    for ( var i = 0; i < elems.length; i++ ) {
      var posFromTop = elems[i].getBoundingClientRect().top;
      if ( scroly >= posFromTop) {
        elems[i].className = "alldivrightt";
      }
    }
  }
  return {
    init: initi
  }
}
animateeHTML().init();

/*
var tf=true;
window.addEventListener("scroll", () => {
  var div=document.getElementById("firstone");
  const scrol=document.documentElement.scrollHeight-window.innerHeight;
 // const ookk=window.innerHeight-500;  //the height of ur screen
  const ookk=div.getBoundingClientRect().top+300;
  const scroly=window.scrollY;
  if(scroly>=ookk && tf==true){
    tf=false;
    console.log("done");
    div.classList.toggle("animationleftright");
    setTimeout(shityone, 700);
  }
});
function shityone(){
  var div2=document.getElementById("firstone");
  div2.style.marginLeft="0px";
  div2.style.display="block";
  div2.classList.toggle("animationleftright");
}
*/