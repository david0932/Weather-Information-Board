var pngtolcd = require('./png-to-lcd-new.js');

pngtolcd('image.png', false, function(err, buffer) {

	/* var fs = require('fs');
	
	fs.writeFile(__dirname+'/lcdhex.dat',buffer.toString('hex'),function(error){ //把資料寫入檔案
		if(error){ //如果有錯誤，把訊息顯示並離開程式
        console.log('檔案寫入錯誤');
		}
	}); */
	
	console.log(buffer.toString('hex'));
	
	/* var str = buffer.toString('hex');
	for(var i=0;i<=str.length;i++) {
		var prtstr = prtstr +'0x'+ str[i]+str[i+1]+',';
		if (i % 10 == 0){
			prtstr = prtstr + '\n';
		}
		var prtstr = prtstr + '0x'+ String.fromCharCode(buffer[i])+',';
		i=i+1
	}
	console.log(prtstr);
	console.log("count: %d bytes",i-1);
	console.log(str); */
	
	
		
    //console.log(buffer.toString('hex'));
	//for(var i=0;i<=buffer.length;i++){
		//var str += buffer.toString('hex')+",";
	//	var str = buffer[i];
	//	console.log(str);
	//}
	//console.log(str);
	// show buffer length
	//console.log(buffer.length);
	// buffer to json https://nodejs.org/api/buffer.html#buffer_buf_tostring_encoding_start_end
	//const json = JSON.stringify(buffer);
	//console.log(json);
});