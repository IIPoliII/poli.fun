var call = 1;
var current_row = 0;
var current_col = 0;
var next = new Date();
var interval = setInterval(myFunction, 1000);
var interval = setInterval(BDO_Time, 1000);
var current_boss =[];
var accept_notify = false;
var audio = new Audio('boss_timer/js/nhac.mp3');
function test(inp)
{
	switch(inp)
	{
		case 1:	
			//if(audio.duration > 0 && !audio.paused)
			//	audio.pause();
			//else
			audio.play();
		break;
		case 2:
			location.reload();
		break;
		default:
			notify();
		break;
	}	
}

function myFunction() {	
	
	if (Notification.permission !== "granted") {
		//alert(Notification.permission);
		//Notification.requestPermission();
	}
	
	var text_left = document.getElementById("left");
	var current = new Date();
	
	var left = ((next - current)>0)?Math.abs(next - current)/1000:0/1000;
	var hours = format_time(Math.floor(left / 3600) % 24);        
	var minutes = format_time(Math.floor(left / 60) % 60);
	var seconds = format_time(Math.floor(left % 60));

	text_left.innerHTML =  hours +" : "+minutes +" : "+seconds;		
	if(parseInt(hours) >= 0 && parseInt(minutes) >= 0 && parseInt(seconds) != 0) 
	{			
		if(parseInt(hours) == 0 && parseInt(minutes) < 10)
		{
			notify();
		}
		// 2 phut
		if(parseInt(minutes) % 2 == 0 && parseInt(seconds) == 0)
		{
			show_notify = false;	
		}
		return;		
	}
	else
	{
		show_notify = false;		
	}

	c_hour = current.getHours();
	c_min = current.getMinutes();	
	
	if(c_hour >= 0 && c_hour <= 1 && c_min > 30 || c_hour >= 1 && c_hour <= 3 && c_min <= 15 || c_hour == 1)
	{
		switchTime(2); // 2:00 (until 2:15)
	}else if(c_hour < 1 ||((c_hour == 22 && c_min > 30) || c_hour > 22))
	{
		if(c_hour != 0)
			next.setDate(next.getDate()+1);
		switchTime(1); // 0:15 (until 0:30)
	}else if(c_hour >= 2 && c_hour <= 4 && c_min >= 15 || c_hour >= 3 && c_hour <= 4 || c_hour == 5 && c_min <= 15)
	{
		switchTime(3); // 5:00 (until 5:15)
	}else if(c_hour >= 5 && c_hour <= 8 && c_min >= 15 || c_hour >= 6 && c_hour <= 8 || c_hour == 9 && c_min <= 15)
	{
		switchTime(4); // 9:00 (until 9:15)
	}else if(c_hour >= 9 && c_hour <= 11 && c_min >= 15 || c_hour >= 10 && c_hour <= 11 || c_hour == 12 && c_min <= 15)
	{
		switchTime(5); // 12:00 (until 12:15)
	}else if(c_hour >= 12 && c_hour <= 15 && c_min >= 15 || c_hour >= 13 && c_hour <= 15 || c_hour == 16 && c_min <= 15)
	{
		switchTime(6); // 16:00 (until 16:15)
	}else if(c_hour >= 16 && c_hour <= 21 && c_min >= 15 || c_hour >= 17 && c_hour <= 18 || c_hour == 19 && c_min <= 15)
	{
		switchTime(7); // 19:00 (until 19:15)
	}else if(c_hour >= 10 && c_hour <= 21 && c_min >= 15 || c_hour >= 20 && c_hour <= 21 || c_hour == 22 && c_min <= 30)
	{
		switchTime(8); // 22:15 (until 22:30)
	}else
	{
		switchTime(1);;
	}
	
}
function BDO_Time(){
bdo_first_night = bdo_day = bdo_second_night = 0;
    if (percent > percent_night) {
        bdo_first_night = percent_night;
        if (percent > percent_night + percent_day) {
            bdo_day = percent_day;
            bdo_second_night = percent - (real_percent_night + real_percent_day);
        } else {
            bdo_day = percent - bdo_first_night;
        }
    } else {
        bdo_first_night = percent;
    }

    day_add = real_percent_day / percent_day;
    night_add = real_percent_night / percent_night;

    first_night_minutes = (240 / 100 * (bdo_first_night * night_add) * 6);
    day_minutes = (240 / 100 * ((bdo_day) * day_add) * 6);
    second_night_minutes = (240 / 100 * ((percent - bdo_day - bdo_first_night) * night_add) * 6);

	text_left.innerHTML =  first_night_minutes +" : "+day_minutes +" : "+second_night_minutes;	
    //return gmdate('H:i:s', (first_night_minutes + day_minutes + second_night_minutes) * 60);
}

function switchTime(block_time)
{	
	var row = 0;
	switch(block_time)
	{
		case 1:	
			next.setHours(0);
			next.setMinutes(15);	
			row = 1		 
			break;
		case 2:
			next.setHours(2);
			next.setMinutes(0);
			row = 2;		
			break;
		case 3:
			next.setHours(5);
			next.setMinutes(0);
			row = 3;
			break;
		case 4:
			next.setHours(9);
			next.setMinutes(0);
			row = 4;
			break;
		case 5:
			next.setHours(12);
			next.setMinutes(0);
			row = 5;
			break;
		case 6:
			next.setHours(16);
			next.setMinutes(0);
			row = 6;
			break;
		case 7:
			next.setHours(19);
			next.setMinutes(0);
			row = 7;
			break;
		case 8:
			next.setHours(22);
			next.setMinutes(15);
			row = 8;
		break;
		default:break;
	}
	next.setSeconds(0);	
	var col = next.getDay() == 0 ? 9 : next.getDay() - 1;	
	switch_stable(row, col);
}
function switch_stable(row,col) //row start from 1, col from 0
{
	if(current_row == row && current_col == col)
		return;
	else
	{		
		setColor(current_row,current_col,'white');		
		current_row = row;
		current_col = col;
		setColor(current_row,current_col,'#800080');
	}
	
}
function setColor(row,col,color)
{
	if(row < 1 || row > 9 || col < 0  ||  col > 9)
		return;
	var refTab = document.getElementById("tboss");	
	var row_tmp = refTab.rows[row];	
	var col_pos = 1;
	var col_tmp = row_tmp.cells[col_pos];    
	while(col > 0)
	{		
		if(col_tmp.colSpan == 2)
		{
			col_pos+=1;			
			col--;
		}
		else
		{
			col_pos+=2;			
			col--;
		}
		col_tmp = row_tmp.cells[col_pos];
	};
	
	if(row_tmp.cells[col_pos].colSpan == 1)		 
	{   	
		var col2 = row_tmp.cells[col_pos+1];
		setNewBoss([col_tmp.firstChild.nodeValue, col2.firstChild.nodeValue]);
		current_boss = [col_tmp.firstChild.nodeValue, col2.firstChild.nodeValue];
		col_tmp.bgColor = color;
		col2.bgColor = color;
	}
	else
	{
		setNewBoss([col_tmp.firstChild.nodeValue]);   
		col_tmp.bgColor =color;
		current_boss = [col_tmp.firstChild.nodeValue];
	}	
}
function setNewBoss(boss)
{	
	var next_boss = document.getElementById("next_boss");
	if(next_boss)
	{
		var tbl     = document.createElement("table");
        var tblBody = document.createElement("tbody");

        var row = document.createElement("tr");           
        var cell = document.createElement("td");    
        var cell2 = document.createElement("td");  
		if(boss.length == 2)
		{
			var element = document.createElement("div");
			element.innerHTML= boss[0];
			element.className = "Image " + "Display " + boss[0];
			element.style="float:left; text-align:center;font-size: 16px;		border: 1px solid #CCC; 	font-family: Arial, Helvetica, sans-serif;";	
			var element2 = document.createElement("div");
			element2.innerHTML= boss[1];
			element2.className = "Image " + "Display " + boss[1];		
			element2.style="float:right; text-align:center;font-size: 16px;		border: 1px solid #CCC; 	font-family: Arial, Helvetica, sans-serif;";			
		   
	        cell.appendChild(element);
	        cell2.appendChild(element2);
	        row.appendChild(cell);
	        row.appendChild(cell2); 
		}
		else
		{			
			var element = document.createElement("div");
			element.className = "Image " + "Display " + boss[0];
			element.innerHTML= boss[0];
			element.style="text-align:center;font-size: 16px;	border: 1px solid #CCC; 	font-family: Arial, Helvetica, sans-serif;";			
			cell.appendChild(element);
			row.appendChild(cell);
		}	
		tblBody.appendChild(row);
	    tbl.align = "center";  
	    tbl.appendChild(tblBody); 
	    next_boss.replaceChild(tbl, next_boss.childNodes[0]);
    }
}
function format_time(time)
{
	if(time < 10) return "0"+time;
	return time;
}

function notify(){
	if (Notification.permission !== "granted") {
		Notification.requestPermission();
	}
	else{
		if(!show_notify )
		{
			var notification = new Notification('Boss maintenant :', {
			  body: (current_boss.length == 2 ? (current_boss[0] +" et "+current_boss[1]):current_boss[0]),
			  icon: "Notif.png",
			});			
			audio.play();
		}
		show_notify = true;
	}
}