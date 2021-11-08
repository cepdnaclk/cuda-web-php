var filename = "outcpa.txt";
var allData = "";
var dataArray = [];
var bestMatch = [];
var otherMatch = [];

var fileReader = {
	read : function(){
		var rawFile = new XMLHttpRequest();
		
		rawFile.open("GET", filename, false);
		rawFile.onreadystatechange = function (){
		        	if(rawFile.readyState === 4){
		            	if(rawFile.status === 200 || rawFile.status == 0){
		                	allData = rawFile.responseText;
		                	//console.log(allDataFromCSV);
							fileReader.handleData();
		           		}
		        	}
		}
		rawFile.send(null);
	},
	initialize : function () {
		fileReader.read();
	},
	splitData : function () {
		// split data and put it into an array
		var array = allData.split('\n');

		if(array.length>2){
			// I can process
			for(var i=0;i<array.length;i++){
				
				var row = array[i].match(/\S+/g);
				
				if(row){
					console.dir(row);
					dataArray.push(row);
				}
				 
			}

		}
		//console.dir(dataArray);
		fileReader.fillData();
	},
	handleData : function(){
		fileReader.splitData();	
		
	},
	fillData : function(){
		
		bestMatch.push(dataArray[0]);
		bestMatch.push(dataArray[1]);
		
		otherMatch = dataArray.slice(2);
		var tableRows = document.getElementsByTagName('tr');
		
		for(i=2;i<4;i++){
			
			var currentRow = tableRows[i];
			console.dir(currentRow);
			
			var bestMatchCols = currentRow.getElementsByClassName('tg-mtwr');
			console.dir(bestMatchCols);
			var count=0;
			for(j=0;j<bestMatchCols.length;j++){
				if(bestMatchCols[j].innerText==""){
					bestMatchCols[j].innerText = bestMatch[i-2][count];
					count = count+1;
				}
			}
		}
		
		for(i=4;i<tableRows.length;i++){
			
			var currentRow = tableRows[i];
			console.dir(currentRow);
			
			var otherCols = currentRow.getElementsByClassName('tg-yw4l');
			console.dir(otherCols);
			var count=0;
			for(j=0;j<otherCols.length;j++){
				if(otherCols[j].innerText==""){
					otherCols[j].innerText = otherMatch[i-4][count];
					count = count+1;
				}
			}
		}
		
		fileReader.showTable();
	},
	showTable : function(){
		var a = document.getElementsByClassName('tg')[0];
		a.style.display='table';
	}
};

fileReader.initialize();
