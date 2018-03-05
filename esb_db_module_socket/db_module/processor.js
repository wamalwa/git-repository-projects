const Core = require('./dbcore.js'); //get the database classs
const dbcore = new Core();

let config = dbcore.readfile('./dbconfigs/config.json'); //read database configgurations from a file
const transaction = dbcore.readfile('./dbconfigs/dbtransactions.json');

let esbURL = 'http://localhost:3100';

const socket = require('socket.io-client')(esbURL);

//Listen for connection to ESB
socket.on('connect', () => {
    console.log(`DB Module ID ${socket.id} \nYou can control / Check health of the the DB parameters from here`);
    console.log('DB is waiting for Job ...');

});

socket.on('db_socket', (request) => {
    console.log('Successfully received a DB Request');
    processTransaction(request)
        .then(data => {
            socket.emit('db_response', data);

        });
});


//-----------------------FUNCTIONS DEFINITIONS-----------------------------------------------------------------------

function parsetoJSON(rawData) {
    try {
        preparedData = '{' + rawData + '}';//single we do want the user to write so much in the config, we add the bracess here before parsing it

        return JSON.parse(preparedData);
    }
    catch (err) {
        return err;
    }
}

function formatType(type) {

    switch (type) {

        case 'Int':  // Number -> sql.Int
            type = dbcore.sql.Int;
            break;
        case 'Numeric':  // String -> sql.Numeric
            type = dbcore.sql.Numeric;
            break;
        case 'NVarChar':  // String -> sql.NVarChar
            type = dbcore.sql.NVarChar;
            break;
        case 'Bit':  // Boolean -> sql.Bit
            type = dbcore.sql.Bit;
            break;
        case 'DateTime':    // Date -> sql.DateTime
            type = dbcore.sql.DateTime;
            break;
        case 'VarBinary':    // Buffer -> sql.VarBinary
            type = dbcore.sql.VarBinary;
            break;
        case 'TVP':   // sql.Table -> sql.TVP
            type = dbcore.sql.TVP;
            break;
        default:
            type = dbcore.sql.NVarChar;
            break;
    }
    return type;
}

function get_requested_transaction(transactions, transtype) {

    var total_transactions = transactions.length;
    var trans_details = '';

    for (var i = 0; i < total_transactions; i++) {
        if (transactions[i].transtype === transtype && transactions[i].status === 'ACTIVE') {
            trans_details = transactions[i];
            break;
        }
    }
    ;

    return trans_details;
}

function prepareParams(request_params, transaction_params) {

    var request_params_size = request_params.length;
    var transaction_params_size = transaction_params.length;
    var keys = Object.keys(request_params);//get all the keys of the request
    var keyLength = keys.length;

    if (transaction_params_size > 0) {
        for (var param_i = 0; param_i < transaction_params_size; param_i++) {

            var paramName = transaction_params[param_i].name;//the name of the param at i

            for (var key_i = 0; key_i < keyLength; key_i++) {

                var keyName = keys[key_i];//get the name of the request Key
                //if the name matches the param name the thats what we want

                if (keyName === paramName) {
                    transaction_params[param_i].value = request_params[keyName];//assign the actual value here

                    transaction_params[param_i].type = formatType(transaction_params[param_i].type);//format the type here
                    break;//stop here you've got what you wanted
                }
            }
            ;

        }
        ;
    }
    return transaction_params;
}

async function getrecords(config, query, params, qtype) {

    return await dbcore.execute(config, query, params, qtype);
}

//-----------------------END OF FUNCTIONS DEFINITIONS-----------------------------------------------------------------------

//-------------------------------Transaction Process begins here-------------------------------------------------------

async function processTransaction(request_params) {

//----PARSE THE FILE DATA TO JSON FORMAT-----------
    var pasrsedJsonData = parsetoJSON(transaction);//convert the transaction file into json object
    config = parsetoJSON(config);

//----END of  PARSE THE FILE DATA TO JSON FORMAT-----------

//-----GET ALL THE TRANSACTIONS
    var transactions = pasrsedJsonData.transactions;
//END

//GET THE REQUEST PARAMS FROM EXTERNAL MODULE OR TOPIC------------

//this is the request params from other modules for db_module to execute
    /*
        var request_params = {
            metadata: {transtype: 'SAVE_SMSTEMPLATE'},
            payload: {SMSTYPE: 'TEST3', SMSTEMPLATE: 'Dear Test2', DESCRIPTION: 'TESTING it oooh'}
        }

    */

//=--------END
    var metadata = request_params.metadata; //set the specific transaction type requested
    transtype = metadata.transtype;
    var payload = request_params.payload;
    var trans_details = get_requested_transaction(transactions, metadata.transtype);

    var query = trans_details.query;//sql Query to be executed, this can be an SP or just a normal SQL query
    var transaction_params = prepareParams(payload, trans_details.params);//trans_details.params;//configuration paramameters without actual value values
    var qtype = trans_details.qtype; //this shows wether a query is SQL script or SP,options are SQL/SP or ''

//----------CALL THE DB FUNCTION TO EXECUTE THE TRANSACTION WITH ALL THE PARAMS


    return getrecords(config, query, transaction_params, qtype);
}
