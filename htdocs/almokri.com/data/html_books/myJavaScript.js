
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
  xhttp.open("GET", "..\\..\\pages\\inpopup\\addbook.php", true);
  xhttp.send();


}else if(a==2){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("thecontent").innerHTML = this.responseText;
    }
  };
 // xhttp.abort();   to cancel the ajax call
  xhttp.open("GET", "..\\..\\pages\\inpopup\\signtodeletebook.php", true);
  xhttp.send();

  var t=document.getElementById("my-modal");
  t.classList.toggle("animateshow");
  var backgroundt=document.getElementById("thecontent");
  backgroundt.classList.toggle("animationmymove");


}else if(a==3){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("thecontent").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "..\\..\\pages\\inpopup\\comments.php", true);
  xhttp.send();

  var t=document.getElementById("my-modal");
  t.classList.toggle("animateshow");
  var backgroundt=document.getElementById("thecontent");
  backgroundt.classList.toggle("animationmymove");
  console.log("ajax clicked");
}
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
      if ( scroly > posFromTop ) {
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
      if ( scroly > posFromTop) {
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