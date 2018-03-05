class Core{

constructor(){
	this.sql 		= require('mssql');
	this.promise 	= require('bluebird');	
	this.fs 		= require('fs');
}

connect(config = {}){

return new this.promise((resolve,reject)=>{

	let sql = this.sql;
	sql.connect(config,(err)=>{
		if(err){
			reject(err);
		}
		var request = new sql.Request();
		resolve(request);
	
	});

});

}

async execute(config = {},query = '',params,type = ''){

	let request = await this.connect(config);

    return new this.promise ( ( resolve, reject ) => {

    for (var i = 0; i < params.length; i++) {
    	let name 	= params[i].name;
    	let type 	= params[i].type;
    	let value 	= params[i].value;

    	request.input(name, type, value);

    }


	if(type==='SP' || type==='SP'){

			request.execute(query, (err, output) => {
				
				if (err) {
					reject ( err );
				}				
				resolve ( output.recordset );

			});
		}
		else{
				request.query( query, (err, output) => {
				
				if (err) {
					reject ( err );
				}
			else{			
				resolve ( output.recordset );
				}
			});
		}

		});
}

readfile(path){
	try {  
		    var data = this.fs.readFileSync(path, 'utf8');
		    return data;    
		} 
		catch(e) {
		    return e;
		}
}


}
module.exports = Core;